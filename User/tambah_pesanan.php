<?php
require '../admin/function.php';
session_start();

$paket = query("SELECT * FROM paket");
$user = query("SELECT * FROM user_form");

if(isset($_POST["submit"])){
        if(nambahpesanan2($_POST) > 0){
                echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href= 'tabel_pesanan.php';
                </script>
                ";
        }else {
            echo "Query failed: " . mysqli_error($conn);
        }
}

include '../layout_header.php';                                               
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
                        <label>Nama Pelanggan</label>
                        <?php
                            $id = $_SESSION['id'];
                            $query = mysqli_query($conn, "SELECT * FROM user_form WHERE id = $id");
                            ?>
                            <?php
                                while ($row = mysqli_fetch_array($query)) {
                                  echo '<input type="text" name="user_id" id="user_id"  class="form-control"  readonly="" value="' . $row['id'] . '">';
                                }
                                ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pending</label>
                        <input type="date" class="form-control" id="tgl_pending" name="tgl_pending" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <select name="paket_id" id="paket_id" class="form-control">
                            <?php foreach ($paket as $row) : ?>
                                <option value="<?= $row['id_paket']; ?>" readonly="">
                                    <?= $row['nama_paket']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="text" class="form-control" id="berat" name="berat" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" name="submit">Tambah Pesanan</button>
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
    include '../layout_footer.php';
    ?>