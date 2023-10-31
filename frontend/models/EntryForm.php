<?php
namespace app\models; // app\models is a namespace
use Yii; // Yii is a class that represents the Yii framework
use yii\base\Model; // Model is a class that represents a model
class EntryForm extends Model { // EntryForm extends the Model class
    public $name; // $name and $email are public properties of the EntryForm class
    public $email;
    public function rules(): array
    { // rules() is a method of the Model class
        return [ // rules() returns an array of rules
            [['name','email'],'required'], // [['name','email'],'required'] is an array of rules
            ['email','email'],
        ];
    }
}
?>