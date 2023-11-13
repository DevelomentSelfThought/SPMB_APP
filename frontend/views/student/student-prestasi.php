<html lang="">
<link href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- css for ruler -->
<style>
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
//this is view file for student extra activity information form
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$title = 'Data Prestasi';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 
'id' => 'student-extra-form',
'fieldConfig' => [
    'template' => "{label}\n{input}\n{error}",
    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    'inputOptions' => ['class' => 'col-lg-3 form-control'],
    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],],
    'options' => ['class' => 'my-form']]); ?>
<?php
$title_extra  = "Data Prestasi";
?>
<?= Html::tag('div', '<span>Form Data Prestasi Akademik</span>', ['class' => 'ruler']) ?>    <br>
<div class="row">
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Nama Prestasi</b><br><br>"); ?>
    </div>
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Tahun</b><br><br>"); ?>
    </div>
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Tingkat</b><br><br>"); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_1',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312V4.002Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 
                'placeholder'=>'Nama Prestasi', 'value' => $model->nama_prestasi_1]) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_1',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_1',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList()   , ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_2',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-2-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_2',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_2',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_3',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-3-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_3',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_3',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_4',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-4-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM7.519 5.057c-.886 1.418-1.772 2.838-2.542 4.265v1.12H8.85V12h1.26v-1.559h1.007V9.334H10.11V4.002H8.176c-.218.352-.438.703-.657 1.055ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_4',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_4',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<?= Html::tag('div', '<span>Form Data Prestasi Non-Akademik</span>', ['class' => 'ruler']) ?>    <br>
<!-- same as above but for non-akademik attribute -->
<div class="row">
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Nama Prestasi Non-Akademik</b><br><br>"); ?>
    </div>
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Tahun</b><br><br>"); ?>
    </div>
    <div class="col-md-4">
        <?php echo \yii\bootstrap5\Html::label("<b>Tingkat</b><br><br>"); ?>
    </div>
</div>
<!-- all field same as above, but for non-akademik  model-->
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_non_1',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312V4.002Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi Non-Akademik']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_non_1',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_non_1',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList()   , ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_non_2',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-2-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi NonAkademik']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_non_2',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_non_2',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_non_3',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-3-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi Non Akademik']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_non_3',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_non_3',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'nama_prestasi_non_4',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-4-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM7.519 5.057c-.886 1.418-1.772 2.838-2.542 4.265v1.12H8.85V12h1.26v-1.559h1.007V9.334H10.11V4.002H8.176c-.218.352-.438.703-.657 1.055ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z"/>
                </svg></span>{input}</div>'])->textInput(['maxlength' => true, 'placeholder'=>'Nama Prestasi Non Akademik']) ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_non_4',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-4">
<?php
    echo $form->field($model, 'predikat_prestasi_non_4',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
    <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<br>
<div class="form-group" style="display: flex; justify-content: flex-end;">
    <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary','style' => 'background-color: #fff; color: #333; margin-right: 10px; width: 100px;']) ?>
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'style' => 'background-color: #fff; color: #333; width: 100px;', 'id' => 'my-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
<?php
$script = <<< JS
$('.my-form').on('beforeSubmit', function(event) {
    event.preventDefault();

    // Show the alert
    alert('Data Prestasi Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>