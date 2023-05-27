<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID mahasiswa telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data mahasiswa berdasarkan ID dari database
    $query = "DELETE FROM mahasiswa WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar mahasiswa setelah berhasil dihapus
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    echo "ID mahasiswa tidak ditemukan.";
    exit();
}
?>
