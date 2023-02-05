  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StackOverFlow AITU</title>
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="posts.css">
</head>
<body>
	<?php
      session_start();
      require('connection.php');
      error_reporting(E_ALL ^ E_WARNING);
            $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
      if (isset( $_SESSION['ress'])) {
         $_SESSION['solid'] = $_SESSION['isid'];
          if($pageRefreshed == 1){
           $_SESSION['solid'] = $_SESSION['isid'];
         }
      }
      else{
       $_SESSION['solid'] = $_POST['arenid'];
      }

      $id = $_SESSION['solid'];
      $answers = mysqli_query($con , "SELECT * FROM answers WHERE post_id = '$id'");


      $getTitle = mysqli_query($con,  "SELECT `title` FROM `posts` WHERE id = '$id'");
      $row = mysqli_fetch_array($getTitle);
      $title = $row['title'];

      $getQue = mysqli_query($con,  "SELECT `question` FROM `posts` WHERE id = '$id'");
      $row = mysqli_fetch_array($getQue);
      $que = $row['question'];

      $getLan = mysqli_query($con,  "SELECT `p_lang` FROM `posts` WHERE id = '$id'");
      $row = mysqli_fetch_array($getLan);
      $lan = $row['p_lang'];      

      $getCode = mysqli_query($con,  "SELECT `code` FROM `posts` WHERE id = '$id'");
      $row = mysqli_fetch_array($getCode);
      $code = $row['code'];

      $getAcc = mysqli_query($con,  "SELECT `acc_id` FROM `posts` WHERE id = '$id'");
      $row = mysqli_fetch_array($getAcc);
      $acc = $row['acc_id'];

      $getName = mysqli_query($con,  "SELECT `name` FROM `accounts` WHERE account_id = '$acc'");
      $row = mysqli_fetch_array($getName);
      $account = $row['name'];

      $getGroup = mysqli_query($con,  "SELECT `group` FROM `accounts` WHERE account_id = '$acc'");
      $row = mysqli_fetch_array($getGroup);
      $group = $row['group'];



      $getCN = mysqli_query($con, "SELECT COUNT(1) FROM answers WHERE post_id = '$id'");
      $row1 = mysqli_fetch_array($getCN);
      $counterCom = $row1[0];


	?>
	<div class="wrapper">
        <a href="index.php"><img src="img/logo.png" alt="logo" style="width: 43.84px;
height: 43.84px;
position: absolute; 
left: 50px;  
top: 55px;"></a>
        <section class="post__comment">
            <div class="container">
                <div class="comment__content">
                    <p class="comment__title"><?php echo $title;?></p>
                    <div class="comments__desk">
                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                        <p class="comment__count"><?php echo $counterCom; ?></p>
                        <p class="comment__language"><?php echo $lan;?></p>
                      <form action="addStar.php" method="post"> 
                        <button style="background-color: white; border-style: none;" type="submit" name="add"><i class="fa fa-bookmark-o" aria-hidden="true" style="color: #F97F36; margin-left: 38px;"></i></button>
                    </form>
                    </div>
                    <hr style="border: 1px solid rgba(57, 57, 57, 0.46); margin-top: 33px;">
                    <p class="comment__text"><?php echo $que;?></p>
                    <div class="comment__code">
                        <code style="background-color:black; color: white"><?php echo $code;?></code>
                    </div>
                    <div class="comment__profile">
                        <div class="profile__img">
<?php
$checkava = mysqli_query($con, "SELECT * FROM `profile` WHERE `acc_id` = '$acc'");
                if(mysqli_num_rows($checkava) == 1){
                                   $outt = mysqli_query($con, "SELECT img FROM `profile` WHERE `acc_id` = '$acc'");
                                           $row = mysqli_fetch_array($outt);
                                           $zb1 = $row['img'];
                                ?>
                          <img src="<?php echo $zb1;?>" alt="handsome" style="width: 56px; height: 56px; left: 464px; top: 1368px; border-radius: 480px;"></div>
<?php 
                                }
                               elseif (mysqli_num_rows($checkava) == 0) { 
                                ?><img style="width: 60px; height: 60px; left: 466px; top: 1825px; border-radius: 480px;" src="img/la.jpg" alt="">
                                <?php
                               }
                                ?>

                        <div class="comment__name"><?php echo $account;?></div>
                        <div class="comment__group"><?php echo $group;?></div>
                    </div>
                    <hr style="border: 1px solid rgba(57, 57, 57, 0.46); margin-top: 44px;">
                    <div class="comment__add">
                        <form method="post" action="addcomment.php">
                        <textarea placeholder="Leave the comment..." name="comment" class="main__comment"></textarea>
                        <input type="submit" class="comm__btn" name="send" value="send">
                    </form>
                    </div>
                    <p class="comment__answers">ANSWERS:</p>
                    <hr style="border: 1px solid rgba(57, 57, 57, 0.46); margin-top: 26px;">
                    <?php
                    if (mysqli_num_rows($answers)>0) {
                    while($row = mysqli_fetch_array($answers)){
                      ?>
                    <div class="comments" style="align-items: center;">
                      <?php
                      $author = mysqli_query($con, "SELECT `name` FROM `accounts` WHERE account_id = '".$row['acc_id']."'");
                      $row1 = mysqli_fetch_array($author);
                      $authorName = $row1['name']; 
                      $authorGr = mysqli_query($con, "SELECT `group` FROM `accounts` WHERE account_id = '".$row['acc_id']."'");
                      $row1 = mysqli_fetch_array($authorGr);
                      $authorGroup = $row1['group']; 
                      ?>

                      <div class="author" style="margin-right: 15px; display: grid; justify-content: center; align-items: center;">
                        <div class="com__img"><?php
                               $checkava = mysqli_query($con, "SELECT * FROM `profile` WHERE `acc_id` = '".$row['acc_id']."'");
                               if(mysqli_num_rows($checkava) == 1){
                                   $outt = mysqli_query($con, "SELECT img FROM `profile` WHERE `acc_id` = '".$row['acc_id']."'");
                                           $row3 = mysqli_fetch_array($outt);
                                           $zb = $row3['img'];
                                ?><img style="width: 60px; height: 60px; left: 466px; top: 1825px;  border-radius: 480px;" src="<?php echo $zb;?>" alt="">
                                <?php
                                }
                               elseif (mysqli_num_rows($checkava) == 0) { 
                                ?><img style="width: 60px; height: 60px; left: 466px; top: 1825px;border-radius: 480px;" src="img/la.jpg" alt="">
                                <?php
                               }
                                ?></div>
                        <p class="authorname" style="font-family: Montserrat; margin-top: 8px;font-weight: bold;font-size: 14px; line-height: 102.4%; color: #393939;"><?php echo $authorName;?></p>
                        <p class="authorgroup" style="font-family: Montserrat; margin-top: 7px;font-weight: bold;font-size: 12px;line-height: 102.4%;color: #393939; opacity: 0.7;"><?php echo $authorGroup;?></p>
                      </div>
                        <div class="comment">
                            <p><?php echo $row['comment'] ?></p>
                        </div>
                    </div>
                    <?php
                    }
                  }
                  else{
                    ?>
                    <div class="comments">
                        <div class="comment">
                            <p style="font-weight:300%; text-align:center;">There is no answer yet</p>
                        </div>
                    </div>
                    <?php
                  }
 
                    ?>
                </div>
            </div>
        </section>
    </div>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/1c9d86ea72.js" crossorigin="anonymous"></script>
	
</body>
</html>

