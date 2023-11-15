<!DOCTYPE html>
<head>
</head>
<body>
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Announcement Page';
?>
<div class="container">
    <h1 class="text-center my-5">Announcement-Under Construction!!</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $model->name ?></h5> <!-- Replace with your actual attribute -->
            <p class="card-text">Congratulations, <?= $model->name ?>, you have passed the test!</p> <!-- Replace with your actual attribute -->
            <p><strong>More Information:</strong></p>
            <p><strong>Email:</strong> <?= $model->name ?></p> <!-- Replace with your actual attribute -->
            <p><strong>Phone:</strong> <?= $model->name ?></p> <!-- Replace with your actual attribute -->
        </div>
    </div>
</div>
</body>
</html>