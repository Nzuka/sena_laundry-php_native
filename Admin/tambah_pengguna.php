<?php
@include '../config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User sudah ada!';

   }else{

      if($pass != $cpass){
         $error[] = 'Pssword tidak sesuai!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

};

include '../layout_header.php';
?>
   
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
</div>
<div class="row mt-0">
<div class="col-12">
    <form action="" method="post">

    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

    <div class="form-group">
        <label>Nama Pelanggan</label>
        <input type="text" class="form-control" id="name" name="name" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="email" name="email" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Konfirmasi Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Level</label>
        <select name="user_type" class="form-control">
         <option value="user">user</option>
      </select>
    </div>
    <br>
    <button class="btn btn-primary" name="submit">Tambah Pengguna</button>
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