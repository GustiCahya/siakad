<?php

// Konfigurasi database
$host = 'localhost'; // Nama host database (misalnya: localhost)
$db   = 'siakad'; // Nama database
$user = 'root'; // Nama pengguna database
$pass = ''; // Kata sandi database

// Membuat koneksi ke database
$koneksi = new mysqli($host, $user, $pass, $db);

// Memeriksa apakah terjadi kesalahan saat koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

