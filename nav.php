<?php
 $loggedin=false;
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
  $loggedin=true;
 }
?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">goTravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login-system/welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login-system/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Hotels
</a></li>
            <li><a class="dropdown-item" href="#">Things to Do</a></li>
            <li><a class="dropdown-item" href="#">Restaurants</a></li>
              <li><a class="dropdown-item" href="#">Flights</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login-system/contact.php">Contact</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
       <?php
        if(!$loggedin){
          echo "
        <button class='btn btn-outline-success mx-2'>
          <a class='nav-link active' aria-current='page' href='/login-system/login.php'>Login</a>
        </button>
         <button class='btn btn-outline-success'>
          <a class='nav-link active' href='/login-system/signup.php'>Signup</a>
        </button>";
        }
        if($loggedin){
        echo " <a class='btn btn-outline-success mx-2' href='/login-system/logout.php'>Logout</a>
        <span class='me-2 text-light border rounded-pill px-3 py-1'>".$_SESSION['username'];
        }
        ?>
        </div>
    </div>
    
  </div>
</nav>