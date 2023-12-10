<html lang="">
<title>Informasi Biaya Pendaftaran</title>
<link href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- css for ruler -->
<style>
    body {
        background: linear-gradient(to right, #3494E6, #EC6EAD);
    }
    .ruler {
        position: relative;
        text-align: center;
        margin: 20px 0;
    }
    .ruler:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        border-top: 1px solid #ccc;
    }
    .ruler span {
        display: inline-block;
        padding: 0 10px;
        background-color: #fff;
        font-weight: bold;
        position: relative;
        top: -10px;
        color: #030303;

    }
    .my-form {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        color: #000000;
    }
    .my-form .form-control {
        border-radius: 5px;
    }
</style>
</html>
<?php
//this page is intended to be used as a view for student personal information (data diri)
// Path: views/student/student-data-diri.php
// current status is experimental, need more improvement with the design
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;

use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Data Diri Mahasiswa';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> 
Biaya Pendaftaran Peserta PMB  '.date('Y').'</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    

<?php echo $form->field($model,'biaya_awal',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cash-coin text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Biaya Pendaftaran')
  ->textInput(['value' => 'Rp. '.number_format($model->getBiayaAwal(), 0, ',', '.'), 'disabled' => true])
?>
<?php echo $form->field($model,'virtual_account',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Virtual Account')->textInput(['placeholder' => '9089 7687 8909 8978', 'disabled' => true])
?>
<?php echo $form->field($model,'voucher', [
    'inputTemplate' => '
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-gift-fill text-danger" style="font-size: 1rem;"></i>
            </span>
            {input}
            <span class="input-group-btn" style="margin-left: 10px;">
            <button class="btn btn-primary" type="submit">Pakai Voucher</button>            
            </span>
        </div>'
])->label('Voucher')->textInput(['placeholder' => 'Masukan Kode Voucher']);
?>   
<?php echo $form->field($model,'total_bayar',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-2-front-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Total Bayar')
    ->textInput(['value' => 'Rp. '.number_format($model->getTotalBayar(), 0, ',', '.'), 'disabled' => true])
?>
<?php echo $form->field($model,'status_pembayaran',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hourglass-bottom text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Status Pembayaran')
    ->textInput(['value' => $model->setStatusPembayaran(), 'disabled' => true])
?> 
<?php ActiveForm::end(); ?>
</div>