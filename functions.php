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

function register($data) {
    global  $conn;
    $username = strtolower(mysqli_real_escape_string($conn, $data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar, coba username lain')</script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password Salah')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);

}

function login($data) {
    global $conn;
    $username = $data["username"];
    $password = $data["password"];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }
    $erro = true;
}

?>