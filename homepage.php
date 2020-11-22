<?php

 // Database connection
 $conn = new mysqli("localhost","root","","bank");


  if($conn->connect_error){
    die("Connect failed: %s\n" .$conn -> error);
  }
    $conn->close();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>tsf Bank-HOME</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;0,900;1,700&display=swap" rel="stylesheet">

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body style="background-color: #236B8E;">
    <section class="colored-section" id="title">

      <div class="container-fluid">

        <!-- Nav Bar -->

        <nav class="navbar navbar-expand-lg navbar-dark">

          <a class="navbar-brand" href="">tsf Bank</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customer.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
            </ul>

          </div>
        </nav>


        <!-- Title -->

        <div class="row">

          <div class="col-lg-6">
            <h1 class="big-heading">Welcome to tsf Bank!</h1>
            <h3>Happy to be a part of your life.</h3>
          <a href="customer.php"><button type="button" class="btn btn-dark btn-lg download-button">Customers</button></a>
          <a href="transactions.php"> <button type="button" class="btn btn-outline-light btn-lg download-button"> Transactions</button></a>
          </div>

          <div class="col-lg-6">
            <img class="title-image" src="images/a.png" alt="iphone-mockup">
          </div>

        </div>

      </div>

    </section>

  </body>
</html>
