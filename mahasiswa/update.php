<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID mahasiswa telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data mahasiswa berdasarkan ID dari database
    $query = "SELECT * FROM mahasiswa WHERE ID = $id";
    $result = $koneksi->query($query);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID mahasiswa tidak ditemukan.";
    exit();
}

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    // Query untuk mengubah data mahasiswa di database
    $query = "UPDATE mahasiswa SET Nama = '$nama', NIM = '$nim', ProgramStudi = '$prodi' WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman detail mahasiswa setelah berhasil diubah
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
    <title>Siakad - Ubah Mahasiswa</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Ubah Mahasiswa</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nama']; ?>" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $row['NIM']; ?>" required>
            </div>

            <div class="form-group">
                <label for="prodi">ProgramStudi:</label>
                <input type="text" class="form-control" name="prodi" id="prodi" value="<?php echo $row['ProgramStudi']; ?>" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
