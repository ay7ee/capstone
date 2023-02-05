<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Result</title>
</head>
<body>
	
<?php

session_start();
require('connection.php');

        $getId = mysqli_query($con,  "SELECT `account_id` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getId);
        $id = $row['account_id'];

        $getPost = mysqli_query($con,  "SELECT `id` FROM `posts` WHERE acc_id = '$id'");


$currentPass = $_POST['password'];
$delete = $_POST['deleteacc'];

if($currentPass == $_SESSION['lpassword'] && isset($delete)){
	$delete7 = mysqli_query($con, "DELETE FROM `answers` WHERE acc_id = '$id'");
	$delete5 = mysqli_query($con, "DELETE FROM `starred` WHERE acc_id = '$id'");
		while ($row = mysqli_fetch_array($getPost)) {
			$delete4 = mysqli_query($con, "DELETE FROM `starred` WHERE post_id = '".$row['id']."'");
	}	
	$delete3 = mysqli_query($con, "DELETE FROM `posts` WHERE `acc_id` = '$id'");
	$delete2 = mysqli_query($con, "DELETE FROM `profile` WHERE acc_id = '$id'");
	$delete1 = mysqli_query($con, "DELETE FROM `accounts` WHERE account_id = '$id'");
	if (isset($delete1) && isset($delete2) && isset($delete3) && isset($delete4) && isset($delete5) &&isset($delete7)) {
      	header('location:intro-page.php');
	}
	else{
    header('location:intro-page.php');
}
	
}
	else{
		?>
     <div style="height: 40px; width:20%; background-color:red; color: white; text-align: center;">
      <p>Password is not correct!</p>
     </div>
	<?php

}

?>

 
</body>
</html>