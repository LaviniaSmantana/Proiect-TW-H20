<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: starting_page.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
		header("Location: starting_page.php");
	} else {
		echo "<script>alert('Username or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Login Form</title>
        <link rel="stylesheet" href="css/login.css">
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
            <h1>Login</h1>
            <form action="" method="POST">
                <div class="txt_field">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <input type="text" required id="username" name="username" value="<?php echo $username ?>">
                  <label>Username</label>
                </div>
                <div class="txt_field">
                  <i class="fa fa-key" aria-hidden="true"></i>
                  <input type="password" required id="password" name="password" value="<?php echo $_POST['password']?>">
                <label>Password</label>
                </div>
                <input type="submit" value="LOGIN" button name="submit">
                <div class="signup_link">
                    Not a member? <a href="register.php">Register here.</a>
                </div>
                <div class="mascott">
                    <img src="images/sodalicious.png" class="mascott">
                </div>
            </form>     
        </div>
    </body>    
    </html>