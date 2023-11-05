<?php
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;
use Yii;
class StudentTokenActivate extends Model
{
    public $code1;
    public $code2;
    public $code3;
    public $code4;
    public $code5;
    public $code6;
    public $code7;
    public $code8;
    public $code9;

    //possible to add more codes
    public function rules()
    {
        return [
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6', 'code7', 'code8'], 'required'],
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6', 'code7', 'code8','code9'], 'string', 'max' => 1],
        ];
    }
    //activate the user account, set status to active if the code is correct
    public function activate()
    {
        $code = $this->code1 . $this->code2 . $this->code3 . $this->code4 . $this->code5 . $this->code6 . $this->code7 . $this->code8.$this->code9;
        //look if verf_code exists in the database
        $temp = Yii::$app->db->createCommand("SELECT * FROM t_user WHERE verf_code = '$code'")->queryOne();
        if($temp==null)
            return false;
        else //set status to active
        {
            Yii::$app->db->createCommand("UPDATE t_user SET active = 1 WHERE verf_code = '$code'")->execute();
            return true;
        }
    }
}
?>