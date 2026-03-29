<?php 

require 'functions.php';
$id = $_GET["id"];
$row = query("SELECT * FROM sales_data WHERE id = $id")[0];

if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "<script>alert('Data Berhasil Diubah'); 
        window.location.href = 'index.php;'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah'); 
        window.location.href = 'index.php;'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Penjualan</title>
</head>
<body>
    <h2>Tambah Data Penjualan</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?= $row["nama"]; ?>"> <br>
        <label for="qty">Jumlah Terjual : </label>
        <input type="text" name="qty" id="qty" value="<?= $row["qty"]; ?>"> <br>
        <label for="tanggalPenjualan">Tanggal Penjualan : </label>
        <input type="date" name="tanggalPenjualan" id="tanggalPenjualan" value="<?= $row["tanggal_penjualan"]; ?>"> <br>
        <button type="submit" name="ubah">Ubah</button>
    </form>
</body>
</html>