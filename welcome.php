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
    <title>goTravel</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/id/11/2400/700" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
<img src="https://picsum.photos/id/179/2400/700" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
   <img src="https://picsum.photos/id/164/2400/700" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<h2 class="text-center my-2 fw-semibold py-2" style="background-color: #e9f7ef; color: #198754;">goTravel - Our Plans</h2>
<div class="container mb-5 mx-auto px-0">
    <div class="row">
        <?php
        $sql="select * from tour_info";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
            $name= $row["name"];
            $price= $row["price"];
            $image= $row["image"];
            echo  '<div class="col-md-4">
          <div class="card my-2 h-100">
            <img src=' .$image.' class="card-img-top h-50" alt="...">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">' . $name . '</h5>
              <span class="fw-normal">From <span class="card-text fw-semibold">₹' .number_format($price).' per adult</span></span>
              <a href="entry.php?id='.$id.'" class="btn btn-outline-success rounded-pill mt-auto me-md-2">More details</a>
            </div>
          </div>
        </div>
      ';
        }
        ?>
</div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>