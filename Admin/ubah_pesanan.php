<?php
require 'function.php';
$id_pesanan = $_GET['id_pesanan'];

$pesanan = query("SELECT * FROM pesanan WHERE id_pesanan=$id_pesanan")[0];
if (isset($_POST["submit"])) {
    if (ubahpesanan($_POST) > 0) {
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
                        <input type="hidden" name="id_pesanan" value="<?= $pesanan["id_pesanan"];?>">
                        <div class="form-group">
                            <label>Tanggal Proses</label>
                            <input type="date" name="tgl_proses" class="form-control" id="tgl_proses" required value="<?= $pesanan['tgl_proses'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" required value="<?= $pesanan['tgl_selesai'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Diterima</label>
                            <input type="date" name="tgl_diterima" class="form-control" id="tgl_diterima" required value="<?= $pesanan['tgl_diterima'];?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status">
                            <option value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="diterima">Diterima</option>
                        </select>
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