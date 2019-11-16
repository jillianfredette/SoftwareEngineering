<?php
   include('includes/dbh.inc.php');

   session_start();

   $error_message = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $FirstName = "";

      $sql = "SELECT Emp_ID, Employee_ID_login, Emp_Fname, Emp_Lname, Emp_security FROM THEMEPARK.EMPLOYEE AS E, THEMEPARK.LOGIN AS L WHERE L.Employee_ID_login = '$myusername' and AES_DECRYPT(L.Employee_password,'COSC3800') = '$mypassword' and E.Emp_ID = L.Employee_ID_login";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['Employee_name'] = $row['Emp_Fname']." ".$row['Emp_Lname'];
         $_SESSION['security_level'] = $row['Emp_security'];

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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style type="text/css">
        body {
            font-family: 'Raleway', Arial, sans-serif;
            font-size: 14px;
        }

        h1 {
            white-space: nowrap;
            font-size: 30px;
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

<body>

    <header class="w3-panel w3-center" style="padding-top:25px">
        <h1>
            A Park of
            <span style="color: deepskyblue;">
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

        <form id='login' action="" method='post' accept-charset='UTF-8' style="margin: 0px auto; width: 300px;">
            <fieldset style="width:300px; align-content: right">
                <input type='hidden' name='submitted' id='submitted' value='1' />
                <label for='username'>Employee ID:</label>
                <input type='text' name='username' id='username' maxlength="50" />
                <br>
                <br>
                <label for='password'>Password:</label>
                <input type='password' name='password' id='password' maxlength="50" />
                <br>
                <br>
                <button class="w3-button" type="submit"><i class='fas fa-arrow-right' style="background-color: none; color: black; border: none;"></i></button>
            </fieldset>
        </form>

        <div align="center" style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_message; ?>
        </div>

    </div>
</body>

</html>