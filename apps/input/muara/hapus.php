<?php
session_start();
include '../../../config/koneksi.php';
mysqli_query($conn, "START TRANSACTION");

$id = $_GET['id'];

// Ambil data gambar yang akan dihapus
$result = mysqli_query($conn, "SELECT * FROM tb_muara WHERE id = '$id'");
$dataToDelete = mysqli_fetch_assoc($result);

// Hapus gambar dari server
unlink('../../../assets/dokumentasi/' . $dataToDelete['foto1']);
unlink('../../../assets/dokumentasi/' . $dataToDelete['foto2']);

$hapus_senal = mysqli_query($conn, "DELETE from tb_muara where id='$id'");

if ($hapus_senal) {
    mysqli_query($conn, "COMMIT");
    header("Location:../../../index.php?page=inmuara&hapus=berhasil");
} else {
    mysqli_query($conn, "ROLLBACK");
    header("Location:../../index.php?page=inmuara&hapus=gagal");
}
