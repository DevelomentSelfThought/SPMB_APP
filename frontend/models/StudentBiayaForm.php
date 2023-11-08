<?php 
namespace app\models;
use Yii;
use yii\base\Model;
class StudentBiayaForm extends Model{
    public $biaya_awal;
    public $virtual_account;
    public $voucher;
    public $total_bayar;
    public $status_pembayaran;
    public function rules()
    {
        return [
            [['voucher'], 'string', 'max' => 20],
            //minimum voucher length is 8
            [['voucher'], 'string', 'min' => 5],
        ];
    }
    //function to get biaya awal from table
    public function getBiayaAwal(){
        return 150000; //todo: working with table reference
    }
    // validate voucher from given voucher code, return true if voucher is valid
    public function validateVoucher(): bool{
        //sql command: select from t_voucher where kode = $this->voucher
        $sql=Yii::$app->db->createCommand("SELECT * FROM t_voucher WHERE kode = :kode");
        $params = [
            ':kode' => $this->voucher,
        ];
        $result = $sql->bindValues($params)->queryOne();

        // return true if a row was found, false otherwise
        return $result !== false;
    }
    //total bayar, case  voucher valid, get diskon from t_voucher, case voucher not valid, diskon = 0
    public function getTotalBayar(){
        if($this->validateVoucher()){
            //sql command: select from t_voucher where kode = $this->voucher
            $sql=Yii::$app->db->createCommand("SELECT * FROM t_voucher WHERE kode = :kode");
            $params = [
                ':kode' => $this->voucher,
            ];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $this->biaya_awal - $result['nominal']; //possibly using other operation, like multiplication
        }
        return $this->biaya_awal; //return biaya awal if voucher not valid
    }
    //function for get Status Pembayaran from table
    public function getStatusPembayaran(){
        return true;
    }
    //function for set status pembayaran
    public function setStatusPembayaran(){
        if($this->status_pembayaran()){
            //set status pembarayan : lunas
            $status_pembayaran="Lunas";
            return $status_pembayaran;
        }
        //set status pembayaran : belum lunas
        $status_pembayaran="Belum Lunas";
        return $status_pembayaran;

    }
}

?>