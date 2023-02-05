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

$code = $_POST['code'];
$title = $_POST['title'];
$question = $_POST['question'];
$p_lang = $_POST['p_lang'];
$submit = $_POST['submit'];
    $getId = mysqli_query($con,  "SELECT `account_id` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
    $row = mysqli_fetch_array($getId);
    $id = $row['account_id'];
if (isset($submit)){
$query = mysqli_query($con, "INSERT INTO `posts`( `code`,`title`, `question`, `p_lang` , `acc_id`) VALUES ('$code' ,'$title', '$question' , '$p_lang' , '$id')");
      if ($query) {
         $_SESSION['addpost'] = 'success';
         header('location:index.php');
         }
         else{
         $_SESSION['addpost'] = 'fail';
         header('location:index.php');
         }

}
?>
</body>
</html>