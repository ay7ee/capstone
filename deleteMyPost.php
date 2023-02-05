<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Post</title>
	<link rel="stylesheet" href="styles/starredQuestions.css">
    <link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="styles/main.css">
</head>

<body>

<?php



?>

<body>
	<?php
      session_start();
error_reporting(E_ALL ^ E_WARNING);
require('connection.php');
      $acc = $_SESSION['lid'];
        $getId = mysqli_query($con,  "SELECT `account_id` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getId);
        $id = $row['account_id'];
$out = mysqli_query($con , "SELECT * FROM posts WHERE acc_id = '$id'");
	?>
	<a href="index.php"><img src="img/logo.png" alt="logo" class="logo"></a>
	<div class="container">
		<div class="starred__content">
			<div style="width: 50px;"></div>
			<div class="starred__questions">
				<p class="star__title">DELETE POSTS</p>
				<div class="starred__comments">
					<?php
					$posts = mysqli_query($con, "SELECT * FROM `posts` WHERE `acc_id` = '$acc'");
                                while($row = mysqli_fetch_array($posts)){
                               	$mkid = $row['id'];
                               	$getCN = mysqli_query($con, "SELECT COUNT(1) FROM answers WHERE post_id = '$mkid'");
                                $row1 = mysqli_fetch_array($getCN);
                                $counterCom = $row1[0];
                            
					?>
					<div class="question">
							<form action="lastdelete.php" method="post">
								<div class="posts">
									<input name="zbid" type="hidden" value="<?php echo $row['id'];?>">
								<button type="submit" style="text-decoration: none; background-color:white; border-style: none;" >
									
								<div class="post">
									<p style="width:800px; text-transform: uppercase"><?php echo $row['title']?></p> 		
									 	
								</div>
								</button>
								<div class="post__comments">
									<i class="fa fa-comment-o" aria-hidden="true"></i>
									<p class="comment__count"><?php echo $counterCom;?></p>
									<p class="comment__language"><?php echo $row['p_lang'];  ?></p>
                                    <i class="fa fa-bookmark-o" aria-hidden="true" style="color: #F97F36; margin-left: 38px;"></i>								</div>
							</div>		
								</form>
							      <br>

					</div>
					<?php
                       }     
					?>
				</div>
				<div class="star__button">
					<a href="index.php" class="star__btn">CANCEL</a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://kit.fontawesome.com/1c9d86ea72.js" crossorigin="anonymous"></script>
</body>
</html>




</body>
</html>