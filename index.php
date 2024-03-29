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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <script src="plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="plugins/jquery/jquery-2.2.3.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- logo icon tab -->
    <link rel="shortcut icon" href="assets/img/psda_transparan.png">
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
                        include "apps/dashboard/dashboard.php";
                        break;
                    case 'inkepayang':
                        include "apps/input/kepayang/inKepayang.php";
                        break;
                    case 'inmedak';
                        include "apps/input/medak/inMedak.php";
                        break;
                    case 'ingeronggang';
                        include "apps/input/geronggang/inGeronggang.php";
                        break;
                    case 'inputak';
                        include "apps/input/putak/inPutak.php";
                        break;
                    case 'inmuara';
                        include "apps/input/muara/inMuara.php";
                        break;
                    case 'cekepayang':
                        include "apps/cetak/kepayang/ceKepayang.php";
                        break;
                    case 'cemedak';
                        include "apps/cetak/medak/ceMedak.php";
                        break;
                    case 'cegeronggang';
                        include "apps/cetak/geronggang/ceGeronggang.php";
                        break;
                    case 'ceputak';
                        include "apps/cetak/putak/cePutak.php";
                        break;
                    case 'cemuara';
                        include "apps/cetak/muara/ceMuara.php";
                        break;
                    case 'anggota';
                        include "apps/anggota/anggota.php";
                    default:

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


        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <script>
            $(function() {
                $("#table1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#table2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <!-- file input -->
        <script>
            $(function() {
                bsCustomFileInput.init();
            });
        </script>

</body>

</html>