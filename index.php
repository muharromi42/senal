<?php
// cek apakah sudah login
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// memanggil koneksi database
require 'config/koneksi.php';

// memanggil functions
require 'config/functions.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senal</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- memanggil navbar -->
        <?php include "layout/navbar.php" ?>

        <!-- memanggil menu sidebar -->
        <?php include "layout/sidebar.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'dashboard':
                        include "modules/dashboard.php";
                        break;
                    case 'inkepayang':
                        include "modules/input/inKepayang.php";
                        break;
                    default:
                        echo "<center><h3>Maaf. Halaman Tidak Di Temukan !</h3></center>";
                        break;
                }
            }
            ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->


        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
</body>

</html>