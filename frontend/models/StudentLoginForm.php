<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
//model for represent the data to handle login form from the student
class StudentLoginForm extends Model {
    const REMEMBER_ME_DURATION = 3600 * 24 * 30; // 30 days
    public $rememberMe = true;
    
    public $username; //member variable to store the username
    public $password; //store password
    //public bool $rememberMe = true; //store remember me
    private $_student = false; //private property to store the user object

    public function rules() //rule for handling given data
    {
        return [
            [['username','password'],'required'],
            [['username','password'],'string','min'=>4,'max'=>20],
            //['rememberMe','boolean'],
           ['password','validatePassword'],
        ];
    }
    //function to validate the password
    public function validatePassword($attribute,$params)
    {
        if(!$this->hasErrors()){ //if there is no error
            $student = $this->getStudent(); //get the user object
            if(!$student || !$student->validatePassword($this->password)){ //if the user is not found or the password is not valid
                $this->addError($attribute,'Username atau password salah'); //set error message
            }
        } //ok username and password is valid, but  is the account active?
        if($student && $student->active !=1){
            $this->addError($attribute,'Akun anda belum aktif, silahkan cek kode verifikasi yang telah dikirimkan');
            //redirect to activation page
            Yii::$app->response->redirect(['student/student-token-activate']);
        }
    }
    public function login(): bool //find username and and test the current password
    {
        if($this->validate()){ //if the given data is valid
            return Yii::$app->user->login($this->getStudent(),
            $this->rememberMe ? self::REMEMBER_ME_DURATION : 0); //login the user
        }
        return false; //return false if the given data is not valid
    }
    //function to get the user object
    public function getStudent()
    {
        $temp_encrypt_user  = new StudentRegisterForm();
        if($this->_student === false){ //if the user is not yet found
            $this->_student = Student::findByUsername($temp_encrypt_user->encryptToken($this->username)); //find the user
        }
        return $this->_student; //return the user
    }
}
?>
