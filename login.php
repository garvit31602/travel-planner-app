<?php
session_start();
$show_alert=false;
$show_error = "";
if(isset($_COOKIE["alert"]) && $_COOKIE["alert"]==true){
  $show_alert=true;
      $show_error="Please login first!";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $show_alert=true;
    $sql = "SELECT * FROM user_info WHERE user_name='$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['activation_flag'] == 1) {
            if (password_verify($password, $row['user_password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("Location: welcome.php");
                exit;
            } else {
                $show_error = "Invalid password";
            }
        } else {
            $show_error = "User not activated";
        }
    } else {
        $show_error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <?php require 'nav.php' ;
   if ($show_alert) {
        echo "<div class='alert alert-danger'>$show_error</div>";
    } 
   else if (isset($_COOKIE["logout_msg"])) {
      echo $_COOKIE["logout_msg"];
    }
    ?>
  <form method="POST" action="/login-system/login.php" autocomplete="off" id="form">
    <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 col-md-3 mx-auto mt-5">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" aria-describedby="emailHelp" autocomplete="off">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" autocomplete="new-password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <?php
    include "footer.php";
    ?>
</body>
</html>