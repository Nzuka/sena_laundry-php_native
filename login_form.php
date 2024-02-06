<?php
@include 'config.php';
session_start();

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
   $id = $_COOKIE['id'];
   $key = $_COOKIE['key'];
 
   $result = mysqli_query($conn, "SELECT email FROM user_form WHERE id = $id");
   $row = mysqli_fetch_assoc($result);
 
   //cek cookie dan email
   if( $key === hash('sha256', $row['email'])){
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_type'] = $row['user_type'];
      $_SESSION['id'] = $row['id'];
      $_SESSION["login"] = true;
   }
 }

if(isset($_SESSION["login"])){
   header("Location:User/index.php");
   exit;
}

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      //cookie
      
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_type'] = $row['user_type'];
      $_SESSION['id'] = $row['id'];
      $_SESSION["login"] = true;
      
      if(isset($_POST['remember'])){
         setcookie($row['user_type'] , $row['id'], time() + 60);
         setcookie('key', hash('sha256', $row['email']), time()+60);
      }

      if($row['user_type'] == 'admin'){
         header('location: Admin/index.php');
      }else if($row['user_type'] == 'user'){
         header('location: User/index.php');
      }

   }else{
      $error[] = 'Email dan Password tidak sesuai';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="csslogin/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Masukkan email anda!">
      <input type="password" name="password" required placeholder="Masukkan password anda!">
   <div class="cookie">
      <input type="checkbox" name="remember" id="remember"></li>
      <label for="remember">Remember</label>
   </div>
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>Belum punya akun? <a href="register_form.php">Register sekarang</a></p>
      
   </form>
</div>

</body>
</html>