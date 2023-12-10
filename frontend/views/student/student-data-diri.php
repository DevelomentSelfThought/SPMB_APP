<html lang="">
<title>Update Data Diri</title>
<head>
<link href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
</head>
<body>
<?php
//this page is intended to be used as a view for student personal information (data diri)
// Path: views/student/student-data-diri.php
// current status is experimental, need more improvement with the design

use app\models\StudentDataDiri;
use app\models\StudentDataDiriForm;
use app\models\StudentMajorForm;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
use yii\bootstrap5\Modal;
$title  = 'Data Diri Mahasiswa';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin([
    'id' => 'myForm',
    'layout' => 'horizontal', 
    'options' => ['class' => 'my-form', 'enctype' => 'multipart/form-data']
]); ?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i> <span class="text-primary fw-bold">Form Data Pribadi Calon Mahasiswa</span>', ['class' => 'my-3 p-2 border-bottom']) ?> 
<div class="row">
    <div class="col-md-6">
    <?php echo $form->field($model_student_data_diri,'nama', [
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-stickies-fill" style="font-size: 1rem;"></i></span>{input}</div>',
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label']
        ])->label('Nama Lengkap')->textInput(['placeholder'=>'Contoh: John Doe']); 
    ?>
    <?php echo $form->field($model_student_data_diri, 'agama_id', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-server" style="font-size: 1rem;"></i></span>{input}</div>',
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-3 control-label']
    ])
    ->dropDownList(\app\models\StudentDataDiriForm::$relegion, ['prompt' => 'Pilih Agama'])
    ->label("Agama");
    ?>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'nik',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-geo-alt-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])->label('NIK')->input('number')
        ->textInput(['placeholder' => 'Contoh: 1222031606152635',
        'value'=>StudentDataDiriForm::getNikUser(), 'readonly'=>true])
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'nisn',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-patch-plus-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])->label('NISN')->input('number')
        ->textInput(['placeholder' => 'Contoh: 0103292820']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'no_kps',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-gear-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])->label('KPS')->input('number')->textInput(['placeholder'=>'Masukan nomor KPS (bagi penerima KPS)']); 
    ?>    
    </div>
    <div class="col-12 col-md">    
    <?php
        echo $form->field($model_student_data_diri, 'tanggal_lahir',
            [
                'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
                'inputTemplate' => '<div class="input-group"><span class="input-group-text">
                <i class="bi bi-calendar3 text-success" style="font-size: 1rem;"></i></span>{input}</div>'])
                ->widget(\yii\jui\DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '-100:+0',
                ],
            ])->label('Tanggal Lahir')->textInput(['placeholder'=>'Contoh: 2000-01-23']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'tempat_lahir',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-house-fill text-success" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Tempat Lahir')->textInput(['placeholder'=>'Contoh: Jakarta']);; 
    ?>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri, 'jenis_kelamin',
        ['template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-tags-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->dropDownList(\app\models\StudentDataDiriForm::$gen, ['prompt' => 'Pilih Jenis Kelamin']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'alamat',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-xbox text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Alamat')->textInput(['placeholder'=>'Contoh: Jl. Jend. Sudirman No. 1']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'kelurahan',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-stack text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Kelurahan')->textInput(['placeholder'=>'Contoh: Karet Semanggi']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'email',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-envelope-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])->label('Email')
        ->textInput(['placeholder'=>'@gmail.com, @yahoo.com', 
        'value'=>StudentDataDiriForm::getEmailUser(), 'readonly'=>true]); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri, 'provinsi',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-signpost-2-fill text-primary" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getProvince(), 
        ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown', 'onchange' => 'this.form.submit();']);
        //bug fixes for generating provinsi and populate kabupaten, onchange event is used to submit form
        ?>
    </div>
</div>    

<div class="row">
    <div class="col-12 col-md">
    <?php
        echo $form->field($model_student_data_diri, 'kabupaten',
        [
        'template' => '{label}<div class="input-group">{input}</div>',    
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-map-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKabupaten($model_student_data_diri->provinsi), 
        ['prompt' => 'Pilih Kabupaten', 'id' => 'kabupaten-dropdown', 'onchange' => 'this.form.submit();']);
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'alamat_kecamatan',
        [
        'template' => '{label}<div class="input-group">{input}</div>',    
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-signpost-2-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKecamatan($model_student_data_diri->kabupaten), 
        ['prompt' => 'Pilih Kecamatan'/*, 'id' => 'kecamatan-dropdown', 'onchange' => 'this.form.submit();'*/])
        ->label("Kecamatan");
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'kode_pos',
        [   
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-geo-alt-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->label('Kode Pos')->input('number',['placeholder' => 'Contoh: 20154']); 
    ?>
    </div>
    <div class="col-12 col-md">
    <?php echo $form->field($model_student_data_diri,'no_telepon_rumah',
        [   'template' => '{label}<div class="input-group">{input}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
            <i class="bi bi-telephone-inbound-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->label('Telepon')
        ->textInput(['placeholder'=>'Contoh: 62 21 80643104']); 
    ?>
    </div>
    <div class="col-12 col-md">        
    <?php echo $form->field($model_student_data_diri,'no_telepon_mobile',
        [
        'template' => '{label}<div class="input-group">{input}</div>',   
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <i class="bi bi-send-check-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
        ->label('Whatsapp')
        ->textInput(['placeholder' => 'Contoh: 081234567890',
        'value'=>StudentDataDiriForm::getWaUser(), 'readonly'=>true]); 
    ?>
    </div>

</div>
<div class="form-group" style="display: flex; justify-content: flex-end;">
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-primary', 'style' => 'margin-right: 10px;']) ?>
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'id' => 'my-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
<!-- modal for choosing major and current available .... -->

<?php
if(!StudentMajorForm::isFilledMajor()) {
    $this->registerJs(
        '
        $("#programModal").modal("show");
        $("#closeModalAndFocusForm").on("click", function() {
            $("#programModal").modal("hide");
            $(".my-form").focus();
        });
        ',
        $this::POS_READY
    );

    Modal::begin([
        'id' => 'programModal',
        'options' => [
            'class' => 'fade modal-dialog-centered',
            'data-bs-backdrop' => 'static',
            'data-bs-keyboard' => 'false',
        ],        'closeButton' => false,
    ]);
?>
<div class="modal-header" style="background-color: #f8f9fa;">
    <h2 style="color: #0093ad;" class="text-start">Pilih Program Studi</h2>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="modal-body">
    <div class="mb-3">
        <label for="waveSelect" class="form-label">
            <i class="bi bi-calendar-event-fill me-2"></i>Silahkan Pilih Gelombang Pendaftaran
        </label>
        <?= $form->field($model_student_major, 'gelombang')
            ->dropDownList(StudentMajorForm::getBatchList(),
            ['prompt' => 'Pilih Gelombang Pendaftaran']
        )->label(false) ?>
    </div>
    <hr> <!-- Horizontal rule -->
    <div class="mb-3">
        <label for="majorSelect" class="form-label">
            <i class="bi bi-person-lines-fill me-2 text-danger"></i>Silahkan Pilih Jurusan yang Anda Inginkan
        </label>
        <?= $form->field($model_student_major, 'jurusan_main')
            ->dropDownList(StudentMajorForm::getMajorList(),
            ['prompt' => 'Pilih Jurusan Utama']
        )->label(false) ?>
    </div>
    <div class="mb-3">
        <label for="optionalMajorSelect" class="form-label">
            <i class="bi bi-book-half me-2 text-primary"></i>Pilih Jurusan Opsional I
        </label>
        <?= $form->field($model_student_major, 'jurusan_opsional')
            ->dropDownList(StudentMajorForm::getMajorList(),
            ['prompt' => 'Pilih Jurusan Opsional']
        )->label(false) ?>
    </div>
    <div class="mb-3">
        <label for="optionalMajorSelect" class="form-label">
            <i class="bi bi-bookmark-heart me-2 text-primary"></i>Pilih Jurusan Opsional II
        </label>
        <?= $form->field($model_student_major, 'jurusan_opsional2')
            ->dropDownList(StudentMajorForm::getMajorList(),
            ['prompt' => 'Pilih Jurusan Opsional']
        )->label(false) ?>
    </div>
    <hr> <!-- Horizontal rule -->
    <!-- for upload pas photo -->
    <div class="mb-3">
        <label for="pasPhoto" class="form-label">
            <i class="bi bi-upload me-2"></i>Upload Pas Photo
        </label>
        <?= $form->field($model_student_major, 'file_photo')->fileInput()->label(false) ?>
    </div>
</div>
<div class="modal-footer">
    <?= Html::submitButton('<i class="bi bi-check-circle" style="font-size: 1.2rem;"></i> Simpan', ['class' => 'btn btn-primary w-100']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php Modal::end(); 
}
?>


</body>
</html>

<?php
$script = <<< JS
$('.my-form').on('beforeSubmit', function(event) {
    event.preventDefault();

    // Show the alert
    alert('Data Diri Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>