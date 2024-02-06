<?php
require 'function.php';
$id_paket = $_GET['id_paket'];

$paket = query("SELECT * FROM paket WHERE id_paket=$id_paket")[0];
if (isset($_POST["submit"])) {
    if (ubahpaket($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!')
        document.location.href = 'tabel_paket.php'
        </script>
        "; 
    } else {
        echo "
        <script>
        alert('data gagal diubah!')
        document.location.href = 'tabel_paket.php'
        </script>
        ";
    }
}
include '../layout_header.php';
?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mt-0">
                    <div class="col-12">
                        <form action="" method="post">
                        <input type="hidden" name="id_paket" value="<?= $paket["id_paket"];?>">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control" id="nama_paket" required value="<?= $paket['nama_paket'];?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga_paket" class="form-control" id="harga_paket" required value="<?= $paket['harga_paket'];?>">
                        </div>
                        <button class="btn btn-primary" name="submit">Ubah Paket</button>
                        </form>
                    </div>
                    </div>
                    </div>
                    <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->
<?php
include '../layout_footer.php';
?>