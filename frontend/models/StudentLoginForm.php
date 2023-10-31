<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
//model for represent the data to handle login form from the student
class StudentLoginForm extends Model {
    public $username; //member variable to store the username
    public $password; //store password
    //public bool $rememberMe = true; //store remember me
    private $_user = false; //private property to store the user object
    public function rules() //rule for handling given data
    {
        return [
            [['username','password'],'required'],
            //['rememberMe','boolean'],
           // ['password','validatePassword'],
        ];
    }
    public function login(): bool //find username and and test the current password
    {
        if($this->validate()){ //if the given data is valid
            $student = Student::find()->where(['username'=>$this->username])->one();
            if ($student) {
                if ($student->password === $this->password) {
                    return true;
                }
                else { //if the password is not correct
                    $this->addError('password','Password salah, silahkan coba lagi');
                }
            }
            else { //if the username is not found
                $this->addError('username','Username tersebut tidak terdaftar');
            }
        }
        return false;
    }
}
?>
