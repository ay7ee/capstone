<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DELETE ACCOUNT</title>
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
		font-size: 48px;
		line-height: 102.4%;
		color: #393939;
		text-transform: uppercase;
	}
	form{
		display: flex;
		flex-direction: column;
	}
	form input{
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
</style>
<body>
	<a href="index.php"><img src="img/logo.png" alt="logo"></a>
	<div class="container">
		<form method="post" action="resultDeleteAcc.php">
			<p class="title">Delete account</p>
			<input type="text" placeholder="PASSWORD" name="password">
			<input type="submit" name="deleteacc" class="btn" value="DELETE">
		</form>
	</div>
</body>
</html>