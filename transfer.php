<?php

 // Database connection
 $link = new mysqli("localhost","root","","bank");


  if($link->connect_error){
    die("Connect failed: %s\n" .$link -> error);
  }else{

    $name = $_POST['name'];
    $query = "select * from users where name='" . $name . "'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    $query = "select name from users where name<>'" . $row['name'] . "'";
    $result = mysqli_query($link,$query);

    if(isset($_POST['transfer'])) {
        if($_POST['credits_tr'] > $row['credit']) {
            echo "Credits transferred cannot be more than " . $row['credit'] . "<br>";
        }
        else {

            $query = "update users set credit=credit-" . $_POST['credits_tr'] . " where name='" . $row['name'] . "'";
            mysqli_query($link,$query);

            $query = "update users set credit=credit+" . $_POST['credits_tr'] . " where name='" . $_POST['to_user'] . "'";
            mysqli_query($link,$query);

            $query = "insert into transfers values('" . $row['name'] . "','" . $_POST['to_user'] . "'," . $_POST['credits_tr'] . ")";
            mysqli_query($link,$query);

            header("Location: customer.php");
        }
      }
    }
      $link->close();
      ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>tsf Bank-View Customer</title>
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;0,900;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div style="background-color:#236B8E; color:white; padding: 0 15% ;height: 80px;;">

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
    </div>
    <div class ="add">
        <div id="box" style=" height:250px;margin-top:20px;text-align:center;">
            <div id="print">
                <h2 style="font-family: 'Roboto Slab', serif; font-weight:bold;color:#26466D	">Name: <?php echo $_POST['name'] ?></h2>
                <br>
                <h2 style="font-family: 'Roboto Slab', serif; font-weight:bold;color:#26466D">Email: <?php echo $_POST['email'] ?></h2><br>
                <h2 style="font-family: 'Roboto Slab', serif; font-weight:bold;color:#26466D">Credit: <?php echo $_POST['credit'] ?></h2>
            </div>
        </div>

    <form action="#" method="post">
        <center>
    <input type="hidden" name="name" value=<?php echo $_POST['name'] ; ?>>

    <input type="hidden" name="email" value=<?php echo $_POST['email'] ; ?>>

    <input type="hidden" name="credit" value=<?php echo $_POST['credit'] ; ?> >
    </center>


    <div id="box1" style="background-color:#236B8E; width:500px; height:350px;margin-left:500px;text-align:center; border-radius:10px;">
    <label class="names" style="padding-top:20px;font-family: 'Roboto Slab', serif; font-weight:bold;color:#fff; font-size:26px;">Select Name</label><br>
    <select name="to_user" required id="mySelect" class="custom-select custom-select-lg mb-3"style="width: 350px; margin-left: 50px; border-radius:20px">
      <option selected>Select Name</option>

      <?php
              while($tname = mysqli_fetch_array($result)) {
                  echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
              }
      ?>
      </select>

        <br>
    <label class="details"   style="font-family: 'Roboto Slab', serif; font-weight:bold;color:#fff; font-size:26px;">Enter the amount:</label>  <br>
    <input class="amount" type="amount"  style="margin-left:50px;width: 350px;border-radius:20px;height:50px;"  placeholder=" Enter amount" name="credits_tr"  required> <br><br><br>


    <input type="submit" id="demo" class="btn btn-outline-light btn-lg" name="transfer" value="TRANSFER" style="font-weight:bold;font-family: 'Roboto Slab', serif;">
    </form>
    </head>
    </div>
  </body>
</html>
