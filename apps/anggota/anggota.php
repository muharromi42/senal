<?php

$users = query('SELECT * FROM users LIMIT 1000 OFFSET 1');
?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Akun Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Cetak Data Senal Kepayang</li>
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
                        <button type="button" class="btn btn-success" id="tombol_tambah_akun"><i class="fas fa-plus"></i> Tambah Akun</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table id="table2" class="table table-bordered table-striped" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="">Username</th>
                                    <th width="">Level</th>
                                    <th width="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($users as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row["username"] ?></td>
                                        <td><?= $row["level"] ?></td>
                                        <td>
                                            <button type="button" class="tombol_edit btn btn-warning" id="<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></button> |
                                            <a class="btn btn-danger btn-hapus" href="apps/anggota/hapus.php?id=<?= $row["id"] ?>"><i class="fas fa-trash"></i></a>
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
</section>