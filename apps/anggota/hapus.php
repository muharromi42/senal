<?php
session_start();
include '../../config/koneksi.php';
mysqli_query($conn, "START TRANSACTION");

$id = $_GET['id'];



$hapus_anggota = mysqli_query($conn, "DELETE from users where id='$id'");

if ($hapus_anggota) {
    mysqli_query($conn, "COMMIT");
    header("Location:../../index.php?page=anggota&hapus=berhasil");
} else {
    mysqli_query($conn, "ROLLBACK");
    header("Location:../../index.php?page=anggota&hapus=gagal");
}
