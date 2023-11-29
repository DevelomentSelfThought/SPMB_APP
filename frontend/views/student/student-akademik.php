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
        color: #000000;
        
    }
    .my-form .form-control {
        border-radius: 5px;
    }
    .text-brown {
        color: #4b0082;
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
<?php 
    function toRoman($num) {
        $lookup = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $roman = '';
        foreach ($lookup as $romanNumeral => $value) {
            $matches = intval($num / $value);
            $roman .= str_repeat($romanNumeral, $matches);
            $num = $num % $value;
        }
        return $roman;
    }
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => 
    ['class' => 'my-form', 'enctype' => 'multipart/form-data']]); ?>
<?= Html::tag('div', '<span class="text-primary fw-bold">Form Data Informasi Sekolah Asal</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<div class="row">
    <div class="col">
        <?= $form->field($model_student_akademik, 'sekolah', [
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}{error}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text rounded-start">
            <i class="bi bi-geo-fill text-primary text-danger" style="font-size: 1rem;"></i></span>{input}</div>',])
            ->widget(AutoComplete::classname(), [
            'clientOptions' => [
                'source' => new JsExpression("function(request, response) {
                    $.getJSON('" . Url::to(['student/autocomplete']) . "', {
                        term: request.term
                    }, response);
                }"),
                'minLength' => '3',
            ],
            'options' => [
                'class' => 'form-control rounded-end',
                'placeholder' => 'Cari Sekolah (SMA/ SMK) ...', 'value' => StudentAkademikForm::fetchAsalSekolah(),
            ],])->label('Asal Sekolah') 
        ?>
    </div>
    <div class="col">
        <?php 
            echo $form->field($model_student_akademik, 'jurusan_sekolah',
            ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}{error}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-easel2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->dropDownList(\app\models\StudentAkademikForm::getProgram(), ['prompt' => 'Pilih Jurusan'])
            ->label('Jurusan'); 
        ?>
    </div>
    <div class="col">
        <?php
            echo $form->field($model_student_akademik, 'akreditasi_sekolah',
            ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}{error}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-bank2 text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->dropDownList(\app\models\StudentAkademikForm::$acreditation, ['prompt' => 'Pilih Akreditasi Sekolah'])
            ->label('Akreditas');       
        ?>
    </div>
</div>
    <!-- define it for batch utbk -->
    <?= Html::tag('div', '<span class="text-primary fw-bold">Form Data Nilai Rapor Semester '. toRoman(1).'-'.toRoman(5) .'</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    <?php 
        if(StudentAkademikForm::getCurrentBatch() == 'utbk'){ 
    ?>
    <?php echo $form->field($model_student_akademik,'no_utbk',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-archive-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nomor Peserta UTBK')
        ->textInput(['placeholder'=>'Contoh : 23-1110-010002','value' => StudentAkademikForm::fetchNoPesertaUtbk()]); 
    ?>
    <?php
    echo $form->field($model_student_akademik, 'tanggal_ujian_utbk',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-calendar-date" style="font-size: 1rem;"></i></span>{input}</div>']
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
    <i class="bi bi-arrow-up-circle-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Penalaran Umum')
    ->textInput(['placeholder'=>'Nilai penalaran umum', 'value' => StudentAkademikForm::fetchNilaiPenalaranUmum()]); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_kemampuan_kuantitatif',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-arrow-up-circle-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pengetahuan Kuantitatif')
    ->textInput(['placeholder'=>'Nilai pengetahuan kuantitatif', 'value' => StudentAkademikForm::fetchNilaiPenalaranKuantitatif()]); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_kemampuan_pengetahuan_umum',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-arrow-up-circle-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pengetahuan Umum')
    ->textInput(['placeholder'=>'Pengetahuan & pemahamaan', 'value' => StudentAkademikForm::fetchNilaiPenalaranPengetahuanUmum()]); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_kemampuan_bacaan',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-arrow-up-circle-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Bacaan dan Menulis')
    ->textInput(['placeholder'=>'Memahami bacaan & menulis', 'value' => StudentAkademikForm::fetchNilaiPenalaranBacaan()]); 
    ?>
    </div>
</div>
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-book-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Jumlah pelajaran semester 6')
    ->textInput(['placeholder'=>'Masukan jumlah pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_semester',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-award-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Jumlah Nilai Semester 6')
    ->textInput(['placeholder'=>'Masukan jumlah nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_un',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-book-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Jumlah Pelajaran Ujian Nasional')
    ->textInput(['placeholder'=>'Masukan jumlah pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_un',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-award-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Jumlah Nilai Ujian Nasional')
    ->textInput(['placeholder'=>'Masukan jumlah nilai']); 
    ?>
    </div>
</div>
<?php } ?> 

    <!-- define field for batch pmdk -->
    <?php 
        if(StudentAkademikForm::getCurrentBatch() == 'pmdk'){
    ?>
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-image-alt" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pelajaran Semester '.toRoman(1))
    ->textInput(['placeholder'=>'Total Pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-image-alt" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pelajaran Semester '.toRoman(2))
    ->textInput(['placeholder'=>'Total Pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-image-alt" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pelajaran Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Total Pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-image-alt" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pelajaran Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Total Pelajaran']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'jumlah_pelajaran_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-image-alt" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Pelajaran Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Total Pelajaran']); 
    ?>
    </div>
</div>
<!-- field score for each semester -->
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_pelajaran_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hdd-rack-fill text-brown" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nilai Semester '.toRoman(1))
    ->textInput(['placeholder'=>'Total Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_pelajaran_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hdd-rack-fill text-brown" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nilai Semester '.toRoman(2))
    ->textInput(['placeholder'=>'Total Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_pelajaran_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hdd-rack-fill text-brown" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nilai Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Total Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_pelajaran_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hdd-rack-fill text-brown" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nilai Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Total Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'nilai_pelajaran_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-hdd-rack-fill text-brown" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Nilai Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Total Nilai']); 
    ?>
    </div>
</div>
<!-- field math for each semester -->
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'matematika_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Matematika Semester '.toRoman(1))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'matematika_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Matematika Semester '.toRoman(2))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'matematika_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Matematika Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'matematika_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Matematika Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'matematika_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-credit-card-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Matematika Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
</div>
<!-- field english for each semester -->
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'inggris_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Bahasa Inggris Semester '.toRoman(1))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'inggris_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Bahasa Inggris Semester '.toRoman(2))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'inggris_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Bahasa Inggris Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'inggris_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Bahasa Inggris Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'inggris_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Bahasa Inggris Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
</div>
<!-- field chemistry for each semester -->
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'kimia_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-calendar2-event-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Kimia Semester '.toRoman(1))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'kimia_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-calendar2-event-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Kimia Semester '.toRoman(2))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'kimia_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-calendar2-event-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Kimia Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'kimia_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-calendar2-event-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Kimia Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'kimia_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-calendar2-event-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Kimia Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
</div>
<!-- field physic for each semester -->
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_akademik,'fisika_1',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cloud-sun-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Fisika Semester '.toRoman(1))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'fisika_2',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cloud-sun-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Fisika Semester '.toRoman(2))    
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'fisika_3',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cloud-sun-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Fisika Semester '.toRoman(3))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'fisika_4',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cloud-sun-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Fisika Semester '.toRoman(4))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_akademik,'fisika_5',
    [
    'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
    'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-cloud-sun-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->label('Fisika Semester '.toRoman(5))
    ->textInput(['placeholder'=>'Input Nilai']); 
    ?>
    </div>
</div>
<?= Html::tag('div', '<span class="text-primary fw-bold">Form Upload File Nilai Rapor, 
Sertifikat dan Surat Rekomendasi (format .pdf)</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<div class="row">
    <div class="col">
        <?php echo $form->field($model_student_akademik, 'rapor_pmdk', [
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group rounded">{input}{error}</div>',
        ])->fileInput(['class' => 'form-control rounded'])->label("File Nilai Rapor Semester ".toRoman(1)."-".toRoman(5)) ?>
        <?php if ($model_student_akademik->file_rapor_pmdk): ?>
            <a href="<?php echo Yii::$app->urlManager->createUrl([$model_student_akademik->file_rapor_pmdk]) ?>" target="_blank" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                <i class="bi bi-check-circle-fill" style="font-size: 0.9rem;"></i> Lihat file nilai rapor anda
            </a>
    <?php endif; ?>
    </div>
    <div class="col">
        <?php echo $form->field($model_student_akademik, 'sertifikat_pmdk', [
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group rounded">{input}{error}</div>',
        ])->fileInput(['class' => 'form-control rounded'])->label("File Sertifikat") ?>
        <?php if ($model_student_akademik->file_sertifikat_pmdk): ?>
            <a href="<?php echo Yii::$app->urlManager->createUrl([$model_student_akademik->file_sertifikat_pmdk]) ?>" target="_blank" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                <i class="bi bi-check-circle-fill" style="font-size: 0.9rem;"></i> Lihat file sertifikat anda
            </a>
            
            <?php endif; ?>
    </div>
    <div class="col">
        <?php echo $form->field($model_student_akademik, 'rekomendasi_pmdk', [
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group rounded">{input}{error}</div>',
        ])->fileInput(['class' => 'form-control rounded'])->label("File Surat Rekomendasi") ?>
        <?php if ($model_student_akademik->file_rekomendasi_pmdk): ?>
            <a href="<?php echo Yii::$app->urlManager->createUrl([$model_student_akademik->file_rekomendasi_pmdk]) ?>" target="_blank" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                <i class="bi bi-check-circle-fill" style="font-size: 0.9rem;"></i> Lihat file rekomendasi anda
            </a>        
        <?php endif; ?>
    </div>
</div>
<!-- the end of conditional statement -->
    <?php } ?>
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
    alert('Data Akademik Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>