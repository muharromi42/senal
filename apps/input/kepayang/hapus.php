<?php
session_start();
include '../../../config/koneksi.php';
mysqli_query($conn, "START TRANSACTION");

$id = $_GET['id'];

$hapus_senal = mysqli_query($conn, "DELETE from tb_kepayang where id='$id'");

if ($hapus_senal) {
    mysqli_query($conn, "COMMIT");
    header("Location:../../../index.php?page=inkepayang&hapus=berhasil");
} else {
    mysqli_query($conn, "ROLLBACK");
    header("Location:../../index.php?page=inkepayang&hapus=gagal");
}
