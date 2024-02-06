<?php

require_once __DIR__ . '/vendor/autoload.php';

require './Admin/function.php';
$siswa=query("SELECT * FROM pembayaran");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
    <link rel="stylesheet" href="cssprint/print.css">
</head>
<body>
    <h1>Data Pembayaran</h1>
    <table class="table1" border="1" cellpadding="15" cellspacing="4">
        <tr>
            <th width="50px">No.</th>
            <th width="700px">Tanggal</th>
            <th width="700px">Nama</th>
            <th width="800px">Kelas</th>
            <th width="100px">Jurusan</th>
            <th width="150px">Nominal</th>
            <th width="100px">keterangan</th>
        </tr>';

        $i = 1;
        foreach ($siswa as $row) {
            $html .= '<tr>
            <td>'. $i++ .'</td>
            <td>'. $row["tanggal"] .'</td>
            <td>'. $row["nama"] .'</td>
            <td>'. $row["kelas"] .'</td>
            <td>'. $row["jurusan"] .'</td>
            <td>'. $row["nominal"] .'</td>
            <td>'. $row["ket"] .'</td>
            </tr>';
        }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-pembayaran.pdf', \Mpdf\Output\Destination::INLINE); // 'I' or '\Mpdf\Output\Destination::INLINE'
?>