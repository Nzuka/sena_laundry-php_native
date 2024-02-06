<?php
require '../Admin/function.php';
$id = $_GET['id'];

$user = query("SELECT * FROM user_form WHERE id = $id")[0];
if (isset($_POST["submit"])) {
    if (profiluser($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!')
        document.location.href = 'tabel_pengguna.php'
        </script>
        "; 
    } else {
        echo "
        <script>
        alert('data gagal diubah!')
        document.location.href = 'tabel_pengguna.php'
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
                        <input type="hidden" name="id" value="<?= $user["id"];?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required value="<?= $user['name'];?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" id="email" required value="<?= $user['email'];?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" id="password" required value="<?= $user['password'];?>">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="user_type" id="" class="form-control" id="user_type" required value="<?= $user['user_type'];?>">
                            <option value="user">
                                user
                            </option>
                            </select>
                        </div>
                        <button class="btn btn-primary" name="submit">Submit</button>
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