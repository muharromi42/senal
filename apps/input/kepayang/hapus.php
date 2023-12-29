<?php
// memulai sesi
session_start();

// memanggil koneksi
include '../../../config/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kepayang WHERE id = $id");
    return mysqli_affected_rows($conn);
}

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'index.php';
            </script>
        ";
}
