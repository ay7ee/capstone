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

$passwordold = '';
$oldpass = '';

$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$change = $_POST['changepass'];


        $getOldPass = mysqli_query($con,  "SELECT `password` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getOldPass);
        $passwordold = $row['password'];

if (isset($change) ) {
	if ( $oldpass == $passwordold) {
    
      $changePass = mysqli_query($con,  "UPDATE `accounts` SET `password` = '$newpass' WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
       $_SESSION['resultPass'] = 'passwordChanged';

        $getNewPass = mysqli_query($con,  "SELECT `password` FROM `accounts` WHERE email = '".$_SESSION['lemail']."'");
        $row = mysqli_fetch_array($getNewPass);
        $_SESSION['lpassword'] = $row['password'];

       header('location:index.php');
 
	}
	else{
		?>
     <div style="height: 40px; width:20%; background-color:red; color: white; text-align: center;">
      <p>Old password is not correct!</p>
     </div>
	<?php

}
}
	?>
</body>
</html>