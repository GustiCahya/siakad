<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    // Query untuk menambahkan data mahasiswa ke database
    $query = "INSERT INTO mahasiswa (Nama, NIM, ProgramStudi) VALUES ('$nama', '$nim', '$prodi')";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar mahasiswa setelah berhasil ditambahkan
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
    <title>Siakad - Tambah Mahasiswa</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Tambah Mahasiswa</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" name="nim" id="nim" required>
            </div>

            <div class="form-group">
                <label for="prodi">ProgramStudi:</label>
                <input type="text" class="form-control" name="prodi" id="prodi" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
