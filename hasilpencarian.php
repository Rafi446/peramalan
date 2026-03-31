<?php
require 'functions.php';
$keyword = $_GET["keyword"];

$sales_data = query("SELECT * FROM sales_data WHERE qty LIKE '%$keyword%'");

if (!isset($sales_data)) {
    echo "tidak ada hasil pencarian";
}

?>
<?php if(count($sales_data)>0) : ?>
<table border="2">
        <tr>
            <th>Id</th>
            <th>Nama Produk</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Terjual</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($sales_data as $row) : ?>
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
        <?php else : ?>
            <p>tidak ada hasil pencarian</p>
        <?php endif; ?>
    </table>