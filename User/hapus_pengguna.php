<?php
require '../Admin/function.php';
$id = $_GET["id"];
if(hapusprofil($id) > 0) {
   echo "
   <script>
   alert('data berhasil dihapus!');
   document.location.href='tabel_pengguna.php';
   </script>
   ";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
    document.location.href='tabel_pengguna.php';
    </script>
    ";
}
?>