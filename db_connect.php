 <?php
	//make connection with database
	$link = mysqli_connect("localhost","root","","bank");
	// Check connection
	if($link === true) {
		echo "yes";
	}else
	{
		// echo $link -> error;die;
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>

<?php

 // // Database connection
 // $link = new mysqli("localhost","root","","bank");
 //
 //
 //  if($link->connect_error){
 //    die("Connect failed: %s\n" .$conn -> error);
 //  }
 //    $link->close();
 //

?>
