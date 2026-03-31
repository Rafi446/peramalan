<?php 

require 'functions.php';

$daftarhp = query("SELECT * FROM sales_data");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body>
    <h2>Halaman Dashboard</h2>
    <a href="peramalan.php" style="color: darkgrey;">Peramalan</a> |
    <a href="tambah.php">Tambah Data Penjualan</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="cari" id="cari" placeholder="Cari Jumlah Penjualan">
        <button type="submit" name="submit">Cari</button>
    </form>
    <br>
    <div id="hasil">
    <table border="2">
        <tr>
            <th>Id</th>
            <th>Nama Produk</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Terjual</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($daftarhp as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["qty"]; ?></td>
            <td><?= $row["tanggal_penjualan"]; ?></td>
            <td><a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> | 
            <a href="hapus.php?id=<?= $row["id"] ?>">Hapus</a></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    </div>
    <script src="jquery-4.0.0.js"></script>
    <script src="scripttt.js"></script>
</body>
</html>