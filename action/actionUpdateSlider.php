<?php
require('../database/connection.php');

session_start();
$id = (int)$_POST['id'];
$title = htmlspecialchars($_POST['title']);
$description = htmlspecialchars($_POST['description']);
$imgError = $_FILES['image']['error'];
$imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));

if (is_null($id) || is_null($description) || is_null($title)) {
    session_write_close();
    header('Location: ../slider.php');
}

if ($imgError > 0) {
    try {
        //code...
        $q = "update slider set title='$title',description='$description' where id=$id";
        mysqli_query($conn, $q);
        $_SESSION['errorSlider'] = false;
        $_SESSION['sliderMessage'] = "Data Slider Berhasil Di Perbaharui";
        session_write_close();
        header('Location: ../slider.php');
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['errorSlider'] = true;
        $_SESSION['sliderMessage'] = "Server Error,Harap Coba Lagi Nanti!";
        session_write_close();
        header('Location: ../slider.php');
    }
} else {
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $_SESSION['errorSlider'] = true;
        $_SESSION['sliderMessage'] = "Ekstensi File Yang Terupload Tidak Sesuai! Tipe File Yang Di Ijikan Termasuk (jpg,png,jpeg,gif)";
        session_write_close();
        header('Location: ../slider.php');
    } else {
        try {
            //code...
            $q = "select * from slider where id=$id";
            $res = mysqli_query($conn, $q)->fetch_assoc();
            if (file_exists('../' . $res['image'])) {
                unlink('../' . $res['image']);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], '../' . $res['image']);
            $q = "update slider set title='$title',description='$description' where id=$id";
            mysqli_query($conn, $q);
            $_SESSION['errorSlider'] = false;
            $_SESSION['sliderMessage'] = 'Berhasil Memperbaharui Data Slider!';
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
}
