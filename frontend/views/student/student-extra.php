<!--include boostrap icon css here-->
<html lang="">
<title> Update Data Extrakurikuler </title>
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
//this is view file for student extra activity information form
    use yii\helpers\Html;
    use yii\bootstrap5\ActiveForm;
$title = 'Pengalaman Organisasi';
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
$title_extra  = "Data Pendidikan Ekstrakurikuler";
?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Data Kegiatan Ekstrakurikuler</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
    <div class="row">
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Nama Kegiatan</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Mulai</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Berakhir</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Predikat</b><br><br>"); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_kegiatan_1',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true, 
        'placeholder'=>'Nama Kegiatan']) 
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_1',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd'])
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_1_end',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd'])
    ?>
    </div>
    <div class="col-md-3">
    <?php
        echo $form->field($model_student_extra, 'predikat_kegiatan_1',
        ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cpu-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$predikat, ['prompt' => 'Predikat']);
        ?>
    </div>
</div>


<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_kegiatan_2',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-easel2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true, 'placeholder'=>'Nama Kegiatan']) 
    ?>    
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_2',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-easel2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd']) 
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_2_end',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-easel2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd']) 
    ?>
    </div>
    <div class="col-md-3">
    <?php
    echo $form->field($model_student_extra, 'predikat_kegiatan_2',
        ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-easel2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$predikat, ['prompt' => 'Predikat']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_kegiatan_3',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-megaphone-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true, 'placeholder'=>'Nama Kegiatan']) 
    ?>   
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_3',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-megaphone-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd']) 
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_3_end',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-megaphone-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd']) 
    ?>
    </div>
    <div class="col-md-3">
    <?php
        echo $form->field($model_student_extra, 'predikat_kegiatan_3',
        ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-megaphone-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$predikat, ['prompt' => 'Predikat']);
    ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_kegiatan_4',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true, 'placeholder'=>'Nama Kegiatan']) 
    ?>    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_4',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd'])
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_kegiatan_4_end',
        ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->textInput(['maxlength' => true])
        ->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
        ])->textInput(['placeholder'=>'yyyy-mm-dd'])
    ?>
    </div>
    <div class="col-md-3">
    <?php
        echo $form->field($model_student_extra, 'predikat_kegiatan_4',
        ['labelOptions' => ['class' => 'visually-hidden'], 'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$predikat, ['prompt' => 'Predikat']);
    ?>
    </div>
</div>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Data Pengalaman Organisasi</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
    <div class="row">
        <div class="col-md-3">
            <?php echo \yii\bootstrap5\Html::label("<b>Nama Organisasi</b><br><br>"); ?>
        </div>
        <div class="col-md-3">
            <?php echo \yii\bootstrap5\Html::label("<b>Mulai</b><br><br>"); ?>
        </div>
        <div class="col-md-3">
            <?php echo \yii\bootstrap5\Html::label("<b>Berakhir</b><br><br>"); ?>
        </div>
        <div class="col-md-3">
            <?php echo \yii\bootstrap5\Html::label("<b>Jabatan</b><br><br>"); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        <?= $form->field($model_student_extra, 'nama_organisasi_1',
            ['labelOptions' => ['class' => 'visually-hidden'],
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-chat-square-dots-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->textInput(['maxlength' => true, 
            'placeholder'=>'Nama Organisasi']) 
        ?>
        </div>
        <div class="col-md-3">
        <?= $form->field($model_student_extra, 'tanggal_organisasi_1',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-chat-square-dots-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->textInput(['maxlength' => true])
            ->widget(\yii\jui\DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '-100:+0',
                ],
            ])->textInput(['placeholder'=>'yyyy-mm-dd'])
        ?>
        </div>
        <div class="col-md-3">
        <?= $form->field($model_student_extra, 'tanggal_organisasi_1_end',
            ['labelOptions' => ['class' => 'visually-hidden'],
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-chat-square-dots-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->textInput(['maxlength' => true])
            ->widget(\yii\jui\DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '-100:+0',
                ],
            ])->textInput(['placeholder'=>'yyyy-mm-dd'])
        ?>
        </div>
        <div class="col-md-3">
        <?php
            echo $form->field($model_student_extra, 'jabatan_organisasi_1',
            ['labelOptions' => ['class' => 'visually-hidden'], 
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-chat-square-dots-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
            ->dropDownList(\app\models\StudentExtraForm::$jabatan, ['prompt' => 'Jabatan']);
        ?>
        </div>
    </div>


<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_organisasi_2',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-camera-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true, 'placeholder'=>'Nama Organisasi']) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_2',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-camera-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_2_end',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-camera-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])?>
    </div>
    <div class="col-md-3">
    <?php echo $form->field($model_student_extra, 'jabatan_organisasi_2',
        ['labelOptions' => ['class' => 'visually-hidden'], 
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-camera-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$jabatan, ['prompt' => 'Jabatan']);
    ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_organisasi_3',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-apple text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true, 'placeholder'=>'Nama Organisasi']) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_3',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-apple text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])
?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_3_end',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-apple text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])?>
    </div>
    <div class="col-md-3">
    <?php echo $form->field($model_student_extra, 'jabatan_organisasi_3',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-apple text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentExtraForm::$jabatan, ['prompt' => 'Jabatan']);
?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'nama_organisasi_4',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-archive-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true, 'placeholder'=>'Nama Organisasi']) ?>    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_4',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-archive-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model_student_extra, 'tanggal_organisasi_4_end',
    ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-archive-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->textInput(['maxlength' => true])
    ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
    ])->textInput(['placeholder'=>'yyyy-mm-dd'])?>
    </div>
    <div class="col-md-3">
    <?php echo $form->field($model_student_extra, 'jabatan_organisasi_4',
        ['labelOptions' => ['class' => 'visually-hidden'],
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-archive-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentExtraForm::$jabatan, ['prompt' => 'Jabatan']);
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
    alert('Data Extrakurikuler Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>