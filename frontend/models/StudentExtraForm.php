<?php
//model for student extra activity form, an idea is merge all form into one model
//since this is very short, we can put it in one file, for example : Student
namespace app\models;

use Codeception\PHPUnit\ResultPrinter\HTML;
use Exception;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html as ReportHtml;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentExtraForm extends Model {
    //public public data member, possibly adding latter
    //member for organization
    public $nama_organisasi_1; 
    public $nama_organisasi_2;
    public $nama_organisasi_3;
    public $nama_organisasi_4;

    public $jabatan_organisasi_1;
    public $jabatan_organisasi_2;
    public $jabatan_organisasi_3;
    public $jabatan_organisasi_4;

    public $tanggal_organisasi_1;
    public $tanggal_organisasi_2;
    public $tanggal_organisasi_3;
    public $tanggal_organisasi_4;

    public $tanggal_organisasi_1_end;
    public $tanggal_organisasi_2_end;
    public $tanggal_organisasi_3_end;
    public $tanggal_organisasi_4_end;
    //member for activity, without end mean the start of the activity
    public $nama_kegiatan_1; 
    public $nama_kegiatan_2;
    public $nama_kegiatan_3; 
    public $nama_kegiatan_4; 

    public $predikat_kegiatan_1;
    public $predikat_kegiatan_2;
    public $predikat_kegiatan_3;
    public $predikat_kegiatan_4;

    public $tanggal_kegiatan_1;
    public $tanggal_kegiatan_2;
    public $tanggal_kegiatan_3;
    public $tanggal_kegiatan_4;

    public $tanggal_kegiatan_1_end;
    public $tanggal_kegiatan_2_end;
    public $tanggal_kegiatan_3_end;
    public $tanggal_kegiatan_4_end;

    //array for store jabaatan values
    public static $jabatan = [
        1=>'Ketua',
        2=>'Wakil Ketua',
        3=>'Sekretaris',
        4=>'Bendahara',
        5=>'Anggota',
        6=>'Lainnya'
    ];
    //array for store the predikat values, data source is from table t_predikat
    public static $predikat = [
        '1'=>'Cukup',
        '2'=>'Baik',
        '3'=>'Sangat Baik',
        '4'=>'Lulus',
        '5'=>'Tidak Lulus',
    ];

    public function rules(): array
    {
        //return rules for validation
        return [
            [['tanggal_organisasi_1','tanggal_organisasi_2','tanggal_organisasi_3','tanggal_organisasi_4',
            'tanggal_organisasi_1_end','tanggal_organisasi_2_end','tanggal_organisasi_3_end','tanggal_organisasi_4_end',
            'tanggal_kegiatan_1','tanggal_kegiatan_2','tanggal_kegiatan_3','tanggal_kegiatan_4',
            'tanggal_kegiatan_1_end','tanggal_kegiatan_2_end','tanggal_kegiatan_3_end','tanggal_kegiatan_4_end'] ,
            'date', 'format' => 'php:Y-m-d'],
            //rule for nama_organisasi, we need to make sure the value is no more than 25 character
            [['nama_organisasi_1','nama_organisasi_2','nama_organisasi_3','nama_organisasi_4',
            'nama_kegiatan_1','nama_kegiatan_2','nama_kegiatan_3','nama_kegiatan_4'], 'string', 'max' => 25],
            //rules for predikat, we need to make sure the value is in the array
            [['predikat_kegiatan_1','predikat_kegiatan_2','predikat_kegiatan_3','predikat_kegiatan_4'], 'in', 
            'range' => array_keys(self::$predikat)],
            //rules for jabatan, we need to make sure the value is in the array
            [['jabatan_organisasi_1','jabatan_organisasi_2','jabatan_organisasi_3','jabatan_organisasi_4'], 
            'in','range' => array_keys(self::$jabatan)],
        ];
    }
    //validate data, this is experimental version, since there are some question about the structure of the table
    //but this mechanism is possible to be used, and the table structure can be changed later
    //for production, we need to make sure the data is valid, and the data is not null and we need pass
    //an argument to the function, the argument is the id of the student
    public function insertStudentExtra(): bool
    {
        if($this->validate()){
            //before doing insertion or update, we need an exception handling
            try{ //make sure exception is catched
                //check the user_id is already exist in table t_pendaftar
                self::pushAchievement_1();
                self::pushAchievement_2();
                self::pushAchievement_3();
                self::pushachievement_4();
                //make the same thing for table t_organisasi as well as table t_extrakurikuler
                self::pushOrganisasi_1();
                self::pushOrganisasi_2();
                self::pushOrganisasi_3();
                self::pushOrganisasi_4();
                //if the data successfully inserted, show bootstrap alert
                //Yii::$app->session->setFlash('success', 'Data ekstrakurikuler dan organisasi berhasil disimpan');
                return true;
            }catch(Exception $e){
                //for debug purpose, show the error message, comment the line below for production
                //Yii::$app->session->setFlash('error', $e->getMessage());
                //show an error message if the exception is catched using bootstrap aler but encoded the message first
                Yii::$app->session->setFlash('error', "Something went wrong, please contact the administrator or try again later");
                //echo $e->getMessage();
            }   
        }
        return false;
    }
    //function to check whether the data is already filled, need modification since the table is indepedent
    public static function isFillDataExtra(){
        //sql command to check whether the user_id is already exist in the table t_pendaftar
        $sql_extr = "SELECT nama FROM t_organisasi WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
        $sql_orgn  = "SELECT nama FROM t_ekstrakurikuler WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
        //execute the sql command
        $result_extr = Yii::$app->db->createCommand($sql_extr)->queryScalar();
        $result_orgn = Yii::$app->db->createCommand($sql_orgn)->queryScalar();
        if($result_extr or $result_orgn ){ //since the data is from two table
            return true;
        }
        return false;
    }
    //fetch data extrakurikuler from database, need modification since the table is indepedent
    public static function fetchEkstrakurikuler(){
        //sql count total pendaftar_id from table t_ekstrakurikuler
        $sql = "SELECT COUNT(pendaftar_id) FROM t_ekstrakurikuler WHERE pendaftar_id = ".
            StudentDataDiriForm::getCurrentPendaftarId();
        //execute the sql command
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $maks = 4; //maximum number of ekstrakurikuler, ensure while fetch the data index is not out of bound
        //define matrix size to store data ekstrakurikuler from database, size is $count x 3
        $data = array_fill(0, $maks, array_fill(0, 3, null));
        //sql command to fetch data ekstrakurikuler from database
        if($count) {
            //fill matrix with data ekstrakurikuler who already store in table t_ekstrakurikuler
            //the field will ready and store to matrix is nama,mulai, berakhir
            $sql_ekstra  = "SELECT nama, mulai, berakhir from t_ekstrakurikuler where pendaftar_id =".
                StudentDataDiriForm::getCurrentPendaftarId();
            $ekstraku_data  = Yii::$app->db->createCommand($sql_ekstra)->queryAll();
            foreach ($ekstraku_data as $index => $row){
                $data[$index]  = [$row['nama'], $row['mulai'],$row['berakhir']];
            }
        }
        return $data;
    }
        //fetch data extrakurikuler from database, need modification since the table is indepedent
    public static function fetchOrganisai(){
        //sql count total pendaftar_id from table t_ekstrakurikuler
        $sql = "SELECT COUNT(pendaftar_id) FROM t_organisasi WHERE pendaftar_id = ".
            StudentDataDiriForm::getCurrentPendaftarId();
        //execute the sql command
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $maks = 4; //maximum number of ekstrakurikuler, ensure while fetch the data index is not out of bound
        //define matrix size to store data ekstrakurikuler from database, size is $count x 3
        $data = array_fill(0, $maks, array_fill(0, 3, null));
        //sql command to fetch data ekstrakurikuler from database
        if($count) {
            //fill matrix with data ekstrakurikuler who already store in table t_ekstrakurikuler
            //the field will ready and store to matrix is nama,mulai, berakhir
            $sql_ekstra  = "SELECT nama, mulai, berakhir from t_organisasi where pendaftar_id =".
                StudentDataDiriForm::getCurrentPendaftarId();
            $ekstraku_data  = Yii::$app->db->createCommand($sql_ekstra)->queryAll();
            foreach ($ekstraku_data as $index => $row){
                $data[$index]  = [$row['nama'], $row['mulai'],$row['berakhir']];
            }
        }
        return $data;
    }
    //push data to t_ekstrakuikuler, achievement 1
    private function pushAchievement_1() {
        if(strlen($this->nama_kegiatan_1) > 2) {
            if($this->tanggal_kegiatan_1 && $this->tanggal_kegiatan_1_end && $this->predikat_kegiatan_1) {
                //find the identity 
                $sql  = "Select keterangan from t_ekstrakurikuler where keterangan = 'kegiatan 1' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_ekstrakurikuler', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'kegiatan 1',
                            'nama' => $this->nama_kegiatan_1,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_1,
                            'mulai' => $this->tanggal_kegiatan_1,
                            'berakhir' => $this->tanggal_kegiatan_1_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_ekstrakurikuler', [
                            'nama' => $this->nama_kegiatan_1,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_1,
                            'mulai' => $this->tanggal_kegiatan_1,
                            'berakhir' => $this->tanggal_kegiatan_1_end,
                        ], 'keterangan = "kegiatan 1" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_ekstrakuikuler, achievement 2
    private function pushAchievement_2(){
        if(strlen($this->nama_kegiatan_2) > 2) {
            if($this->tanggal_kegiatan_2 && $this->tanggal_kegiatan_2_end && $this->predikat_kegiatan_2) {
                //find the identity 
                $sql  = "Select keterangan from t_ekstrakurikuler where keterangan = 'kegiatan 2' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_ekstrakurikuler', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'kegiatan 2',
                            'nama' => $this->nama_kegiatan_2,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_2,
                            'mulai' => $this->tanggal_kegiatan_2,
                            'berakhir' => $this->tanggal_kegiatan_2_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_ekstrakurikuler', [
                            'nama' => $this->nama_kegiatan_2,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_2,
                            'mulai' => $this->tanggal_kegiatan_2,
                            'berakhir' => $this->tanggal_kegiatan_2_end,
                        ], 'keterangan = "kegiatan 2" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_ekstrakuikuler, achievement 3
    private function pushAchievement_3(){
        if(strlen($this->nama_kegiatan_3) > 2) {
            if($this->tanggal_kegiatan_3 && $this->tanggal_kegiatan_3_end && $this->predikat_kegiatan_3) {
                //find the identity 
                $sql  = "Select keterangan from t_ekstrakurikuler where keterangan = 'kegiatan 3' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_ekstrakurikuler', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'kegiatan 3',
                            'nama' => $this->nama_kegiatan_3,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_3,
                            'mulai' => $this->tanggal_kegiatan_3,
                            'berakhir' => $this->tanggal_kegiatan_3_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_ekstrakurikuler', [
                            'nama' => $this->nama_kegiatan_3,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_3,
                            'mulai' => $this->tanggal_kegiatan_3,
                            'berakhir' => $this->tanggal_kegiatan_3_end,
                        ], 'keterangan = "kegiatan 3" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_ekstrakuikuler, achievement 4
    private function pushAchievement_4(){
        if(strlen($this->nama_kegiatan_4) > 2) {
            if($this->tanggal_kegiatan_4 && $this->tanggal_kegiatan_4_end && $this->predikat_kegiatan_4) {
                //find the identity 
                $sql  = "Select keterangan from t_ekstrakurikuler where keterangan = 'kegiatan 4' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_ekstrakurikuler', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'kegiatan 4',
                            'nama' => $this->nama_kegiatan_4,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_4,
                            'mulai' => $this->tanggal_kegiatan_4,
                            'berakhir' => $this->tanggal_kegiatan_4_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_ekstrakurikuler', [
                            'nama' => $this->nama_kegiatan_4,
                            'predikat_kelulusan_id' => $this->predikat_kegiatan_4,
                            'mulai' => $this->tanggal_kegiatan_4,
                            'berakhir' => $this->tanggal_kegiatan_4_end,
                        ], 'keterangan = "kegiatan 4" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_organisasi, organisasi 1
    private function pushOrganisasi_1() {
        if(strlen($this->nama_organisasi_1) > 2) {
            if($this->tanggal_organisasi_1 && $this->tanggal_organisasi_1_end && $this->jabatan_organisasi_1) {
                //find the identity 
                $sql  = "Select keterangan from t_organisasi where keterangan = 'organisasi 1' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_organisasi', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'organisasi 1',
                            'nama' => $this->nama_organisasi_1,
                            'jabatan' => $this->jabatan_organisasi_1,
                            'mulai' => $this->tanggal_organisasi_1,
                            'berakhir' => $this->tanggal_organisasi_1_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_organisasi', [
                            'nama' => $this->nama_organisasi_1,
                            'jabatan' => $this->jabatan_organisasi_1,
                            'mulai' => $this->tanggal_organisasi_1,
                            'berakhir' => $this->tanggal_organisasi_1_end,
                        ], 'keterangan = "organisasi 1" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_organisasi, organisasi 2
    private function pushOrganisasi_2(){
        if(strlen($this->nama_organisasi_2) > 2) {
            if($this->tanggal_organisasi_2 && $this->tanggal_organisasi_2_end && $this->jabatan_organisasi_2) {
                //find the identity 
                $sql  = "Select keterangan from t_organisasi where keterangan = 'organisasi 2' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_organisasi', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'organisasi 2',
                            'nama' => $this->nama_organisasi_2,
                            'jabatan' => $this->jabatan_organisasi_2,
                            'mulai' => $this->tanggal_organisasi_2,
                            'berakhir' => $this->tanggal_organisasi_2_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_organisasi', [
                            'nama' => $this->nama_organisasi_2,
                            'jabatan' => $this->jabatan_organisasi_2,
                            'mulai' => $this->tanggal_organisasi_2,
                            'berakhir' => $this->tanggal_organisasi_2_end,
                        ], 'keterangan = "organisasi 2" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_organisasi, organisasi 3
    private function pushOrganisasi_3(){
        if(strlen($this->nama_organisasi_3) > 2) {
            if($this->tanggal_organisasi_3 && $this->tanggal_organisasi_3_end && $this->jabatan_organisasi_3) {
                //find the identity 
                $sql  = "Select keterangan from t_organisasi where keterangan = 'organisasi 3' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_organisasi', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'organisasi 3',
                            'nama' => $this->nama_organisasi_3,
                            'jabatan' => $this->jabatan_organisasi_3,
                            'mulai' => $this->tanggal_organisasi_3,
                            'berakhir' => $this->tanggal_organisasi_3_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_organisasi', [
                            'nama' => $this->nama_organisasi_3,
                            'jabatan' => $this->jabatan_organisasi_3,
                            'mulai' => $this->tanggal_organisasi_3,
                            'berakhir' => $this->tanggal_organisasi_3_end,
                        ], 'keterangan = "organisasi 3" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //push data to t_organisasi, organisasi 4
    private function pushOrganisasi_4(){
        if(strlen($this->nama_organisasi_4) > 2) {
            if($this->tanggal_organisasi_4 && $this->tanggal_organisasi_4_end && $this->jabatan_organisasi_4) {
                //find the identity 
                $sql  = "Select keterangan from t_organisasi where keterangan = 'organisasi 4' and pendaftar_id = ".
                    StudentDataDiriForm::getCurrentPendaftarId();
                $result = Yii::$app->db->createCommand($sql)->queryScalar();
                //if the identity is not exist, insert the data
                if(!$result){
                    Yii::$app->db->createCommand()
                        ->insert('t_organisasi', [
                            'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                            'keterangan' => 'organisasi 4',
                            'nama' => $this->nama_organisasi_4,
                            'jabatan' => $this->jabatan_organisasi_4,
                            'mulai' => $this->tanggal_organisasi_4,
                            'berakhir' => $this->tanggal_organisasi_4_end,
                        ])
                        ->execute();
                }
                else{
                    //if the identity is exist, update the data
                    Yii::$app->db->createCommand()
                        ->update('t_organisasi', [
                            'nama' => $this->nama_organisasi_4,
                            'jabatan' => $this->jabatan_organisasi_4,
                            'mulai' => $this->tanggal_organisasi_4,
                            'berakhir' => $this->tanggal_organisasi_4_end,
                        ], 'keterangan = "organisasi 4" and pendaftar_id = '.StudentDataDiriForm::getCurrentPendaftarId())
                        ->execute();
                }
            }
        }
    }
    //populate data from database to form
    public static function findDataExtra(){
        $pendaftarId = StudentDataDiriForm::getCurrentPendaftarId();
        $model  = new self();
        // Loop over the 4 extra activity types
        for ($i = 1; $i <= 4; $i++) {
            // Fetch data from t_ekstrakurikuler
            $sql = "SELECT * FROM t_ekstrakurikuler WHERE pendaftar_id = :pendaftarId AND keterangan = 'kegiatan $i'";
            $dataExtra = Yii::$app->db->createCommand($sql, [':pendaftarId' => $pendaftarId])->queryOne();
    
            // If data was fetched successfully, populate the model attributes
            if ($dataExtra !== false) {
                $model->{"nama_kegiatan_$i"} = $dataExtra['nama'];
                $model->{"predikat_kegiatan_$i"} = $dataExtra['predikat_kelulusan_id'];
                $model->{"tanggal_kegiatan_$i"} = $dataExtra['mulai'];
                $model->{"tanggal_kegiatan_{$i}_end"} = $dataExtra['berakhir'];
            }
        }
        // Loop over the 4 organization types
        for ($i = 1; $i <= 4; $i++) {
            // Fetch data from t_organisasi
            $sql = "SELECT * FROM t_organisasi WHERE pendaftar_id = :pendaftarId AND keterangan = 'organisasi $i'";
            $dataExtra = Yii::$app->db->createCommand($sql, [':pendaftarId' => $pendaftarId])->queryOne();
    
            // If data was fetched successfully, populate the model attributes
            if ($dataExtra !== false) {
                $model->{"nama_organisasi_$i"} = $dataExtra['nama'];
                $model->{"jabatan_organisasi_$i"} = $dataExtra['jabatan'];
                $model->{"tanggal_organisasi_$i"} = $dataExtra['mulai'];
                $model->{"tanggal_organisasi_{$i}_end"} = $dataExtra['berakhir'];
            }
        }
        return $model;
    }
    
}
?>
