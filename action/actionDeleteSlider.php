<?php
session_start();
require('../database/connection.php');
require('../functions/randomStr.php');
$id = $_POST['id'];
var_dump($id);

$q = "select * from slider where id=$id";
$res = mysqli_query($conn, $q)->fetch_assoc();

if ($res <= 0) {
    session_start();
    header('Location: ../slider.php');
} else {
    try {
        //code...
        if (file_exists('../' . $res['image'])) {
            unlink('../' . $res['image']);
        }

        $q = "delete from slider where id=$id";
        mysqli_query($conn, $q);
        $_SESSION['errorSlider'] = false;
        $_SESSION['sliderMessage'] = "Data Slider Berhasil Di Hapus";
        session_write_close();
        header('Location: ../slider.php');
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['errorSlider'] = true;
        $_SESSION['sliderMessage'] = "Server Error,Harap Coba Lagi Nanti!";
        session_write_close();
        header('Location: ../slider.php');
    }
}
