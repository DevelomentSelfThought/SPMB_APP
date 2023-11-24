<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Display</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .card-title {
            font-size: 1.5em;
            font-weight: bold;
        }
        .card-text {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1 class="text-center mt-5">Display data from my local server - API</h1>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($data as $item): ?>
                <div class="col-sm-4">
                    <div class="card mb-4 p-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> <?= $item['user_id'] ?></h5>
                            <p class="card-text"><i class="fas fa-id-card"></i> NIK: <?= $item['nik'] ?></p>
                            <p class="card-text"><i class="fas fa-envelope"></i> Email: <?= $item['email'] ?></p>
                            <p class="card-text"><i class="fas fa-phone"></i> No HP: <?= $item['no_HP'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>