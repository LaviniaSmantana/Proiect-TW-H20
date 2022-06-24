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

?> 


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>SoDrO - Products Catalog</title>
        <link rel="stylesheet" href="css/style-products-startup.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="icon" type="image/png" href="images/icon.png">
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
                    <li><a href="user_account.php">ACCOUNT</a></li>
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
                    <li><a href="products-catalog.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </div> 
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    
   
    

    <div class="categories">
        <h1>PRODUCTS CATALOG</h1>
        <div class="row">
            <div class="category-col">
                <img src="images/pepsi.png">
                <div class="layer"> 
                   <a href="carbonated.php"> <h3>CARBONATED</h3> </a>
                </div>
            </div>

            <div class="category-col">
                <img src="images/cappy.jpg">
                <div class="layer">
                   <a href="noncarbonated.php"> <h3>NONCARBONATED</h3> </a>
                </div>
            </div>

            <div class="category-col">
               <img src="images/evian.jpg">
                <div class="layer">
                    <a href="water.php"> <h3>WATER</h3> </a>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="category-col">
               <img src="images/sirop-fragute.jpg">
                <div class="layer">
                    <a href="syrups.php"><h3>SYRUPS</h3> </a>
                </div>
            </div>

            <div class="category-col">
                <img src="images/ladorna.jpg">
                 <div class="layer">
                     <a href="milks.php"><h3>MILKS</h3> </a>
                 </div>
             </div>

             <div class="category-col">
                <img src="images/RedBull.png">
                 <div class="layer">
                     <a href="energydrinks.php"><h3>ENERGY DRINKS</h3> </a>
                 </div>
             </div>
            
            </div>

    </div>

 <div class="bubbles">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
    <img src="images/bubble.png">
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