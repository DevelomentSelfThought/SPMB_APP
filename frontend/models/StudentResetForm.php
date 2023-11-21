<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
class StudentResetForm extends Model {
    public $username; //member variable to store the username
    public $no_HP;
    public function rules() //rule for handling given data
    {
        return [
            [['username','no_HP'],'required'],
            ['username','string','min'=>4],
            ['no_HP','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],
            ['no_HP','match','pattern'=>'/^[0-9]*$/','message'=>'No HP tidak boleh mengandung huruf'],
        ];
    }
    //mail api for sending message, need to be improved to handle error
    //while sending message to the user (e.g. no internet connection)
    //experimental version using mailgun api (free version)
    public function sendMail($email, $message){
        $apiKey = getenv('SENDINBLUE_API_KEY');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(array(
                'sender' => array('name' => 'Panitia PMB IT Del', 'email' => 'michaelsipayung123@gmail.com'),
                'to' => array(array('email' => $email)),
                'subject' => 'Your activation code',
                'textContent' => $message
            )),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "api-key: ". $apiKey,
                "content-type: application/json"
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            //flash message 
            Yii::$app->session->setFlash('error', 'Email gagal dikirim, silahkan coba lagi nanti');
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    //whatsApp api for sending message, need to be improved to handle error
    //while sending message to the user (e.g. no internet connection)
    public function sendWhatsApp($phone, $message){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.textmebot.com/send.php?recipient=".$phone."&apikey=dWpS49dVJjZV".
            "&text=".urlencode($message),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
    //method for reset message, used for sending message to the user
    public function resetMessage($username, $password){
        $link ='http://172.22.42.160/student/login';
        $logoUrl = 'https://i.imgur.com/RLYAEtG.jpg'; // replace with your logo URL
        $message = "
        <html>
        <body style='font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; background-color: #f4f4f4;'>
            <div style='width: 80%; margin: auto; padding: 20px; background-color: #fff; box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1); border-radius: 10px; text-align: center;'>
                <img src='".$logoUrl."' alt='Company Logo' style='max-width: 100px; display: block; margin: 0 auto;'>
                <h2 style='color: green;'>Hello, <b>".$username."</b></h2>
                <p>Anda telah melakukan reset password pada aplikasi SPMB IT Del. 
                Untuk melanjutkan proses pendaftaran calon mahasiswa baru, 
                silahkan masuk ke akun baru anda dengan password dibawah ini. <br>
                Anda dapat masuk ke akun anda dengan cara mengklik 
                link dibawah ini atau dengan memilih menu masuk ke akun pada aplikasi SPMB.</p>
                <p><b>Password baru anda: ".$password."</b></p>
                <a href='".$link."' style='background-color: #4CAF50; color: white; padding: 12px 24px; text-align: center; text-decoration: none; display: inline-block; width: 200px; margin: 10px auto; border-radius: 5px; border: none;'>Masuk ke Akun</a>
                <br><p>Setelah berhasil masuk, anda disarankan melakukan perubahan password. 
                Hal ini bertujuan untuk menjaga kerahasian akun anda. </p>
                <p>Thank you,</p>
                <p>Panitia PMB IT Del</p>
                <p><i>This message was automatically sent by the system</i></p>
            </div>
        </body>
        </html>";
        return $message;
    }
    //method for generate random string, used for generating new password automatically
    //the current implementation is not safe, because it is possible to have duplicate
    //need to be improved, but password reset is not the main focus of this project
    public function generateRandomString($length = 6): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters); //get the length of the characters
        $randomString = '';
        for ($i = 0; $i < $length; $i++) { //looping to generate random string
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //reset password using  whatsApp api and send the new password to the user
    //need more error handling to quarantine the user receive the new password
    public function resetPassword(): bool
    {
        if($this->validate()){ //if the given data is valid
            $temp_encrypt_user = new StudentRegisterForm();
            $student = Student::find()->where(['username'=>$temp_encrypt_user->encryptToken($this->username)])->one();
            if ($student) {
                if(!$this->isActiveUser($temp_encrypt_user->encryptToken($this->username))){ //the user is not active
                    return false;
                 }
                $new_password = $this->generateRandomString(); //generate random string
                $student->password = Yii::$app->security->generatePasswordHash($new_password); //hash the new password
                if($student->save()){ //if the new password is saved
                    $message = $this->resetMessage($this->username,$new_password);
                    //find mail address given the username in table t_user using create command
                    $mail_destination = "Select email from t_user where username = '".
                        $temp_encrypt_user->encryptToken($this->username)."'";
                    $mail_destination = Yii::$app->db->createCommand($mail_destination)->queryScalar();
                    //after fetch the address, send the new password to the user
                    $this->sendMail($mail_destination,$message); //send the new password to the user
                    //$this->sendWhatsApp($student->phone_number,$message); //send the new password to the user
                    return true;
                }
                else
                    $this->addError('password','Password gagal direset, silahkan coba lagi');
            }
            else 
                $this->addError('username','Username tersebut tidak terdaftar');
        } 
        return false;
    }
    //make sure that the current user is already active user
    public function isActiveUser($username){
        $sql = "SELECT active from t_user where username = '".$username."'";
        $active = Yii::$app->db->createCommand($sql)->queryScalar();
        if($active == 1)
            return true;
        else{
            echo "<script type='text/javascript'>alert('Akun anda belum aktif! Periksa email anda untuk mengaktifkan akun anda.');</script>";
            return false;
        }
    }
}
?>