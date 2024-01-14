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
                        <?php
                        // jika menambahkan data sekat kanal maka akan muncul notif berhasil
                        if (isset($_GET['add'])) {
                            if ($_GET['add'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Anggota Telah Disimpan</div>";
                            } else if ($_GET['add'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Anggota Gagal Disimpan</div>";
                            }
                        }
                        // Jika tombol edit berhasil maka akan muncul notif
                        if (isset($_GET['edit'])) {
                            if ($_GET['edit'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Anggota Telah Diupdate</div>";
                            } else if ($_GET['edit'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Anggota Gagal Diupdate</div>";
                            }
                        }
                        // jika tombol hapus ditekan muncul notif berhasil
                        if (isset($_GET['hapus'])) {
                            if ($_GET['hapus'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Data Anggota Telah Dihapus</div>";
                            } else if ($_GET['hapus'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Data Anggota Gagal Dihapus</div>";
                            }
                        }
                        ?>
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
    // Tambah Anggota
    $('#tombol_tambah_akun').on('click', function() {
        $.ajax({
            url: 'apps/anggota/tambah.php',
            method: 'post',
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Tambah Data Anggota';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
    // Edit Anggota
    $('.tombol_edit').on('click', function() {
        var id = $(this).attr("id");
        $.ajax({
            url: 'apps/anggota/edit.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Edit Anggota';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>

<script>
    // fungsi hapus anggota
    $('.btn-hapus').on('click', function() {
        konfirmasi = confirm("ingin menghapus data anggota?")
        if (konfirmasi) {
            return true;
        } else {
            return false;
        }
    });
</script>