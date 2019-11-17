<?php

  $dbServername = "se-database.c5rlyfkr7s2q.us-east-2.rds.amazonaws.com";
  $dbUsername = "admin";
  $dbPassword = "adminpassword";
  $dbName = "se_database";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  if(!$conn){
    die('error connecting to database');}

?>