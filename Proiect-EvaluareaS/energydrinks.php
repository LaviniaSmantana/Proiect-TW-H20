<?php
session_start();
include('config.php');


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
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$conn,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-single-category.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="images/icon.png">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <title>SoDrO - Energy Drinks</title>
</head>
<body>

  <section class="header">
    <nav>
        <a><img src="images/logo.png"> </a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="starting_page.php">HOME</a></li>
                <li><a href="user_account.php">ACCOUNT</a></li>
                <li><a href="energydrinks.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                <li><a href="list.php"><img src="images/cart-icon.png" />
                    <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    Cart</a><span>
                    <?php echo $cart_count; ?></span>
                    <?php
                    }
                    ?></li>
            </ul>
        </div> 
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<br>
    
</section>
    
<div class="category">
 <div class="links">
 <h3><a href="water.php">Water</h3></a>
    <h3><a href="noncarbonated.php">Noncarbonated</h3></a>
    <h1>Energy Drinks</h1> 
    <h3><a href="syrups.php">Syrup</h3></a>
    <h3><a href="milks.php">Milk</h3></a>
    <h3><a href="carbonated.php">Carbonated</h3></a>
 </div>
 <?php
$result = mysqli_query($conn,"SELECT * FROM `products` where id>50 AND id<=60");
while($row = mysqli_fetch_assoc($result)){
    
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><a href='all_products/".$row['code'].".php'><img src='".$row['image']."'></a></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>".$row['price']." Lei</div>
    <button type='submit' class='buy'>Add to Cart</button>
    </form>
    </div>";
        }
    
?>
</div>

 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</body>
</html>