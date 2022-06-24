<?php

include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login.php');
}

?> 


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>SoDrO - Prodlacta</title>
        <link rel="stylesheet" href="style_products.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="../images/icon.png">
    </head>

<body>
    <section class="header">
        <nav>
        <a><img src="../images/logo.png"> </a>
            <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../starting_page.php">HOME</a></li>
                    <li><a href="../products-catalog.php">CATALOG</a></li>
                    <li><a href="../user_account.php">ACCOUNT</a></li>
                    <li><a href="../list.php">CART</a></li>
                    <li><a href="prodlacta.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                    <li><a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    
                    
                </ul>
                
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            
        </nav>
       
       


<!-- pagina produsului  -->
<div class="small-container">
    <div class="row">
             <img src="../images/prodlacta.jpg" width="100%">
         <div class="col-2">
             <p>Prodlacta 1L </p>
                 <i class="fa fa-star-o"></i>
                 <i class="fa fa-star-o"></i>
                 <i class="fa fa-star-o"></i>
                 <i class="fa fa-star-o"></i>
                 <i class="fa fa-star-o"></i>
             <h1> Prodlacta UHT Milk </h1>
             <h4>5.70 Lei</h4>
             <br>
             <br>
             <!-- <h5>Cantitate</h5>
               <input type="number" value="0" min="0" max="100"/>
             <a href="" class="btn">Add To Cart</a> -->
             <p> 
                <img src="../images/nutri-B.png"> 
                <img src="../images/nova-2.png">    
            </p>
         </div>
    </div>
</div>

<section class="about-product">
<!-- <h2> ABOUT PRODUCT</h2> -->

<table id="table">
        <tr>
            <th>Nutrition facts</th>
            <th>Per serving (100 ml)</th>
        </tr>
        <tr>
           <td>Energy</td>
           <td>181 kj (43 kcal)</td>
        </tr>
        <tr>
            <td>Fat</td>
            <td>1.5 g</td>
         </tr>
        <tr>
            <td>Saturated fat</td>
            <td>1.4 g</td>
        </tr>
        <tr>
            <td>Carbohydrates</td>
            <td>4.5 g</td>
        </tr>
        <tr>
            <td>Sugars</td>
            <td>4.5 g</td>
        </tr>
        <tr>
            <td>Fiber</td>
            <td>0 g</td>
        </tr>
        <tr>
            <td>Proteins</td>
            <td>3.1 g</td>
        </tr>
        <tr>
            <td>Salt</td>
            <td>0.1 g</td>
        </tr>
        <tr>
            <td>Calcium</td>
            <td>119 mg</td>
        </tr>
    </table>



    <div class="facts">
        <p> <h3>Ingredients: </h3> Whole Cow Milk, Standardized, Homogenized and Pasteurized.</p>
        <p> <h3>Category: </h3> Milks</p>
        <p> <h3>Origin of ingredients: </h3> Romania</p>
        <p> <h3>Manufacturing or processing places:  </h3> Romania</p>
    </div>

</section>

<a class="css-button" onclick="tableToCSV()">
	<span class="css-button-icon"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>
	<span class="css-button-text">Download Csv</span>
</a>

<script type="text/javascript">
        function tableToCSV() {
 
            // Variable to store the final csv data
            var csv_data = [];
 
            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "GfG.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>




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

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
        navLinks.style.right = "0";
    }
    function hideMenu() {
        navLinks.style.right = "-250px";
    }
</script>
</body>
</html>