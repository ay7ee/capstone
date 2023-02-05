<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adding post</title>
	<link rel="stylesheet" href="styles/addpost.css">
</head>
<body>
	<a href="index.php"><img src="img/logo.png" alt="logo" class="logo"></a>
	<div class="container">
		<div class="post__content">
			<div style="width: 50px;"></div>
			<form action="resultAddPost.php" method="post">
				<p class="post__title">Add post</p>
				<hr>
				<textarea name="title" cols="60" rows="5" placeholder="POST TITLE:"></textarea>
				<textarea name="question" cols="60" rows="5" placeholder="ENTER QUESTION:"></textarea>
				<textarea name="code" cols="60" rows="10" placeholder="ENTER CODE:"></textarea>
				<select name="p_lang" id="">
					<option value="" checked>Select Language</option>
					<option value="C++">C++</option>
					<option value="JAVA">JAVA</option>
					<option value="SQL">SQL</option>s
					<option value="PHP">PHP</option>
					<option value="HTML">HTML</option>
					<option value="CSS">CSS</option>
					<option value="JS">JS</option>
					<option value="Python">Python</option>
					<option value="Kotlin">Kotlin</option>
					<option value="Swift">Swift</option>
				</select><br>
				<input type="submit" name="submit" class="add__btn" value="submit">
			</form>
		</div>
	</div>
</body>
</html>