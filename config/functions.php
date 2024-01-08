<?php

include 'koneksi.php';

// fungsi query menampilkan data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi upload gambar
function upload1()
{
    $namaFile = $_FILES['file1']['name'];
    $error = $_FILES['file1']['error'];
    $tmpName = $_FILES['file1']['tmp_name'];

    // cek apakah tidak ada gambar yg di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                window.location.href = '../../../index.php?page=inkepayang';
            </script>";
        return false;
    }

    // cek apakah file gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
                window.location.href = '../../../index.php?page=inkepayang';
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../../../assets/dokumentasi/' . $namaFileBaru);
    return $namaFileBaru;
}

function upload2()
{
    $namaFile = $_FILES['file2']['name'];
    $error = $_FILES['file2']['error'];
    $tmpName = $_FILES['file2']['tmp_name'];

    // cek apakah tidak ada gambar yg di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                window.location.href = '../../../index.php?page=inkepayang';
            </script>";
        return false;
    }

    // cek apakah file gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar')
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../../../assets/dokumentasi/' . $namaFileBaru);
    return $namaFileBaru;
}
