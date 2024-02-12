<?php
session_start();

// memanggil file functions
include '../../../config/functions.php';
// memanggil koneksi database
include '../../../config/koneksi.php';

if (isset($_POST['tambah_senal'])) {


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

        $pokmas = input($_POST["pokmas"]);
        $progres = input($_POST["progres"]);
        $kegiatan = input($_POST["kegiatan"]);

        $gambar1 = upload1();
        if (!$gambar1) {
            return false;
        }
        $gambar2 = upload2();
        if (!$gambar2) {
            return false;
        }
        // Mendapatkan tanggal saat ini
        $tanggal_sekarang = date("Y-m-d");


        $query = "INSERT INTO tb_muara VALUES ('','$pokmas','$kegiatan','$progres','$gambar1','$gambar2','$tanggal_sekarang')";

        $simpan = mysqli_query($conn, $query);

        if ($simpan) {
            mysqli_query($conn, "COMMIT");
            header("Location:../../../index.php?page=inmuara&add=berhasil");
        } else {
            mysqli_query($conn, "ROLLBACK");
            header("Location:../../../index.php?page=inmuara&add=gagal");
        }
    }
}


?>

<form action="apps/input/putak/tambah.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Pokmas :</label>
                <input type="text" name="pokmas" class="form-control" placeholder="Masukan Nama Pokmas" required autocomplete="off">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Progres :</label>
                <input type="text" name="progres" class="form-control" placeholder="Masukkan Progres" required autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Kegiatan :</label>
                <textarea type="text" name="kegiatan" rows="3" class="form-control" value="" placeholder="Masukkan Kegiatan" required></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Dokumentasi :</label>
                <div class="input-group">
                    <input type="file" name="file1" id="file1" style="display: none;">
                    <div class="input-group my-3">
                        <button type="button" id="pilih_foto1" class="browse btn btn-primary">Pilih gambar</button>
                        <input type="text" id="file_name1" readonly class="ml-2">
                    </div>
                    <img id="preview1" style="max-width: 100%; max-height: 300px; margin-top: 10px;">
                </div>

                <div class="input-group">
                    <input type="file" name="file2" id="file2" style="display: none;">
                    <div class="input-group my-3">
                        <button type="button" id="pilih_foto2" class="browse btn btn-primary">Pilih gambar</button>
                        <input type="text" id="file_name2" readonly class="ml-2">
                    </div>
                    <img id="preview2" style="max-width: 100%; max-height: 300px; margin-top: 10px;">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="tambah_senal" id="submit"><i class="fas fa-plus"></i>Tambah Data</button>
    </div>
</form>

<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<script>
    // Function to trigger file input when "Choose Image" button is clicked
    $(document).on("click", "#pilih_foto1", function() {
        var file = $(this).parents().find("#file1");
        file.trigger("click");
    });

    $(document).on("click", "#pilih_foto2", function() {
        var file = $(this).parents().find("#file2");
        file.trigger("click");
    });


    // Function to handle file input change
    $('input[type="file"]').change(function(e) {
        var id = $(this).attr("id").replace("file", "");
        var fileName = e.target.files[0].name;

        // Set the file name and preview for the corresponding image
        $("#file_name" + id).val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // Set the preview for the corresponding image
            document.getElementById("preview" + id).src = e.target.result;
        };

        // Read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>