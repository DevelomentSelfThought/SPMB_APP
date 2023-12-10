<html lang="">
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
        color: #000000;
    }
    .my-form .form-control {
        border-radius: 5px;
    }
</style>
</html>
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Data Kemampuan Bahasa Asing';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Data Kemampuan Bahasa Asing</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<?php
    echo $form->field($model, 'english',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-globe text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentBahasaForm::$english_ability, ['prompt' => 'Pilih Kemampuan Bahasa Inggris'])
    ->label("Bahasa Inggris");
?>
<?php
    echo $form->field($model, 'non_english',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-translate text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentBahasaForm::$non_english_list, ['prompt' => 'Pilih Bahasa Asing Lainnya'])
    ->label("Bahasa Asing Lainnya");
?>
<?php
    echo $form->field($model, 'non_english_ability',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-translate text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentBahasaForm::$english_ability, ['prompt' => 'Pilih Kemampuan Bahasa Asing Lainnya'])
    ->label(false);
?>
    <div class="form-group" style="display: flex; justify-content: flex-end;">
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-primary', 'style' => 'margin-right: 10px;']) ?>
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'id' => 'my-button']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>
<?php
$script = <<< JS
$('.my-form').on('beforeSubmit', function(event) {
    event.preventDefault();

    // Show the alert
    alert('Data Bahasa Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>

