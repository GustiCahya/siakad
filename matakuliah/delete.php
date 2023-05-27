<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Memeriksa apakah parameter ID matakuliah telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data matakuliah berdasarkan ID dari database
    $query = "DELETE FROM matakuliah WHERE ID = $id";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar matakuliah setelah berhasil dihapus
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    echo "ID matakuliah tidak ditemukan.";
    exit();
}
?>
