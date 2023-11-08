<html lang="">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</html>
<?php
//student registration view
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Registrasi Akun Calon Mahasiswa Baru';
?>
<style>
    body {
        background-color: rgba(0, 0, 0, 0.5);
        background-image: url('/bground/1.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        transition: background-image 0.5s ease-in-out;
    }
    .form-group {
        position: relative;
        margin-bottom: 20px;
    }
    .form-group .icon {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 20px;
        color: #aaa;
    }
    .form-control {
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        border-radius: 0;
        box-shadow: none;
        color: #333;
        font-size: 16px;
        padding: 10px 15px;
        transition: background-color 0.5s ease-in-out;
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 1);
        box-shadow: none;
        outline: none;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 0;
        box-shadow: none;
        color: #fff;
        font-size: 16px;
        padding: 10px 15px;
        transition: background-color 0.5s ease-in-out;
    }
    .btn-primary:hover, .btn-primary:focus {
        background-color: #0069d9;
        box-shadow: none;
        outline: none;
    }
    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }       
</style>
<br><br><br>><br><br>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model_student_register, 'nik', 
                ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength'=>true, 'placeholder'=>'NIK'])->label(false) ?>
                
                <?= $form->field($model_student_register, 'username', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                </svg></span>{input}<span id="username-eye" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></div>',
                ])->passwordInput(['id' => 'username-input', 'maxlength'=>true, 'placeholder'=>'Username'])->label(false) ?>

                <?= $form->field($model_student_register, 'email',
                ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox-flag" viewBox="0 0 16 16">
                <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8h1.5ZM5 7c0 .334-.164.264-.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0Z"/>
                <path d="M4 3h4v1H6.646A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4Zm0 1a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3Z"/>
                </svg></span>{input}</div>']
                )->textInput(['maxlength'=>true, 'placeholder'=>'Email'])->label(false) ?>

                <?= $form->field($model_student_register, 'password', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                </svg></span>{input}<span id="password-eye" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></div>',
                ])->passwordInput(['id' => 'password-input', 'maxlength'=>true, 'placeholder'=>'Password'])->label(false) ?>
                
                <?= $form->field($model_student_register, 'password_repeat', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                </svg></span>{input}<span id="password-repeat-eye" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></div>',
                ])->passwordInput(['id' => 'password-repeat-input', 'maxlength'=>true, 'placeholder'=>'Konfirmasi Password'])->label(false) ?>

                <?= $form->field($model_student_register, 'no_HP', 
                ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                </svg></span>{input}</div>']
                )->textInput(['maxlength'=>true, 'placeholder'=>'No. Whatsapp'])->label(false) ?>
                <div class="form-group col-sm-12">
                    <?= Html::submitButton('Daftar Akun', ['class' => 'btn btn-primary btn-block form-control']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php 
?>
</div>
<script>
    var images = ['/bground/1.jpg', '/bground/2.jpg', '/bground/3.jpg'];
    var currentIndex = 0;

    function changeBackgroundImage() {
        currentIndex = (currentIndex + 1) % images.length;
        document.body.style.backgroundImage = 'url(' + images[currentIndex] + ')';
    }

    setInterval(changeBackgroundImage, 3000);
</script>
<script>
$(document).ready(function() {
    $('#password-eye').on('click', function() {
        var passwordInput = $('#password-input');
        var passwordEyeIcon = $('#password-eye i');
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            passwordEyeIcon.removeClass('fa-eye-slash');
            passwordEyeIcon.addClass('fa-eye');
        } else {
            passwordInput.attr('type', 'password');
            passwordEyeIcon.removeClass('fa-eye');
            passwordEyeIcon.addClass('fa-eye-slash');
        }
    });
});
</script>
<?php
$script = <<< JS
$('#password-repeat-eye').click(function() {
    var input = $('#password-repeat-input');
    var icon = $('#password-repeat-eye i');

    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye-slash');
        icon.addClass('fa-eye');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
    }
});
JS;
$this->registerJs($script);
?>
<?php
$script = <<< JS
$('#username-eye').click(function() {
    var input = $('#username-input');
    var icon = $('#username-eye i');

    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye-slash');
        icon.addClass('fa-eye');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
    }
});
JS;
$this->registerJs($script);
?>