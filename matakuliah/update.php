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

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $deskripsi = $_POST['deskripsi'];

    // Query untuk mengubah data matakuliah di database
    $query = "UPDATE matakuliah SET Nama = '$nama', KodeMatakuliah = '$kode', Deskripsi = '$deskripsi' WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman detail matakuliah setelah berhasil diubah
        header("Location: read.php?id=$id");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Siakad - Ubah Matakuliah</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Ubah Matakuliah</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nama']; ?>" required>
            </div>

            <div class="form-group">
                <label for="kode">KodeMatakuliah:</label>
                <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $row['KodeMatakuliah']; ?>" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" required><?php echo $row['Deskripsi']; ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
