
<?php

/** @var yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <!-- Other head elements... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
    $this->registerCss("
        .my-navbar {
            padding: 1.2rem 1.2rem !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }
        .bi {
            font-size: 1.5em; /* Adjust size as needed */
        }
        .nav-label {
            font-size: 1.3em; /* Adjust size as needed */
        }
        .logo {
            height: 40px;
            margin-right: 10px;
        }
        main{
            text-align: left !important;
        }
        .navbar-nav .dropdown-menu a {
            border-bottom: 1px solid #ddd; /* Add border at the bottom */
            padding: 10px 20px; /* Add some padding */
        }
        .navbar-nav .dropdown-menu a:last-child {
            border-bottom: none; /* Remove border for the last item */
        }
        
    ");
    ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
<?php     
NavBar::begin([
    'brandLabel' => '<img src="/bground/itdel.jpg" class="logo"> ' . Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-light bg-light my-navbar', // changed to light theme
    ],
]);

$menuItems = [
    ['label' => '<i class="bi bi-person-plus-fill"></i> <span class="nav-label">Daftar Akun</span>', 'url' => ['/student/register-student'], 'encode'=>false],
];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '<i class="bi bi-person-fill"></i> <span class="nav-label">Masuk ke Akun</span>', 'url' => ['/student/login'], 'encode'=>false];
} else {
    // $menuItems[] = ['label' => str_repeat('&nbsp;', 0), 'url' => '#', 'linkOptions' => ['style' => 'pointer-events: none;'], 'encode' => false];
    $menuItems[] = [
        'label' => '<i class="bi bi-pencil-square"></i> <span class="nav-label">Update Data</span>', 
        'url' => ['/student/student-data-diri'], 
        'encode' => false,
        'items' => [
            ['label' => 'Data Pribadi', 'url' => '/student/student-data-diri'],
            ['label' => 'Data Orang Tua', 'url' => '/student/student-data-o-tua'],
            ['label' => 'Data Akademik', 'url' => '/student/student-akademik'],
            ['label' => 'Data Bahasa', 'url' => '/student/student-bahasa'],
            ['label' => 'Data Ekstrakurikuler', 'url' => '/student/student-extra'],
            ['label' => 'Data Prestasi', 'url'=>'/student/student-prestasi'],
            ['label' => 'Data Sumber Informasi', 'url'=>'/student/student-informasi'],
            ['label' => 'Data Biaya dan VA', 'url'=>'/student/student-biaya'],

        ]
    ];
    $menuItems[] = ['label' => '<i class="bi bi-megaphone"></i> <span class="nav-label">Pengumuman</span>', 
    'url' => ['/student/student-pengumuman'], 
    'encode' => false];
    $menuItems[] = ['label' => '<i class="bi bi-box-arrow-right"></i> <span class="nav-label">Logout (' . Yii::$app->user->identity->username . ')</span>', 
                    'url' => ['/site/logout'], 
                    'linkOptions' => ['data-method' => 'post'], 
                    'encode' => false];
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems
]);

NavBar::end();
?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-white"> <!-- changed to white -->
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start"> SPMB App - IT Del </div>
            <div class="col-md-6 text-center text-md-end"> &copy <?= date('Y')?> Michael Sipayung </div> 
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
