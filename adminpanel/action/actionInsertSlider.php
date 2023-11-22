<?php
session_start();
require('../database/connection.php');
require('../functions/randomStr.php');
$title = htmlspecialchars($_POST['title']);
$description = htmlspecialchars($_POST['description']);
$user_id = $_SESSION['id'];
$imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));

if (is_null($title) || is_null($description)) {
    session_write_close();
    header('Location: ../slider.php');
} else if (
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
        $image_dir = '../assets/img/slider/';
        $imageName = getName(10) . '.jpg';
        $target_file = $image_dir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $q = "insert into slider(title,description,image,user_id) values ('$title','$description','assets/img/slider/$imageName',$user_id)";
        mysqli_query($conn, $q);
        $_SESSION['errorSlider'] = false;
        $_SESSION['sliderMessage'] = "Data Slider Berhasil Di Tambahkan";
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
