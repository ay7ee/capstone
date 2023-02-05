<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>logout</title>
</head>
<body>
	<?php
     session_start();
         unset($_SESSION['lemail']);
         unset($_SESSION['lpassword']);
         header('location:intro-page.php');

	?>
</body>
</html>