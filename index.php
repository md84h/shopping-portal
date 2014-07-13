<?php
include 'connect.php';
session_start();
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true)
        {
            header('location:home.php');
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Shop</title>
        <link rel="stylesheet" type="text/css" href="sticky-footer.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="wrap">
       <nav class="navbar navbar-default" role="navigation">
           <div class="container-fluid">
               <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="home.php">Home Shop</a>
               </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <p class="navbar-text navbar-right"><a href="sign_up.php" class="navbar-link">Sign Up</a></p>
               <p class="navbar-text navbar-right"><a href="sign_in.php" class="navbar-link">Sign In</a></p>
                </div>
           </div>
</nav>
            <div class="container">
        <div class="row">
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3 align="center">Buy from Home</h3>
        <p align="center">From home you can buy anything<br>Friendly Experience</p>
      </div>
    </div>
  </div>
      <div class="col-sm-4 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3 align="center">Pay from Home</h3>
        <p align="center">From home you can pay<br>using Cards or Netbanking</p>
      </div>
    </div>
  </div>
      <div class="col-sm-4 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3 align="center">Fast Delivery</h3>
        <p align="center">Fast and easy Delivery<br>Within in minimum days we will deliver</p>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
        <div id="footer">
     <div class="container">
          <div id="list"> <ul>
              <li>About Us</li>
              <li>Contact Us</li>
              <li>Feedback</li>
          </ul>
          </div>
      </div>
        </div>
       </body>
</html>
