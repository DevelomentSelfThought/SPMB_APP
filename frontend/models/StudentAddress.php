<?php
//this model is used to fetch data from student_address table (asuming that you have student_address table in your database)
//the table may be vary according to your database, so you can change it as you want
namespace app\models;
use Yii;
use Exception;
use yii\base\Model;
//we define the class name as StudentAddress, and extends it to Model class
//this is the class that we will use to fetch data from database and pass it to the view
//we will use this class in the view to populate the dropdownlist, in this case address dropdownlist
class StudentAddress extends Model {
    //this public member will be pass as argument, the rule is very simple, enjoy it
    public $provinsi_id;
    public $kabupaten_id;
    //fetch data need not defined any exception handler, because it will be handled by the controller
    
    //fetch data from t_r_provinsi table, field provinsi_id and nama
    public static function getProvince(){
        $sql = "SELECT * FROM t_r_provinsi";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        //fetch data as key value pair, where provinsi_id is the key and nama is the value
        $data = \yii\helpers\ArrayHelper::map($data, 'provinsi_id', 'nama');
        return $data;
    }
    //fetch data from t_r_kabupaten table, field kabupaten_id and nama
    public static function getKabupaten($provinsi_id=0){
        $sql = "SELECT * FROM t_r_kabupaten WHERE provinsi_id = :provinsi_id";
        $data = Yii::$app->db->createCommand($sql)->bindValue(':provinsi_id', $provinsi_id)->queryAll();
        //fetch data as key value pair, where kabupaten_id is the key and nama is the value
        $data = \yii\helpers\ArrayHelper::map($data, 'kabupaten_id', 'nama');
        return $data;
    }
    //fetch data from t_r_kecamatan table, field kecamatan_id and nama
    public static function getKecamatan($kabupaten_id=0){
        $sql = "SELECT * FROM t_r_kecamatan WHERE kabupaten_id = :kabupaten_id";
        $data = Yii::$app->db->createCommand($sql)->bindValue(':kabupaten_id', $kabupaten_id)->queryAll();
        //fetch data as key value pair, where kecamatan_id is the key and nama is the value
        $data = \yii\helpers\ArrayHelper::map($data, 'kecamatan_id', 'nama');
        return $data;
    }
}
?>