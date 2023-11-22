<?php
session_start();
require('../database/connection.php');
$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$passwordvalidation = htmlspecialchars($_POST['passwordvalidation']);

if ($password != $passwordvalidation) {
    $_SESSION['errorValidation'] = true;
    session_write_close();
    header('Location: ../user.php');
} else {
    try {
        //code...
        $q = "select * from users where username='$username'";
        $res = mysqli_query($conn, $q);
        if (0 < $res->fetch_assoc() && $username != $_SESSION['username']) {
            $_SESSION['errorUsernameExist'] = true;
            session_write_close();
            header('Location: ../user.php');
        } else {
            $password = md5($password);
            $q = "update users set name='$name',username='$username',password='$password' where username='$_SESSION[username]'";
            mysqli_query($conn, $q);
            $_SESSION['statusUser'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            session_write_close();
            header('Location: ../user.php');
        }
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['errorServer'] = true;
        session_write_close();
        header('Location: ../user.php');
    }
}
