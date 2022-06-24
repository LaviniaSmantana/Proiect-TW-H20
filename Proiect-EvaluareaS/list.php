<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}


$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Soft Drinks</title>
        <link rel="stylesheet" href="css/style-shopping-cart.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
</head>
<body>
    <section class="header">
        <nav>
            <a><img src="images/logo.png"> </a>
            <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="starting_page.php">HOME</a></li>
                    <li><a href="products-catalog.php">CATALOG</a></li>
                    <li><a href="user_account.php">ACCOUNT</a></li>
                    <li><a href="list.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
<!-- cart items details -->
<div class="small-container cart-page">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<tbody>
    <tr>
        <th></th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Items Total</th>
    </tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
    <tr>
        <!-- item name -->
        <td>
            <div class="cart-info">
                <img src='<?php echo $product["image"]; ?>' width="50" height="40"/>
                </td>
                <td><?php echo $product["name"]; ?><br />
                <form method='post' action=''>
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="remove" />
                <button type='submit' class='remove'>Remove Item</button>
                <!-- <i type='submit' class='bx bxs-trash-alt cart-remove'></i> -->
                </form>
            </div>
        </td>
        <!-- quantity  -->
        <td>
            <form method='post' action=''>
            <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
            <input type='hidden' name='action' value="change" />
            <select name='quantity' class='quantity' onChange="this.form.submit()">
            <option <?php if($product["quantity"]==1) echo "selected";?>
            value="1">1</option>
            <option <?php if($product["quantity"]==2) echo "selected";?>
            value="2">2</option>
            <option <?php if($product["quantity"]==3) echo "selected";?>
            value="3">3</option>
            <option <?php if($product["quantity"]==4) echo "selected";?>
            value="4">4</option>
            <option <?php if($product["quantity"]==5) echo "selected";?>
            value="5">5</option>
            </select>
            </form>
        </td>
        <!-- unit price -->
        <td><?php echo $product["price"]." Lei"; ?></td>
        <!-- items total  -->
        <td><?php echo $product["price"]*$product["quantity"]." Lei"; ?></td>
    </tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>

</tbody>
</table> 
<div class="total-price">
<table>
        <tr>
            <td>Total</td>
            <td><?php echo $total_price." Lei"; ?></td>
            <td><button type="submit" value="Proceed to Checkout" class="checkout">Proceed to Checkout</button></td>
        </tr>

</table>
  <?php
}else{
 echo "<h3 >Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px; ">
<?php echo $status; ?>
</div>

</section>

<div class="about-us">
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
</div>

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