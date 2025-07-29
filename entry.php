<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    setcookie('alert',true,time()+ 10,'/');
    header("Location: login.php");
    exit;
}
require "nav.php";
include 'dbconnect.php';

$id=isset($_GET["id"]) ? intval($_GET["id"]) :0;
$sql="select * from tour_info where id='$id'";
$result=mysqli_query($conn,$sql);
if($result && mysqli_num_rows($result)> 0){
    $entry=mysqli_fetch_assoc($result);
}
else{
    echo "entry not found";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $entry['name'] ?></title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="my-3 mx-3">
   <h2 class="fw-bold"> <?php echo $entry['name'] ?></h2>
    <div class="d-flex gap-3 flex-grow-1" style="height: 400px;"> 
  <div class="h-100 bg-light">
    <img src="<?= htmlspecialchars($entry['image'])?>" class="d-block w-100 h-100 object-fit-cover my-2" alt="...">
    </div>
    <div class="d-flex flex-column w-50 fw-semibold mx-auto">
    <?= $entry['description'] ?>
    <button class="rounded-pill my-5 w-50 btn btn-outline-success mx-auto">Book Now</button>
  </div>
</div>
</div>
    <?php include "footer.php"; ?>
</body>
</html>