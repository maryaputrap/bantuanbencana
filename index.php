<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Donasi Yuk</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded">
                    <img src="img/donate.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lokasi Bencana Alam</h5>
                        <hr>
                        <p class="card-text">Daftar Lokasi Bencana Alam Ada Disini, Mari Bantu Mereka!</p>
                    </div>
                    <a href="lokasi" class="btn btn-primary">Lokasi Donasi Bencana Alam</a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded">
                    <img src="img/userdonate.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">User Donasi</h5>
                        <hr>
                        <p class="card-text">Jadilah Donatur Untuk Korban Bencana Alam!</p>
                    </div>
                    <a href="user" class="btn btn-primary">User Donasi Bencana Alam</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>