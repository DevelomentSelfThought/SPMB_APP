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
include 'TaskNavigation.php';
?>
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
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Nama Prestasi</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Tahun</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Tingkat</b><br><br>"); ?>
    </div>
    <div class="col-md-3">
        <?php echo \yii\bootstrap5\Html::label("<b>Predikat</b><br><br>"); ?>
    </div>
</div>
<br>
<div class="form-group" style="display: flex; justify-content: flex-end;">
    <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary','style' => 'background-color: #fff; color: #333; margin-right: 10px; width: 100px;']) ?>
    <?=  Html::submitButton('Simpan', ['class' => 'btn btn-primary','style' => 'background-color: #fff; color: #333; width: 100px;']) ?>
</div>

<?php ActiveForm::end(); ?>