<?php

$kepayang = query("SELECT * FROM tb_kepayang");

?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Senal Kepayang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Input Data Senal Kepayang</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        // jika menambahkan data sekat kanal maka akan muncul notif berhasil
                        if (isset($_GET['add'])) {
                            if ($_GET['add'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Sekat kanal Telah Disimpan</div>";
                            } else if ($_GET['add'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Sekat Kanal Gagal Disimpan</div>";
                            }
                        }
                        // Jika tombol edit berhasil maka akan muncul notif
                        if (isset($_GET['edit'])) {
                            if ($_GET['edit'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Sekat Kanal Telah Diupdate</div>";
                            } else if ($_GET['edit'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Sekat Kanal Gagal Diupdate</div>";
                            }
                        }
                        // jika tombol hapus ditekan muncul notif berhasil
                        if (isset($_GET['hapus'])) {
                            if ($_GET['hapus'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Sekat Kanal Telah Dihapus</div>";
                            } else if ($_GET['hapus'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Sekat Kanal Gagal Dihapus</div>";
                            }
                        }
                        ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table id="example1" class="table table-bordered table-striped" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="100px">Pokmas</th>
                                    <th width="200px">Kegiatan</th>
                                    <th width="50px">Progres</th>
                                    <th colspan="2">
                                        <center>Dokumentasi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($kepayang as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row["pokmas"] ?></td>
                                        <td><?= $row["kegiatan"] ?></td>
                                        <td><?= $row["progres"] ?> %</td>
                                        <td><img src="assets/dokumentasi/<?= $row["foto1"] ?>" width="200" alt=""></td>
                                        <td><img src="assets/dokumentasi/<?= $row["foto2"] ?>" width="200" alt=""></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped"> </table>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="judul"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="tampil_data">
                </div>
            </div>

            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-success" name="tambah_senal" id="submit"><i class="fas fa-plus"></i>Tambah Data</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Data akan di load menggunakan AJAX -->
<script>
    // Tambah senal
    $('#tombol_tambah').on('click', function() {
        $.ajax({
            url: 'apps/input/kepayang/tambah.php',
            method: 'post',
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Tambah Data Progres Senal Kepayang';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
    // Edit Mahasiswa
    $('.tombol_edit').on('click', function() {
        var id = $(this).attr("id");
        $.ajax({
            url: 'apps/input/kepayang/edit.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Edit Sekat Kanal';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
    // fungsi hapus senal
    $('.btn-hapus').on('click', function() {
        konfirmasi = confirm("ingin menghapus data senal?")
        if (konfirmasi) {
            return true;
        } else {
            return false;
        }
    });
</script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>