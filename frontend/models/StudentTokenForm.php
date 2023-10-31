<?php
//this model is intended to handle the input for access token,
//the access token is used to authenticate the user and
//to authorize the user using the service, example: login
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;
class StudentTokenForm extends Model {
    public $verf_code;
    public function rules(): array //return an array of rules
    {
        //rules for handling input for access token
        return [
            [['verf_code'],'required'],
           // ['access_token','validateAccessToken'], optional feature to validate the access token
        ];
    }
    //validate the access token from the database
    public function validateAccessToken(): bool{
        //handle the given access token if it has an error
        if($this->validate()) {
            //find the access token from the database
            $student = Student::find()->where(['verf_code'=>$this->verf_code])->one();
            if($student){ //if the access token is found
                $student->active = 1; //set the access token to active (1)
                if($student->save()) { //save the state of the user to the database
                    return true;
                }
                else{
                    $this->addError('verf_code','Terjadi kesalahan, silahkan coba lagi !');
                }
            }
            else { //if the access token is not found
                $this->addError('verf_code','Akses token anda tidak valid !');
            }
        }
        return false;
    }
}
?>
