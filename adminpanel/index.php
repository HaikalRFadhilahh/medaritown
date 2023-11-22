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

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Dasboard - Medaritown House</title>

    <link href="./assets/css/app.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
</head>

<body>
    <div class="wrapper">
        <?php
        require('./components/sidebar.php');
        sidebar('dashboard');
        ?>

        <div class="main">
            <?php require('./components/navbar.php'); ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Gallery (Jumlah Gambar)</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="image"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Query For Find Count Data Gallery Start -->
                                                <?php
                                                $res = mysqli_query($conn, "select count(*) as Jumlah from gallery");
                                                $jumlahGalery = $res->fetch_assoc()['Jumlah'];
                                                ?>
                                                <!-- Query For Find Count Data Gallery End -->
                                                <h1 class="mt-1 mb-3"><?php echo $jumlahGalery ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Jumlah Slider</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="sliders"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Query For Find Count Data Gallery Start -->
                                                <?php
                                                $res = mysqli_query($conn, "select count(*) as Jumlah from slider");
                                                $jumlahSlider = $res->fetch_assoc()['Jumlah'];
                                                ?>
                                                <!-- Query For Find Count Data Gallery End -->
                                                <h1 class="mt-1 mb-3"><?php echo $jumlahSlider ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="./assets/js/app.js"></script>
</body>

</html>