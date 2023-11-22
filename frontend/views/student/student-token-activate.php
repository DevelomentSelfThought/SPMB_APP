<!DOCTYPE html>
<html>
<head>
    <title>Student Token Activation</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f6f8fa;
}

.site-device-activation {
    text-align: center;
}
.activation-form {
    background-color: #fff;
    padding: 40px 20px; /* Increased vertical padding */
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 40%;
    margin: 0 auto;
}

.code-inputs {
    display: flex;
    justify-content: center;
    flex-wrap: wrap; /* Allow the input boxes to wrap onto the next line */
}

.code-inputs input {
    text-align: center;
    padding: 5px; /* Increased padding */
    font-size: 16px; /* Increased font size */
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 60px; /* Increased width */
    height: 40px; /* Increased height */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
    margin: 5px;
}

/* Responsive styles */
@media (max-width: 768px) {
    .code-inputs input {
        width: 50px; /* Increased width for smaller screens */
        height: 35px; /* Increased height for smaller screens */
        font-size: 14px; /* Increased font size for smaller screens */
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
    <p><b>Silahkan masukan kode verifikasi yang telah dikirimkan</b></p><br>
    <div class="code-inputs">
        <?= $form->field($model, 'code1')->textInput(['maxlength' => 1, 'placeholder' => 'K'])
        ->label(false)->error(false) ?>
        <?= $form->field($model, 'code2')->textInput(['maxlength' => 1, 'placeholder' => 'O'])
        ->label(false)->error(false) ?>
        <?= $form->field($model, 'code3')->textInput(['maxlength' => 1, 'placeholder' => 'D'])
        ->label(false)->error(false) ?>
        <?= $form->field($model, 'code4')->textInput(['maxlength' => 1, 'placeholder' => 'E'])
        ->label(false)->error(false) ?>
        <?= $form->field($model, 'code5')->textInput(['maxlength' => 1, 'placeholder' => 'A'])
        ->label(false)->error(false) ?>
        <?= $form->field($model, 'code6')->textInput(['maxlength' => 1, 'placeholder' => 'B'])
        ->label(false)->error(false) ?>
    </div>
    <br>
    <div class="form-group">
    <?= Html::submitButton('Verifikasi Akun', ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
</div>
<br>
<p style="font-size: 14px; color: #666; line-height: 1.6;">Box diatas berguna untuk menampung token yang dikirimkan melalui email.</p>
    <?php ActiveForm::end(); ?>
</div>
<?php 
Modal::begin([
    'title' => '<h2 style="color: #0093ad;" class="text-center">Instruksi Verifikasi Akun</h2>',
    'id' => 'welcomeModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
    'headerOptions' => ['style' => 'background-color: #f5f5f5;'], // Add this line
]); ?>
<div class="modal-body">
    <p class="text-center"><i class="fas fa-info-circle"></i> Harap memperhatikan instruksi berikut :</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Token atau Kode Aktivasi:</strong> 
        Masukan 6 digit kode yang telah dikirimkan ke email anda. 
        Tiap digit anda harus memasukan kode yang tepat pada kolom yang tersedia.</li>

    </li>
    </ul>
    <p style="font-size: 14px; color: #666; line-height: 1.6;" class="mt-3">
        Tidak perlu panik jika token tidak muncul pada email. Jika email sudah valid, 
        anda hanya perlu menunggu beberapa menit untuk mendapatkan token. Jika email anda tidak valid,
        silahkan melakukan pendaftaran ulang dengan email yang valid.
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" style="width: 100%;" data-bs-dismiss="modal">Saya Memahami</button>
</div>
<?php Modal::end(); ?>
</body>
</html>