<!DOCTYPE html>
<html>
  <head>
    <title>Rental Mobil - Login Admin</title>
    
    <!-- Skrip CSS -->
   <link rel="stylesheet" href="../css/admin.css"/>
  
  </head>   
  <body>
  <center>
    <div class="form">
        <div class="main">
        <div class="gambar">
        <h1 >Login sebagai admin</h2>
           <form method="POST">
            <label>Username </label>
            <input size="30" class="login_regis" id="name" name="username" placeholder="Masukan username admin" type="text">
            <br>
            <label>Password </label>
            <input size="30" class="login_regis" id="password" name="password" placeholder="Masukan password admin" type="password">
            <br>
            <input type="submit" name="loginadmin" id="submit" value="Login">
            <p><a href="../index.php" class="back">Kembali ke beranda</a></p>         
          </form>
          </div>
        </div>
   </div>
    </center>
  </body>
</html>

<?php 
include 'proses.php';
$do = new ClassSistem();
 ?>

<?php 
if (isset($_POST['loginadmin'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $do->selectAdmin($user,$pass);
}

 ?>