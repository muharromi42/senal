<?php

require_once __DIR__ . '../../../../plugins/vendor/autoload.php';
require '../../../config/koneksi.php';
require '../../../config/functions.php';
$muara = query("SELECT * FROM tb_muara");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Sekat Kanal muara</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #000; /* Tambahkan garis hitam 1px pada seluruh elemen tabel */
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

    </style>
</head>
<body>
    <h1 style="text-align: center">Daftar Data Sekat Kanal muara</h1>
    <br/>
    <table id="table1" class="table table-bordered table-striped" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="100px">Pokmas</th>
                                    <th width="200px">Kegiatan</th>
                                    <th width="50px">Progres</th>
                                    <th colspan="2">
                                        <center>Dokumentasi</center>
                                    </th>
                                </tr>
                            </thead>';
$i = 1;
foreach ($muara as $row) {
    $html .= '  <tbody>
<tr>
    <td>' . $i++ . '</td>
    <td>' . $row["pokmas"] . '</td>
    <td>' . $row["kegiatan"] . '</td>
    <td>' . $row["progres"]  . '%</td>
    <td><img src="../../../assets/dokumentasi/' . $row["foto1"] . '" width="200" alt=""></td>
    <td><img src="../../../assets/dokumentasi/' . $row["foto2"] . '" width="200" alt=""></td>
</tr>
</tbody>';
}

$html .= ' </table>
</body>
</html>';

$mpdf->WriteHTML($html);
// Mengatur nama file yang diunduh
$namaFile = 'Daftar_Sekat_Kanal_Medak.pdf';
$mpdf->Output($namaFile, 'I');
