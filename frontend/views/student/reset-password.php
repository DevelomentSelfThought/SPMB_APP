<html>
<head>
<title>Student Login</title>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .form-control_ {
        border: 1px solid #ced4da;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f6f8fa;
        /* padding: 20px; */
    }
</style>
<body>
<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
$this->title = 'Reset';
$this->registerJs('$(document).ready(function(){$("#welcomeModal").modal("show");});');

//$this->params['breadcrumbs'][] = $this->title;
?>    
<div class="text-center mb-2">
    <img src="/bground/itdel.jpg" alt="Logo" class="mb-1" width="120">
</div>
<div class="site-login">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card my-5">
                <div class="card-body p-4 p-sm-5">
                    <h1 class="mb-3 text-center" style="font-weight: 600;"><?= Html::encode($this->title) ?></h1>
                    <?php $form = ActiveForm::begin([
                        'id' => 'student-login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'form-label'],
                            'inputOptions' => ['class' => 'form-control'],
                            'errorOptions' => ['class' => 'invalid-feedback'],
                        ],
                    ]); ?>

                <?= $form->field($model_student_reset, 'username',
                    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                    </svg></span>{input}</div>'])->textInput(['autofocus' => true])
                    ->textInput(['placeholder'=>'Masukan username anda']) ?>
                <?= $form->field($model_student_reset, 'no_HP', [
                    'template' => "<div class='d-flex justify-content-between align-items-center'><div>{label}</div><div>" . Html::a('Masuk ke Akun', ['/student/login'], ['class' => 'text-decoration-none']) . "</div></div>\n<div>{input}{hint}{error}</div>",
                    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                    </svg></span>{input}</div>',
                ])->textInput(['id' => 'password-input', 'placeholder'=>'Masukan No. Whatsapp anda'])->label("No. Whatsapp") ?>

                    <?=  Html::submitButton('Reset Password', ['class' => 'btn btn-primary btn-block form-control']) ?>
                    <div class="text-center mt-3">
                        <?= Html::a('Aktivasi Akun', ['/student/student-token-activate'], ['class' => 'text-decoration-none d-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <div class="text-center">
                        <!-- <a href="#" class="text-decoration-none">Forgot password?</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
Modal::begin([
    'title' => '<h2 style="color: #0093ad;" class="text-center">Instruksi Reset Password</h2>',
    'id' => 'welcomeModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
    'headerOptions' => ['style' => 'background-color: #f5f5f5;'], // Add this line

]); ?>
<div class="modal-body">
    <p class="text-center"><i class="fas fa-info-circle"></i> Harap memperhatikan instruksi berikut :</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Username:</strong> 
        Masukan username anda pada kolom yang disediakan. 
        Harap memasukan username yang telah terdaftar pada aplikasi SPMB IT Del. 
        </li>
        <li class="list-group-item"><strong>No. Whatsapp:</strong>
        Masukan nomor whatsapp anda pada kolom yang disediakan. 
        Harap memasukan nomor whatsapp yang telah terdaftar pada aplikasi SPMB IT Del.
    </li>
    </ul>
    <p style="font-size: 14px; color: #666; line-height: 1.6;" class="mt-3">
    Jika anda lupa username, 
    anda dapat menemukan username tersebut 
    pada email yang anda gunakan ketika mendaftar akun. 
    Password baru anda akan dikirimkan melalui email, silahkan periksa email anda.</li>
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" style="width: 100%;" data-bs-dismiss="modal">Saya Memahami</button>
</div>
<?php Modal::end(); ?>
</body>
</html>