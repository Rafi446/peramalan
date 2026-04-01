<?php 

require 'functions.php';
session_start();

if (isset($_COOKIE["id"]) && $_COOKIE["key"]) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $query = "SELECT username FROM users WHERE id = $id";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    if ($username === hash('sha256', $row["username"])) {
        $_SESSION["login"] = true;
    }


}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    global $conn;
    $username = strtolower(mysqli_real_escape_string($conn, $_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

        if (isset($_POST["remember"])) {
            setcookie('id', $row["id"], time()+10);
            setcookie('key', hash('sha256', $row["username"]), time()+60);
        }

            header("Location: index.php");                                            
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red;">Username / Password Salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username"> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password"> <br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>