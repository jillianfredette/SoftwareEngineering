<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
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

        h3 {
            font-size: 25px;
            text-align: center;
            padding-bottom: 10px;
        }
        .material-icons {vertical-align:-15%}
    </style>
   </head>
   
   <body class="w3-panel w3-center w3-flat-silver">


   <div class="w3-dropdown-hover w3-left">
      <button class="w3-button w3-flat-silver">
         <i class="material-icons w3-xlarge">person</i> 
         <?php echo $_SESSION['Username']; ?>
      </button>
      <div class="w3-dropdown-content w3-bar-block">
         <a href = "logout.php" class="w3-bar-item w3-button">Sign Out</a>
      </div>
   </div>


   <div class="w3-container w3-center">

    <header class="w3-panel w3-center" style="padding-top:25px">
        <h1 class="w3-text-dark-grey">
            Admin Portal
        </h1>
    </header>
    </div>
   </body>
   
</html>