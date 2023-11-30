<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
$title  = 'Announcement Page';
?>
<h1 style="text-align: center; color: white;" class="text-center my-5">Pengumuman SPMB IT Del</h1>    

<?php
$cards = [
    'Identitas Peserta PMB' => [
        'icon' => 'fas fa-user',
        'details' => [
            'Nama' => 'fas fa-id-card',
            'Gelombang pendaftaran' => 'fas fa-wave-square',
            'Program studi pilihan utama' => 'fas fa-book',
            'Program studi pilihan opsional' => 'fas fa-book-open'
        ]
    ],
    'Status Pendaftaran Peserta' => [
        'icon' => 'fas fa-info-circle',
        'details' => [
            'Status pendaftaran' => 'fas fa-check-circle',
            'Tes selanjutnya' => 'fas fa-calendar-check',
            'Jadwal pelaksanaan' => 'fas fa-clock',
            'Tempat' => 'fas fa-map-marker-alt'
        ]
    ],
    'Identitas Peserta Ujian' => [
        'icon' => 'fas fa-user-check',
        'details' => [
            'Username' => 'fas fa-user',
            'Password' => 'fas fa-key',
            'Keterangan' => 'fas fa-exclamation-circle'
        ]
    ]
];
?>

<div class="row">
    <?php foreach ($cards as $header => $card): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="<?= $card['icon'] ?>"></i>
                    <?= $header ?>
                </div>
                <div class="card-body text-dark">
                    <table class="table">
                        <?php foreach ($card['details'] as $detail => $icon): ?>
                            <tr>
                                <td><i class="<?= $icon ?>"></i> <?= $detail ?></td>
                                <td>:</td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>