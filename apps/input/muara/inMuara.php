<?php

$muara = query("SELECT * FROM tb_muara");

?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Senal muara</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Input Data Senal muara</li>
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
                                    <th colspan="2">
                                        <center>Dokumentasi</center>
                                    </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($muara as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row["pokmas"] ?></td>
                                        <td><?= $row["kegiatan"] ?></td>
                                        <td><?= $row["progres"] ?> %</td>
                                        <td><img src="assets/dokumentasi/<?= $row["foto1"] ?>" width="200" alt=""></td>
                                        <td><img src="assets/dokumentasi/<?= $row["foto2"] ?>" width="200" alt=""></td>
                                        <td>
                                            <button type="button" class="tombol_edit btn btn-warning" id="<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></button> |
                                            <a class="btn btn-danger btn-hapus" href="apps/input/muara/hapus.php?id=<?= $row["id"] ?>"><i class="fas fa-trash"></i></a>
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
            url: 'apps/input/muara/tambah.php',
            method: 'post',
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Tambah Data Progres Senal muara';
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
            url: 'apps/input/muara/edit.php',
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