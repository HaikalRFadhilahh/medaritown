<?php
session_start();
require('../database/connection.php');
$keterangan = htmlspecialchars($_POST['keterangan']);

$q = "update bio set keterangan='$keterangan' where id=1";

if (is_null($keterangan)) {
    session_write_close();
    header('Location: ../profile.php');
}

try {
    //code...
    mysqli_query($conn, $q);
    $_SESSION['profileStatus'] = true;
    session_write_close();
    header('Location: ../profile.php');
} catch (\Throwable $th) {
    //throw $th;
    $_SESSION['profileStatus'] = false;
    session_write_close();
    header('Location: ../profile.php');
}
