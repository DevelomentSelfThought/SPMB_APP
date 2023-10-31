<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?> <!-- ActiveForm is a widget -->
    <?= $form->field($model,'name') ?> <!-- $model is an instance of the EntryForm class -->
    <?= $form->field($model, 'email')?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class'=> 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
