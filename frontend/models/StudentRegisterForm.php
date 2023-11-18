<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

//use exception class
use Exception;
//model for registration form, the table name is t_user with additional fields 'phone_number'
class StudentRegisterForm extends Model {
    public $nik;
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $no_HP;
    private $active = 0;
    //send activation code via email
    public function rules(): array //return an array of rules
    {
        //rules for handling input
        return [
            [['nik','username','email','password','password_repeat','no_HP'],'required'],
            ['email','email'],
            ['password_repeat','compare','compareAttribute'=>'password'],
            // ['nik','unique','targetClass'=>'\app\models\Student','message'=>'NIK anda sudah terdaftar'],
            ['username','unique','targetClass'=>'\app\models\Student','message'=>'Username sudah digunakan, harap gunakan username lain !'],
            // ['email','unique','targetClass'=>'\app\models\Student','message'=>'Email anda sudah terdaftar !'],
            // ['no_HP','unique','targetClass'=>'\app\models\Student','message'=>'Nomor telepon anda sudah terdaftar !'],
            
            ['nik','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
            ['email','match','pattern'=>'/^[a-zA-Z0-9_.+-]+@(yahoo|gmail|hotmail|del)+\.(com|co.id|ac.id)$/','message'=>'Email tidak valid'],
            ['no_HP','match','pattern'=>'/^[0-9]*$/','message'=>'No HP tidak boleh mengandung huruf'],
            
            ['password','string','min'=>4],
            ['username','string','min'=>4],
            ['no_HP','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],
        ];
    }   
    //generate unique access token: 9 random string, (possible to have duplicate!!!!)
    //student copy the access token and send it through given url
    public function generateAccessToken($length = 6): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters); //get the length of the characters
        $randomString = '';
        for ($i = 0; $i < $length; $i++) { //looping to generate random string
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        //get 4 characters from username and combine to random string variable
        return $randomString;
    }
    //method for registering new user
    public function registerStudent(): bool
    {
        if($this->validate()){ //if the given data is valid
            $student = new Student(); //create new student object
            //check username if it is already exist
            if (Student::find()->where(['username'=>$this->username])->one()) {
                //set flash message
                Yii::$app->session->setFlash('error','Username sudah digunakan, harap gunakan username lain !');
                return false;
            }
            //fill the student object with the given data
            $student->nik = $this->nik;
            $student->username = $this->username;
            $student->email = $this->email;
            //an optional feature to guard the password from being stolen
            //$student->password = Yii::$app->security->generatePasswordHash($this->password); //hash the password
            $student->password = Yii::$app->security->generatePasswordHash($this->password);; //hash the password
            $student->no_HP = $this->no_HP; //hash the phone number
            //save the access token to database
            $student->verf_code = $this->generateAccessToken();
            $student->active = $this->active;               
            //hash the access token, for production
            //$student->verf_code = Yii::$app->security->generatePasswordHash($student->verf_code);
            if($student->save()){ //if the student is saved
                //then send access token via WhatsApp
                //$link ='http://172.22.42.182/student/token-student';
                //$message = "Hallo *".$student->username."*, anda telah melakukan pendaftaran pada Website PMB IT Del.".
                //" Masukan kode verifikasi berikut pada link yang diberikan agar akun anda dapat digunakan\n\nKode verifikasi : *".
                //$student->verf_code."*\n\n".
                //$link. "\n\nTerima kasih\n\nSalam,"."\n\n\nPanitia PMB IT Del"."\n\n\n".
                //"*Pesan ini dikirim secara otomatis oleh sistem*";
                //$send = new StudentResetForm();
                //$send->sendWhatsApp($student->phone_number,$message);
                //send email
                //self::sendByTelegram("@Millerdebian", $student->verf_code);
                $message = $this->registerMessage($student->username,$student->verf_code);
                $mail_send  = new StudentResetForm(); //create new object, for sending email
                $mail_send->sendMail($student->email,$message); //send the token to the user
                return true;
            }
            else { //if the student is not saved
                //set flash message
                Yii::$app->session->setFlash('error','Data anda tidak valid, harap periksa kembali!');
                return false;
            }
        }
        return false; //data is not valid
    }
    //send email using mailgun api, case: registration form
    public function registerMessage($username, $token){
        $link ='http://localhost:8080/student/student-token-activate';
        $message = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .container {
                    width: 80%;
                    margin: auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
                    border-radius: 10px;
                }
                .button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 14px 20px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    margin: 10px 0;
                    border-radius: 5px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Hello, <b>".$username."</b></h2>
                <p>Anda telah melakukan pendaftaran akun calon mahasiswa baru pada aplikasi SPMB IT Del. 
                Untuk melanjutkan proses pendaftaran calon mahasiswa baru, anda harus terlebih dahulu 
                mengaktifkan akun anda. 
                Gunakan kode aktivasi dibawah ini, agar akun anda aktif atau dapat digunakan. <br>
                Anda dapat mengaktifkan akun anda dengan cara mengklik 
                link dibawah ini atau dengan memilih menu aktivasi akun pada aplikasi SPMB.</p>
                <p><b>Kode aktivasi anda: ".$token."</b></p>
                <a href='".$link."' class='button'>Verifikasi Akun</a>
                <p>Setelah kode tersebut berhasil digunakan, anda dapat masuk ke akun anda dengan username 
                dan password yang anda daftarkan. </p>
                <p>Thank you,</p>
                <p>Panitia PMB IT Del</p>
                <p><i>This message was automatically sent by the system</i></p>
            </div>
        </body>
        </html>";
    
        return $message;
    }
}
?>
