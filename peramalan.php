<?php 

require 'functions.php';

$daftarhp = query("SELECT * FROM sales_data");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peramalan</title>
</head>
<body>
    <h2>Peramalan Single Exponential Smoothing</h2>
    <table border="2">
        <tr>
            <th>Bulan</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Terjual</th>
            <th>Peramalan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($daftarhp as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["qty"]; ?></td>
            <td><?= $row["tanggal_penjualan"]; ?></td>
            <td>Belum Ada</td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    <p>Hasil Peramalan pada Periode ke-13</p>
</body>
</html>