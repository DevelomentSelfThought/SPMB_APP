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
include 'TaskNavigation.php';
?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<span>Form Informasi Penerimaan Mahasiswa Baru</span>', ['class' => 'ruler']) ?>
    <?php
        echo $form->field($model, 'sumber_informasi',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4-fill" viewBox="0 0 16 16">
        <path d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h4v.5a.5.5 0 0 0 1 0V7h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2Zm1 2a1 1 0 0 0-2 0h2Zm-4 9v2h6v-2h-1v.5a.5.5 0 0 1-1 0V11H5Z"/>
        <path d="M14 7.599A2.986 2.986 0 0 1 12.5 8H9.415a1.5 1.5 0 0 1-2.83 0H3.5A2.986 2.986 0 0 1 2 7.599V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.599ZM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-3Z"/>
        </svg></span>{input}</div>'])->dropDownList(\app\models\StudentInformasiForm::getSumberInformasi(), 
        ['prompt' => 'Pilih Sumber Informasi SPMB'])
        ->label("Sumber Informasi SPMB");
    ?>
    <?php
        echo $form->field($model, 'motivasi',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
        <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
        </svg></span>{input}</div>'])->dropDownList(\app\models\StudentInformasiForm::$get_motivasi, 
        ['prompt' => 'Pilih Motivasi Kuliah di IT Del'])
        ->label("Motivasi Kuliah di IT Del");
    ?>
    <br>
    <?= Html::tag('div', '<span>Form Informasi Perkiraan Biaya Daftar Ulang</span>', ['class' => 'ruler']) ?>
    <?php
    echo $form->field($model, 'jumlah_n',
    ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4-fill" viewBox="0 0 16 16">
    <path d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h4v.5a.5.5 0 0 0 1 0V7h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2Zm1 2a1 1 0 0 0-2 0h2Zm-4 9v2h6v-2h-1v.5a.5.5 0 0 1-1 0V11H5Z"/>
    <path d="M14 7.599A2.986 2.986 0 0 1 12.5 8H9.415a1.5 1.5 0 0 1-2.83 0H3.5A2.986 2.986 0 0 1 2 7.599V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.599ZM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-3Z"/>
    </svg></span>{input}</div>'])->dropDownList(\app\models\StudentInformasiForm::$get_jumlah_n, 
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
        <thead class="thead-dark">
            <?php for($i = 0; $i < 1; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < 7; $j++): ?>
                        <th><?= $data[$i][$j] ?></th>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </thead>
        <tbody>
            <?php for($i = 1; $i < 4; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < 7; $j++): ?>
                        <td>
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
<br>

<?= $form->field($model, 'agree')->checkbox(['label' => 'Saya menyatakan bahwa saya telah memberikan data yang valid.']) ?>
<br>
<div class="form-group" style="display: flex; justify-content: flex-end;">
    <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary','style' => 'background-color: #fff; color: #333; margin-right: 10px; width: 100px;']) ?>
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'style' => 'background-color: #fff; color: #333; width: 100px;', 'id' => 'my-button']) ?>
</div>
<?php ActiveForm::end(); ?>
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