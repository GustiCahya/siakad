<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID dosen telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data dosen berdasarkan ID dari database
    $query = "DELETE FROM dosen WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar dosen setelah berhasil dihapus
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    echo "ID dosen tidak ditemukan.";
    exit();
}
?>
