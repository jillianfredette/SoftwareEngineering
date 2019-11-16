<?php

  $dbServername = "themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com";
  $dbUsername = "jillianf";
  $dbPassword = "Jillian12";
  $dbName = "THEMEPARK";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  if(!$conn){
    die('error connecting to database');}

?>