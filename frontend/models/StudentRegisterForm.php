<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

//model for registration form, the table name is t_user with additional fields 'phone_number'
class StudentRegisterForm extends Model{
    public $nik;
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $phone_number;
    public function rules(): array //return an array of rules
    {
        //rules for handling input
        return [
            [['nik','username','email','password','password_repeat','phone_number'],'required'],
            ['email','email'],
            ['password_repeat','compare','compareAttribute'=>'password'],
            ['nik','unique','targetClass'=>'\app\models\Student','message'=>'NIK anda sudah terdaftar'],
            ['username','unique','targetClass'=>'\app\models\Student','message'=>'Username sudah digunakan, harap gunakan username lain !'],
            ['email','unique','targetClass'=>'\app\models\Student','message'=>'Email anda sudah terdaftar !'],
            ['phone_number','unique','targetClass'=>'\app\models\Student','message'=>'Nomor telepon anda sudah terdaftar !'],
        ];
    }
    //generate unique access token: 10 random string, (possible to have duplicate!!!!)
    //student copy the access token and send it through given url
    public function generateAccessToken($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters); //get the length of the characters
        $randomString = '';
        for ($i = 0; $i < $length; $i++) { //looping to generate random string
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //method for registering new user
    public function registerStudent(): bool
    {
        if($this->validate()){ //if the given data is valid
            $student = new Student(); //create new student object
            //check username if it is already exist
            if (Student::find()->where(['username'=>$this->username])->one()) {
                $this->addError('username','Username sudah digunakan, harap gunakan username lain !');
                return false;
            }
            //fill the student object with the given data
            $student->nik = $this->nik;
            $student->username = $this->username;
            $student->email = $this->email;
            //an optional feature to guard the password from being stolen
            //$student->password = Yii::$app->security->generatePasswordHash($this->password); //hash the password
            $student->password = $this->password; //hash the password
            $student->phone_number = $this->phone_number;
            //save the access token to database
            $student->verf_code = $this->generateAccessToken();
            if($student->save()){ //if the student is saved
                //then send access token via WhatsApp
                $link ='http://localhost:8080/index.php?r=student%2Ftoken-student';
                $message = "Hallo *".$student->username."*, anda telah melakukan pendaftaran pada Website PMB IT Del.".
                " Masukan kode verifikasi berikut pada link yang diberikan agar akun anda dapat digunakan\n\nKode verifikasi : *".
                $student->verf_code."*\n\n".
                $link. "\n\nTerima kasih\n\nSalam,"."\n\n\nPanitia PMB IT Del"."\n\n\n".
                "*Pesan ini dikirim secara otomatis oleh sistem*";
                $send = new StudentResetForm();
                $send->sendWhatsApp($student->phone_number,$message);
                return true;
            }
            else { //if the student is not saved
                $this->addError('username','Registration failed, please try again');
            }
        }
        return false; //data is not valid
    }
}


?>
