<?php
//view for validate access token
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Verifikasi Akun Calon Mahasiswa Baru';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model_student_token,'verf_code')->textInput(['maxlength'=>true]) ?>
<div class="form-group">
    <?= Html::submitButton('Verifikasi',['class'=>'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>