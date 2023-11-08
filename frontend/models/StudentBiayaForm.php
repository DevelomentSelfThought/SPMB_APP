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

    public function updateData(){

    }
    public function insertBiayaData(){

    }
    //validate voucher from given voucher code, return true if voucher is valid
    public function validateVoucher(){
        
    }
}

?>