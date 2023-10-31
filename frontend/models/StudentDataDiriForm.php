<?php
//this file is intended to be used as a model for personal information
//or (data diri mahasiswa), the data source table is not t_student
namespace app\models;
use Yii;
use Exception;
use yii\base\Model;
use yii\db\ActiveRecord;

class StudentDataDiriForm extends Model {
    //personal information for student using array, non-static data memeber
    public $nik; public $nisn; public $no_kps;
    public $nama; public $jenis_kelamin;
    public $tanggal_lahir; public $tempat_lahir;
    public $agama_id; public $alamat; public $kelurahan;
    public $provinsi; public $kabupaten; public $alamat_kecamatan;
    public $kode_pos; public $no_telepon_rumah; public $no_telepon_mobile; public $email;
    //additional variable which store the information (key value pair)
    public static array $relegion = [ //list of relegion
        '0' => 'Islam',
        '1' => 'Kristen',
        '2' => 'Katolik',
        '3' => 'Hindu',
        '4' => 'Budha',
        '5' => 'Konghucu',
    ]; //list of relegion
    public static array $gen  = [ '0' => 'Pria', '1' => 'Wanita']; //list of gender
    //rules for handling input data from user
    public function rules()
    {
        //rules for all data member above
        return [
            [['nik','nisn','nama','jenis_kelamin',
                'tanggal_lahir','tempat_lahir',
                'agama_id','alamat','kelurahan','provinsi',
                'kabupaten','alamat_kecamatan','kode_pos'
                ,'no_telepon_mobile','email'],'required'],
            ['email','email'], //email must be valid address
            //nik length minimum is 16 and maximum is 16 and must be integer
            ['nik','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

            //nisn length minimum is 10 and maximum is 10 and must be integer
            ['nisn','string','min'=>10,'max'=>10,'message'=>'NISN harus 10 digit'],
            //no_kps length minimum is 10 and maximum is 10 and must be integer
            ['no_kps','string','min'=>6,'max'=>6,'message'=>'No KPS harus 6 digit'],
            //rules for kode pos and can't contain character
            ['kode_pos','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
            ['kode_pos','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],
            //rules for name, minimum length is 3 and maximum length is 50 and can't contain number
            ['nama','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
            //rule for no_telepon_mobile, minimum length is 10 and maximum length is 13 and can't contain character
            ['no_telepon_mobile','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
            ['no_telepon_mobile','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],
            //rule for valid email address yahoo, gmail, and hotmail
            ['email','match','pattern'=>'/^[a-zA-Z0-9_.+-]+@(yahoo|gmail|hotmail)+\.(com|co.id)$/','message'=>'Email tidak valid'],
            //rule for tanggal_lahir must be date format and valid date format is yyyy-mm-dd
            ['tanggal_lahir','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
        ];
    }

    //method for saving data personal information to database, todo : exception handler for saving data
    //passing argument $id to this method, this argument is the id of student
    public function insertDataDiri(){
        if($this->validate())
        {
            try{
                //insertion data to table t_pendaftar 
                Yii::$app->db->command()->insert('t_pendaftar',[
                    'nik'=>$this->nik,
                    'nisn'=>$this->nisn,
                    'no_kps'=>$this->no_kps,
                    'nama'=>$this->nama,
                    'jenis_kelamin_id'=>$this->jenis_kelamin,
                    'tanggal_lahir'=>$this->tanggal_lahir,
                    'tempat_lahir'=>$this->tempat_lahir,
                    'agama_id'=>$this->agama_id,
                    'alamat'=>$this->alamat,
                    'kelurahan'=>$this->kelurahan,
                    'provinsi'=>$this->provinsi,
                    'kabupaten'=>$this->kabupaten,
                    'alamat_kec'=>$this->alamat_kecamatan,
                    'kode_pos'=>$this->kode_pos,
                    'no_telepon_rumah'=>$this->no_telepon_rumah,
                    'no_telepon_mobile'=>$this->no_telepon_mobile,
                    'email'=>$this->email,
                ])->execute();
                Yii::$app->session->setFlash('success', 'Data ekstrakurikuler berhasil disimpan');
                return true;
            }catch (Exception $e){ //for debugging purpose
                Yii::$app->session->setFlash('error', "Something went wrong, please contact the administrator or try again later");
                //echo $e->getMessage();
            }
        }
        return false;
    }
}

?>