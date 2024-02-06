<?php
require 'function.php';
if(isset($_POST["submit"])){
        if(tambah_paket($_POST) > 0){
                echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href= 'tabel_paket.php';
                </script>
                ";
        }else {
                echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href= 'tabel_paket.php';
                </script>";
        }
}

include '../layout_header.php'
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Paket</h1>
                </div>
                <div class="row mt-0">
                <div class="col-12">
                    <form action="" method="post">
                    <div class="form-group">
                        <label>No Paket</label>
                        <input type="text" class="form-control" name="id_paket" id="id_paket">
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket">
                    </div>
                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="text" class="form-control" name="harga_paket" id="harga_paket">
                    </div>
                    <button class="btn btn-primary" name="submit">Tambah Paket</button>
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