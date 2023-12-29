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
                        <button type="button" class="btn btn-success" id="tombol_tambah"><i class="fas fa-plus"></i> Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table id="table2" class="table table-bordered table-hover" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="100px">Pokmas</th>
                                    <th width="200px">Kegiatan</th>
                                    <th width="50px">Progres</th>
                                    <th colspan="3">
                                        <center>Dokumentasi</center>
                                    </th>
                                    <th>Aksi</th>
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
                                        <td><img src="assets/img/<?= $row["foto1"] ?>" width="150" alt=""></td>
                                        <td><img src="assets/img/<?= $row["foto2"] ?>" width="150" alt=""></td>
                                        <td><img src="assets/img/<?= $row["foto3"] ?>" width="150" alt=""></td>
                                        <td>
                                            <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"] ?>"><i class="fas fa-edit"></i></a> |
                                            <a class="btn btn-danger btn-hapus" href="/apps/input/hapus.php?id=<?= $row["id"] ?>"><i class="fas fa-trash"></i></a>
                                        </td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Data akan di load menggunakan AJAX -->
<script>
    // Tambah admin
    $('#tombol_tambah').on('click', function() {
        $.ajax({
            url: 'apps/input/kepayang/tambah.php',
            method: 'post',
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Tambah Administrator';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>