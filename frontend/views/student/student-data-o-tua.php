<html lang="">
<title>Update Data Orang Tua</title>
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
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
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
    $title = 'Data Orang Tua';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Data Orang Tua Calon Mahasiswa</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="nama_ayah_kandung" class="col-sm-4 col-form-label">Nama Ayah Kandung</label>
            <div class="col-sm-8">
                <?php echo $form->field($model_student_data_o,'nama_ayah_kandung',
                    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                    <i class="bi bi-stickies-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['placeholder' => 'Contoh: Budi Santoso'])->label(false); 
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_ibu_kandung" class="col-sm-4 col-form-label">Nama Ibu Kandung</label>
            <div class="col-sm-8">
                <?php echo $form->field($model_student_data_o,'nama_ibu_kandung',
                    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
                    <i class="bi bi-tags-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->textInput(['placeholder' => 'Contoh: Siti Nurjanah'])->label(false); 
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o,'nik_ayah',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-arrow-up-circle-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('NIK Ayah')
        ->textInput(['placeholder' => 'Contoh: 1222031606152635']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o,'nik_ibu',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-arrow-up-circle-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('NIK Ibu')
        ->textInput(['placeholder' => 'Contoh: 1222031606152638']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'tanggal_lahir_ayah',
        [ 'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-calendar-date-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>']
        )->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
        ])->textInput(['placeholder'=>'Contoh: 2002-01-31'])->label('Tanggal Lahir Ayah');
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'tanggal_lahir_ibu',
    [ 'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-calendar-day-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>']
        )->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-100:+0',
            ],
            ])->textInput(['placeholder'=>'Contoh: 2002-01-31'])
            ->label('Tanggal Lahir Ibu');
    ?>
    </div>
</div>
<div class="row">
<div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'pendidikan_ayah',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-bandaid-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>']
        )->dropDownList(\app\models\StudentDataOForm::$education, ['prompt' => 'Pilih Pendidikan Ayah']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php
        echo $form->field($model_student_data_o, 'pendidikan_ibu',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-bandaid-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>']
    )->dropDownList(\app\models\StudentDataOForm::$education, ['prompt' => 'Pilih Pendidikan Ibu']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o,'alamat_orang_tua',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-house-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>']
        )->label('Alamat Orang Tua')->textInput(['placeholder' => 'Contoh: Jl. Raya Ciputat No. 1']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php  echo $form->field($model_student_data_o,'kode_pos_orang_tua',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-calendar2-event-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>']
        )->label('Kode Pos')->textInput(['placeholder' => 'Contoh: 15412']); 
?>
    </div>
</div>
<div class="row">
<div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'provinsi',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-geo-alt-fill" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getProvince(), ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown', 'onchange' => 'this-form.submit();']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'kabupaten',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-house-fill" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKabupaten($model_student_data_o->provinsi), ['prompt' => 'Pilih Kabupaten/ Kota', 'onchange' => 'this-form.submit();']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'kecamatan',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-grid-fill" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKecamatan($model_student_data_o->kabupaten), ['prompt' => 'Pilih Kecamatan']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o,'no_hp_orangtua',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-telephone-fill" style="font-size: 1rem;"></i></span>{input}</div>'])->label('No HP Orang Tua')
        ->textInput(['placeholder' => 'Contoh: 081234567890']); 
    ?>
    </div>
</div>
<div class="row">
<div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'pekerjaan_ayah',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-handbag-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentDataOForm::$job, ['prompt' => 'Pilih Pekerjaan Ayah']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'pekerjaan_ibu',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentDataOForm::$job, ['prompt' => 'Pilih Pekerjaan Ibu']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'penghasilan_ayah',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cart-check-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentDataOForm::$salary, ['prompt' => 'Pilih Penghasilan Ayah']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_o, 'penghasilan_ibu',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-cart-plus-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentDataOForm::$salary, ['prompt' => 'Pilih Penghasilan Ibu']);
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
    alert('Data Orang Tua Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>  