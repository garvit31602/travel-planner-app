<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    setcookie('alert',true,time()+ 10,'/');
    header("Location: login.php");
    exit;
}
require "nav.php";
include 'dbconnect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 class="text-center my-4 fw-bold">About goTravel</h2>
<p class="mx-auto w-75 fs-5 text-justify">
  At <strong>goTravel</strong>, we believe that travel is more than just a destination — it’s a journey that connects people, cultures, and memories. Our mission is to make travel planning simple, affordable, and personalized.
</p>

<p class="mx-auto w-75 fs-5 text-justify">
  Whether you're dreaming of tropical beaches, mountain adventures, cultural experiences, or weekend getaways, goTravel offers a range of thoughtfully curated travel plans that suit every budget and style. With our expert guidance, you can explore the world confidently and comfortably.
</p>

<p class="mx-auto w-75 fs-5 text-justify">
  Join thousands of happy travelers who trust goTravel to make their travel dreams come true. Let’s plan your next adventure — together!
</p>

    <?php include "footer.php"; ?>
</body>
</html>