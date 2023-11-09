<?php
namespace app\models;
use Yii;
use Exception;
use yii\base\Model;
class StudentPrestasiForm extends Model{
    public $nama_prestasi_1;
    public $tanggal_prestasi_1;
    public $predikat_prestasi_1;
    public $nama_prestasi_2;
    public $tanggal_prestasi_2;
    public $predikat_prestasi_2;
    public $nama_prestasi_3;
    public $tanggal_prestasi_3;
    public $predikat_prestasi_3;
    public $nama_prestasi_4;
    public $tanggal_prestasi_4;
    public $predikat_prestasi_4;
    //member for non akademik prestasi same as above, but add non to the end of variable name
    public $nama_prestasi_non_1;
    public $tanggal_prestasi_non_1;
    public $predikat_prestasi_non_1;
    public $nama_prestasi_non_2;
    public $tanggal_prestasi_non_2;
    public $predikat_prestasi_non_2;
    public $nama_prestasi_non_3;
    public $tanggal_prestasi_non_3;
    public $predikat_prestasi_non_3;
    public $nama_prestasi_non_4;
    public $tanggal_prestasi_non_4;
    public $predikat_prestasi_non_4; 
    //rules for handling input data from user
    public function rules(){
        return [
            [['nama_prestasi_1','tanggal_prestasi_1','predikat_prestasi_1'], 'string', 'max' => 255],
            [['nama_prestasi_2','tanggal_prestasi_2','predikat_prestasi_2'], 'string', 'max' => 255],
            [['nama_prestasi_3','tanggal_prestasi_3','predikat_prestasi_3'], 'string', 'max' => 255],
            [['nama_prestasi_4','tanggal_prestasi_4','predikat_prestasi_4'], 'string', 'max' => 255],
            //rule for non akademik 
            [['nama_prestasi_non_1','tanggal_prestasi_non_1','predikat_prestasi_non_1'], 'string', 'max' => 255],
            [['nama_prestasi_non_2','tanggal_prestasi_non_2','predikat_prestasi_non_2'], 'string', 'max' => 255],
            [['nama_prestasi_non_3','tanggal_prestasi_non_3','predikat_prestasi_non_3'], 'string', 'max' => 255],
            [['nama_prestasi_non_4','tanggal_prestasi_non_4','predikat_prestasi_non_4'], 'string', 'max' => 255],
            //nama prestasi minimum 4 character
            [['nama_prestasi_1','nama_prestasi_2','nama_prestasi_3','nama_prestasi_4'], 'string', 'min' => 4],
            //nama prestasi non akademik minimum 4 character
            [['nama_prestasi_non_1','nama_prestasi_non_2','nama_prestasi_non_3','nama_prestasi_non_4'], 'string', 'min' => 4],
        ];
    }
    //function to insert data prestasi akademik to table t_prestasi,
    //field to fullfill pendafatar_id, tingkat_id, jenis_prestasi, nama, tahun
    public function updatePrestasiAkademik(){
        //get pendafatar_id from table t_pendaftar
        $pendaftar_id = Yii::$app->db->createCommand('SELECT pendaftar_id FROM t_pendaftar WHERE user_id = 
        '.StudentDataDiriForm::getCurrentUserId())->queryScalar();
        //insert data to table t_prestasi
        if($this->nama_prestasi_1 != null && $this->tanggal_prestasi_1 != null && 
            $this->predikat_prestasi_1 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_1,
                'jenis_prestasi'=>'Akademik',
                'nama'=>$this->nama_prestasi_1,
                'tahun'=>$this->tanggal_prestasi_1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
        //do the same for the rest of the data
        if($this->nama_prestasi_2 != null && $this->tanggal_prestasi_2 != null && 
            $this->predikat_prestasi_2 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_2,
                'jenis_prestasi'=>'Akademik',
                'nama'=>$this->nama_prestasi_2,
                'tahun'=>$this->tanggal_prestasi_2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,

            ])->execute();    
        }
        if($this->nama_prestasi_3 != null && $this->tanggal_prestasi_3 != null && 
            $this->predikat_prestasi_3 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_3,
                'jenis_prestasi'=>'Akademik',
                'nama'=>$this->nama_prestasi_3,
                'tahun'=>$this->tanggal_prestasi_3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
        if($this->nama_prestasi_4 != null && $this->tanggal_prestasi_4 != null && 
            $this->predikat_prestasi_4 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_4,
                'jenis_prestasi'=>'Akademik',
                'nama'=>$this->nama_prestasi_4,
                'tahun'=>$this->tanggal_prestasi_4,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
    }
    //function to update prestasi non akademik to table t_prestasi,, same as above but for non akademik
    public function updatePrestasiNonAkademik(){
        //get pendafatar_id from table t_pendaftar
        $pendaftar_id = Yii::$app->db->createCommand('SELECT pendaftar_id FROM t_pendaftar WHERE user_id = 
        '.StudentDataDiriForm::getCurrentUserId())->queryScalar();
        //insert data to table t_prestasi
        if($this->nama_prestasi_non_1 != null && $this->tanggal_prestasi_non_1 != null && 
            $this->predikat_prestasi_non_1 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_non_1,
                'jenis_prestasi'=>'Non Akademik',
                'nama'=>$this->nama_prestasi_non_1,
                'tahun'=>$this->tanggal_prestasi_non_1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
        //do the same for the rest of the data
        if($this->nama_prestasi_non_2 != null && $this->tanggal_prestasi_non_2 != null && 
            $this->predikat_prestasi_non_2 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_non_2,
                'jenis_prestasi'=>'Non Akademik',
                'nama'=>$this->nama_prestasi_non_2,
                'tahun'=>$this->tanggal_prestasi_non_2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
        if($this->nama_prestasi_non_3 != null && $this->tanggal_prestasi_non_3 != null && 
            $this->predikat_prestasi_non_3 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_non_3,
                'jenis_prestasi'=>'Non Akademik',
                'nama'=>$this->nama_prestasi_non_3,
                'tahun'=>$this->tanggal_prestasi_non_3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
        if($this->nama_prestasi_non_4 != null && $this->tanggal_prestasi_non_4 != null && 
            $this->predikat_prestasi_non_4 != null){
            Yii::$app->db->createCommand()->insert('t_prestasi', [
                'pendaftar_id'=>$pendaftar_id,
                'tingkat_id'=>$this->predikat_prestasi_non_4,
                'jenis_prestasi'=>'Non Akademik',
                'nama'=>$this->nama_prestasi_non_4,
                'tahun'=>$this->tanggal_prestasi_non_4,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_by'=>Yii::$app->user->identity->username,
                'updated_by'=>Yii::$app->user->identity->username,
            ])->execute();    
        }
    }
    //generate list of tingkat prestasi from table t_r_tingkat as key value pair
    public static function getTingkatPrestasiList(){
        $tingkat_prestasi_list = Yii::$app->db->createCommand('SELECT tingkat_id, nama FROM t_r_tingkat')->queryAll();
        $tingkat_prestasi_list = array_column($tingkat_prestasi_list, 'nama', 'tingkat_id');
        return $tingkat_prestasi_list;
    }
    //insert prestasi data to database
    public function insertPrestasiData(){
        //validate the input data
        if($this->validate()){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar', 
                    ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //update prestasi to t_pendaftar, non akademik and akademik
                self::updatePrestasiAkademik();
                self::updatePrestasiNonAkademik();
                //flash message if the data is successfully inserted to database
                return true;
            }catch(Exception $e) {
                //flash message if the data is failed to inserted to database
                //echo $e->getMessage();
                Yii::$app->session->setFlash('error', "Data Prestasi Gagal Disimpan");
                return false;
            }
        }
        return false;
    }
    
}
?>