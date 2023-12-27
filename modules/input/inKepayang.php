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
                        <button>Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pokmas</th>
                                    <th>Kegiatan</th>
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
                                        <td><img src="assets/img/<?= $row["foto1"] ?>" width="200" alt=""></td>
                                        <td><img src="assets/img/<?= $row["foto2"] ?>" width="200" alt=""></td>
                                        <td><img src="assets/img/<?= $row["foto3"] ?>" width="200" alt=""></td>
                                        <td>
                                            <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                                            <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin bang?')">hapus</a>
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