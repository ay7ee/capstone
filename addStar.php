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


      $add = $_POST['add'];
      $post = $_SESSION['solid'];
      $acc = $_SESSION['lid'];
     $ahha = mysqli_query($con, "SELECT * FROM `starred` WHERE `post_id` = '$post' AND `acc_id`= '$acc'");
        if (mysqli_num_rows($ahha)  ==	 0) {
        $create = mysqli_query($con, "INSERT INTO `starred`(`post_id` , `acc_id`) VALUES ('$post' , '$acc') ");

         header('location:starredQuestions.php');
       }
       elseif(mysqli_num_rows($ahha)  > 0){
       	$delete = mysqli_query($con, "DELETE FROM `starred` WHERE `post_id` = '$post' AND `acc_id`= '$acc' ");
        header('location:starredQuestions.php');
       }

      

	?>
	
</body>
</html>