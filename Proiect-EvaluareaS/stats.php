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
        <meta charset="utf-8">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Welcome to SoDrO</title>
        <link rel="stylesheet"  href="css/stats.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="icon" type="image/png" href="images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="C:\Program Files\font-awesome-4.7.0\css\font-awesome.min.css">
    <script src="svg-to-pdfkit.js"></script>
    <script src="svg-export.min.js"></script>
    <script src="https://unpkg.com/canvg/lib/umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfkit/js/pdfkit.min.js"></script>
    <script src="https://github.com/devongovett/blob-stream/releases/download/v0.1.3/blob-stream.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/svg-to-pdfkit/source.min.js"></script>
    </head>

<body>

    <section class="header">
        <nav>
            <a><img src="logo.png"> </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="starting_page.php">HOME</a></li>
                    <li><a href="user_account.php">ACCOUNT</a></li>
                    <li><a href="stats.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </div> 
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>



<div class="charts">

 <h1>STATISTICS</h1>  
   <br>
 
 <h2>SVG Vertical Bar Chart - Grams of Sugar in Drinks</h2>
    <svg id="mysvg"  class="chart" width="960" height="700" aria-labelledby="title" role="img">
        
        <g transform="translate(40,20)">
        <g class="x axis" transform="translate(0,450)">
                <g class="tick" transform="translate(25.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Burn</text>
            </g>
                <g class="tick" transform="translate(59.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Zuzu</text>
                </g>
                <g class="tick" transform="translate(93.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Oshee</text>
            </g>
                <g class="tick" transform="translate(127.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">OKF</text>
            </g>
                <g class="tick" transform="translate(161.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Cappy</text>
            </g>
                <g class="tick" transform="translate(195.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Fanta</text>
            </g>
                <g class="tick" transform="translate(229.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Dorna</text>
            </g>
                <g class="tick" transform="translate(263.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Hell</text>
            </g>
                <g class="tick" transform="translate(297.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Tiger</text>
            </g>
                <g class="tick" transform="translate(331.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Evian</text>
            </g>
                <g class="tick" transform="translate(365.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Vittel</text>
            </g>
                <g class="tick" transform="translate(399.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;">Sprite</text>
            </g>
                <g class="tick" transform="translate(433.5,0)" style="opacity: 1;"><line y2="6" x2="0"></line>
                <text dy=".71em" y="9" x="0" style="text-anchor: middle;"> Maresi</text>
            </g>
            
            <path class="domain" d="M0,6V0H900V6"></path>
        </g>
            <g class="y axis">
                <g class="tick" transform="translate(0,450)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">0</text>
            </g>
                <g class="tick" transform="translate(0,414.57250826641473)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">2</text>
            </g>
                <g class="tick" transform="translate(0,379.14501653282946)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">4</text>
            </g>
                <g class="tick" transform="translate(0,343.71752479924425)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">6</text>
            </g>
                <g class="tick" transform="translate(0,308.290033065659)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">8</text>
            </g>
                <g class="tick" transform="translate(0,272.86254133207365)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">10</text>
            </g>
                <g class="tick" transform="translate(0,237.43504959848843)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">12</text>
            </g>
                <g class="tick" transform="translate(0,202.0075578649031)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">14</text>
            </g>
                <g class="tick" transform="translate(0,166.5800661313179)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">15</text>
            </g>
                <g class="tick" transform="translate(0,131.15257439773262)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">16</text>
            </g>
                <g class="tick" transform="translate(0,95.72508266414734)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">17</text>
            </g>
                <g class="tick" transform="translate(0,60.297590930562116)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">18</text>
            </g>
                <g class="tick" transform="translate(0,24.87009919697684)" style="opacity: 1;"><line x2="-6" y2="0"></line>
                <text dy=".32em" x="-9" y="0" style="text-anchor: end;">19</text>
            </g>
            <path class="domain" d="M-6,0H0V450H-6"></path>
            <text transform="rotate(-90)" y="6" dy=".71em" style="text-anchor: end;">Frequency</text>
        </g>
            <rect class="bar" x="10" width="31" y="160.66367501180912" height="289.3363249881909"></rect>
		    <rect class="bar" x="44" width="31" y="397.1421823334908" height="52.85781766650922"></rect>
            <rect class="bar" x="78" width="31" y="351.4407179971658" height="98.55928200283421"></rect>
            <rect class="bar" x="112" width="31" y="299.3268776570619" height="150.6731223429381"></rect>
            <rect class="bar" x="146" width="31" y="296.3268776570619" height="153.6731223429381"></rect>
            <rect class="bar" x="180" width="31" y="368.94189891355694" height="81.05810108644306"></rect>
            <rect class="bar" x="214" width="31" y="447.3783656117147" height="2.6216343882853153"></rect>
            <rect class="bar" x="248" width="31" y="234.10486537553143" height="215.89513462446857"></rect>
            <rect class="bar" x="282" width="31" y="203.21209258384505" height="246.78790741615495"></rect>
            <rect class="bar" x="316" width="31" y="444.57959376476146" height="5.420406235238545"></rect>
            <rect class="bar" x="350" width="31" y="447.3783656117147" height="2.6216343882853153"></rect>
            <rect class="bar" x="384" width="31" y="307.4043457723193" height="142.5956542276807"></rect>
            <rect class="bar" x="418" width="31" y="364.76145488899385" height="85.23854511100615"></rect>
            
        </g>
    </svg>
     
    <button id="btn_export_svg" class="btn_export_svg">SVG</button>

</div>





</section>


<section class="pie">
    <h1>Percentage with the quality of the drinks</h1>

    <div class="circle_box">
<div>
    <svg id="pie1">
       <circle r="95" cx="100" cy="100"  />
       <circle r="95" cx="100" cy="100"  />
    </svg>
    <span>10%</span>
</div>
<strong>Nutri A </strong>
</div>
<div class="circle_box">
    <div>
        <svg>
           <circle r="95" cx="100" cy="100"  />
           <circle r="95" cx="100" cy="100"  />
        </svg>
        <span>20%</span>
    </div>
    <strong>Nutri B </strong>
</div>
<div class="circle_box">
    <div>
        <svg>
           <circle r="95" cx="100" cy="100"  />
           <circle r="95" cx="100" cy="100"  />
        </svg>
        <span>70%</span>
    </div>
    <strong>Nutri C </strong>
    </div>

</section>

<!-- <div>
    <button id="btn_export_svg2">SVG</button>
</div> -->



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

<script>
    document.querySelector("#btn_export_svg").onclick = function(){
        svgExport.downloadSvg(document.querySelector("#mysvg"), "Circles and rectangles chart");
    };
</script>
    </body>
</html>