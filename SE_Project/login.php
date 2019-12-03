<?php
   include('includes/dbh.inc.php');
   //begins the database session
   session_start();
   //builds the error message in the occurence of an error
   $error_message = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      //query to find the user in the database based off of what was entered in the login fields
      $sql = "SELECT Admin_ID, Admin_Username, Admin_Role FROM se_database.ADMIN WHERE Admin_Username = '$myusername' and AES_DECRYPT(Admin_Password,'COSC4351') = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      //determines the number of rows in the result
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row because usernames are unique
      if($count == 1) {
         //stores the user information in the session to handle determination of what links are shown
         $_SESSION['login_user'] = $row['Admin_ID'];
         $_SESSION['Username'] = $row['Admin_Username'];
         $_SESSION['Admin_role'] = $row['Admin_Role'];
         
         //redirects to the welcome page of the admin portal where the links are displayed
         header("location: welcome.php");
      }else {
          //if the count != 1 then either the user doesn't exist, the password was invalid, or another error
         $error_message = "Error: Your Username or Password is Invalid";
      }
   }
?>
<html>

<head>
    <title>Admin Portal Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        h1 {
            white-space: nowrap;
            font-size: 50px;
        }

        h2 {
            font-size: 25px;
            text-align: center;
            padding-bottom: 10px;
        }

        form {
            border: 1px;
            overflow: hidden;
        }

        fieldset {
            border: 2px;
        }

        input {
            float: right;
        }

        input[type="text"] {
            font: Arial;
            padding-left: 2px;
        }
    </style>

</head>

<body class="w3-panel w3-center w3-flat-silver">

<div class="w3-container w3-center">
    <header class="w3-panel w3-center" style="padding-top:40px">
        <h1 class="w3-text-dark-grey">
            Admin Portal
        </h1>
    </header>
    </div>

    <div class="w3-card-4 w3-blue-gray w3-center w3-display-middle" style="width:25%">

        <h2>
            Login
        </h2>

        <!-- the form takes the username and password to login to the portal -->
        <form id='login' action="" method='post' accept-charset='UTF-8' style="margin: 0px auto; width: 300px;">
            <fieldset style="width:300px; align-content: right; padding-right:25px">
                <input type='hidden' name='submitted' id='submitted' value='1' />
                <label for='username'>Username:</label>
                <input type='text' name='username' id='username' maxlength="50" />
                <br>
                <br>
                <label for='password'>Password:</label>
                <input type='password' name='password' id='password' maxlength="50" />
                <br>
                <br>
                <button class="w3-button w3-ripple w3-flat-midnight-blue w3-round" type="submit">Submit</button>
            </fieldset>
        </form>
        <!-- displays the error message if the login attempt was invalid -->
        <div align="center" style="font-size:14px; color:#8b0000; padding-bottom:20px">
        <b><?php echo $error_message; ?></b>
        </div>

    </div>
</body>

</html>