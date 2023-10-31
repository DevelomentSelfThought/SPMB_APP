<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1> Countries </h1>
<ul>
    <?php foreach ($countries as $country):?> <!-- $countries is an array of Country objects -->
    <li>
        <?= Html::encode("{$country->code} ({$country->name})") ?>:
        <?= $country->population ?>  <!-- $country->name is a property of the Country class -->
    </li>
    <?php endforeach; ?> <!-- endforeach is a PHP keyword -->
</ul>
<!-- $pagination is an object of the Pagination class -->
<?= LinkPager::widget(['pagination'=>$pagination])?>