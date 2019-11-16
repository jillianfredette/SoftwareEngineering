<?php
   include('includes/dbh.inc.php');
   session_start();
   
   $error_message = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $FirstName = "";
      
      $sql = "SELECT Emp_ID FROM THEMEPARK.EMPLOYEE WHERE Emp_ID = '$myusername' and AES_DECRYPT(Employee_password,'COSC3800') = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error_message = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   <head>
      <title>Login Page</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style type = "text/css">
         body 
         {
            font-family: 'Raleway', Arial, sans-serif;
            font-size:14px;
            color: white;
         }
         h1
         {
            white-space: nowrap;
            font-size: 30px;
         }
         h2
         {
            font-size: 25px;
            text-align: center;
            padding-bottom: 10px; 
         }
         form
         {
            border: 0px;
         }
         fieldset
         {
            border: 0px;
         }
         input
         {
            border: 0px;
         }

      </style>

   </head>
   
   <body bgcolor = "#2B2B2B">

      <header class="w3-panel w3-center"style="padding-top:25px">
         <h1>
            A Park of 
            <span style = "color: lightskyblue;">
            Ice</span>
             and 
            <span style="color: orangered">
            Fire</span>
         </h1>
      </header>

      <div class="w3-panel w3-center">
         <h2>
            Employee Login
         </h2>
        <form id='login' action="" method='post' accept-charset='UTF-8' style="margin: 0px auto; width: 500px;">
            <fieldset style="width:500px;">
            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <label for='username' >Employee ID:</label>
            <input type='text' name='username' id='username'  maxlength="50" />


            <label for='password' >Password:</label>
            <input type='password' name='password' id='password' maxlength="50" />
            <input type='submit' name='submit' value='Submit' style="background: none; color: white; border: none; padding-top: 20px;" />
            </fieldset>
        </form>
         

         <div align = "center" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_message; ?>
         </div>

      </div>
				
   </body>

</html>