<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php

     
      session_start();
      require('connection.php');
      error_reporting(E_ALL ^ E_WARNING);
      $acc = $_SESSION['lid'];
       
      if (isset($_POST['setD'])) {
      	$querySet = mysqli_query($con, "DELETE FROM `profile` WHERE acc_id = '$acc'");
      	if($querySet){
      		$_SESSION['setDefault'] = 'success';
      		header('location:changeava.php');
      	}
      }

	?>
	
</body>
</html>