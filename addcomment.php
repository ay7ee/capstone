<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title></title>
</head>
<body>
	
<?php

     session_start();
     require('connection.php');
     $id = $_SESSION['lid'];
     $post_id = $_SESSION['solid'];     

	$add = $_POST['send'];
	$comment = $_POST['comment'];

if (isset($add) && !empty($comment)){
	$gogo = mysqli_query($con, "INSERT INTO `answers`(`comment` , `acc_id` , `post_id`)  VALUES('$comment' , '$id' , '$post_id' )");
	if ($gogo) {
       	?>
       	<script> alert("Success! Comment was added"); </script>
       	<?php
        $_SESSION['ress'] = '1';
        $_SESSION['isid'] = $_SESSION['solid']; 
	    header('location:posts.php');
	}
}
else{
	        $_SESSION['ress'] = '1';
        $_SESSION['isid'] = $_SESSION['solid']; 
	header('location:posts.php');
}

?>

</body>
</html>