<?php
namespace app\models; // app\models is a namespace
use yii\base\Model;
use yii\db\ActiveRecord; // ActiveRecord is a class that represents an active record
class Country extends ActiveRecord //country class used to represent a table in the database
{
    public static function tableName(): string { // tableName() is a method of the ActiveRecord class
        return 'country'; // tableName() returns the name of the table
    }
}
?>
