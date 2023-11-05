<?php
namespace app\models;
use yii\base\Model;
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

    public function rules()
    {
        return [
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6', 'code7', 'code8'], 'required'],
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6', 'code7', 'code8'], 'string', 'max' => 1],
        ];
    }

    public function activate()
    {
        $code = $this->code1 . $this->code2 . $this->code3 . $this->code4 . $this->code5 . $this->code6 . $this->code7 . $this->code8;
        // Implement your activation logic here using the $code
    }
}
?>