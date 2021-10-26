<?php # Script 3.4 - index.php
session_start();
$page_title = 'Welcome to this Site!';
    include ('includes/header.html');
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }
?>
<h1 style="text-align: center;color: green;font-size:250%;">HOME PAGE WEBSITE</h1>
<img id="home" src="img/home.jpg" alt="" width="800" height="400" style="margin-top: 20px;"/>
<?php
include ('includes/footer.html');
?>