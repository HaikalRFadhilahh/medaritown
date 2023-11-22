<?php
session_start();
if ($_SESSION['status'] == 'auth') {
    header('Location: ../index.php');
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

    <!-- <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" /> -->

    <title>Login - Medaritown House</title>

    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="../action/actionLogin.php">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" type="username" name="username" placeholder="Enter your username" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/sweetalert.js"></script>
    <?php
    if ($_SESSION['loginError'] == 403) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Username Atau Password Salah",
            });
        </script>
    <?php } else if ($_SESSION['loginError'] == 500) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Server Error,Harap Coba Lagi Nanti",
            });
        </script>
    <?php }
    unset($_SESSION['loginError']);
    ?>

</body>