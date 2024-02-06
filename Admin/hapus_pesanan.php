<?php
require 'function.php';
$id_pesanan = $_GET["id_pesanan"];
if(hapuspesanan($id_pesanan) > 0) {
   echo "
   <script>
   alert('data berhasil dihapus!');
   document.location.href='tabel_pesanan.php';
   </script>
   ";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
    document.location.href='tabel_pesanan.php';
    </script>
    ";
}
?>