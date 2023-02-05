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
$end = $_POST['gogogo'];
$titlee = $_POST['titlee'];
$questionn = $_POST['questionn'];
$codee = $_POST['codee'];
$p_langg = $_POST['p_langg'];
$postid = $_SESSION['AAAAAAAAAA'];

 if (isset($end)) {
	$nice = mysqli_query($con, "UPDATE `posts` SET `title` = '$titlee',  `question` = '$questionn', `code` = '$codee' , `p_lang` = '$p_langg' WHERE id = '$postid' AND acc_id = '".$_SESSION['lid']."'");
	if($nice){
         $_SESSION['edited'] = 'edited';
       	header('location:index.php');
	}
	else{
		echo mysqli_error($nice);
	}
}




	?>
</body>
</html>