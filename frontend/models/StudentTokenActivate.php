<?php
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;
use Yii;
class StudentTokenActivate extends Model
{
    public $code1;
    public $code2;
    public $code3;
    public $code4;
    public $code5;
    public $code6;
    public function rules()
    {
        return [
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6'], 'required'],
            [['code1', 'code2', 'code3', 'code4', 'code5', 'code6'], 'string', 'max' => 1],
        ];
    }
    //delete token after it's used, make sure the security is meet
    public function deleteToken($token){
        $command = Yii::$app->db->createCommand("UPDATE t_user SET verf_code = '0' WHERE verf_code = :token")
                    ->bindValue(':token', $token);        
        $command->execute();
    }
    //activate the user account, set status to active if the code is correct
    public function activate()
    {   
        if($this->validate()) {
            $code = $this->code1 . $this->code2 . $this->code3 . $this->code4 . $this->code5 . $this->code6;
            $temp_encrypt  = new StudentRegisterForm();
            $code = $temp_encrypt->encryptToken($code);
            //look if verf_code exists in the database
            $temp = Yii::$app->db->createCommand("SELECT * FROM t_user WHERE verf_code = '$code'")->queryOne();
            if($temp==null){
                //set flash javascript message
                echo "<script>alert('Kode verifikasi salah !!! M
                ohon periksa kembali.')</script>";
                return false;
            }
            else //set status to active
            {
                $user_id = $temp['user_id'];
                Yii::$app->db->createCommand("UPDATE t_user SET active = 1 WHERE verf_code = :code")
                            ->bindValue(':code', $code)
                            ->execute();            
                //clean the token
                $this->deleteToken($code);
                //propagate the mandatory fields to the table, since the table is very bad designed
                $this->propagateTablePendaftar($user_id);
                return true;
            }
        }
        return false;
    }
    //propagate the mandatory fields to the table, since the table is very bad designed
    public function propagateTablePendaftar($user_id){
        //set the mandatory fields in t_pendaftar using insert command
        $command = Yii::$app->db->createCommand("
            INSERT INTO t_pendaftar 
            (jalur_pendaftaran_id,user_id,jenis_kelamin_id,
            agama_id,sekolah_id,informasi_del_id,gelombang_pendaftaran_id,lokasi_ujian_id)
            VALUES (:jalur_pendaftaran_id,:user_id,:jenis_kelamin_id,
            :agama_id,:sekolah_id,:informasi_del_id,:gelombang_pendaftaran_id,:lokasi_ujian_id)");
    
        $command->bindValues([
            ':jalur_pendaftaran_id' => 1,
            ':user_id' => $user_id,
            ':jenis_kelamin_id' => 1,
            ':agama_id' => 1,
            ':sekolah_id' => 1,
            ':informasi_del_id' => 1,
            ':gelombang_pendaftaran_id' => 1,
            ':lokasi_ujian_id' => 1,
        ]);
        $command->execute(); 
    }
}
?>