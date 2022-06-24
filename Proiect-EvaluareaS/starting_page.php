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
        <title>Welcome to SoDrO</title>
        <link rel="stylesheet" href="css/style_starting-page.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="svg-to-pdfkit.js"></script>
    <script src="svg-export.min.js"></script>
    </head>

<body>
    <section class="header">
        <nav>
            <a><img src="images/logo.png"> </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="user_account.php">ACCOUNT</a></li>
                    <li><a href="products-catalog.php">PRODUCTS</a></li>
                    <li><a href="stats.php">STATISTICS</a></li>
                    <li><a href="starting_page.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </div> 
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    
    <div class="container-startup">
        <h1>SOFT DRINKS ORGANIZER</h1>
        <div class="profile">
        <?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?> 
      
        <p>Welcome back, <?php echo $fetch['username']; ?>! </p>
        </div>
    </div>
    </section>




<?php
$result = mysqli_query($conn,"SELECT * FROM `products` order by bought desc LIMIT 3");
$row1 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row3 = mysqli_fetch_assoc($result);
?>



<section class="top-drinks">
    <h1>This week's top 3 most selling drinks</h1>

    <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">

            <div class="slide first">
              <?php
                echo "<img src='".$row1['image']."'>" 
              ?>
            </div>
            <div class="slide">
            <?php
                echo "<img src='".$row2['image']."'>" 
              ?>
            </div>
            <div class="slide">
            <?php
                echo "<img src='".$row3['image']."'>" 
              ?>
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>
            <!-- automatic navigation end -->
        </div>
        <!-- manual navigation start  -->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
    </div>

    <script type="text/javascript">
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 3){
                counter = 1;
            }
        }, 4000);
    </script>
</section>


<?php

$web_url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

$web_url1="http://" . $_SERVER["SERVER_NAME"] ;

$str = "<?xml version='1.0' ?>";
$str .="<rss version='2.0'>";
        $str .= "<channel>";
            $str .= "<title>SOFT DRINKS ORGANIZER</title>";
            $str .= "<description>Our website</description>";
            $str .= "<language>en-US</language>";
            $str .= "<link>$web_url</link>";

            $conn = mysqli_connect("localhost", "root", "", "login_and_register_db");
            $result = mysqli_query($conn, "SELECT * FROM `products` order by bought desc");

            while ($row = mysqli_fetch_object($result))
            {
                $str .= "<item>";
                $str .= "<title>" . htmlspecialchars($row->name) . "</title>";
                $str .= "<description>" . htmlspecialchars($row->price) . "</description>";
                $str .= "<description>" . htmlspecialchars($row->bought) . "</description>";
                $str .= "<link>" . $web_url1  . "/Proiect TW"  . "/all_products" . "/" . $row->code . ".php"  . "</link>";
                $str .= "</item>";
            }
        $str .= "</channel>";
$str .= "</rss>";

file_put_contents("rss.xml", $str);

?>
<div class="rss-data">

<h2>RSS Data Flow: </h2>
<a href="rss.xml" target="_blank">
    <img src="images/feed-icon.png" style="width: 100px;">
</a>    
</div>

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

<!-- LOGIN -->

<!-- REGISTER -->

<!-- SHOPPING CART -->


<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
        navLinks.style.right = "0";
    }
    function hideMenu() {
        navLinks.style.right = "-250px";
    }
</script>

<script>
        document.querySelector("#btn_export_svg").onclick = function(){
            svgExport.downloadSvg(document.querySelector("#mysvg"), "Circles and rectangles chart");
        };
        document.querySelector("#btn_export_jpeg").onclick = function(){
            svgExport.downloadJpeg(document.querySelector("#mysvg"), "Circles and rectangles chart");
        };
        document.querySelector("#btn_export_png").onclick = function(){
            svgExport.downloadPng(document.querySelector("#mysvg"), "Circles and rectangles chart", { width: 5000, height: 5000 });
        };
        document.querySelector("#btn_export_png_string").onclick = function(){
            var svg_string = document.querySelector("#mysvg").outerHTML;
            svg_string = svg_string.replace(">", ">" + document.getElementsByTagName("style")[0].outerHTML);
            svgExport.downloadPng(svg_string, "Circles and rectangles chart");
        };
        document.querySelector("#btn_export_pdf").onclick = function(){
            svgExport.downloadPdf(document.querySelector("#mysvg"), "Circles and rectangles chart", 
            { 
                pdfOptions: {
                    chartCaption: "Hi there.  This is a test chart caption. ", 
                    pdfTextFontFamily: "Segan",
                    customFonts: [ { url: "fonts/Segan/Segan-Light.ttf", fontName: "Segan" } ]
                } 
            });
        };
    </script>




<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>