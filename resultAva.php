<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
 <?php

     session_start();
     error_reporting(E_ALL ^ E_WARNING);
     require('connection.php');
     $acc = $_SESSION['lid'];

    if (isset($_POST['submit']) && isset($_FILES["file"])) {
$target_dir = "ava/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if (file_exists($target_file)) {
        ?>
        <script> alert("Sorry! File already exists"); </script>
        <?php
  $uploadOk = 0;
}

if ($_FILES["file"]["size"] > 500000) {
          ?>
        <script> alert("Sorry! Your file is too large"); </script>
        <?php
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        ?>
        <script> alert("Sorry! Only JPG, JPEG, PNG & GIF files are allowed"); </script>
        <?php
  $uploadOk = 0;
}


  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  $imgg = $target_file;
   $checkava = mysqli_query($con, "SELECT * FROM `profile` WHERE `acc_id` = '$acc'");
    if (mysqli_num_rows($checkava) == 0) {
      $addd = mysqli_query($con, "INSERT INTO `profile`(`img` , `acc_id`) VALUES ('$imgg' , '$acc' )");
       header('location:index.php');
    }
    elseif(mysqli_num_rows($checkava) == 1){
            $update = mysqli_query($con, "UPDATE `profile` SET img = '$imgg' WHERE acc_id = '$acc'");

        ?>
        <script> alert("Success! Image was added"); </script>
        <?php
       header('location:index.php');
}
}
else{
  header('location:changeava.php');
}

 ?>

</body>
</html>