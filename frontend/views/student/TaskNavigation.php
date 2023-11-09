<?php
use yii\bootstrap5\Nav;
use yii\base\Widget;
use yii\bootstrap5\Button;
use yii\bootstrap5\ButtonGroup;
use yii\bootstrap5\Progress;
?>
<html>

<style>
    .my-button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* background-image: linear-gradient(to right, #000 50%, transparent 50%), linear-gradient(to right, #000 50%, #fff 50%); */
        /* background-size: 10px 1px, 20px 1px; */
        /* background-position: bottom left, bottom left; */
        /* background-repeat: repeat-x; */
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    .my-button {
        background-color: #fff;
        color: #000;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .my-button:hover {
        background-color: #f2f2f2;
        color: #000;
        transform: scale(1.05);
    }

    .my-button.active {
        background-color: #000;
        color: #fff;
    }
    .my-navbar {
        padding: 0.5rem 0.5rem;  
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }
</style>
</html>


<?php

echo  ButtonGroup::widget([
            'options' => ['class' => 'my-button-group my-navbar'],
            'buttons' => [
                Button::widget(['label' => 'Data Pribadi', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-data-diri"']]),
                Button::widget(['label' => 'Data Orangtua', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-data-o-tua"']]),
                Button::widget(['label' => 'Data Akademik', 'options' => ['class' => 'my-button', 
                'onclick' => 'location.href="/student/student-akademik"']]),
                Button::widget(['label' => 'Bahasa', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-bahasa"']]),
                Button::widget(['label' => 'Ekstrakurikuler', 'options' => ['class' => 'my-button',
                'onclick' => 'location.href="/student/student-extra"']]),
                Button::widget(['label' => 'Prestasi', 'options' => ['class' => 'my-button', 
                'onclick' => 'location.href="/student/student-prestasi"']]),
                Button::widget(['label' => 'Informasi Del', 'options' => ['class' => 'my-button', 
                'onclick' => 'location.href="/student/student-informasi"']]),
                Button::widget(['label' => 'Biaya dan VA', 'options' => ['class' => 'my-button', 
                'onclick' => 'location.href="/student/student-biaya"']]),
                /*Button::widget(['label' => 'Pengumuman', 'options' => ['class' => 'my-button', 
                'onclick' => 'location.href="/student/student-pengumuman"']]),*/
            ],
        ]);
    echo "<br>";
?>

