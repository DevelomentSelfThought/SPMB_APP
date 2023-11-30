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
</style>
</html>
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Data Informasi Mahasiswa Baru';
?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Informasi Perkiraan Biaya Daftar Ulang</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<?php 
    echo $form->field($model, 'jumlah_n',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-bag-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentInformasiForm::$get_jumlah_n, 
    ['prompt' => 'Pilih Jumlah N', 'onchange' => 'this.form.submit();', 'options' => [0 => ['Selected'=>'selected']]])
    ->label("Jumlah N");
?>
<br>
<?php 
//data to fetch to the table below
if(!is_numeric($model->jumlah_n)) { //prevent user choose non numeric value
    $model->jumlah_n = 0;
} 
$total_if=$model->jumlah_n * 1000000+ $model->jumlah_n * 9500000+ $model->jumlah_n * 100000+
$model->jumlah_n * 100000 + $model->jumlah_n * 100000;
$total_tk=$model->jumlah_n * 1000000+ $model->jumlah_n * 6500000+ $model->jumlah_n * 100000+
$model->jumlah_n * 100000+$model->jumlah_n * 100000;
$total_bi=$model->jumlah_n * 1000000+ $model->jumlah_n * 9500000+ $model->jumlah_n * 100000+
$model->jumlah_n * 100000 +$model->jumlah_n * 100000;
$data  =  [
    ['Jurusan','Pembangunan Dinamis','Pembangunan Tetap','SPP Tahap 1','Perlengkapan Mahasiswa','Perlengkapan Makan','Total Biaya'],
    //array contain multiplication of jumlah_n and the value below, jumlah_n *1000000 for index[1,1]
    ['S1-informatika', $model->jumlah_n * 1000000, $model->jumlah_n * 9500000, $model->jumlah_n * 100000,$model->jumlah_n * 100000,
    $model->jumlah_n * 100000 , $total_if],
    ['D3-Teknologi Komputer', $model->jumlah_n * 1000000, $model->jumlah_n * 6500000, $model->jumlah_n * 100000,$model->jumlah_n * 100000,
    $model->jumlah_n * 100000, $total_tk],
    ['S1-Teknik Bioproses', $model->jumlah_n * 1000000, $model->jumlah_n * 9500000, $model->jumlah_n * 100000,$model->jumlah_n * 100000,
    $model->jumlah_n * 100000, $total_bi]
];
?>    
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead style="background-color: #007bff !important; color: white !important;">
            <?php for($i = 0; $i < 1; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < 7; $j++): ?>
                        <th style="background-color: #007bff !important; color: white !important;"><?= $data[$i][$j] ?></th>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </thead>
        <tbody>
            <?php for($i = 1; $i < 4; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < 7; $j++): ?>
                        <td class="text-dark">
                            <?php 
                            // Check if the data is numeric
                            if(is_numeric($data[$i][$j])) {
                                // Format the number as Indonesian currency
                                echo 'Rp. ' . number_format($data[$i][$j], 0, ',', '.');
                            } else {
                                echo $data[$i][$j];
                            }
                            ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
<?= Html::tag('div', '<i class="bi bi-server text-primary" style="font-size: 1rem;"></i><span class="text-primary fw-bold"> Form Sumber Informasi Penerimaan Mahasiswa Baru</span>', ['class' => 'my-3 p-2 border-bottom']) ?>    
<?php
    echo $form->field($model, 'sumber_informasi',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-info-circle-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentInformasiForm::getSumberInformasi(), ['prompt' => 'Pilih Sumber Informasi SPMB'])
    ->label("Sumber Informasi SPMB");
?>
<?php
    echo $form->field($model, 'motivasi',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <i class="bi bi-lightbulb-fill text-danger" style="font-size: 1rem;"></i></span>{input}</div>'])
    ->dropDownList(\app\models\StudentInformasiForm::$get_motivasi, ['prompt' => 'Pilih Motivasi Kuliah di IT Del'])
    ->label("Motivasi Kuliah di IT Del");
?>

<?php
//*$form->field($model, 'agree')->checkbox(['label' => 'Saya menyatakan bahwa saya telah memberikan data yang valid.']) 
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
    alert('Data Informasi Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>