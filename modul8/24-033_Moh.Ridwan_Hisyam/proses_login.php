<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' AND password=SHA2('$password', 256)";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['level'] = $row['level'];

    header("Location: index.php");
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
}
?>
