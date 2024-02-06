<?php
session_start();
require 'function.php';
$id = "SELECT * FROM user_form";
include '../layout_header.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                     <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Pengguna</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="tambah_pengguna.php" class="btn btn-sm btn-primary"><i
                                class="fas fa-download fa-sm text-white-50"></i>Tambah Pengguna</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $where_id = "WHERE id = $id";
                                    if($_SESSION['user_type'] == 'admin'){
                                        $user = mysqli_query($conn, "SELECT * FROM user_form");
                                    } else {
                                        $user = mysqli_query($conn, "SELECT * FROM user_form $where_id");
                                    }
                                    if ($user) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($user)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['user_type']; ?></td>
                                                <td>
                                                    <a href="ubah_profil.php?id=<?php echo $row['id']; ?>">Ubah</a>
                                                    <a href="hapus_pengguna.php?id=<?php echo $row['id']; ?>">Hapus</a>
                                                </td>
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