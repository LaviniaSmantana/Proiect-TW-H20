<?php

include 'config.php';

error_reporting(0);



session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['submit'])){

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  // $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'uploaded_img/'.$image;

  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password' AND email = '$email'") or die('query failed');

  if(mysqli_num_rows($select) > 0){
     echo "User already exists!"; 
  }else{
     if($password != $cpassword){
        echo "Confirm password not matched!";
     }elseif($image_size > 2000000){
        echo "Image size is too large!";
     }else{
        $insert = mysqli_query($conn, "INSERT INTO `users`(username, email, password, image) VALUES('$username', '$email', '$password', '$image')") or die('query failed');

        if($insert){
           move_uploaded_file($image_tmp_name, $image_folder);
           echo "Registered successfully!";
           header('location:login.php');
        }else{
           echo "Registeration failed!";
        }
     }
  }

}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Register Form</title>
        <link rel="stylesheet" href="css/register.css">
        <link rel="icon" type="image/png" href="images/icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/a6653207c3.js"></script>
    </head>
<div class="container">
</div>
    <body>
        <div class="logo">
            <img src="images/logo.png" class="logo">
        </div>
        <div class="center">
            <h1>Register</h1>
            <form method="POST">
                <div class="txt_field">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <input type="text" required id="username" name="username" value="<?php echo $username?>">
                  <label>Username</label> 
                </div>
                <div class="txt_field">
                  <i class="fa fa-key" aria-hidden="true"></i> 
                  <input type="password" required id="password" name="password" value="<?php echo $_POST['password']?>">
                  <label>Password</label> 
                </div>
                <div class="txt_field">
                  <i class="fa fa-key" aria-hidden="true"></i>
                  <input type="password" required id="password" name="cpassword" value="<?php echo $_POST['cpassword']?>">
                  <label>Confirm Password</label> 
                </div>
                <div class="txt_field">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <input type="email" required id="email" name="email" value="<?php echo $email?>">
                  <label>Email</label>
                </div>
                <div class="txt_field">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                  <input type="file" name="image" accept=".jpg,.jpeg,.png">
                  <label></label>
                </div>
                <input type="submit" value="REGISTER" button name="submit">
                <div class="signup_link">
                  Already a member? <a href="login.php">Login here.</a>
              </div>
                <div class="mascott">
                    <img src="images/sodalicious.png" class="mascott">
                </div>
            </form>     
        </div>
    </body>    