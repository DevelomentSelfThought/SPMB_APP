<!DOCTYPE html>
<html>
<head>
    <title>Student Token Activation</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f6f8fa;
    padding: 20px;
}

.site-device-activation {
    text-align: center;
}

.activation-form {
    background-color: #fff;
    padding: 80px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    margin: 0 auto;
}

.code-inputs {
    display: grid;
    grid-template-columns: repeat(9, 1fr);
    gap: 10px;
}

.code-inputs input {
    text-align: center;
    padding: 10px; /* Reduce the padding */
    font-size: 16px; /* Increase the font size */
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
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

/* @var $this yii\web\View */
/* @var $model app\models\DeviceActivationForm */

$this->title = 'Verifikasi Akun';
?>
<div class="site-device-activation">

<h1><img src="/bground/itdel.jpg" width=120 alt="GitHub Logo"></h1><br>

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
        <?= $form->field($model, 'code7')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code8')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
        <?= $form->field($model, 'code9')->textInput(['maxlength' => 1])->label(false)->error(false) ?>
    </div>
    <br>
<div class="form-group">
    <?= Html::submitButton('Verifikasi Akun', ['class' => 'btn btn-primary full-width']) ?>
</div>
    <?php ActiveForm::end(); ?>
</div>
</body>
</html>