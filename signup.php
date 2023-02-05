<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
	<?php
    session_start();
        error_reporting(E_ALL ^ E_WARNING);
     require('connection.php');
     	$username = $_POST['username'];
     	$group = $_POST['group'];
     	$email = $_POST['email'];
     	$password = $_POST['password'];
     	$submit = $_POST['submit'];
     	$rules = $_POST['rules'];
     
      if(isset($submit) && isset($username) && isset($group) && isset($email) && isset($password) && isset($rules)){
       $selectAcc = mysqli_query($con , "SELECT * FROM `accounts` WHERE email ='$email'");
       if(mysqli_num_rows($selectAcc)>=1)
        {
       	$_SESSION['fstatus'] = 'fail';
       	header('location:intro-page.php');
        }
        else{
         $_SESSION['fstatus'] = '';
        }

       $query = "INSERT INTO `accounts` (`account_type`, `name` , `group` , `email`  , `password` ) VALUES ('usr','$username', '$group' , '$email' , '$password')";

       $result = mysqli_query($con , $query);
       if ($result) {
        $_SESSION['sstatus'] = 'success';
        header('location:intro-page.php');
       }
       else{
       	$_SESSION['sstatus'] = '';

       }
        
}
     if(empty($username) || empty($group) || empty($email) || empty($password) || empty($rules))
     {
     	$_SESSION['check'] = 'empty';
     	header('location:intro-page.php');
     }

     $checkemail = substr($email,-15);
     if($checkemail != 'astanait.edu.kz'){
     	mysqli_query($con, "DELETE FROM `accounts` WHERE email = '$email'");
     	$_SESSION['checkemail'] = 'notaitu';
     	header('location:intro-page.php');
     }


       
	?>
</body>
</html>