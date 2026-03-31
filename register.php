<?php

require 'functions.php';


if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>alert('Registrasi Berhasil')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registerasi</title>
</head>
<body>
    <h2>Registrasi</h2>
    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password"><br>
        <label for="password2">Konfirmasi Password : </label>
        <input type="password" name="password2" id="password2"><br>
        <button type="submit" name="register">Registrasi</button>
    </form>
</body>
</html>