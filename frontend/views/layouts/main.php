
<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\models\Student;
use app\models\StudentAkademikForm;
use app\models\StudentDataDiri;
use app\models\StudentDataDiriForm;
use app\models\StudentDataOForm;
use app\models\StudentBahasaForm;
use app\models\StudentBiayaForm;
use app\models\StudentExtraForm;
use app\models\StudentInformasiForm;
use app\models\StudentPrestasiForm;
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
    body {
        background: linear-gradient(to right, #3494E6, #EC6EAD);
    }
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
            padding: 10px 30px; /* Add some padding */
        }
        .navbar-nav .dropdown-menu a:last-child {
            border-bottom: none; /* Remove border for the last item */
        }
        .menu-icon {
            font-size: 0.8em; /* Adjust as needed */
        }
        #footer a {
            color: white;
            text-decoration: none;
        }
        
        #footer a:hover {
            color: #ddd;
        }
        
        #footer .fab {
            margin: 0 10px;
            font-size: 1.5em;
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
if(Yii::$app->user->isGuest){
    $menuItems = [
        ['label' => '<i class="bi bi-person-plus-fill text-success"></i> <span class="nav-label">Buat Akun</span>', 'url' => ['/student/register-student'], 'encode'=>false],
        ['label' => '<i class="bi bi-key-fill text-danger"></i> <span class="nav-label">Lupa Password</span>', 'url' => ['/student/reset-password'], 'encode'=>false],
        ['label' => '<i class="bi bi-person-check-fill text-primary"></i> <span class="nav-label">Aktivasi Akun</span>', 'url' => ['/student/student-token-activate'], 'encode'=>false],
    ];
}
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '<i class="bi bi-person-fill text-success"></i> <span class="nav-label">Masuk ke Akun</span>', 'url' => ['/student/login'], 'encode'=>false];
} else {
    // $menuItems[] = ['label' => str_repeat('&nbsp;', 0), 'url' => '#', 'linkOptions' => ['style' => 'pointer-events: none;'], 'encode' => false];
    $icon = StudentDataDiriForm::isFillDataPribadi() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_tua = StudentDataOForm::isFillDataOTua() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>'; 
    $icon_akademik = StudentAkademikForm::isFillDataAkademik() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_bahasa  = StudentBahasaForm::isFillDataBahasa() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_extra = StudentExtraForm::isFillDataExtra() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_prestasi = StudentPrestasiForm::isFillDataPrestasi() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_informasi  = StudentInformasiForm::isFillDataInformasi() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $icon_biaya = StudentBiayaForm::getStatusPembayaran() ? '<i class="bi bi-check-circle-fill text-success menu-icon position-absolute" style="right: 10px;"></i>' : '<i class="bi bi-exclamation-triangle-fill text-danger menu-icon position-absolute" style="right: 10px;"></i>';
    $menuItems[] = [
        'label' => '<i class="bi bi-pencil-square text-danger"></i> <span class="nav-label">Update Data</span>', 
        'url' => ['/student/student-data-diri'], 
        'encode' => false,
        'items' => [
            ['label' => '<i class="bi bi-tags-fill menu-icon"></i> Data Pribadi'.$icon, 'url' => '/student/student-data-diri', 'encode'=>false],
            ['label' => '<i class="bi bi-people-fill menu-icon"></i> Data Orang Tua'.$icon_tua, 'url' => '/student/student-data-o-tua', 'encode'=>false],
            ['label' => '<i class="bi bi-person-lines-fill menu-icon"></i> Data Akademik'. $icon_akademik, 'url' => '/student/student-akademik','encode'=>false],
            ['label' => '<i class="bi bi-file-earmark-plus-fill menu-icon"></i> Data Bahasa'. $icon_bahasa, 'url' => '/student/student-bahasa', 'encode'=>false],
            ['label' => '<i class="bi bi-pin-fill menu-icon"></i> Data Ekstrakurikuler'. $icon_extra, 'url' => '/student/student-extra', 'encode'=>false],
            ['label' => '<i class="bi bi-trophy-fill menu-icon"></i> Data Prestasi'. $icon_prestasi, 'url'=>'/student/student-prestasi','encode'=>false],
            ['label' => ' <i class="bi bi-webcam-fill menu-icon"></i> Data Informasi PMB'. $icon_informasi, 'url'=>'/student/student-informasi', 'encode'=>false],
            ['label' => '<i class="bi bi-wallet-fill menu-icon"></i> Data Biaya dan VA'. $icon_biaya, 'url'=>'/student/student-biaya','encode'=>false],

        ]
    ];
    $menuItems[] = ['label' => '<i class="bi bi-megaphone text-primary"></i> <span class="nav-label">Pengumuman</span>', 
    'url' => ['/student/student-announcement'], 
    'encode' => false];
    // $menuItems[] = ['label' => '<i class="bi bi-key-fill"></i> <span class="nav-label">Ubah Password</span>', 'url' => ['/student/change-password'], 'encode'=>false];

    $menuItems[] = ['label' => '<i class="bi bi-box-arrow-right text-success"></i> 
                    <span class="nav-label">Logout (' . Yii::$app->user->identity->email . ')</span>', 
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
<br>
<footer id="footer" class="mt-auto py-3 bg-dark text-white"> <!-- changed to dark -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>SPMB App - IT Del</h5>
                <ul class="list-unstyled text-white"> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Product</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Features</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Enterprise</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Support</a></li> <!-- changed to white -->
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Resources</h5>
                <ul class="list-unstyled text-white"> <!-- changed to white -->
                    <li><a class="text-white" href="#">FAQ SPMB</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="#">Dashboard</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="#">Forgot Password</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="#">Registration</a></li> <!-- changed to white -->
                </ul>
            </div>
            <div class="col-md-3">
                <h5>About</h5>
                <ul class="list-unstyled text-white"> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Team</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Locations</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Privacy</a></li> <!-- changed to white -->
                    <li><a class="text-white" href="https://github.com/MichaelSipayung">Terms</a></li> <!-- changed to white -->
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-end">
                <h5>&copy <?= date('Y')?> Michael Sipayung</h5>
                <div>
                    <a href="https://github.com/MichaelSipayung"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/MichaelSipayung"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/MichaelSipayung"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/MichaelSipayung"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div> 
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
