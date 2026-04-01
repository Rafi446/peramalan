<?php 

require 'functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('Data Berhasil Ditambahkan'); 
        window.location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan'); 
        window.location.href = 'index.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penjualan</title>
</head>
<body>
    <h2>Tambah Data Penjualan</h2>
    <form action="" method="post">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama"> <br>
        <label for="qty">Jumlah Terjual : </label>
        <input type="text" name="qty" id="qty"> <br>
        <label for="tanggalPenjualan">Tanggal Penjualan : </label>
        <input type="date" name="tanggalPenjualan" id="tanggalPenjualan"> <br>
        <button type="submit" name="tambah">Tambahkan</button>
    </form>
</body>
</html>