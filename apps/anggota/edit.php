<?php
session_start();

// memanggil file functions
include '../../config/functions.php';
// memanggil koneksi database
include '../../config/koneksi.php';

// Ambil ID dari AJAX request
$id = $_POST['id'];
// Query untuk mengambil data berdasarkan ID
$data = query("SELECT * FROM users WHERE id = $id")[0];

if (isset($_POST['tambah_anggota'])) {


    // fungsi untuk mencegah karakter inputan tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // cek apakah ada kiriman form dri method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // memulai transaksi
        mysqli_query($conn, "START TRANSACTION");

        $username = input($_POST["username"]);
        $password = input($_POST["password"]);
        $level = input($_POST["level"]);

        $query = "UPDATE users SET 
            username = '$username',
            password = '$password',
            level = '$level'
            WHERE id = '$id';";

        $simpan = mysqli_query($conn, $query);

        if ($simpan) {
            mysqli_query($conn, "COMMIT");
            header("Location:../../index.php?page=anggota&edit=berhasil");
        } else {
            mysqli_query($conn, "ROLLBACK");
            header("Location:../../index.php?page=anggota&edit=gagal");
        }
    }
}


?>

<form action="apps/anggota/edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Username :</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autocomplete="off" value="<?= $data['username']; ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Password :</label>
                <input type="text" name="password" class="form-control" placeholder="Masukkan Password" required autocomplete="off" value="<?= $data['password']; ?>">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Level :</label>
                <select type="text" name="level" rows="3" class="form-control" required>
                    <option value="pengawas" <?= ($data['level'] == 'pengawas') ? 'selected' : ''; ?>>Pengawas</option>
                    <option value="pimpinan" <?= ($data['level'] == 'pimpinan') ? 'selected' : ''; ?>>Pimpinan</option>
                </select>

            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="tambah_anggota" id="submit"><i class="fas fa-plus"></i>Tambah Data</button>
</form>

<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>