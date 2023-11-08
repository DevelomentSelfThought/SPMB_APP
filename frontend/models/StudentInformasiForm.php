<?php
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentInformasiForm extends Model{
    //todo: public member for information fields
    public $sumber_informasi;
    public $motivasi;
    public $jumlah_n;
    public $agree;

    //rules for validation  
    public function rules(){
        return [
            [['sumber_informasi','motivasi','jumlah_n'], 'required'],
            [['agree'], 'required', 'requiredValue' => 1, 'message' => 'Anda harus menyetujui pernyataan ini'],
            [['sumber_informasi','motivasi','jumlah_n'], 'string', 'max' => 255],
        ];
    }
    //update data to t_pendaftar table, user_id = getCurrenUserId()
    public function updateData(){
        $user_id =StudentDataDiriForm::getCurrentUserId();
        $sql = "UPDATE t_pendaftar SET informasi_del_id = :sumber_informasi, motivasi = :motivasi, 
        n = :jumlah_n WHERE user_id = :user_id";
        $params = [
            ':sumber_informasi' => $this->sumber_informasi,
            ':motivasi' => $this->motivasi,
            ':jumlah_n' => $this->jumlah_n,
            ':user_id' => $user_id,
        ];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
    }
    //insert or update information to database 
    public function insertInformasiData(){
        if($this->validate()){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar', 
                    ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //update data to t_pendaftar table
                self::updateData();
                //flash message if the data is successfully inserted to database
                return true;
            }catch(Exception $e) {
                //flash message if the data is failed to insert to database
                //echo $e->getMessage();
                Yii::$app->session->setFlash('error', "Data Informasi Gagal Disimpan");
                return false;
            }
        }
        return false;
    }
    //generate jumlah n value (1-10), key value pair, number not text
    public static array $get_jumlah_n = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4, 
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8, 
        9 => 9,
        10 => 10,
    ];
    //generate sumber informasi value, key value pair, from table t_r_informasi_del, 
    //field: informasi_del_id,and desc
    public static function getSumberInformasi(){
        $sumber = Yii::$app->db->createCommand('SELECT informasi_del_id, `desc` FROM t_r_informasi_del')->queryAll();
        $sumber = array_column($sumber, 'desc', 'informasi_del_id');
        return $sumber;
    }
    //generate motivasi value, key value pair, text and text
    public static array $get_motivasi = [
        'Prestasi' => 'Prestasi',
        'Pendidikan' => 'Pendidikan',
        'Pekerjaan' => 'Pekerjaan',
        'Lainnya' => 'Lainnya',
    ];
}
?>