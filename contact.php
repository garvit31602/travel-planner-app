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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 class="text-center my-4 fw-bold">Contact Us</h2>
<p class="text-center fs-5">We’d love to hear from you! Reach out to us through any of the methods below:</p>

<div class="mx-auto w-75 mt-4">
  <p><strong>Email:</strong> support@gotravel.com</p>
  <p><strong>Phone:</strong> +91-8619391317</p>
  <p><strong>Office Hours:</strong> Monday – Friday, 9 AM to 6 PM</p>
  <p><strong>Address:</strong> goTravel HQ, 2nd Floor, Sunrise Towers, Jaipur, Rajasthan, India</p>
</div>

<form class="mx-auto w-75 mt-4" autocomplete="off">
  <div class="mb-3">
    <label for="name" class="form-label">Your Name</label>
    <input type="text" class="form-control" id="name" placeholder="John Doe" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Your Email</label>
    <input type="email" class="form-control" id="email" placeholder="you@example.com" autocomplete="nope">
  </div>
  <div class="mb-3">
    <label for="message" class="form-label">Your Message</label>
    <textarea class="form-control" id="message" rows="4" placeholder="How can we help you?"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Send Message</button>
</form>

    <?php include "footer.php"; ?>
</body>
</html>