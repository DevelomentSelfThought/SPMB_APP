<?php
use yii\base\Widget;
use yii\bootstrap5\Button;
use yii\bootstrap5\ButtonGroup;
?>
<html>
<style>
    .my-button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
    }

    .my-button {
        background-color: #4b6cb7;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .my-button:hover {
        background-color: #182848;
        color: #fff;

    }

    .my-button.active {
        background-color: #b09003;
        color: white;
    }
</style>
</html>
<?php
    echo  ButtonGroup::widget([
            'options' => ['class' => 'my-button-group'],
            'buttons' => [
                Button::widget(['label' => 'Data Pribadi', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-data-diri"']]),
                Button::widget(['label' => 'Data Orangtua', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-data-o-tua"']]),
                Button::widget(['label' => 'Data Akademik', 'options' => ['class' => 'my-button', 'onclick' => 'location.href="/task3"']]),
                Button::widget(['label' => 'Bahasa', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-extra"']]),
                Button::widget(['label' => 'Ekstrakurikuler', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-extra"']]),
                Button::widget(['label' => 'Prestasi', 'options' => ['class' => 'my-button', 'onclick' => 'location.href="/task6"']]),
                Button::widget(['label' => 'Informasi Del', 'options' => ['class' => 'my-button', 'onclick' => 'location.href="/task7"']]),
                Button::widget(['label' => 'Biaya dan VA', 'options' => ['class' => 'my-button', 'onclick' => 'location.href="/task8"']]),
                Button::widget(['label' => 'Pengumuman', 'options' => ['class' => 'my-button', 'onclick' => 'location.href="/task9"']]),
            ],
        ]);
?>

