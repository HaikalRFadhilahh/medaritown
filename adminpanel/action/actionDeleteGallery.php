<?php
require('../database/connection.php');
$id = $_POST['id'];
$q = "select * from gallery where id=$id";
$res = mysqli_query($conn, $q);
$res = $res->fetch_assoc();

if (is_null($id)) {
    header('Location: ../gallery.php');
} else {
    try {
        //code...
        if (file_exists('../' . $res['image'])) {
            unlink('../' . $res['image']);
        }
        $q = "delete from gallery where id=$id";
        mysqli_query($conn, $q);
        session_start();
        $_SESSION['errorInsertGallery'] = false;
        $_SESSION['insertGalleryMessage'] = 'Berhasil Menghapus Data Gallery!';
        session_write_close();
        header('Location: ../gallery.php');
    } catch (\Throwable $th) {
        //throw $th;
        session_start();
        $_SESSION['errorInsertGallery'] = true;
        $_SESSION['insertGalleryMessage'] = 'Server Error,Harap Coba Lagi Nanti!';
        session_write_close();
        header('Location: ../gallery.php');
    }
}
