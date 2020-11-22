<?php

 // Database connection
 $conn = new mysqli("localhost","root","","bank");


  if($conn->connect_error){
    die("Connect failed: %s\n" .$conn -> error);
  }else{

    $result = $conn->query( "SELECT * FROM transfers");


    // echo $conn -> error;die;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>tsf Bank-Transactions</title>
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

    <div class ="added">
      <div id="box">
        <div id="print">
        <h1 style="padding:10px 0 10px 0;font-family: 'Roboto Slab', serif; font-weight:bold;color:#26466D">Transaction History</h1>
      </div>
    </div>
    <center>
        <table class="table table-striped table-info table-hover table-bordered" id="tb">
<thead class="thead-dark">
<tr>
      <th scope="col" width="10%" style="text-align: center;background-color: #fff; color:#26466D; font-family: 'Merriweather', serif;font-weight: 900;font-size:20px">FROM USER</th>
      <th scope="col" width="10%" style="text-align: center;background-color: #fff; color:#26466D; font-family: 'Merriweather', serif;font-weight: 900;font-size:20px">TO USER</th>
      <th scope="col" width="10%" style="text-align: center;background-color: #fff; color:#26466D; font-family: 'Merriweather', serif;font-weight: 900;font-size:20px">Amount Transferred</th>

</tr>
</thead>

            <!--fetch and display data from MySQL-->
            <?php
        while($row=$result->fetch_assoc())
        {
      ?>
      <form method="post">
      <tr>
        <!--FETCHING DATA FROM EACH
          ROW OF EVERY COLUMN-->
        <td style="text-align: center;color: black;font-weight: 600;font-size:18px ;border-color:black"><?php echo $row['from_user'];?></td>
        <input type="hidden" name="name" value=<?php echo $row['from_user'] ; ?>>
        <td style="text-align: center;color: black;font-weight: 600;font-size:18px ;border-color:black"><?php echo $row['to_user'];?></td>
        <input type="hidden" name="email" value=<?php echo $row['to_user'] ; ?>>
        <td style="text-align: center;color: black;font-weight: 600;font-size:18px ;border-color:black"><?php echo $row['credits_tr'];?></td>
        <input type="hidden" name="credit" value=<?php echo $row['credits_tr'] ; ?> >
      </tr>
      </form>
      <?php
        }
      ?>
     </table>
        </br>

 </br>

   </center>

   </body>
</html>
