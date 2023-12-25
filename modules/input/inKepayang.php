<?php

$kepayang = query("SELECT * FROM tb_kepayang");

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Data Sekat Kanal Desa Kepayang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Input Data Senal</li>
                </ol>
            </div><!-- /.col -->
            <table border="1" cellpadding="10" cellspacing="0" class="table table-striped table-hover padding-xl">

                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                </tr>

                <?php $i = 1 ?>
                <?php foreach ($kepayang as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                            <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin bang?')">hapus</a>
                        </td>
                        <td><?= $row["pokmas"] ?></td>
                        <td><?= $row["kegiatan"] ?></td>
                        <td><img src="assets/img/<?= $row["foto1"] ?>" width="200" alt=""></td>
                        <td><img src="assets/img/<?= $row["foto2"] ?>" width="200" alt=""></td>
                        <td><img src="assets/img/<?= $row["foto3"] ?>" width="200" alt=""></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </table>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">


        <!-- /.row -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->