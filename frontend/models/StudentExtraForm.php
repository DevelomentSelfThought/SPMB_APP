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
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar',
                        ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                if(strlen($this->nama_kegiatan_1) > 2){ //wisely check if the value is null, need not to push the data
                    if($this->tanggal_kegiatan_1 && $this->tanggal_kegiatan_1_end && $this->predikat_kegiatan_1){
                        //if the value is not null, insert the data to table t_extrakurikuler
                        Yii::$app->db->createCommand()
                            ->insert('t_ekstrakurikuler', [
                                //get pendaftar_id from function getCurrentPendaftarId()
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_kegiatan_1,
                                'predikat_kelulusan_id' => $this->predikat_kegiatan_1,
                                'mulai' => $this->tanggal_kegiatan_1,
                                'berakhir' => $this->tanggal_kegiatan_1_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_kegiatan_2) > 2){
                    if($this->tanggal_kegiatan_2 && $this->tanggal_kegiatan_2_end && $this->predikat_kegiatan_2){
                        Yii::$app->db->createCommand()
                            ->insert('t_ekstrakurikuler', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_kegiatan_2,
                                'predikat_kelulusan_id' => $this->predikat_kegiatan_2,
                                'mulai' => $this->tanggal_kegiatan_2,
                                'berakhir' => $this->tanggal_kegiatan_2_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_kegiatan_3) > 2){
                    if($this->tanggal_kegiatan_3 && $this->tanggal_kegiatan_3_end && $this->predikat_kegiatan_3){
                        Yii::$app->db->createCommand()
                            ->insert('t_ekstrakurikuler', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_kegiatan_3,
                                'predikat_kelulusan_id' => $this->predikat_kegiatan_3,
                                'mulai' => $this->tanggal_kegiatan_3,
                                'berakhir' => $this->tanggal_kegiatan_3_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_kegiatan_4) > 2){
                    if($this->tanggal_kegiatan_4 && $this->tanggal_kegiatan_4_end && $this->predikat_kegiatan_4){
                        Yii::$app->db->createCommand()
                            ->insert('t_ekstrakurikuler', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_kegiatan_4,
                                'predikat_kelulusan_id' => $this->predikat_kegiatan_4,
                                'mulai' => $this->tanggal_kegiatan_4,
                                'berakhir' => $this->tanggal_kegiatan_4_end,
                            ])
                            ->execute();
                    }
                }
                //make the same thing for table t_organisasi as well as table t_extrakurikuler
                if(strlen($this->nama_organisasi_1) > 2){
                    if($this->tanggal_organisasi_1 && $this->tanggal_organisasi_1_end && $this->jabatan_organisasi_1){
                        Yii::$app->db->createCommand()
                            ->insert('t_organisasi', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_organisasi_1,
                                'jabatan' => $this->jabatan_organisasi_1,
                                'mulai' => $this->tanggal_organisasi_1,
                                'berakhir' => $this->tanggal_organisasi_1_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_organisasi_2) > 2){
                    if($this->tanggal_organisasi_2 && $this->tanggal_organisasi_2_end && $this->jabatan_organisasi_2){
                        Yii::$app->db->createCommand()
                            ->insert('t_organisasi', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_organisasi_2,
                                'jabatan' => $this->jabatan_organisasi_2,
                                'mulai' => $this->tanggal_organisasi_2,
                                'berakhir' => $this->tanggal_organisasi_2_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_organisasi_3) > 2){
                    if($this->tanggal_organisasi_3 && $this->tanggal_organisasi_3_end && $this->jabatan_organisasi_3){
                        Yii::$app->db->createCommand()
                            ->insert('t_organisasi', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_organisasi_3,
                                'jabatan' => $this->jabatan_organisasi_3,
                                'mulai' => $this->tanggal_organisasi_3,
                                'berakhir' => $this->tanggal_organisasi_3_end,
                            ])
                            ->execute();
                    }
                }
                if(strlen($this->nama_organisasi_4) > 2){
                    if($this->tanggal_organisasi_4 && $this->tanggal_organisasi_4_end && $this->jabatan_organisasi_4){
                        Yii::$app->db->createCommand()
                            ->insert('t_organisasi', [
                                'pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId(),
                                'nama' => $this->nama_organisasi_4,
                                'jabatan' => $this->jabatan_organisasi_4,
                                'mulai' => $this->tanggal_organisasi_4,
                                'berakhir' => $this->tanggal_organisasi_4_end,
                            ])
                            ->execute();
                    }
                }
                //if the data successfully inserted, show bootstrap alert
                Yii::$app->session->setFlash('success', 'Data ekstrakurikuler berhasil disimpan');
                return true;
            }catch(Exception $e){
                //for debug purpose, show the error message, comment the line below for production
                //Yii::$app->session->setFlash('error', $e->getMessage());
                //show an error message if the exception is catched using bootstrap aler but encoded the message first
                Yii::$app->session->setFlash('error', "Something went wrong, please contact the administrator or try again later");
            }   
        }
        return false;
    }
}
?>
