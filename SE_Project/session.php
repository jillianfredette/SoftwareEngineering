<?php
   include('includes/dbh.inc.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT Admin_ID from se_database.ADMIN where Admin_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Admin_ID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>