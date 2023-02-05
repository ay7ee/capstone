<?php

$con = mysqli_connect( 'localhost' , 'root' , '') or die ("could not connect to mysql");
mysqli_select_db($con, "stackoverflow") or die ("no such database");
?>
