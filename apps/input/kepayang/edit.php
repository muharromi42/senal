<?php
// Import file koneksi dan fungsi query
include('../../../config/koneksi.php'); // Sesuaikan dengan nama file koneksi Anda
include('../../../config/functions.php'); // Sesuaikan dengan nama file fungsi query Anda


// Ambil ID dari AJAX request
$id = $_POST['id'];

// Query untuk mengambil data berdasarkan ID
$data = query("SELECT * FROM tb_kepayang WHERE id = $id")[0];

if (isset($_POST['edit_senal'])) {
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

        $query = "UPDATE tb_kepayang SET 
            pokmas = '$pokmas',
            kegiatan = '$kegiatan',
            progres = '$progres',
            gambar1 = '$gambar1',
            gambar2 = '$gambar2'
            WHERE id = $id";

        $simpan = mysqli_query($conn, $query);

        if ($simpan) {
            mysqli_query($conn, "COMMIT");
            header("Location:../../../index.php?page=inkepayang&edit=berhasil");
        } else {
            mysqli_query($conn, "ROLLBACK");
            header("Location:../../../index.php?page=inkepayang&add=gagal");
        }
    }
}
?>

<!-- Formulir Edit Data -->
<form action="apps/input/kepayang/proses_edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="pokmas">Pokmas:</label>
                <input type="text" class="form-control" name="pokmas" value="<?= $data['pokmas']; ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="progres">Progres:</label>
                <input type="text" class="form-control" name="progres" value="<?= $data['progres']; ?>">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="kegiatan">Kegiatan:</label>
                <textarea type="text" class="form-control" name="kegiatan" rows="3"><?= $data['kegiatan']; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>

    <div class="form-group">
        <label for="foto1">Foto 1:</label>
        <input type="file" class="form-control" name="foto1">
        <img src="assets/dokumentasi/<?= $data['foto1']; ?>" width="200" alt="">
    </div>
    <div class="form-group">
        <label for="foto2">Foto 2:</label>
        <input type="file" class="form-control" name="foto2">
        <img src="assets/dokumentasi/<?= $data['foto2']; ?>" width="200" alt="">
    </div>
    <button type="submit" class="btn btn-success" name="edit_senal" id="submit"><i class="fas fa-edit"></i>Update Data</button>
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