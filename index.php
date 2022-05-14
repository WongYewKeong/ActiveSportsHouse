<?php
  include_once 'login_validate.php';

  if(!isset($_SESSION)) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Active Sports House Ordering System : Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="limiter">
<div class="container-login100" style="background-image: url('bgsport.jpg');">
<div class="wrap-login100 p-t-30 p-b-70">
<form class="login100-form validate-form" method="POST">
<div class="login100-form-avatar">
<img src="logoash.png" alt="logo">
</div>
<span class="login100-form-title p-t-30 p-b-45">
            ACTIVE SPORTS HOUSE <br>STAFF LOGIN
          </span>

<div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
<input class="input100" type="email" name="email" placeholder="Email">
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-user"></i>
</span>
</div>
<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
<input class="input100" type="password" name="pass" placeholder="Password">
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock"></i>
</span>
</div>
<div class="container-login100-form-btn p-t-10">
<button  class="login100-form-btn" type="submit">
Login
</button>
</div>

</form>
</div>
</div>
</div>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="js/main.js"></script>


</body>
</html>
