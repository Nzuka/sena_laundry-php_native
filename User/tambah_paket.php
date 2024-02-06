<?php
require '../Admin/function.php';
if(isset($_POST["submit"])){
        if(tambah_pesanan($_POST) > 0){
                echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href= 'tabel_pesanan.php';
                </script>
                ";
        }else {
                echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href= 'tabel_pesanan.php';
                </script>";
        }
}

include 'layout_header.php'
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan</h1>
                </div>
                <div class="row mt-0">
                <div class="col-12">
                    <form action="" method="post">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk">
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <select name="nama_paket" id="nama_paket" class="form-control">
                        <option value="basah">
                            Paket Basah
                        </option>
                        <option value="kering">
                            Paket Kering
                        </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat Paket</label>
                        <input type="text" class="form-control" name="berat_paket" id="berat_paket">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <button class="btn btn-primary" name="tambah_paket">Tambah Pesanan</button>
                    </form>
                </div>
                </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<?php
include '../layout_footer.php'
?>