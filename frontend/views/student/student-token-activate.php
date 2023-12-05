<!DOCTYPE html>
<html>
<head>
    <title>Student Token Activation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .otp-input {
            text-align: center;
            font-size: 20px;
            border: none;
            border-radius: 50%; /* makes the input field completely round */
            background-color: #0d6efd; /* sets the background color to Eclipse */
            color: white; /* sets the text color to white */
            margin-right: 5px;
            margin-left: 5px;
            width: 40px;
            height: 40px; /* sets the height to be the same as the width */
            padding: 10px; /* adds some padding */
        }
        /* media query for mobile */
        @media (max-width: 576px) {
            .otp-input {
                margin-right: 2px;
                margin-left: 2px;
            }
        }
        .otp-input:focus {
            border-color: #6610f2;
            outline: none;
            box-shadow: none;
        }
        .rounded-lg {
            border-radius: 1rem; /* 1rem = 16px */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.25); /* adds a 3D shadow effect */
        }
        .otp-input::placeholder {
            color: white;
        }
        .custom-heading {
            font-size: 2.5rem;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
</style>
</head>
<body> 
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal;
$this->title = 'Verifikasi Akun';
$this->registerJs('$(document).ready(function(){$("#welcomeModal").modal("show");});');
?>
<div class="text-center mb-2">
    <img src="/bground/itdel.jpg" alt="Logo" class="mb-1" width="120">
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow rounded-lg"> <!-- updated the class here -->
                <div class="card-body"><br>
                <h1 class="text-center custom-heading"> 
                     <?= Html::encode($this->title) ?>
                </h1>
                <br>
                    <p class="text-center"> Masukan kode verifikasi yang telah dikirimkan melalui email</p>
                    <br>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    
                    <div class="form-group d-flex justify-content-center">
                        <?= $form->field($model, 'code1', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '8'])->label(false) ?>
                        <?= $form->field($model, 'code2', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '5'])->label(false) ?>
                        <?= $form->field($model, 'code3', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '2'])->label(false) ?>
                        <?= $form->field($model, 'code4', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '9'])->label(false) ?>
                        <?= $form->field($model, 'code5', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '3'])->label(false) ?>
                        <?= $form->field($model, 'code6', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => '6', 'oninput' => 'if(this.value.length>=1) { this.form.submit(); }'])->label(false) ?>
                    </div>
                    <br>
                    <hr>
                    <p style="font-size: 14px; color: #666; line-height: 1.6;" class="text-center">
                        Box diatas berguna untuk menampung kode yang dikirimkan melalui email. Sebagai contoh
                        jika kode yang dikirimkan melalui email adalah  <b><i>852936</i></b>, maka masukan kode tersebut seperti contoh diatas.</p>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

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
