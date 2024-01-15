<?php

$geronggang = query("SELECT * FROM tb_geronggang");

?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Senal geronggang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Cetak Data Senal geronggang</li>
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
                        <button type="submit" class="btn btn-success" name="cetak" id="cetak"><i class="fas fa-print"></i> Cetak Data</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table id="table1" class="table table-bordered table-striped" style="font-size: 14px;">
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
                                <?php foreach ($geronggang as $row) : ?>
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
</section>

<script>
    document.getElementById('cetak').addEventListener('click', function() {
        window.open('apps/cetak/geronggang/cetak.php', '_blank');
    });
</script>