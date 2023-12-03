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
    //push prestasi_1 to database
    private function pushAcademic_1(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_1 != null && $this->tanggal_prestasi_1 != null && 
            $this->predikat_prestasi_1 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'akademik 1' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_1,
                        'nama'=>$this->nama_prestasi_1,
                        'tahun'=>$this->tanggal_prestasi_1,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "akademik 1" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_1,
                        'jenis_prestasi'=>'akademik 1',
                        'nama'=>$this->nama_prestasi_1,
                        'tahun'=>$this->tanggal_prestasi_1,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for prestasi_2
    private function pushAcademic_2(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_2 != null && $this->tanggal_prestasi_2 != null && 
            $this->predikat_prestasi_2 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'akademik 2' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_2,
                        'nama'=>$this->nama_prestasi_2,
                        'tahun'=>$this->tanggal_prestasi_2,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "akademik 2" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_2,
                        'jenis_prestasi'=>'akademik 2',
                        'nama'=>$this->nama_prestasi_2,
                        'tahun'=>$this->tanggal_prestasi_2,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for prestasi_3
    private function pushAcademic_3(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_3 != null && $this->tanggal_prestasi_3 != null && 
            $this->predikat_prestasi_3 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'akademik 3' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_3,
                        'nama'=>$this->nama_prestasi_3,
                        'tahun'=>$this->tanggal_prestasi_3,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "akademik 3" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_3,
                        'jenis_prestasi'=>'akademik 3',
                        'nama'=>$this->nama_prestasi_3,
                        'tahun'=>$this->tanggal_prestasi_3,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for prestasi_4
    private function pushAcademic_4(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_4 != null && $this->tanggal_prestasi_4 != null && 
            $this->predikat_prestasi_4 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'akademik 4' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_4,
                        'nama'=>$this->nama_prestasi_4,
                        'tahun'=>$this->tanggal_prestasi_4,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "akademik 4" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_4,
                        'jenis_prestasi'=>'akademik 4',
                        'nama'=>$this->nama_prestasi_4,
                        'tahun'=>$this->tanggal_prestasi_4,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for non akademik prestasi 1
    private function pushNonAcademic_1(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_non_1 != null && $this->tanggal_prestasi_non_1 != null && 
            $this->predikat_prestasi_non_1 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'non akademik 1' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_non_1,
                        'nama'=>$this->nama_prestasi_non_1,
                        'tahun'=>$this->tanggal_prestasi_non_1,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "non akademik 1" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_non_1,
                        'jenis_prestasi'=>'non akademik 1',
                        'nama'=>$this->nama_prestasi_non_1,
                        'tahun'=>$this->tanggal_prestasi_non_1,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for non akademik prestasi 2
    private function pushNonAcademic_2(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_non_2 != null && $this->tanggal_prestasi_non_2 != null && 
            $this->predikat_prestasi_non_2 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'non akademik 2' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_non_2,
                        'nama'=>$this->nama_prestasi_non_2,
                        'tahun'=>$this->tanggal_prestasi_non_2,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "non akademik 2" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_non_2,
                        'jenis_prestasi'=>'non akademik 2',
                        'nama'=>$this->nama_prestasi_non_2,
                        'tahun'=>$this->tanggal_prestasi_non_2,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for non akademik prestasi 3
    private function pushNonAcademic_3(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_non_3 != null && $this->tanggal_prestasi_non_3 != null && 
            $this->predikat_prestasi_non_3 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'non akademik 3' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_non_3,
                        'nama'=>$this->nama_prestasi_non_3,
                        'tahun'=>$this->tanggal_prestasi_non_3,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "non akademik 3" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_non_3,
                        'jenis_prestasi'=>'non akademik 3',
                        'nama'=>$this->nama_prestasi_non_3,
                        'tahun'=>$this->tanggal_prestasi_non_3,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
        }
    }
    //same as above, but for non akademik prestasi 4
    private function pushNonAcademic_4(){
        //get pendafatar_id from table t_pendaftar
        if($this->nama_prestasi_non_4 != null && $this->tanggal_prestasi_non_4 != null && 
            $this->predikat_prestasi_non_4 != null){
                $sql  = "Select jenis_prestasi from t_prestasi where jenis_prestasi = 'non akademik 4' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                if($result){ //EXIST, just update the data
                    Yii::$app->db->createCommand()->update('t_prestasi', [
                        'tingkat_id'=>$this->predikat_prestasi_non_4,
                        'nama'=>$this->nama_prestasi_non_4,
                        'tahun'=>$this->tanggal_prestasi_non_4,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'updated_by'=>Yii::$app->user->identity->username,
                    ], 'jenis_prestasi = "non akademik 4" AND pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())->execute();
                }else{ //otherwise, insert new data
                    Yii::$app->db->createCommand()->insert('t_prestasi', [
                        'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                        'tingkat_id'=>$this->predikat_prestasi_non_4,
                        'jenis_prestasi'=>'non akademik 4',
                        'nama'=>$this->nama_prestasi_non_4,
                        'tahun'=>$this->tanggal_prestasi_non_4,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'created_by'=>Yii::$app->user->identity->username,
                        'updated_by'=>Yii::$app->user->identity->username,
                    ])->execute();    
                }
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
                self::pushAcademic_1(); //push data prestasi akademik to database
                self::pushAcademic_2();
                self::pushAcademic_3();
                self::pushAcademic_4();
                self::pushNonAcademic_1(); //push data prestasi non akademik to database
                self::pushNonAcademic_2();
                self::pushNonAcademic_3();
                self::pushNonAcademic_4();
                return true;
            }catch(Exception $e) {
                Yii::$app->session->setFlash('error', "Data Prestasi Gagal Disimpan");
            }
        }
        return false;
    }
    //function to check if the data prestasi is filled
    public static function isFillDataPrestasi(){
        //sql command to check whether the user_id is already exist in the table t_pendaftar
        $sql = "SELECT nama FROM t_prestasi WHERE pendaftar_id = (SELECT pendaftar_id FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId().")";
        //execute the sql command
        $result = Yii::$app->db->createCommand($sql)->queryScalar();
        //if the user_id is already exist, return true
        if($result)
            return true;
        //if the user_id is not yet exist, return false
        return false;
    }
    //fetch data prestasi from database
    public static function fetchDataPrestasi(){
        //sql count total pendaftar_id from table t_organisasi
        $sql = "SELECT COUNT(pendaftar_id) FROM t_prestasi WHERE jenis_prestasi='Akademik' AND pendaftar_id = ".
            StudentDataDiriForm::getCurrentPendaftarId() ;
        //execute the sql command
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $maks = 4; //maximum number of prestasi, ensure while fetch the data index is not out of bound
        $data = array_fill(0, $maks, array_fill(0, 2, null));
        if($count) {
            $sql_ekstra  = "SELECT nama, tahun from t_prestasi where jenis_prestasi='Akademik' AND pendaftar_id =".
                StudentDataDiriForm::getCurrentPendaftarId();
            $ekstraku_data  = Yii::$app->db->createCommand($sql_ekstra)->queryAll();
            foreach ($ekstraku_data as $index => $row){
                $data[$index]  = [$row['nama'], $row['tahun']];
            }
        }
        return $data;
    }
    //fetch data prestasi non-akademik from database
    public static function fetchDataPrestasiNon(){
        //sql count total pendaftar_id from table t_organisasi
        $sql = "SELECT COUNT(pendaftar_id) FROM t_prestasi WHERE jenis_prestasi='Non Akademik' AND pendaftar_id = ".
            StudentDataDiriForm::getCurrentPendaftarId() ;
        //execute the sql command
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $maks = 4; //maximum number of prestasi, ensure while fetch the data index is not out of bound
        $data = array_fill(0, $maks, array_fill(0, 2, null));
        if($count) {
            $sql_ekstra  = "SELECT nama, tahun from t_prestasi where jenis_prestasi='Non Akademik' AND pendaftar_id =".
                StudentDataDiriForm::getCurrentPendaftarId();
            $ekstraku_data  = Yii::$app->db->createCommand($sql_ekstra)->queryAll();
            foreach ($ekstraku_data as $index => $row){
                $data[$index]  = [$row['nama'], $row['tahun']];
            }
        }
        return $data;
    }
    //fetch data prestasi akademik from database
    public static function findDataPrestasi(){
        $pendaftarId = StudentDataDiriForm::getCurrentPendaftarId();
    
        // Fetch data from t_nilai_rapor
        $sql = "SELECT * FROM t_prestasi WHERE pendaftar_id = ".$pendaftarId;
        $dataPrestasi = Yii::$app->db->createCommand($sql)->queryAll();
        //load it to array and show it to view
        if($dataPrestasi!==false) {
            $model  = new self();
            $attributNames = $model->attributes();
            foreach ($dataPrestasi as $row)
            {
                $subject ;
            }
        }
    }
    //map prestasi data from database to form data
    private static $prestasitMap = [
        'nama' => 'nama_prestasi_1',
        'tahun' => 'tanggal_prestasi_1',
        'tingkat_id' => 'predikat_prestasi_1',
        //same as above, but for prestasi_2
        'nama' => 'nama_prestasi_2',
        'tahun' => 'tanggal_prestasi_2',
        'tingkat_id' => 'predikat_prestasi_2',
        //same as above, but for prestasi_3
        'nama' => 'nama_prestasi_3',
        'tahun' => 'tanggal_prestasi_3',
        'tingkat_id' => 'predikat_prestasi_3',
        //same as above, but for prestasi_4
        'nama' => 'nama_prestasi_4',
        'tahun' => 'tanggal_prestasi_4',
        'tingkat_id' => 'predikat_prestasi_4',
    ];
}
?>