 <?php
    session_start(); 
    $show_error = "";
    $show_alert=false;
     if($_SERVER['REQUEST_METHOD']=='POST'){
         include 'dbconnect.php';
         $show_alert=false;
         $username=$_POST['username'];
         $password=$_POST['password'];

         if(empty($username) || empty($password)){
          $show_error="Username or password cannot be empty";
         }
         else{

         $cpassword=$_POST['cpassword'];
         $exists=false;

         $sql="select * from user_info where user_name='$username'";
         $result=mysqli_query($conn,$sql);
         if(mysqli_num_rows ($result)==1){
          $exists=true;
         }
         if($password==$cpassword && $exists==false){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql="insert into user_info(user_name,user_password,activation_flag) values ('$username','$hashed_password',1)";
             $result= mysqli_query($conn,$sql);
             if($result)
                $show_alert=true;
         }
         else {
          if($exists){
          $show_error="Username already exists";
         }
         else{
            $show_error="Passwords do not match";
         }
        }
      }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <?php require 'nav.php' ;
    if($show_alert)
        echo "<div class='alert alert-success'>New user inserted!</div>";
    if($show_error)
        echo "<div class='alert alert-danger'>$show_error</div>";
      ?>
    <form method="POST" action="/login-system/signup.php">
         <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 col-md-3 mt-5 mx-auto" id="box">
       <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Username</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" autocomplete="new-password">
  </div>
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" autocomplete="new-password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </form>
    </body>
    <?php include "footer.php";?>
</body>
</html>