<?php 
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class StudentAkademikForm extends Model {
    public $sekolah;
    public $jurusan_sekolah;
    public $akreditasi_sekolah;
    public $no_utbk;
    public $tanggal_ujian_utbk;
    public $nilai_kemampuan_umum;
    public $nilai_kemampuan_kuantitatif;
    //get academic province of student
    public static function getAkademicProvince($kode_prop){
        $sql = "SELECT * FROM t_r_sekolah_dapodik";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = \yii\helpers\ArrayHelper::map($data, 'kode_prop', 'propinsi');
        return $data;
    }
    //get academic city of student
    
    //list of availabe program study, generate it without database
    //possible value for program study, may be added later
    public static function getProgram(){
        $sql = "SELECT * FROM t_r_jurusan_sekolah";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = \yii\helpers\ArrayHelper::map($data, 'jurusan_sekolah_id', 'nama');
        return $data;
    }
    //list of available school, we use availabele school from database
 
    //generate school acreditation
    public static array $acreditation = [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'Belum Akreditasi' => 'Belum Akreditasi',
        'Belum Terakreditasi' => 'Belum Terakreditasi',
        'TT' => 'TT'
    ];
}
?>