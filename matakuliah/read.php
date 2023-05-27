<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID matakuliah telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data matakuliah berdasarkan ID dari database
    $query = "SELECT * FROM matakuliah WHERE ID = $id";
    $result = $koneksi->query($query);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID matakuliah tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Siakad - Detail Matakuliah</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Detail Matakuliah</h1>

        <h2>Data Matakuliah</h2>
        <p>ID: <?php echo $row['ID']; ?></p>
        <p>Nama: <?php echo $row['Nama']; ?></p>
        <p>KodeMatakuliah: <?php echo $row['KodeMatakuliah']; ?></p>
        <p>Deskripsi: <?php echo $row['Deskripsi']; ?></p>
        <p>Dosen: <?php echo $row['Dosen']; ?></p>

        <a href="index.php" class="btn btn-primary">Kembali ke Daftar Matakuliah</a>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
