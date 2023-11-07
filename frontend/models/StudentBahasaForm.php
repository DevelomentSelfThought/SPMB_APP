<?php
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentBahasaForm extends Model{
    public $english; 
    public $non_english;
    public $non_english_ability;
    //rules for handling input data from user
    public function rules(){
        return [
            [['english'], 'required'],
            [['english'], 'string', 'max' => 255],
            [['non_english','non_english_ability'], 'string', 'max' => 255],
        ];
    }
    //generate list of english ability
    public static array $english_ability = [
        1 => 'Kurang',
        2 => 'Cukup',
        3 => 'Baik',
    ];
    //update bahasa to table t_pendaftar
    public function updateBahasa(){
        //update data to table t_pendaftar 
        Yii::$app->db->createCommand()->update('t_pendaftar',[
            'kemampuan_bahasa_inggris'=>$this->english,
            'bahasa_asing_lainnya'=>$this->non_english,
            'kemampuan_bahasa_asing_lainnya'=>$this->non_english_ability
        ],
        //condition : user_id from the current logged in user using getCurrentUserId() method
        'user_id = '.StudentDataDiriForm::getCurrentUserId())->execute();
    }
    //generate list of non english language
    public static array $non_english_list= [
        'Jerman' => 'Jerman',
        'Jepang' => 'Jepang',
        'Mandarin' => 'Mandarin',
        'Perancis' => 'Perancis',
        'Rusia' => 'Rusia',
        'Spanyol' => 'Spanyol',
        'Lainnya' => 'Lainnya',
    ];
    //insert bahasa data to database
    public function insertBahasaData(){
        //validate the input data
        if($this->validate()){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar', 
                    ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //update bahasa to t_pendaftar
                self::updateBahasa();
                //flash message if the data is successfully inserted to database
                Yii::$app->session->setFlash('success', "Data Bahasa Berhasil Disimpan");
                return true;
            }catch(Exception $e) {
                //flash message if the data is failed to be inserted to database
                Yii::$app->session->setFlash('error', "Data Bahasa Gagal Disimpan");
                echo $e->getMessage();
            }
        }
        return false;
        //sql command to insert bahasa data to database
    }
}

?>