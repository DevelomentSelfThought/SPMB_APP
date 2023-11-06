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
    public $nilai_kemampuan_pengetahuan_umum;
    public $nilai_kemampuan_bacaan;
    public $jumlah_pelajaran;
    public $nilai_semester;
    public $jumlah_pelajaran_un;
    public $nilai_un;
    public $file;
    public $file_sertifikat;
    public function rules()
    {
        return [
            [['sekolah', 'jurusan_sekolah', 'akreditasi_sekolah', 'no_utbk', 'tanggal_ujian_utbk', 
            'nilai_kemampuan_umum', 'nilai_kemampuan_kuantitatif', 'nilai_kemampuan_pengetahuan_umum', 
            'nilai_kemampuan_bacaan', 'jumlah_pelajaran', 'nilai_semester'], 'required'],
            [['sekolah', 'jurusan_sekolah', 'akreditasi_sekolah', 'no_utbk', 'tanggal_ujian_utbk', 
            'nilai_kemampuan_umum', 'nilai_kemampuan_kuantitatif', 'nilai_kemampuan_pengetahuan_umum', 
            'nilai_kemampuan_bacaan', 'jumlah_pelajaran', 'nilai_semester', 'jumlah_pelajaran_un', 'nilai_un'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['file'],'required'],
            [['jumlah_pelajaran_un'], 'integer', 'min' => 2, 'max' => 100],
            //nilai un and nilai utbk can be integer and float
            [['nilai_un', 'nilai_kemampuan_umum', 'nilai_semester', 'nilai_kemampuan_kuantitatif', 'nilai_kemampuan_pengetahuan_umum', 
            'nilai_kemampuan_bacaan'], 'number'],
            [['no_utbk'], 'string', 'min'=>6,'max' => 20],
            [['sekolah'], 'string', 'min'=>5,'max' => 100],
            [['jurusan_sekolah'], 'string', 'max' => 50],
            //limit tanggal ujian utbk
            [['tanggal_ujian_utbk'], 'date', 'format' => 'php:Y-m-d', 'min' => '2021-12-01'],
            //[['tanggal_ujian_utbk'], 'date', 'format' => 'php:Y-m-d'],
            [['nilai_kemampuan_umum', 'nilai_kemampuan_kuantitatif', 'nilai_kemampuan_pengetahuan_umum', 'nilai_kemampuan_bacaan','nilai_semester'], 
            'number', 'min' => 10, 'max' => 1000],
            [['jumlah_pelajaran'], 'integer', 'min' => 2, 'max' => 100],
        ];
    }
    //list of availabe program study, generate it without database
    //possible value for program study, may be added later
    public static function getProgram(){
        $sql = "SELECT * FROM t_r_jurusan_sekolah";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = \yii\helpers\ArrayHelper::map($data, 'jurusan_sekolah_id', 'nama');
        return $data;
    }
    //generate school acreditation
    public static array $acreditation = [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'Belum Akreditasi' => 'Belum Akreditasi',
        'Belum Terakreditasi' => 'Belum Terakreditasi',
        'TT' => 'TT'
    ];
    //since we use the behavior of actionAutocomplete(), we must find the id_dapodik from the school name from the 
    //given parameter $sekolah that inputed by user
    public function getSekolahDapodikId($sekolah){
        $sql = "SELECT id_dapodik FROM t_r_sekolah_dapodik WHERE sekolah = '$sekolah'";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        return $data['id_dapodik'];
    }
    //auxiliary function to insert data sekolah to table t_pendaftar
    public function tempDataSekolah(){
        Yii::$app->db->createCommand()->update('t_pendaftar',[
            'sekolah_dapodik_id'=>self::getSekolahDapodikId($this->sekolah),
            'jurusan_sekolah_id'=>$this->jurusan_sekolah,
            'akreditasi_sekolah'=>$this->akreditasi_sekolah,
        ],['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
    }
    //auxiliary function to update data nilai akademik to table t_nilai_rapor, condition getCurrenPendafarId()
    public function tempDataNilaiAkademik(){
        Yii::$app->db->createCommand()->update('t_nilai_rapor',[
            'smt'=>$this->jumlah_pelajaran,
            'nilai'=>$this->nilai_semester,
        ],['pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()])->execute();
    }
    //auxilary function to insert pendaftar_id to table t_nilai_rapor, worst case: first data is t_nili_rapor
    public function tempPendaftarIdNilaiAkademik(){ //good for research, new implementation
        Yii::$app->db->createCommand()->insert('t_nilai_rapor',
        [
            'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
            'mata_pelajaran_id'=>1, //may be changed later, since the structure of mata_pel_id is not clear
            'smt'=>$this->jumlah_pelajaran,
            'nilai'=>$this->nilai_semester,
        ])->execute();
    }
    //auxiliary function to update data nilai utbk to table t_utbk, condition getCurrenPendafarId()
    public function tempUpdateDataUtbk(){
        Yii::$app->db->createCommand()->update('t_utbk',[
            'no_peserta'=>self::removeNonInteger_noPeserta($this->no_utbk),
            'tanggal_ujian'=>$this->tanggal_ujian_utbk,
            'file_sertifikat'=>$this->file_sertifikat,
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
            'created_by'=>Yii::$app->user->identity->username,
        ],['pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()])->execute();
    }
    //auxilary function to get t_utbk_id from table t_utbk, condition getCurrenPendafarId()
    public function tempGetUtbkId(){
        $sql = "SELECT utbk_id FROM t_utbk WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        return $data['utbk_id'];
    }
    //auxilary function to insert  nilai kemampuan to t_nilai_utbk, worst case: first data is t_utbk
    public function tempPendaftarNilaiUtbk(){
        Yii::$app->db->createCommand()->insert('t_nilai_utbk',
        [
            'utbk_id'=>self::tempGetUtbkId(),
            'bidang_utbk_id'=>18,
            'nilai'=>$this->nilai_kemampuan_umum, 
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_by'=>Yii::$app->user->identity->username,
            'updated_by'=>Yii::$app->user->identity->username,

        ])->execute();
        //do the same thing like above, but with different bidang_utbk_id
        Yii::$app->db->createCommand()->insert('t_nilai_utbk',
        [
            'utbk_id'=>self::tempGetUtbkId(),
            'bidang_utbk_id'=>19,
            'nilai'=>$this->nilai_kemampuan_kuantitatif, 
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_by'=>Yii::$app->user->identity->username,
            'updated_by'=>Yii::$app->user->identity->username,

        ])->execute();
        //do the same thing like above, but with different bidang_utbk_id
        Yii::$app->db->createCommand()->insert('t_nilai_utbk',
        [
            'utbk_id'=>self::tempGetUtbkId(),
            'bidang_utbk_id'=>20,
            'nilai'=>$this->nilai_kemampuan_pengetahuan_umum, 
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_by'=>Yii::$app->user->identity->username,
            'updated_by'=>Yii::$app->user->identity->username,

        ])->execute();
        //do the same thing like above, but with different bidang_utbk_id
        Yii::$app->db->createCommand()->insert('t_nilai_utbk',
        [
            'utbk_id'=>self::tempGetUtbkId(),
            'bidang_utbk_id'=>21,
            'nilai'=>$this->nilai_kemampuan_bacaan, 
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_by'=>Yii::$app->user->identity->username,
            'updated_by'=>Yii::$app->user->identity->username,

        ])->execute();
    }
    //auxilary function to update nilai kemampuan to t_nilai_utbk, worst case: first data is t_utbk
    //the following condition must meet, utbk_id and bidang_utbk_id
    public function tempUpdatePendaftarNilaiUtbk(){
        //update nilai kemampuan umum
        Yii::$app->db->createCommand()->update('t_nilai_utbk',[
            'nilai'=>$this->nilai_kemampuan_umum,
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
        ],['utbk_id'=>self::tempGetUtbkId(), 'bidang_utbk_id'=>18])->execute();
        //update nilai kemampuan kuantitatif
        Yii::$app->db->createCommand()->update('t_nilai_utbk',[
            'nilai'=>$this->nilai_kemampuan_kuantitatif,
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
        ],['utbk_id'=>self::tempGetUtbkId(), 'bidang_utbk_id'=>19])->execute();
        //update nilai kemampuan pengetahuan umum
        Yii::$app->db->createCommand()->update('t_nilai_utbk',[
            'nilai'=>$this->nilai_kemampuan_pengetahuan_umum,
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
        ],['utbk_id'=>self::tempGetUtbkId(), 'bidang_utbk_id'=>20])->execute();
        //update nilai kemampuan bacaan
        Yii::$app->db->createCommand()->update('t_nilai_utbk',[
            'nilai'=>$this->nilai_kemampuan_bacaan,
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
        ],['utbk_id'=>self::tempGetUtbkId(), 'bidang_utbk_id'=>21])->execute();
    }
    //auxilary function to insert pendaftar_id to table t_utbk, worst case: first data is t_akademik
    public function tempPendaftarSekolahUtbk(){ //good for research, new implementation
        Yii::$app->db->createCommand()->insert('t_utbk',
        [
            'pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
            'no_peserta'=>self::removeNonInteger_noPeserta($this->no_utbk),
            'tanggal_ujian'=>$this->tanggal_ujian_utbk,
            'file_sertifikat'=>$this->file_sertifikat,
            //at specific time not only date, so we use date('Y-m-d H:i:s') instead of date('Y-m-d')
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>Yii::$app->user->identity->username,
            'created_by'=>Yii::$app->user->identity->username,
        ])->execute();
    }
    //check pendaftar_id exists on table t_utbk
    public static function pendaftarIdExists(){
        $sql = "SELECT pendaftar_id FROM t_utbk WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        if($data){
            return true;
        }
        return false;
    }
    //insert data akademik to some table! bad practice, make sure your db is clean!!!!!
    public function insertStudentAkademik(){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar',
                        ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //ok, userIdExists, push pendaftar_id to t_utbk
                self::tempDataSekolah(); //insert data sekolah to table t_pendaftar
                if(!self::pendaftarIdExists()) //not exists, insert pendaftar_id to t_utbk
                    self::tempPendaftarSekolahUtbk(); //insert pendaftar_id to t_utbk, worst case, user interact to data akademik first
                self::tempUpdateDataUtbk(); //update data utbk 
                //update data to table t_pendaftar, sekolah_dapodik_id, jurusan_sekolah_id, akreditasi_sekolah
                //set flash message 
                //find pendaftar_id from table t_nila_rapor, if not exists, insert pendaftar_id to t_nilai_rapor
                //using sql query, since we don't have a function 
                //handling for t_nilai_rapor
                $sql = "SELECT pendaftar_id FROM t_nilai_rapor WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
                $data = Yii::$app->db->createCommand($sql)->queryOne();
                if(!$data) //not exists, insert pendaftar_id to t_nilai_rapor
                    self::tempPendaftarIdNilaiAkademik(); //insert pendaftar_id to t_nilai_rapor, worst case, user interact to data akademik first
                else //ok current pendaftar_id exists on t_nilai_rapor, update data nilai akademik
                    self::tempDataNilaiAkademik(); //update data nilai akademik 
                //worst case test for t_nilai_utbk
                $sql = "SELECT utbk_id FROM t_nilai_utbk WHERE utbk_id = ".self::tempGetUtbkId();
                $data = Yii::$app->db->createCommand($sql)->queryOne();
                if(!$data) //not exists, insert pendaftar_id to t_nilai_rapor
                    self::tempPendaftarNilaiUtbk(); //insert pendaftar_id to t_nilai_rapor, worst case, user interact to data akademik first
                else //ok current pendaftar_id exists on t_nilai_rapor, update data nilai akademik
                    self::tempUpdatePendaftarNilaiUtbk(); //update data nilai akademik                
                Yii::$app->session->setFlash('success', "Data Akademik berhasil disimpan");
                return true;
            } catch(Exception $e){
                //flash error message
                Yii::$app->session->setFlash('error', "Something went wrong, please contact the administrator or try again later");
                echo $e->getMessage();
            }
        return false;
    }
    //remove non integer in a variable no_peserta, making a flexible approach for user to input no_peserta
    public function removeNonInteger_noPeserta($no_utbk){
        $no_utbk = preg_replace("/[^0-9]/", "", $no_utbk);
        return $no_utbk;
    }
}
?>