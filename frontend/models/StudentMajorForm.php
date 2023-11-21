<?php
namespace app\models;
use Yii;
use yii\base\Model;

class StudentMajorForm extends Model
{
    public $gelombang;
    public $jurusan_main;
    public $jurusan_opsional;
    
    public function rules()
    {
        return [
            [['gelombang', 'jurusan_main'], 'required'],
            [['jurusan_opsional'], 'safe'],
            ['jurusan_main','compare','compareAttribute'=>'jurusan_opsional',
            'operator'=>'!=','message'=>'Jurusan utama dan jurusan opsional tidak boleh sama']
        ];
    }
    //fetch the major list from database, t_r_jurusan table
    public static function getMajorList()
    {
        $sql = "SELECT jurusan_id,nama FROM t_r_jurusan";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $list = \yii\helpers\ArrayHelper::map($result, 'jurusan_id', 'nama');
        return $list;
    }
    //fetch the batch list from database, t_r_gelombang table
    public static function getBatchList()
    {
        $sql = "SELECT gelombang_pendaftaran_id,`desc` FROM t_r_gelombang_pendaftaran";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $list = \yii\helpers\ArrayHelper::map($result, 'gelombang_pendaftaran_id', 'desc');
        return $list;
    }
}
?>