<?php
require '../Admin/function.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM pembayaran
    WHERE
    tanggal LIKE '$keyword%' OR
    nama LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    nominal LIKE '%$keyword%' OR
    ket LIKE '%$keyword%' 
    ";
$siswa = query($query);
?>
<table class="table1" border="1" cellpadding="15" cellspacing="4">
        <tr>
            <th>No.</th>
            <th>Opsi</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Nominal</th>
            <th>keterangan</th>
        </tr>
        <?php $i=1 ?>
        <?php
        foreach ($siswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php ?id=<?= $row["id_pembayaran"]; ?>">Update</a>
                <a href="hapus.php ?id=<?= $row["id_pembayaran"]; ?>"onclick="return confirm('Benar ada dihapus'); ">Delete</a>
            </td>
            <td><?= $row["tanggal"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kelas"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["nominal"]; ?></td>
            <td><?= $row["ket"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>