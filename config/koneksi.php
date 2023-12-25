<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbsenal";
// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
