<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RESULT</title>
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
		max-width: 1390px;
		margin: 0 auto;
		padding: 0px 15px;
	}

	.post__content{
		padding-top: 50px;
		display: flex;
	}
	form{
		width: 100%;
		display: flex;
		justify-content: center;
		flex-direction: column;
		padding: 0px 200px;
	}
	form textarea{
		margin: 15px 0;
		padding: 10px;
		font-family: Inter;
		font-size: 15px;
		line-height: 15px;
		border: 1px solid #0088D4;
		border-radius: 5px;
	}
	form select{
		font-family: Inter;
		font-size: 15px;
		line-height: 15px;
		text-transform: uppercase;
		color: #393939;
		border: 1px solid #0088D4;
	}
	.post__title{
		font-family: Inter;
		font-weight: bold;
		font-size: 48px;
		line-height: 102.4%;
		color: #393939;
	}
	.edit__btn{
		font-family: Montserrat;
		font-weight: bold;
		font-size: 19px;
		line-height: 21px;
		text-align: center;
		text-transform: uppercase;
		color: #FFFFFF;

		width: 360px;
		height: 65px;
		left: 510px;
		top: 595px;
		border: #0088D4;
		background: #0088D4;
		cursor: pointer;
	}
</style>
<body>
	<?php

session_start();
require('connection.php');

$postid = $_POST['arenid'];
if ( isset($postid)) {

$out = mysqli_query($con , "SELECT * FROM `posts` WHERE id = '$postid'");
$row = mysqli_fetch_array($out)
?>
	<div class="container">
		<div class="post__content">
			<form action="lastedit.php" method="post">
				<div style="text-align: center;"><p class="post__title">Edit Post</p></div>
		Enter title:<br>
		<textarea name="titlee" cols="60" rows="10" value = "<?php echo $row['title'] ?>" ><?php echo $row['title'] ?></textarea><br>
        Enter question:<br>
		<textarea name="questionn" cols="60" value = "<?php echo $row['question'] ?>"  rows="10"><?php echo $row['question'] ?></textarea><br>
		Enter code:<br>
		<textarea name="codee" cols="60" rows="30" value = "<?php echo $row['code'] ?>" ><?php echo $row['code'] ?></textarea><br>
		Choose language:<br>
		<select name="p_langg" value = "<?php echo $row['p_lang'] ?>" id="">

			<?php
             if ($row['p_lang'] == 'C++') {?>
             <option selected="selected" value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'JAVA') {?>
             <option value="C++">C++</option>
			<option selected="selected" value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'SQL') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option selected="selected" value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'PHP') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option selected="selected" value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'HTML') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option selected="selected" value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'CSS') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option selected="selected" value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'JS') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option selected="selected" value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'Python') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option selected="selected" value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'Kotlin') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option selected="selected" value="Kotlin">Kotlin</option>
			<option value="Swift">Swift</option>
			<?php
             }
             elseif ($row['p_lang'] == 'Swift') {?>
             <option value="C++">C++</option>
			<option value="JAVA">JAVA</option>
			<option value="SQL">SQL</option>
			<option value="PHP">PHP</option>
			<option value="HTML">HTML</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="Python">Python</option>
			<option value="Kotlin">Kotlin</option>
			<option selected="selected" value="Swift">Swift</option>
			<?php
             }

			?>

		</select><br><br>
		<div style="text-align: center; margin-bottom: 10px;"><input type="submit" class="edit__btn" name="gogogo" value="submit"></div>

	</form>
		</div>
	</div>
	<?php } 
	$_SESSION['AAAAAAAAAA'] = $postid;

?>
</body>
</html>