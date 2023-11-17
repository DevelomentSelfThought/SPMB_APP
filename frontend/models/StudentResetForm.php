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
        $message = "Hallo *".$username."*, anda telah melakukan reset password pada aplikasi SPMB IT Del.".
                    "Silahkan login dengan password baru anda melalui link dibawah ini."."\n\nPassword anda : *".
                    $password."*\n\n". "\n".$link. "\n\n"."Setelah berhasil login, anda disarankan untuk segera 
                    melakukan perubahan password pada menu ubah password."."\n\nTerima kasih\n\nSalam,".
                    "\n\n\nPanitia PMB IT Del"."\n\n\n"."*Pesan ini dikirim secara otomatis oleh sistem*";
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
            $student = Student::find()->where(['username'=>$this->username])->one();
            if ($student) {
                $new_password = $this->generateRandomString(); //generate random string
                $student->password = Yii::$app->security->generatePasswordHash($new_password); //hash the new password
                if($student->save()){ //if the new password is saved
                    $message = $this->resetMessage($student->username,$new_password);
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
}
?>