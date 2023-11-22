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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="./assets/js/sweetalert.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php require('./components/sidebar.php');
        sidebar('profile');
        ?>

        <div class="main">
            <?php require('./components/navbar.php'); ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="col-12" id="show">
                        <h1 class="h3 mb-3"><strong>Profile</strong> Setting</h1>

                        <!-- Query For Get Data Profile (Tentang Kami) Start -->
                        <?php
                        $res = mysqli_query($conn, "select keterangan from bio");
                        $aboutCompany = $res->fetch_assoc()['keterangan'];
                        ?>
                        <!-- Query For Get Data Profile (Tentang Kami) End -->
                        <div class="border border-3 p-2 rounded" id="aboutCompany">
                            <?php echo html_entity_decode($aboutCompany) ?>
                        </div>
                        <button class="btn btn-warning my-2" onclick="toggleEditForm()">Edit Profile</button>
                    </div>
                    <div class="col-12 d-none" id="edit">
                        <h1 class="h3 mb-3"><strong>Edit Profile</strong></h1>
                        <form action="./action/actionEditBio.php" method="POST">
                            <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                            <button class="btn btn-warning mt-2 mr-2" type="submit">Update</button>
                            <a href="#" class="btn btn-danger mt-2" onclick="toggleEditForm()">Cancel</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="./assets/js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var node = document.getElementById('aboutCompany')
            aboutContent = node.innerHTML;
            CKEDITOR.replace('keterangan', {
                removePlugins: 'image,link,elementspath,source,horizontalrule,specialchar,scayt',
                removeButtons: 'Styles,Format,Indent,Outdent,Table,NumberedList,BulletedList,RemoveFormat,Subscript,Superscript,Maximize,About',
            });
            CKEDITOR.instances['keterangan'].setData(aboutContent)
        })

        function toggleEditForm() {
            var show = document.getElementById('show')
            show.classList.toggle('d-none')
            var edit = document.getElementById('edit')
            edit.classList.toggle('d-none')
        }
    </script>
    <?php
    if ($_SESSION['profileStatus'] == true && !is_null($_SESSION['profileStatus'])) { ?>
        <script>
            Swal.fire({
                title: "Success",
                text: "Berhasil Mengubah Profile!",
                icon: "success"
            });
        </script>
    <?php } else if ($_SESSION['profileStatus'] == false && !is_null($_SESSION['profileStatus'])) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Gagal Mengubah Profile!",
            });
        </script>
    <?php }
    unset($_SESSION['profileStatus']);
    ?>
</body>

</html>