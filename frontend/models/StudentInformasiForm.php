<?php
namespace app\models;
use Yii;
use yii\base\Model;
class StudentInformasiForm extends Model{
    //todo: public member for information fields
    public $sumber_informasi;
    public $motivasi;
    public $jumlah_n;

    //rules for validation  
    public function rules(){
        return [
            [['sumber_informasi','motivasi','jumlah_n'], 'required'],
            [['sumber_informasi','motivasi','jumlah_n'], 'string', 'max' => 255],
        ];
    }
    //insert or update information to database
    public function insertData(){
    }
    //insert or update information to database 
    public function insertInformasiData(){

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
    //generate sumber informasi value, key value pair, text and text
    public static array $get_sumber_informasi = [
        'Internet' => 'Internet',
        'Keluarga' => 'Keluarga',
        'Teman' => 'Teman',
        'Sekolah' => 'Sekolah',
        'Brosur' => 'Brosur',
        'Lainnya' => 'Lainnya',
    ];
    //generate motivasi value, key value pair, text and text
    public static array $get_motivasi = [
        'Prestasi' => 'Prestasi',
        'Pendidikan' => 'Pendidikan',
        'Pekerjaan' => 'Pekerjaan',
        'Lainnya' => 'Lainnya',
    ];
}
?>