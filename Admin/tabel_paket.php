<?php
require '../Admin/function.php';
$paket = query("SELECT * FROM paket");

include '../layout_header.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Paket</h1>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="tambah_paket.php" class="btn btn-primary"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Paket</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Paket</th>
                                            <th>Nama Paket</th>
                                            <th>Harga Paket</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1 ?>
                                    <?php
                                        foreach ($paket as $row) : ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row["nama_paket"]; ?></td>
                                        <td><?= $row["harga_paket"]; ?></td>
                                        <td>
                                            <a href="ubah_paket.php?id_paket=<?= $row["id_paket"]; ?>">Update</a>
                                            <a href="hapus_paket.php?id_paket=<?= $row["id_paket"]; ?>"onclick="return confirm('Benar ada dihapus'); ">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
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
include '../layout_footer.php'
?>