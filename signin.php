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
     error_reporting(E_ALL ^ E_WARNING);
     require('connection.php');
     	$emailin = $_POST['emailin'];
     	$passwordin = $_POST['passwordin'];
     	$enter = $_POST['enter'];
        $signin = mysqli_query($con , "SELECT * FROM `accounts` WHERE email ='$emailin' and password = '$passwordin'");
       

        if(isset($enter)){
        if(mysqli_num_rows($signin)<1)
        {
       	$_SESSION['signinstatus'] = 'fail';
       	header('location:intro-page.php');
        }
        elseif(mysqli_num_rows($signin)==1)
        {
        	$_SESSION['signinstatus'] = '';
        	$_SESSION['lemail'] = $emailin;
       	    $_SESSION['lpassword'] = $passwordin;
        	header('location:index.php');
        }
    }
	?>
</body>
</html>