<?php
   include('includes/dbh.inc.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT Emp_ID, Emp_Fname from THEMEPARK.EMPLOYEE where Emp_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Emp_ID'];
   $login_user_name = $row['Emp_Fname'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>