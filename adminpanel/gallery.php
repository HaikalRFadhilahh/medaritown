<?php
require('./database/connection.php');
session_start();
$status = $_SESSION['status'];
if ($status != 'auth' || is_null($status) || is_null($_SESSION['username']) || is_null($_SESSION['name'])) {
    header('Location: ./pages/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Gallery - Medaritown House</title>

    <link href="./assets/css/app.css" rel="stylesheet">
    <script src="./assets/js/sweetalert.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php require('./components/sidebar.php');
        sidebar('gallery');
        ?>

        <div class="main">
            <?php require('./components/navbar.php'); ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <?php
                    $id = $_GET['id'];
                    if (is_null($id) || $id == "") { ?>
                        <!-- Table Section Start -->
                        <!-- Query PHP For Galery Start -->
                        <?php
                        $q = "select * from gallery";
                        $res = mysqli_query($conn, $q);
                        ?>
                        <!-- Query PHP For Galery End -->
                        <div id="dataGallery" style="overflow-x: auto;">
                            <h1 class="h3 mb-3"><strong>Gallery</strong> Page</h1>
                            <button class="my-2 btn btn-primary" onclick="toggleFormInsert()">Tambah Data Gallery</button>
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if (0 >= $res->fetch_assoc()) { ?>
                                        <tr>
                                            <td colspan="5">
                                                Data Gallery Belum Tersedia,Segera Tambahkan Gambar Gallery!
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $i = 0;
                                    foreach ($res as $d) { ?>
                                        <tr>
                                            <td><?php echo $i + 1 ?></td>
                                            <td><?php echo $d['title'] ?></td>
                                            <td><?php echo $d['description'] ?></td>
                                            <td><a href="<?php echo $d['image'] ?>" target="black" class="badge bg-secondary"><i class="align-middle" data-feather="eye"></i></a></td>
                                            <td>
                                                <a class="btn bg-warning my-2" href="./gallery.php?id=<?php echo $d['id'] ?>"><i class="align-middle" data-feather="edit"></i></a>
                                                <form action="./action/actionDeleteGallery.php" method="POST">
                                                    <input type="text" name="id" class="d-none" value="<?php echo $d['id'] ?>">
                                                    <button class="btn bg-danger" type="submit"><i class="align-middle" data-feather="trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Section End -->
                        <!-- Insert Data Section Start -->
                        <div id="insertGallery" class="d-none">
                            <h1 class="h3 mb-3"><strong>Insert Gallery</strong> Page</h1>
                            <div class="row my-2">
                                <div class="col-12 col-lg-6">
                                    <form action="./action/actionInsertGallery.php" method="POST" enctype="multipart/form-data" id="insertForm">
                                        <div class="mb-3">
                                            <label for="title" class="form-label fs-4">Judul Gallery : </label>
                                            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label fs-4">Deskripsi Gallery : </label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label fs-4">File Gambar Gallery : </label>
                                            <input class="form-control" type="file" id="formFile" name="image" accept="image/*" required>
                                        </div>
                                        <button class="btn btn-warning my-2 text-black" type="submit">Tambah Data</button>
                                        <button class="btn btn-secondary" onclick="toggleFormInsert()" type="reset">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Table Section Start End -->
                    <?php } else {  ?>
                        <!-- Update Form Gallery Start -->
                        <?php
                        $q = "select * from gallery where id=$id";
                        $res = mysqli_query($conn, $q);
                        $res = $res->fetch_assoc();
                        if ($res <= 0) {
                            header('Location: ./gallery.php');
                        }
                        ?>
                        <div id="updateGallery">
                            <h1 class="h3 mb-3"><strong>Update Gallery</strong> Page</h1>
                            <div class="row my-2">
                                <div class="col-12 col-lg-6">
                                    <form action="./action/actionUpdateGallery.php" method="POST" enctype="multipart/form-data" id="updateForm">
                                        <input type="text" class="d-none" name="id" value="<?php echo $res['id'] ?>">
                                        <div class="mb-3">
                                            <label for="title" class="form-label fs-4">Judul Gallery : </label>
                                            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" value="<?php echo $res['title'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label fs-4">Deskripsi Gallery : </label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $res['description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label fs-4">File Gambar Gallery : </label>
                                            <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
                                            <span class="text-danger">Tidak Perlu Di Isi Jika Tidak Ingin Merubah Data Gambar</span>
                                        </div>
                                        <button class="btn btn-warning my-2 text-black" type="submit">Update Data</button>
                                        <a class="btn btn-secondary" href="./gallery.php">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Update Form Gallery End -->
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
    <script src="./assets/js/app.js"></script>
    <script>
        function toggleFormInsert() {
            document.getElementById('insertForm').reset();
            const dataGallery = document.getElementById('dataGallery');
            dataGallery.classList.toggle('d-none');
            const insertGallery = document.getElementById('insertGallery');
            insertGallery.classList.toggle('d-none');
        }
    </script>

    <?php ?>
    <?php
    $errorInsertGallery = $_SESSION['errorInsertGallery'];
    $insertGalleryMessage = $_SESSION['insertGalleryMessage'];
    unset($_SESSION['errorInsertGallery']);
    unset($_SESSION['insertGalleryMessage']);
    session_write_close();
    ?>
    <?php if ($errorInsertGallery == false && !is_null($errorInsertGallery)) { ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "<?php echo $insertGalleryMessage; ?>",
            });
        </script>
    <?php } else if ($errorInsertGallery == true) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "<?php echo $insertGalleryMessage; ?>",
            });
        </script>
    <?php } ?>
</body>

</html>