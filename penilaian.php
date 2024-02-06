<?php
require './Admin/function.php';
if(isset($_POST["submit"])){
        if(penilaian($_POST) > 0){
                echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href= 'index.php.php';
                </script>
                ";
        }else {
                echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href= 'index.php.php';
                </script>";
        }
}

include './layout_header.php'
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h1 class="h3 mb-0 text-gray-800">Beri Penilaian</h1>
                </div>
                <div class="row mt-0">
                <div class="col-12">
                    <form action="" method="post">
                    <div class="form-group">
                        <label>Beri Penilaian</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan">
                    </div>
                    <button class="btn btn-primary" name="tambah_paket">Beri Penilaian</button>
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