<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nidn = $_POST['nidn'];
    $pendidikan = $_POST['pendidikan'];

    // Query untuk menambahkan data dosen ke database
    $query = "INSERT INTO dosen (Nama, NIDN, JenjangPendidikan) VALUES ('$nama', '$nidn', '$pendidikan')";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar dosen setelah berhasil ditambahkan
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
    <title>Siakad - Tambah Dosen</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Tambah Dosen</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="form-group">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control" name="nidn" id="nidn" required>
            </div>

            <div class="form-group">
                <label for="pendidikan">Jenjang Pendidikan:</label>
                <select class="form-control" name="pendidikan" id="pendidikan" required>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
