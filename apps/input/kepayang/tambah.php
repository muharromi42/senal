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

                <div class="input-group">
                    <input type="file" name="file3" id="file3" style="display: none;">
                    <div class="input-group my-3">
                        <button type="button" id="pilih_foto3" class="browse btn btn-primary">Pilih gambar</button>
                        <input type="text" id="file_name3" readonly class="ml-2">
                    </div>
                    <img id="preview3" style="max-width: 100%; max-height: 300px; margin-top: 10px;">
                </div>
            </div>
        </div>
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