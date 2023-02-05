       <?php
        session_start();
        error_reporting(E_ALL ^ E_WARNING);
         require('connection.php');
        $getName = mysqli_query($con,  "SELECT `name` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getName);
        $name = $row['name'];

        unset($_SESSION['ress']);

        $getId = mysqli_query($con,  "SELECT `account_id` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getId);
        $id = $row['account_id'];
        $_SESSION['lid'] = $id;    


        $getGroup = mysqli_query($con,  "SELECT `group` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getGroup);
        $group = $row['group'];

        $getMode = mysqli_query($con,  "SELECT `account_type` FROM `accounts` WHERE email = '".$_SESSION['lemail']."' and password = '".$_SESSION['lpassword']."'");
        $row = mysqli_fetch_array($getMode);
        $mode = $row['account_type'];

        $search = $_POST['search'];
        $searchbttn = $_POST['searchbttn'];

        $starred = mysqli_query($con, "SELECT COUNT(1) FROM  `starred` WHERE acc_id = '$id'");
                                $row14 = mysqli_fetch_array($starred);
                                $counterStar = $row14[0];


        if (isset($search)) {
             $posts = mysqli_query($con, "SELECT * FROM posts WHERE question OR title LIKE '%" . $search . "%' ORDER BY id DESC");   
        }
        else{
        	$posts = mysqli_query($con , "SELECT * FROM posts ORDER BY id DESC");
        }
        
        if ($_SESSION['addpost'] == 'success'){
       	?>
       	<script> alert("Success! Post was added"); </script>
       	<?php
       	unset($_SESSION['addpost']);
       }


       if ($_SESSION['edited'] == 'edited'){
       	?>
       	<script> alert("Success! Post was edited"); </script>
       	<?php
       	unset($_SESSION['edited']);
       }



        if ($_SESSION['addpost'] == 'fail'){
       	?>
                 <script> alert("Error! something gone wrong try later!"); </script>
       	<?php
       	unset($_SESSION['addpost']);
       }
 

 


        if ($_SESSION['resultPass'] == 'passwordChanged'){
       	?>
       	<script> alert("Success! Password was changed"); </script>
       	<?php
       	unset($_SESSION['resultPass']);
       }
       if ($_SESSION['sstatus'] == 'success') {
        
        $sql=mysqli_query($con, "INSERT INTO `profile` (`img`, `acc_id`)  VALUES('', '$id')");
        unset($_SESSION['sstatus']);
       }


        if ($_SESSION['lemail']) {


      ?>    



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>StackOverFlow AITU</title>
	<link rel="shortcut icon" href="img/logo.png">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="styles/main.css">
</head>


<body>
	<script src="https://kit.fontawesome.com/1c9d86ea72.js" crossorigin="anonymous"></script>
	<script src="pop-up.js"></script>
	<div class="wrapper">
		
		<div class="container">
			<nav class="profile__nav">
				<img src="img/logo.png" width="44" alt="">
				<a class="nav__icon nav__icon__person">
					<i class="far fa-user" onclick="profile()"></i>
				</a>
				<a class="nav__icon">
					<i class="fas fa-pen" onclick="main()"></i>
				</a>
				<a class="nav__icon">
					<i class="fas fa-user-cog" onclick="settings()"></i>
				</a>
			</nav>
		</div>

<section class="main" id="main" style="display: block;">
			<div class="container">
				<div class="main__content">
					<div class="main__page">
						<div class="dropbtn" onclick="dropdown()"><b>+</b></div>
						<div id="myDropdown" class="dropdown-content">
							<?php
                             if ($mode == 'mod') {
                             	?>
                            <a href="addpost.php">add post</a>
							<a href="deletepost.php">delete post</a>
                             	<?php
                             }
                             else if ($mode == 'usr') {
                             	?>
                             <a href="addpost.php">add post</a>
                             <a href="editMypost.php">edit post</a>
                             <a href="deleteMyPost.php">delete post</a>
                             <?php	
                             }
							?>
						</div>
						<h2 class="main__title">posts</h2>
						<div id="myDiv" class="post__searching">
							<form method="post">
							<input type="search" name="search" class="post__search">
							
							</form>
							<script type="text/javascript">
function loadByAjax()
{
     $.ajax({
          type: "POST",
          url: "index.php",
          data: "searchkey=data_from_user_input",
          success: function(response_data){
          $('myDiv').html(response_data)
          }
          });
}
</script>

						</div>
						  <?php
                               while($row = mysqli_fetch_array($posts)){
                               	$id = $row['id'];
                               	$getCN = mysqli_query($con, "SELECT COUNT(1) FROM answers WHERE post_id = '$id'");
                                $row1 = mysqli_fetch_array($getCN);
                                $counterCom = $row1[0];
	                         ?>
						<div class="main__posts">
							<form method="post" action="posts.php">
								<div class="posts">
									<input name="arenid" type="hidden" value="<?php echo $row['id'];?>">
								<button type="submit" style="text-decoration: none; background-color:white; border-style: none;" >
									
								<div class="post">
									<p style="width:800px; text-transform: uppercase"><?php echo $row['title']?></p> 		
									 	
								</div>
								</button>
								<div class="post__comments">
									<i class="fa fa-comment-o" aria-hidden="true"></i>
									<p class="comment__count"><?php echo $counterCom;?></p>
									<p class="comment__language"><?php echo $row['p_lang'];  ?></p>
									<i class="fa fa-bookmark-o" aria-hidden="true" style="color: #F97F36; margin-left: 38px;"></i>
								</div>
							</div>		
								</form>
							      <br>

						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</section>

		<section class="profile" id="profile" style="display: none;">
			<div class="container">
				<div class="profile__content">
					<div style="width: 50px;"></div>
					<div class="profile__page">
						<h2 class="profile__title">profile page</h2>
						<div class="profile__card">
							<p class="profile__text__opacity">card</p>
							<p class="profile__card__title">Starred Questions</p>
							<div class="circle__content">
								<div class="profile__circle" style="background-color: #F7F7EE;"></div>
								<div class="profile__circle" style="background-color: #393939;"></div>
								<div class="profile__circle" style="background-color: #F7F7EE;"></div>
								<div class="profile__circle profile__circle__text" style="background-color: #393939;"><?php echo $counterStar; ?></div>
								<a href="starredQuestions.php" class="profile__card__link">Open card</a>
							</div>
						</div>
						<div class="profile__tests">
							<div class="profile__tasks">
								<p class="profile__tasks__title">Tasks details</p>
								<div class="profile__tasks__card">
									<div class="profile__tasks__top">
										<p class="tasks__top__title">Task info</p>
										<p class="tasks__top__text">6 questions</p>
									</div>
									<div class="profile__tasks__bottom">
										<p class="tasks__bottom__title">Start tasks</p>
										<div class="profile__tasks__circle">
											<div class="tasks__circle"></div>
											<a href="JAVA quiz/index.html" class="tasks__start">
												<i class="fas fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="profile__test">
								<div class="profile__java">
									<img src="img/java.png" alt="">
								</div>
								<p class="test__title">Java <br> Tasks</p>
							</div>
						</div>
					</div>
					<a href="logout.php" class="profile__leave">
						<img src="img/leave.png" alt="">
					</a>
					<div class="profile__info" id="profile2">
						<div class="main__info">
							<div class="profile__photo">
								<?php
                               $checkava = mysqli_query($con, "SELECT * FROM `profile` WHERE `acc_id` = '".$_SESSION['lid']."'");
								if(mysqli_num_rows($checkava) == 1){
                                   $outt = mysqli_query($con, "SELECT img FROM `profile` WHERE `acc_id` = '".$_SESSION['lid']."'");
                                           $row = mysqli_fetch_array($outt);
                                           $zb = $row['img'];
                                ?><img style="width: 148px; height: 148px;" src="<?php echo $zb;?>" alt="">
                                <?php
                                }
                               elseif (mysqli_num_rows($checkava) == 0) {	
                                ?><img src="img/la.jpg" alt="">
                                <?php
                               }
                                ?>
								
							</div>
							<p class="profile__name"><?php echo $name; ?></p>
							<p class="profile__group" style="text-transform: uppercase;"><?php echo $group; ?></p>
							<p class="profile__group" style="text-transform: uppercase;"><?php 
                             if ($mode== 'mod') {
                               echo "moderator";
                             }
                               
                             ?></p>
						</div>
						</p>
						<p class="info__text">Other Tasks</p>
						<a href="quizes/C++ quiz/index.html" class="info__task info__task1" style="text-decoration: none;">
							<img src="img/C++.png" alt="">
							<p class="info__task__text"><b>C++</b> tasks</p>
						</a>	
						<a href="PHP quiz/index.html" class="info__task" style="text-decoration: none;">
							<img src="img/php.png" alt="">
							<p class="info__task__text"><b>PHP</b> tasks</p>
						</a>
					</div>
				</div>
			</div>
		</section>

		

		<section class="settings" id="settings" style="display: none;">
			<div class="container">
				<div class="settings__content">
					<div class="settings__page">
						<h2 class="settings__title">settings</h2>
						<div class="settings__main">
							<form action="changepass.php" method="post">
							<input type="submit" value="change password">
						    </form><br>
						    <form action="changeava.php" method="post">
						 	<input type="submit" value="change avatar"><br>
						 	</form><br>
						 	<form action="deleteAcc.php" method="post">
							<input type="submit" class="settings__delete" value="delete account">
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

	<!-- connect to FontAwesome -->

</body>
</html>
<?php
}
else{
    header('location:intro-page.php');
}
?>