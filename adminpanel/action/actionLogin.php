<?php
session_start();
require('../database/connection.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

try {
    //code...
    $res = mysqli_query($conn, "select * from users where username = '$username' and password = '$password'");
    if (0 < $hasil = $res->fetch_assoc()) {
        $_SESSION['id'] = $hasil['id'];
        $_SESSION['status'] = 'auth';
        $_SESSION['name'] = $hasil['name'];
        $_SESSION['username'] = $hasil['username'];
        session_write_close();
        header('Location: ../index.php');
    } else {
        $_SESSION['loginError'] = 403;
        header('Location: ../pages/login.php');
    }
} catch (\Throwable $th) {
    //throw $th;
    $_SESSION['loginError'] = 500;
    session_write_close();
    header('Location: ../pages/login.php');
}
