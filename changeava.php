<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Change ava</title>
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@400;700&display=swap');

	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	}
	img{
		max-width: 100%;
	}
	body{
		font-family: 'Montserrat', sans-serif;
		font-family: 'Inter', sans-serif;
		font-weight: 400;
	}
	.container{
		max-width: 1280px;
		margin: 0 auto;
		padding: 50px 15px;
	}

	a img{
		width: 43.84px;
		height: 43.84px;
		position: absolute; 
		left: 50px;  
		top: 55px;
	}
	.title{
		font-family: Inter;
		font-weight: bold;
		font-size: 20px;
		line-height: 102.4%;
		color: #393939;
		text-transform: uppercase;
	}
	form{
		display: flex;
		flex-direction: column;
	}
	input{
		width: 360px;
		height: 65px;
		border: 1px solid #0088D4;
		box-sizing: border-box;
		border-radius: 10px;
		padding: 5px;
		margin-top: 30px;
	}
	.btn{
		background: #0088D4;
		border-radius: 10px;
		font-family: Montserrat;
		font-weight: bold;
		font-size: 19px;
		line-height: 21px;
		text-align: center;
		text-transform: uppercase;
		color: #FFFFFF;
		cursor: pointer;
	}
.example-1 .form-group{padding:0em;margin:0em}
.example-1 input[type=file]{outline:0;opacity:0;pointer-events:none;user-select:none}
.example-1 .label{
	width: 360px;
	height: 130px;
	border:2px dashed #0088D4;
	border-radius:5px;
	display:block;
	padding:1.2em;
	transition:border 300ms ease;
	cursor:pointer;text-align:center
}
.example-1 .label i{display:block;font-size:42px;padding-bottom:16px}
.example-1 .label i,.example-1 .label .title{color:#0088D4;transition:200ms color}
.example-1 .label:hover{border:2px solid #0088D4}
.example-1 .label:hover i,.example-1 .label:hover .title{color:#0088D4}
</style>
<body>
	<?php
    session_start();
            error_reporting(E_ALL ^ E_WARNING);
    if ($_SESSION['setDefault'] == 'success') {
    	?>

    	<script> alert("Success! Ava was changed"); </script>
    	<?php
    	unset($_SESSION['setDefault']);
    }

	?>
	<a href="index.php"><img src="img/logo.png" alt="logo"></a>
	<div class="wrapper">
		<div class="container">
			<form action="resultAva.php" method="POST" enctype="multipart/form-data">

 
<div class="example-1">
  <div class="form-group">
    <label class="label">
      <i class="material-icons">attach_file</i>
      <span class="title">Upload</span>
      <input type="file" name="file" id="file">
    </label>
  </div>
</div>
			  <input type="submit" class="btn" value="Upload Image" name="submit">
			</form>
			<br>

           <form action="deleteava.php" method="POST">
			  <input style="background-color:#93E159; border-color:#93E159;" type="submit" class="btn" value="Set Default Ava" name="setD">
			</form>
		</div>


</body>
</html>  