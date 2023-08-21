<?php
session_start();
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'partials/_dbconnect.php';
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$exists=false;
if(($password==$cpassword) && $exists==false){
    $sql="INSERT INTO `project`(`email`,`username`,`password`,`date`)VALUES('$email','$username','$password',current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result){
        $showAlert=true;
    }
}
    else{
        $showError="Passwords donot match";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="sty.css">

    <title>signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){ 
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can login now.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
';
header('location:login.php');
    }
if($showError){ 
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>'. $showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
';
    }
?>
    
    <div class="container">
        <h1 class="text-center">Signup to our website</h1>
        <form action="/loginsys/signup.php" method="post">
        <div class="form-row">
        <div class="form-group col-md-10">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
    <div class="form-group col-md-10">
      <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
  </div>
  
  <div class="form-group col-md-10">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name ="password">
  </div>
  <div class="form-group col-md-10">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
  </div>
  <div class="form-group  col-md-10">
  <button type="submit" class="btn btn-primary">SignUp</button>
</div>
</form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>