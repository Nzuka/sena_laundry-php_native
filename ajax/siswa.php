<?php
require '../Admin/function.php';
$keyword = $_GET["keyword"];

    $query = "SELECT * FROM siswa
    WHERE
    nis LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' 
    ";
$siswa = query($query);
?>
<table class="table1" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th width="50px">No.</th>
            <th width="200px">Opsi</th>
            <th width="150px">Nis</th>
            <th width="200px">Nama</th>
            <th width="200px">Kelas</th>
            <th width="150px">Jurusan</th>
            <th width="150px">Foto</th>
        </tr>
        <?php $i=1 ?>
        <?php
        foreach ($siswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubahsiswa.php ?id=<?= $row["id_siswa"]; ?>">Update</a>
                <a href="hapussiswa.php ?id=<?= $row["id_siswa"]; ?>"onclick="return confirm('Benar ada dihapus'); ">Delete</a>
            </td>
            <td><?= $row["nis"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kelas"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><img src="../images/<?= $row["foto"]; ?>" width="70"></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>