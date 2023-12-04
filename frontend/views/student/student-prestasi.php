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
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> 
Form Data Prestasi Akademik</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
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
                <i class="bi bi-alarm-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
                'placeholder'=>'Nama Prestasi']) 
    ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_1',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-alarm-fill" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-alarm-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_2',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-gift-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
        'placeholder'=>'Nama Prestasi']) 
    ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_2',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-gift-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-gift-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_3',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <i class="bi bi-palette-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
            'placeholder'=>'Nama Prestasi']) 
    ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_3',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-palette-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-palette-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_4',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-patch-plus-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
        'placeholder'=>'Nama Prestasi']) 
    ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tanggal_prestasi_4',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-patch-plus-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-patch-plus-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> 
Form Data Prestasi Non-Akademik</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
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
                <i class="bi bi-speedometer text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
            'placeholder'=>'Nama Prestasi Non-Akademik']) 
    ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tanggal_prestasi_non_1',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-speedometer text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-speedometer text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_non_2',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <i class="bi bi-trophy-fill text-muted" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
                'placeholder'=>'Nama Prestasi NonAkademik']) 
    ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tanggal_prestasi_non_2',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-trophy-fill text-muted" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-trophy-fill text-muted" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_non_3',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <i class="bi bi-windows text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
            'placeholder'=>'Nama Prestasi Non Akademik']) 
    ?>
    </div>
    <div class="col-md-4">
<?= $form->field($model, 'tanggal_prestasi_non_3',
    ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-windows text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
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
<?php echo $form->field($model, 'predikat_prestasi_non_3',
    ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-windows text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'nama_prestasi_non_4',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-award-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['maxlength' => true, 
        'placeholder'=>'Nama Prestasi Non Akademik']) 
    ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tanggal_prestasi_non_4',
        ['labelOptions' => ['class' => 'visually-hidden'],'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-award-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
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
    <i class="bi bi-award-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentPrestasiForm::getTingkatPrestasiList(), ['prompt' => 'Pilih Tingkat']);
?>
    </div>
</div>

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
    alert('Data Prestasi Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>