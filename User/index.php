<?php
require '../Admin/function.php';
$pesanan = "SELECT * FROM pesanan WHERE id = 'id'";
session_start();

include '../layout_header.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Berat Paket</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal Pending</th>
                                            <th>Tanggal Proses</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $where_id = "WHERE id = $id";
                                    if($_SESSION['user_type'] == 'admin'){
                                        $pesanan = mysqli_query($conn, "SELECT
                                        user_form.name,
                                        paket.nama_paket,
                                        pesanan.berat,
                                        pesanan.total_harga,
                                        pesanan.tgl_pending,
                                        pesanan.tgl_proses,
                                        pesanan.tgl_selesai,
                                        pesanan.tgl_diterima,
                                        pesanan.status
                                        FROM
                                        user_form
                                        JOIN
                                        pesanan ON user_form.id = pesanan.user_id
                                        JOIN
                                        paket ON pesanan.paket_id = paket.id_paket");
                                    } else {
                                        $pesanan = mysqli_query($conn, "SELECT
                                        user_form.name,
                                        paket.nama_paket,
                                        pesanan.berat,
                                        pesanan.total_harga,
                                        pesanan.tgl_pending,
                                        pesanan.tgl_proses,
                                        pesanan.tgl_selesai,
                                        pesanan.tgl_diterima,
                                        pesanan.status
                                        FROM
                                        user_form
                                        JOIN
                                        pesanan ON user_form.id = pesanan.user_id
                                        JOIN
                                        paket ON pesanan.paket_id = paket.id_paket
                                    $where_id");
                                    }
                                    if ($pesanan) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($pesanan)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['nama_paket']; ?></td>
                                                <td><?php echo $row['berat']; ?>kg</td>
                                                <td><?php echo $row['total_harga']; ?></td>
                                                <td><?php echo $row['tgl_pending']; ?></td>
                                                <td><?php echo $row['tgl_proses']; ?></td>
                                                <td><?php echo $row['tgl_selesai']; ?></td>
                                                <td><?php echo $row['tgl_diterima']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "Query failed: " . mysqli_error($conn);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
include '../layout_footer.php';
?>