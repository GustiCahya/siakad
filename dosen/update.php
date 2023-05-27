<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID dosen telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data dosen berdasarkan ID dari database
    $query = "SELECT * FROM dosen WHERE ID = $id";
    $result = $koneksi->query($query);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID dosen tidak ditemukan.";
    exit();
}

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nidn = $_POST['nidn'];
    $pendidikan = $_POST['pendidikan'];

    // Query untuk mengubah data dosen di database
    $query = "UPDATE dosen SET Nama = '$nama', NIDN = '$nidn', JenjangPendidikan = '$pendidikan' WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman detail dosen setelah berhasil diubah
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
    <title>Siakad - Ubah Dosen</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Ubah Dosen</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nama']; ?>" required>
            </div>

            <div class="form-group">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control" name="nidn" id="nidn" value="<?php echo $row['NIDN']; ?>" required>
            </div>

            <div class="form-group">
                <label for="pendidikan">Jenjang Pendidikan:</label>
                <select class="form-control" name="pendidikan" id="pendidikan" required>
                    <option value="S2" <?php if ($row['JenjangPendidikan'] === 'S2') echo 'selected'; ?>>S2</option>
                    <option value="S3" <?php if ($row['JenjangPendidikan'] === 'S3') echo 'selected'; ?>>S3</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
