<?php
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
?>

<?= AutoComplete::widget([
    'name' => 'sekolah',
    'clientOptions' => [
        'source' => new JsExpression("function(request, response) {
            $.getJSON('" . Url::to(['student/autocomplete']) . "', {
                term: request.term
            }, response);
        }"),
        'minLength' => '2',
    ],
    'options' => [
        'class' => 'form-control',
        'placeholder' => 'Search...',
    ]
]) ?>