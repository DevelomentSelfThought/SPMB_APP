<?php
namespace app\models;
use yii\db\ActiveRecord;
class StudentDataDiri extends ActiveRecord{
    public static function tableName(): string {
        return 't_pendaftar';
    }
}
?>