<?php 

$conn = mysqli_connect("localhost", "root", "", "proyekperamalan");

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}

function hapus($id) {
    global $conn;
    $id = $_GET["id"];
    $query = "DELETE FROM sales_data WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data) {
    global $conn;

    $nama = $data["nama"];
    $qty = $data["qty"];
    $tanggalPenjualan = $data["tanggalPenjualan"];

    $query = "INSERT INTO sales_data VALUES ('', '$nama', '$qty', '$tanggalPenjualan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];    
    $nama = $data["nama"];
    $qty = $data["qty"];
    $tanggalPenjualan = $data["tanggalPenjualan"]; 
    $query = "UPDATE sales_data SET nama = '$nama', 
                qty = $qty, 
                tanggal_penjualan = '$tanggalPenjualan' 
                WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function peramalan($data) {
    global $conn;

    $query = "SELECT * FROM sales_data ORDER BY tanggal_penjualan ASC LIMIT 12";
    $result = mysqli_query($conn, $query);

    $row = [];

    
}

?>