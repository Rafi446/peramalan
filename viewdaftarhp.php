<?php 

require 'functions.php';

$daftarhp = query("SELECT * FROM daftarhp");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body>
    <h2>Halaman Dashboard</h2>
    <table border="2">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($daftarhp as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["id"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["harga"]; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
            <td><a href="ubah.php">Ubah</a> | <a href="hapus.php">Hapus</a></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>