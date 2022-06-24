<?php 

$server = "localhost";
// $cfg['Servers'][$i]['port'] = '82';
$user = "root";
$pass = "";
$database = "login_and_register_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>