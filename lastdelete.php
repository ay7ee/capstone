<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>s
<?php

session_start();
error_reporting(E_ALL ^ E_WARNING);
require('connection.php');
$postid = $_POST['zbid'];
$acc = $_SESSION['lid'];
$delete = $_POST['submit'];


$del1 = mysqli_query($con, "DELETE FROM `answers` WHERE `post_id` = '$postid'");
$del = mysqli_query($con, "DELETE FROM `posts` WHERE `id` = '$postid'AND `acc_id` = '$acc'");

if ($del && $del1) {
         ?>
       	<script> alert("Success! Post was deleted"); </script>
       	<?php
       	header('location:deleteMyPost.php');
}

?>
	
</body>
</html>