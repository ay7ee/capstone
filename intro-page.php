<?php
     session_start();
     error_reporting(E_ALL ^ E_WARNING);
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>StackOverFlow AITU</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="intro-page.css">
</head>
<body>

	<div class="wrapper">
		
		<header class="header">
			<div class="container">
				<div class="header__content">
					<div class="header__logo">
						<img src="img/logo.png" width="35" height="35" alt="StackOverFlowAITU">
						<b>StackOverFlow <b>AITU</b></b>
						<p class="header__text">Online platform to help or get the solution for your questions</p>
					</div>
					<div class="header__btn">
						<!-- <input type="button" class="header__sign" value="SIGN UP"> -->
						<a href="#registeration" class="header__sign">SIGN UP</a>
					</div>
				</div>
			</div>
		</header>

		<section class="hero">
			<div class="container">
				<div class="hero__row">
					<div class="hero__img">
						<img src="img/hero-item.png" class="hero__blur" alt="">
						<img src="img/hero-item2.png" class="hero__item2" alt="">
						<img src="img/hero-item3.png" class="hero__item3" alt="">
						<img src="img/platform.png" class="hero__main" alt="main image">
						<img src="img/hero-main-shadow.png" class="hero__shadow" alt="">
					</div>
					<div class="hero__content">
						<div class="hero__sub">
							<p class="hero__subtitle">for aitu members</p>
						</div>
						<p class="hero__title">Make your knowledge <br> in programming better <br> with Stack OverFlow AITU</p>
						<div class="hero__bottom">
							<img src="img/hero-table.png" class="hero__table" alt="">
							<p class="hero__text">5+ functions to boost your <br> productivity in assignments, quizzes <br> and etc.</p>
						</div>
						<div class="hero__btn">
							<input type="button" class="hero__sign" value="SIGN IN" onclick="openForm()">
							<!-- <a href="#" class="hero__sign">SIGN IN</a> -->
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="services">
			<div class="container">
				<div class="services__content">
					<div class="services__border">
						<div class="services__main">
							<div class="services__item">
								<img src="img/services-icon-1.png" alt="" class="services__icon">
								<p class="services__text">Find various answers for your problems</p>
						    </div>
							<div class="services__item">
								<img src="img/services-icon-2.png" alt="" class="services__icon">
								<p class="services__text">Help to your teammates and earn authority</p>
						    </div>
							<div class="services__item">
								<img src="img/services-icon-3.png" alt="" class="services__icon">
								<p class="services__text">Increase your marks in Java, C++ etc.</p>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="video">
			<div class="container">
				<div class="video__content">
					<img src="img/video-item-1.png" class="video__item1" alt="">
					<img src="img/video-item-2.png" class="video__item2" alt="">
					<video preload="metadata" poster="img/video.png" controls src=""></video>
				</div>
			</div>
		</section>

		<footer class="footer">
			<div class="container">
				<div class="footer__content">
					<p class="footer__text">Join to our community and <br> be prepared to everything!</p>
					<div class="footer__form">
						<form id="registeration" action="signup.php" method="post">
							 
							<p class="footer__title">Sign up </p><p class="footer__title2">to our platform</p>
							<input name="username" type="text" placeholder="USERNAME">
							<input name="group" type="text" placeholder="GROUP"> 
							<input name="email" type="email" placeholder="EMAIL">
							<input name="password" type="password" placeholder="PASSWORD">
							<input name="submit" type="submit" value="SIGN UP" class="footer__btn">
							<label>
								<input type="checkbox" name="rules" class="footer__check"><a class="footer__a">I agreed to the term of the <a href="#PrivacyPolicy" class="footer__aa"> Privacy Policy</a></a>
							</label>
						</form>
					</div>
				</div>
			</div>
		</footer>

		<div class="signin" id="popup-form">
			<div class="container">
				<div class="signin__row">
					<div class="popup__close" onclick="closeForm()">+</div>
					<div class="signin__form">
						<form action="signin.php" method="post">
							<p class="signin__title">Sign in</p>
							<input type="email" name="emailin" placeholder="EMAIL">
							<input type="password" name="passwordin" placeholder="PASSWORD">
							<input type="submit" name="enter" class="signin__btn" value="Sign in">
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="pop-up.js"></script>


	<?php
      if($_SESSION['sstatus'] == 'success'){
       	?>
       	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       	<script>
       		swal({
               title: "Welcome!",
               text: "You've registred succesfully!",
               icon: "success",
              });
       	</script>
       	<?php
       	unset($_SESSION['sstatus']);
       }
       elseif($_SESSION['fstatus'] == 'fail'){
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       	<script>
       		swal({
               title: "OOPS...",
               text: "Such account already exists!",
               icon: "error",
              });
       	</script>
     <?php
     unset($_SESSION['fstatus']);
       }
      if($_SESSION['check'] == 'empty'){
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       	<script>
       		swal({
               title: "WARNING",
               text: "Fill in empty fields",
               icon: "warning",
              });
       	</script>
     <?php
     unset($_SESSION['check']);
       }
     elseif($_SESSION['checkemail'] == 'notaitu'){
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       	<script>
       		swal({
               title: "Sorry",
               text: "You're not from AITU",
               icon: "info",
              });
       	</script>
     <?php
     unset($_SESSION['checkemail']);
       }  
       if($_SESSION['signinstatus'] == 'fail'){
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       	<script>
       		swal({
               title: "Try again",
               text: "Such account doesnt exist!",
               icon: "error",
              });
       	</script>
     <?php
     unset($_SESSION['signinstatus']);
       }      
	?>
	
</body>
</html>