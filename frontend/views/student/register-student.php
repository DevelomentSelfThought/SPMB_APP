<html>
<head>
<title>Student Login</title>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>    
:root {
    --primary-color: #007bff;
    --border-color: #ced4da;
    --body-bg-color: #f6f8fa;
    --font-family: 'Roboto', sans-serif; /* Modern font */
}

.card {
    border: none;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease; /* Smooth transition */
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    transition: background-color 0.3s ease, border-color 0.3s ease; /* Smooth transition */
}

.form-control_ {
    border: 1px solid var(--border-color);
    transition: border 0.3s ease; /* Smooth transition */
}

body {
    font-family: var(--font-family);
    background-color: var(--body-bg-color);
}
</style>
<body>
<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
$this->title = 'Registrasi Akun';
$this->registerJs('$(document).ready(function(){$("#welcomeModal").modal("show");});');
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
                    <br>
                    <?php $form = ActiveForm::begin([
                        'id' => 'student-login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'form-label'],
                            'inputOptions' => ['class' => 'form-control'],
                            'errorOptions' => ['class' => 'invalid-feedback'],
                        ],
                    ]); ?>
    <?= $form->field($model_student_register, 'nik', 
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-bell-slash-fill" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength'=>true, 'placeholder'=>'NIK'])->label(false) 
    ?>          
    <?= $form->field($model_student_register, 'username', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-lightbulb-off-fill" style="font-size: 1rem;"></i></span>{input}</div>',
        ])->textInput(['maxlength'=>true, 'placeholder'=>'Username'])->label(false) 
    ?>
    <?= $form->field($model_student_register, 'email',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-envelope-fill" style="font-size: 1rem;"></i></span>{input}</div>']
        )->textInput(['maxlength'=>true, 'placeholder'=>'Email'])->label(false) 
    ?>
    <?= $form->field($model_student_register, 'password', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-patch-question-fill" style="font-size: 1rem;"></i></span>{input}<span id="password-eye" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></div>',
        ])->passwordInput(['id' => 'password-input', 'maxlength'=>true, 'placeholder'=>'Password'])->label(false) 
    ?>
    <?= $form->field($model_student_register, 'password_repeat', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-patch-check-fill" style="font-size: 1rem;"></i></span>{input}<span id="password-repeat-eye" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></div>',
        ])->passwordInput(['id' => 'password-repeat-input', 'maxlength'=>true, 'placeholder'=>'Konfirmasi Password'])->label(false) 
    ?>
    <?= $form->field($model_student_register, 'no_HP', 
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-telephone-plus-fill" style="font-size: 1rem;"></i></span>{input}</div>']
        )->textInput(['maxlength'=>true, 'placeholder'=>'No. Whatsapp'])->label(false) 
    ?>    
    <?=  Html::submitButton('Buat Akun', ['class' => 'btn btn-primary btn-block form-control']) ?>
    <div class="text-center mt-3">
        <?= Html::a('Aktivasi Akun', ['/student/student-token-activate'], ['class' => 'text-decoration-none d-block']) ?>
    </div>
                <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
Modal::begin([
    'title' => '<h2 style="color: #0093ad;" class="text-center">Instruksi Pendaftaran</h2>',
    'id' => 'welcomeModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
    'headerOptions' => ['style' => 'background-color: #f5f5f5;'], // Add this line

]); ?>
<div class="modal-body">
    <p class="text-center"><i class="fas fa-info-circle"></i> Harap memperhatikan instruksi berikut :</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>NIK:</strong> Masukan NIK anda sesuai dengan format yang tertera pada KTP.</li>
        <li class="list-group-item"><strong>Username:</strong> Masukan username yang unik, seperti gabungan kata dengan angka.</li>
        <li class="list-group-item"><strong>Email:</strong> Masukan email yang valid, karena email akan digunakan untuk verifikasi akun.</li>
        <li class="list-group-item"><strong>Password:</strong> Gunakan password yang mudah diingat, jumlah kata > 4 kata.</li>
        <li class="list-group-item"><strong>Konfirmasi Password:</strong> Password dan Konfirmasi Password tidak boleh berbeda.</li>
        <li class="list-group-item"><strong>No. Whatsapp:</strong> Gunakan nomor whatsApp anda saat ini.</li>
    </ul>
    <p style="font-size: 14px; color: #666; line-height: 1.6;" class="mt-3"> Sistem akan mendeteksi jika terdapat ketidaksesuaian data yang diberikan. 
        Jika terdapat ketidaksesuaian data, maka sistem akan menolak pendaftaran akun calon mahasiswa.</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" style="width: 100%;" data-bs-dismiss="modal">Saya Memahami</button>
</div>
<?php Modal::end(); ?>

</body>
</html>
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