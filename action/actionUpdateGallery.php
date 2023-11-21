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
    header('Location: ../gallery.php');
}

if ($imgError > 0) {
    try {
        //code...
        $q = "update gallery set title='$title',description='$description' where id=$id";
        mysqli_query($conn, $q);
        $_SESSION['errorInsertGallery'] = false;
        $_SESSION['insertGalleryMessage'] = "Data Gallery Berhasil Di Perbaharui";
        session_write_close();
        header('Location: ../gallery.php');
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['errorInsertGallery'] = true;
        $_SESSION['insertGalleryMessage'] = "Server Error,Harap Coba Lagi Nanti!";
        session_write_close();
        header('Location: ../gallery.php');
    }
} else {
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $_SESSION['errorInsertGallery'] = true;
        $_SESSION['insertGalleryMessage'] = "Ekstensi File Yang Terupload Tidak Sesuai! Tipe File Yang Di Ijikan Termasuk (jpg,png,jpeg,gif)";
        session_write_close();
        header('Location: ../gallery.php');
    } else {
        try {
            //code...
            $q = "select * from gallery where id=$id";
            $res = mysqli_query($conn, $q)->fetch_assoc();
            if (file_exists('../' . $res['image'])) {
                unlink('../' . $res['image']);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], '../' . $res['image']);
            $q = "update gallery set title='$title',description='$description' where id=$id";
            mysqli_query($conn, $q);
            $_SESSION['errorInsertGallery'] = false;
            $_SESSION['insertGalleryMessage'] = 'Berhasil Memperbaharui Data Gallery!';
            session_write_close();
            header('Location: ../gallery.php');
        } catch (\Throwable $th) {
            //throw $th;
            $_SESSION['errorInsertGallery'] = true;
            $_SESSION['insertGalleryMessage'] = "Server Error,Harap Coba Lagi Nanti!";
            session_write_close();
            header('Location: ../gallery.php');
        }
    }
}
