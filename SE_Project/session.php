<?php
   include('includes/dbh.inc.php');
   session_start();
   
   //retrieve the ID of the user that is logged in
   $user_check = $_SESSION['login_user'];
   //query the database to find the ID of the admin that matches the logged in user
   $ses_sql = mysqli_query($conn,"SELECT Admin_ID from se_database.ADMIN where Admin_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //set the session ID to the ID of the logged in user
   $login_session = $row['Admin_ID'];
   
   //if there is no user logged in then return to the login page and kill the session
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>