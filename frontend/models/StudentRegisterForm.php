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
    //send activation code via email
    public function rules(): array //return an array of rules
    {
        //rules for handling input
        return [
            [['nik','username','email','password','password_repeat','no_HP'],'required'],
            ['email','email'],
            ['password_repeat','compare','compareAttribute'=>'password'],
            ['nik','unique','targetClass'=>'\app\models\Student','message'=>'NIK anda sudah terdaftar'],
            ['username','unique','targetClass'=>'\app\models\Student','message'=>'Username sudah digunakan, harap gunakan username lain !'],
            ['email','unique','targetClass'=>'\app\models\Student','message'=>'Email anda sudah terdaftar !'],
            ['no_HP','unique','targetClass'=>'\app\models\Student','message'=>'Nomor telepon anda sudah terdaftar !'],
            
            ['nik','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
            ['email','match','pattern'=>'/^[a-zA-Z0-9_.+-]+@(yahoo|gmail|hotmail)+\.(com|co.id)$/','message'=>'Email tidak valid'],
            ['no_HP','match','pattern'=>'/^[0-9]*$/','message'=>'No HP tidak boleh mengandung huruf'],
            
            ['password','string','min'=>4],
            ['username','string','min'=>4],
            ['no_HP','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],
        ];
    }   
    //generate unique access token: 9 random string, (possible to have duplicate!!!!)
    //student copy the access token and send it through given url
    public function generateAccessToken($length = 5): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters); //get the length of the characters
        $randomString = '';
        for ($i = 0; $i < $length; $i++) { //looping to generate random string
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        //get 4 characters from username and combine to random string variable
        $randomString = substr($this->username,0,4).$randomString;
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
    //send by telegram bot
    public static function sendByTelegram(){
        $bot = new \TelegramBot\Api\BotApi('6345998041:AAHbMZyyuxZgn9mY-eIVl25IptN2KOtmjOo');
        $updates = $bot->getUpdates();
        foreach ($updates as $update) {
            $chatId = $update->getMessage()->getChat()->getId();
            echo 'Chat ID: ' . $chatId . "\n";
        }
    }

}
?>
