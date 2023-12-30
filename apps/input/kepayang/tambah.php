<?php
session_start();
?>

<form action="apps/input/kepayang/tambah.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Pokmas :</label>
                <input type="text" name="pokmas" class="form-control" placeholder="Masukan Nama Pokmas" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Progres :</label>
                <input type="email" name="progres" class="form-control" placeholder="Masukkan Progres" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Kegiatan :</label>
                <textarea type="text" name="kegiatan" rows="3" class="form-control" value="" placeholder="Masukkan Kegiatan" required></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Dokumentasi :</label>
        <div class="input-group mb-2 ">
            <div class="custom-file">
                <input type="file" class="custom-file-input form-control" name="file1" id="file1">
                <label class="custom-file-label" id="file_name1"></label>
            </div>
        </div>
        <img id="preview1" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
        <div class="input-group mb-2 ">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto2">
                <label class="custom-file-label" for="foto2">Pilih Gambar</label>
            </div>
        </div>
        <div class="input-group mb-2 ">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto3">
                <label class="custom-file-label" for="foto3">Pilih Gambar</label>
            </div>
        </div>
        <input type="file" name="file1" id="file1" style="display: none;">
        <button type="button" id="pilih_foto1">Choose Image 1</button>
        <img id="preview1" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
        <input type="text" id="file_name1" readonly>

        <input type="file" name="file2" id="file2" style="display: none;">
        <button type="button" id="pilih_foto2">Choose Image 2</button>
        <img id="preview2" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
        <input type="text" id="file_name2" readonly>

        <input type="file" name="file3" id="file3" style="display: none;">
        <button type="button" id="pilih_foto3">Choose Image 3</button>
        <img id="preview3" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
        <input type="text" id="file_name3" readonly>
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

    $(document).on("click", "#pilih_foto3", function() {
        var file = $(this).parents().find("#file3");
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