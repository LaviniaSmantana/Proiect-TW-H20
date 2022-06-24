<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `users` SET username = '$update_name', email = '$update_email' WHERE ID = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE ID = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE ID = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>SoDrO - Your Account</title>
        <link rel="stylesheet" href="css/style_useraccount.css">
        <link rel="icon" type="image/png" href="images/icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    </head>

<body>
    <section class="header">
        <nav>
            <a><img src="images/logo.png"> </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                  <li><a href="starting_page.php">HOME</a></li>
                    <li><a href="products-catalog.php">PRODUCTS</a></li>
                    <li><a href="list.php">CART</a></li>
                    <li><a href="user_account.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </div> 
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
      
<div class="update-profile">
 
<?php
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE ID = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }
?>

 <h2>Your Account</h2>
<form action="" method="post" enctype="multipart/form-data">
   <div class="avatar">
<?php
      if($fetch['image'] == ''){
         echo '<img src="images/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
   ?>
   </div>
   <div class="flex">
      <div class="inputBox">
         <span>username :</span>
         <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box">
         <span>your email :</span>
         <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
         <span>update your pic :</span>
         <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
      </div>
      <div class="inputBox">
      <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <span>old password :</span>
         <input type="password" name="update_pass" placeholder="enter previous password" class="box">
         <span>new password :</span>
         <input type="password" name="new_pass" placeholder="enter new password" class="box">
         <span>confirm password :</span>
         <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
      </div>
   </div>
   <input type="submit" value="update profile" name="update_profile" class="btn">
   <a href="starting_page.php" class="delete-btn">go back</a>

   <div class="mascott">
    <img src="images/sodalicious.png" class="mascott">
</div>

</form>

   </div>
</section>



<!-- ABOUT -->
<section class="about">
    <h1>ABOUT US</h1>
    <div class="row">
        <div class="icons">
            <p>
            <h3>Barzu <br> Andreea</h3>
            <a href="https://www.facebook.com/andreea.barzu"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://www.instagram.com/_andreeabarzu/"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            </p>
        </div>
        <div class="icons">
            <p> 
            <h3>Smantana <br> Lavinia</h3>
            <a href="https://www.facebook.com/lavinia.smantana/"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://www.instagram.com/laviniasmantana/"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            </p>
        </div>
        <div class="icons">
            <p>
            <h3>Ursache <br> Olivia-Deborah</h3>
            <a href="https://www.facebook.com/deboraholivia.ursache"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://www.instagram.com/deborah.ursache/"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            </p>
        </div>
    </div>

    <p class="about-app">
        We created this web application to help you manage your preferences for non-alcoholic beverage consumption. We also offer support for the management of related data: category, price, ingredients, images, restrictions, validity and others. Our system will provide support for shopping list activities, plus user administration.
    </p>
</section>

<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
        navLinks.style.right = "0";
    }
    function hideMenu() {
        navLinks.style.right = "-250px";
    }
</script>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </body>
</html>