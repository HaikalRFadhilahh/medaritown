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

    <title>Profile - Medaritown House</title>

    <link href="./assets/css/app.css" rel="stylesheet">
    <script src="./assets/js/sweetalert.js"></script>
</head>

<style>
    .cursor-span {
        cursor: pointer;
    }
</style>

<body>
    <div class="wrapper">
        <?php require('./components/sidebar.php');
        sidebar('user');
        ?>

        <div class="main">
            <?php require('./components/navbar.php'); ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h2 class="h2 mb-3"><strong>User</strong> Setting</h2>
                    <div class="row my-2">
                        <div class="col-12 col-lg-6">
                            <form action="./action/actionEditUser.php" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label fs-4">Nama : </label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name user" name="name" value="<?php echo $_SESSION['name'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label fs-4">Username : </label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?php echo $_SESSION['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fs-4">Password : </label>
                                    <div class="d-flex gap-2">
                                        <input type="password" class="form-control" id="password" aria-describedby="password" name="password" required>
                                        <span class="badge bg-secondary d-inline-flex align-items-center cursor-span" onclick="changeTypeInput('password')"><i class="align-middle my-auto" data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordvalidation" class="form-label fs-4">Ulangi Password : </label>
                                    <div class="d-flex gap-2">
                                        <input type="password" class="form-control" id="passwordvalidation" aria-describedby="passwordvalidation" name="passwordvalidation" required>
                                        <span class="badge bg-secondary d-inline-flex align-items-center cursor-span" onclick="changeTypeInput('passwordvalidation')"><i class="align-middle my-auto" data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <button class="btn btn-warning my-2 text-black" type="submit">Update Data</button>
                                <a href="./index.php" class="btn btn-danger ">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="./assets/js/app.js"></script>
    <script>
        function changeTypeInput(id) {
            var type = document.getElementById(id).type;
            if (type == 'text') {
                document.getElementById(id).type = 'password'
            } else {
                document.getElementById(id).type = 'text'
            }
        }

        function sweetalert(icon, title, text) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon
            });
        }
    </script>
    <?php if ($_SESSION['errorValidation'] == true && is_null($_SESSION['statusUser'])) { ?>
        <script>
            sweetalert('error', 'Gagal', 'Password Validasi Tidak Sama!')
        </script>
    <?php } else if ($_SESSION['errorUsernameExist'] == true && is_null($_SESSION['statusUser'])) { ?>
        <script>
            sweetalert('error', 'Gagal', 'Username Sudah Tersedia!,Harap Ganti Username Lain')
        </script>
    <?php } else if ($_SESSION['errorServer'] == true && is_null($_SESSION['statusUser'])) { ?>
        <script>
            sweetalert('error', 'Gagal', 'Server Error,Harap Cobalagi Nanti!')
        </script>
    <?php } else if ($_SESSION['statusUser'] == true) { ?>
        <script>
            sweetalert('success', 'Berhasil', 'Berhasil Mengubah Data User!')
        </script>
    <?php }
    unset($_SESSION['errorValidation']);
    unset($_SESSION['errorUsernameExist']);
    unset($_SESSION['errorServer']);
    unset($_SESSION['statusUser']);
    ?>
</body>

</html>