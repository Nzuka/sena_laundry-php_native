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
    <h1>Pembayaran</h1>
    <p>Nama: '. $nama .' <br>
       Kelas: '. $kelas .' <br>
       Nominal:  '. $nominal .' <br>
       </p>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-pembayaran.pdf', \Mpdf\Output\Destination::INLINE); // 'I' or '\Mpdf\Output\Destination::INLINE'
?>