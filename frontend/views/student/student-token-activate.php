<!DOCTYPE html>
<html>
<head>
    <title>Student Token Activation</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f6f8fa;
    /* padding: 20px; */
}

.site-device-activation {
    text-align: center;
}

.activation-form {
    background-color: #fff;
    padding: 40px; /* Reduced padding */
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 40%; /* Reduced width */
    margin: 0 auto;
}

.code-inputs {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 2px;
    justify-content: center; /* Center the input fields */

}

.code-inputs input {
    text-align: center;
    padding: 2px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 80%;
    height: 40px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Added box shadow */
    transition: box-shadow 0.3s ease; /* Added transition for box shadow */
}

.code-inputs input:focus {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Added box shadow for focus state */
}
.btn-primary {
    padding: 10px 20px;
    font-size: 16px;
    border-color: #007bff;    
    border: none;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #007bff;
}
.full-width {
    width: 100%;
}

/* Responsive styles */
@media (max-width: 768px) {
    .activation-form {
        width: 90%;
        padding: 40px;
    }

    .code-inputs {
        grid-template-columns: repeat(4, 1fr);
    }
}

</style> 
<body> 
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal;

$this->title = 'Verifikasi Akun';
$this->registerJs('$(document).ready(function(){$("#welcomeModal").modal("show");});');

?>
<div class="site-device-activation">

<h1><img src="/bground/itdel.jpg" width=120 alt="IT Del Logo"></h1><br>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'activation-form']]); ?>
    <h1><b><?= Html::encode($this->title) ?> </b></h1><br>
    <p><b>Silahkan masukan kode verifikasi yang telah dikirimkan:</b></p><br>
    <div class="code-inputs">
        <?= $form->field($model, 'code1')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code2')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code3')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code4')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code5')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code6')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
    </div>
    <br>
<div class="form-group">
    <?= Html::submitButton('Verifikasi Akun', ['class' => 'btn btn-primary full-width']) ?>
</div>
    <?php ActiveForm::end(); ?>
</div>
<?php 
Modal::begin([
    'title' => '<h2 class="text-center">Instruksi Verifikasi Akun</h2>',
    'id' => 'welcomeModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
]); ?>
<div class="modal-body">
    <p class="text-center"><i class="fas fa-info-circle"></i> Harap memperhatikan instruksi berikut :</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Token atau Kode Aktivasi:</strong> 
        Masukan 6 digit kode yang telah dikirimkan ke email anda. 
        Tiap digit anda harus memasukan kode yang tepat pada kolom yang tersedia.</li>

    </li>
    </ul>
    <p class="mt-3">
        Tidak perlu panik jika token tidak muncul pada email. Jika email sudah valid, 
        anda hanya perlu menunggu beberapa menit untuk mendapatkan token. Jika email anda tidak valid,
        silahkan melakukan pendaftaran ulang dengan email yang valid.
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Saya Memahami</button>
</div>
<?php Modal::end(); ?>
</body>
</html>