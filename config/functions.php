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

// fungsi menghitung jumlah data kepayang
function hitungJumlahKepayang($conn)
{
    // Query untuk menghitung jumlah data
    $jumlah = "SELECT COUNT(*) as total FROM tb_kepayang";
    $result = mysqli_query($conn, $jumlah);

    // Ambil hasil query
    $data = mysqli_fetch_assoc($result);

    // Simpan jumlah data dalam variabel
    $totalDataKepayang = $data['total'];

    return $totalDataKepayang;
}

// fungsi menghitung jumlah data kepayang
function hitungJumlahMedak($conn)
{
    // Query untuk menghitung jumlah data
    $jumlah = "SELECT COUNT(*) as total FROM tb_medak";
    $result = mysqli_query($conn, $jumlah);

    // Ambil hasil query
    $data = mysqli_fetch_assoc($result);

    // Simpan jumlah data dalam variabel
    $totalDataMedak = $data['total'];

    return $totalDataMedak;
}

// fungsi menghitung jumlah data kepayang
function hitungJumlahgeronggang($conn)
{
    // Query untuk menghitung jumlah data
    $jumlah = "SELECT COUNT(*) as total FROM tb_geronggang";
    $result = mysqli_query($conn, $jumlah);

    // Ambil hasil query
    $data = mysqli_fetch_assoc($result);

    // Simpan jumlah data dalam variabel
    $totalDataGeronggang = $data['total'];

    return $totalDataGeronggang;
}

// fungsi menghitung jumlah data kepayang
function hitungJumlahPutak($conn)
{
    // Query untuk menghitung jumlah data
    $jumlah = "SELECT COUNT(*) as total FROM tb_putak";
    $result = mysqli_query($conn, $jumlah);

    // Ambil hasil query
    $data = mysqli_fetch_assoc($result);

    // Simpan jumlah data dalam variabel
    $totalDataPutak = $data['total'];

    return $totalDataPutak;
}

// fungsi menghitung jumlah data kepayang
function hitungJumlahMuara($conn)
{
    // Query untuk menghitung jumlah data
    $jumlah = "SELECT COUNT(*) as total FROM tb_muara";
    $result = mysqli_query($conn, $jumlah);

    // Ambil hasil query
    $data = mysqli_fetch_assoc($result);

    // Simpan jumlah data dalam variabel
    $totalDataMuara = $data['total'];

    return $totalDataMuara;
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
                window.history.back();
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
                window.history.back();
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
                window.history.back();
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
                window.history.back();
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
