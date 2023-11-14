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
        /*background-color: #f5f5f5;*/
        /*padding: 20px;*/

        /*background-color: #f2f2f2;*/
        /*padding: 20px;*/
        /*border-radius: 10px;*/
        /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        /* background: linear-gradient(to bottom, #4b6cb7, #182848); */
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

use app\models\StudentAkademikForm;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form', 'enctype' => 'multipart/form-data']]); ?>
<?= Html::tag('div', '<span>Form Data Sekolah</span>', ['class' => 'ruler']) ?>
<?= $form->field($model_student_akademik, 'sekolah', [
    'template' => '<div class="input-group">{label}<span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
  <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
</svg></span>{input}{error}</div>',])->widget(AutoComplete::classname(), [
    'clientOptions' => [
        'source' => new JsExpression("function(request, response) {
            $.getJSON('" . Url::to(['student/autocomplete']) . "', {
                term: request.term
            }, response);
        }"),
        'minLength' => '3',
    ],
    'options' => [
        'class' => 'form-control',
        'placeholder' => 'Cari Sekolah (SMA/ SMK) ...', 'value' => StudentAkademikForm::fetchAsalSekolah(),
    ],])->label('Asal Sekolah') ?>

    <?php 
        echo $form->field($model_student_akademik, 'jurusan_sekolah',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAkademikForm::getProgram(), ['prompt' => 'Pilih Jurusan'])
        ->label('Jurusan'); 
    ?>
    <?php
        echo $form->field($model_student_akademik, 'akreditasi_sekolah',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
        <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAkademikForm::$acreditation, ['prompt' => 'Pilih Akreditasi Sekolah'])
        ->label('Akreditas');       
    ?>
<?= Html::tag('div', '<span>Form Data Nilai</span>', ['class' => 'ruler']) ?>
<?php echo $form->field($model_student_akademik,'no_utbk',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
        </svg></span>{input}</div>'])->label('Nomor Peserta UTBK')
        ->textInput(['placeholder'=>'Contoh : 23-1110-010002','value' => StudentAkademikForm::fetchNoPesertaUtbk()]); 
?>

<?php
echo $form->field($model_student_akademik, 'tanggal_ujian_utbk',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
    viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>']
    )->widget(\yii\jui\DatePicker::class, [
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '-100:+0',
    ],
    ])->textInput(['placeholder'=>'Contoh: 2002-01-31', 'value'=> StudentAkademikForm::fetchTanggalUjianUtbk()])->label('Tanggal Ujian UTBK');
?>
<?php echo $form->field($model_student_akademik, 'file')->fileInput()->label("File Sertifikat UTBK") ?>

<div class="row">
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_kemampuan_umum',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
        </svg></span>{input}</div>'])->label('Penalaran Umum')
        ->textInput(['placeholder'=>'Nilai penalaran umum', 'value' => StudentAkademikForm::fetchNilaiPenalaranUmum()]); 
?>
    </div>
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_kemampuan_kuantitatif',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
        </svg></span>{input}</div>'])->label('Pengetahuan Kuantitatif')
        ->textInput(['placeholder'=>'Nilai pengetahuan kuantitatif', 'value' => StudentAkademikForm::fetchNilaiPenalaranKuantitatif()]); 
?>
    </div>
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_kemampuan_pengetahuan_umum',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
        </svg></span>{input}</div>'])->label('Pengetahuan Umum')
        ->textInput(['placeholder'=>'Pengetahuan dan pemahamaan', 'value' => StudentAkademikForm::fetchNilaiPenalaranPengetahuanUmum()]); 
?>
    </div>
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_kemampuan_bacaan',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
        </svg></span>{input}</div>'])->label('Bacaan dan Menulis')
        ->textInput(['placeholder'=>'Memahami bacaan dan menulis', 'value' => StudentAkademikForm::fetchNilaiPenalaranBacaan()]); 
?>
    </div>
</div>
<div class="row">
    <div class="col">
<?php echo $form->field($model_student_akademik,'jumlah_pelajaran',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4-fill" viewBox="0 0 16 16">
        <path d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h4v.5a.5.5 0 0 0 1 0V7h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2Zm1 2a1 1 0 0 0-2 0h2Zm-4 9v2h6v-2h-1v.5a.5.5 0 0 1-1 0V11H5Z"/>
        <path d="M14 7.599A2.986 2.986 0 0 1 12.5 8H9.415a1.5 1.5 0 0 1-2.83 0H3.5A2.986 2.986 0 0 1 2 7.599V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.599ZM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-3Z"/>
        </svg></span>{input}</div>'])->label('Jumlah pelajaran semester 6')
        ->textInput(['placeholder'=>'Masukan jumlah pelajaran']); 
?>
    </div>
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_semester',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
        <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
        </svg></span>{input}</div>'])->label('Jumlah Nilai Semester 6')
        ->textInput(['placeholder'=>'Masukan jumlah nilai']); 
?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_un',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4-fill" viewBox="0 0 16 16">
        <path d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h4v.5a.5.5 0 0 0 1 0V7h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2Zm1 2a1 1 0 0 0-2 0h2Zm-4 9v2h6v-2h-1v.5a.5.5 0 0 1-1 0V11H5Z"/>
        <path d="M14 7.599A2.986 2.986 0 0 1 12.5 8H9.415a1.5 1.5 0 0 1-2.83 0H3.5A2.986 2.986 0 0 1 2 7.599V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.599ZM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-3Z"/>
        </svg></span>{input}</div>'])->label('Jumlah Pelajaran Ujian Nasional')
        ->textInput(['placeholder'=>'Masukan jumlah pelajaran']); 
?>
    </div>
    <div class="col">
<?php echo $form->field($model_student_akademik,'nilai_un',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
        <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
        </svg></span>{input}</div>'])->label('Jumlah Nilai Ujian Nasional')
        ->textInput(['placeholder'=>'Masukan jumlah nilai']); 
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
    alert('Data Akademik Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>