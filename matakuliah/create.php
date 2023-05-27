<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $deskripsi = $_POST['deskripsi'];

    // Query untuk menambahkan data matakuliah ke database
    $query = "INSERT INTO matakuliah (Nama, KodeMatakuliah, Deskripsi) VALUES ('$nama', '$kode', '$deskripsi')";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar matakuliah setelah berhasil ditambahkan
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Siakad - Tambah Matakuliah</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Tambah Matakuliah</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="form-group">
                <label for="kode">KodeMatakuliah:</label>
                <input type="text" class="form-control" name="kode" id="kode" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
