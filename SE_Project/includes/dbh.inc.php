<?php

  //this file is used to create the connection to the database
  

  //database server name
  $dbServername = "se-database.c5rlyfkr7s2q.us-east-2.rds.amazonaws.com";
  //database login username
  $dbUsername = "admin";
  //database login password
  $dbPassword = "adminpassword";
  //name of the database
  $dbName = "se_database";

  //connects to the MySQL database using the connection parameters above
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  //if the connecting isn't made then there's an error and the process dies
  if(!$conn){
    die('error connecting to database');}

?>