<?php
// Menghubungkan ke file koneksi database
require_once '../koneksi.php';

// Mengambil data mahasiswa dari database
$query = "SELECT * FROM mahasiswa";
$result = $koneksi->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Siakad - Daftar Mahasiswa</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Siakad - Daftar Mahasiswa</h1>

        <a href="create.php" class="btn btn-primary mb-4 mt-2">Tambah Mahasiswa</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>ProgramStudi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Nama']; ?></td>
                        <td><?php echo $row['NIM']; ?></td>
                        <td><?php echo $row['ProgramStudi']; ?></td>
                        <td>
                          <a href="update.php?id=<?= $row['ID'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                          <a href="delete.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
