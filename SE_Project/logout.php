<?php
   session_start();
   
   //if the user logs out then the session is destroyed and the user is redirected to the login screen
   if(session_destroy()) {
      header("Location: login.php");
   }
?>