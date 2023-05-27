<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Siakad - Halaman Utama</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Siakad</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="matakuliah/index.php">Matakuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="dosen/index.php">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="mahasiswa/index.php">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Selamat Datang di Siakad</h1>

        <?php
        // Menghubungkan ke file koneksi database
        require_once 'koneksi.php';

        // Mengambil data matakuliah
        $query_matakuliah = "SELECT * FROM matakuliah";
        $result_matakuliah = $koneksi->query($query_matakuliah);
        $jumlah_matakuliah = $result_matakuliah->num_rows;

        // Mengambil data dosen
        $query_dosen = "SELECT * FROM dosen";
        $result_dosen = $koneksi->query($query_dosen);
        $jumlah_dosen = $result_dosen->num_rows;

        // Mengambil data mahasiswa
        $query_mahasiswa = "SELECT * FROM mahasiswa";
        $result_mahasiswa = $koneksi->query($query_mahasiswa);
        $jumlah_mahasiswa = $result_mahasiswa->num_rows;
        ?>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Matakuliah</h5>
                        <p class="card-text"><?php echo $jumlah_matakuliah; ?></p>
                        <a href="matakuliah/index.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Dosen</h5>
                        <p class="card-text"><?php echo $jumlah_dosen; ?></p>
                        <a href="dosen/index.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Mahasiswa</h5>
                        <p class="card-text"><?php echo $jumlah_mahasiswa; ?></p>
                        <a href="mahasiswa/index.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
