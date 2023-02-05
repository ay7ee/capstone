<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete post</title>
		<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="styles/main.css">
	    <link rel="stylesheet" href="normalize.css">
	    	<link rel="stylesheet" href="styles/starredQuestions.css">
    <link rel="stylesheet" href="posts.css">
</head>
<body>

<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
require('connection.php');

$out = mysqli_query($con , "SELECT * FROM posts");

?>

<form method="POST">
	Enter the posts id:<br>
	<input type="text" name="HAid">
	<input type="submit" name="submit" value="delete">
</form>
				<div class="star__button">
					<a href="index.php" class="star__btn">CANCEL</a>
				</div>

<?php
echo "<table border = '1'>"; 
echo "<tr><td> ID</td><td> TITLE</td><td>CODE</td><td>QUESTION</td><td>PROGRAMMING LANGUAGE</td><td>ACCOUNT ID</td></tr>";
while($row = mysqli_fetch_array($out)){  
echo "<tr><td>". $row['id'] . "</td><td>" . $row['title'] . "</td><td>" . $row['code'] . "</td><td>". $row['question'] . "</td><td>". $row['p_lang'] . "</td><td>". $row['acc_id'] . "</td></tr>"; 
}
echo "</table>";
?>	
<?php
$postid = $_POST['HAid'];
$delete = $_POST['submit'];


if (isset($delete)) {
$del2 = mysqli_query($con, "DELETE FROM `starred` WHERE post_id = '$postid'");
$del = mysqli_query($con, "DELETE FROM `posts` WHERE id = '$postid'");
$del1 = mysqli_query($con, "DELETE FROM `answers` WHERE post_id = '$postid'");

if ($del && $del1 && $del2) {
         ?>
       	<script> alert("Success! Post was deleted"); </script>
       	<?php
}

}
?>
</body>
</html>