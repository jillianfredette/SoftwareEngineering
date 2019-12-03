<?php

//the welcome page is the main part of the admin portal which the user is redirected to if their login attempt was successful
//the links shown depend on what admin role the user has, taken from the database
include('session.php');
?>
<html>

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

         .material-icons {
            vertical-align: -15%
         }
        .admin-links{
            text-align:center;
            background:#627736 !important;
        }
      </style>
   </head>

   <body class="w3-panel w3-center w3-flat-silver">

        <!-- in the upper left corner the admin's username is displayed and when it is hovered over, the sign-out button appears -->
      <div class="w3-dropdown-hover w3-left">
         <button class="w3-button w3-flat-silver">
            <i class="material-icons w3-xlarge">person</i>
            <?php echo $_SESSION['Username']; ?>
         </button>
         <div class="w3-dropdown-content w3-bar-block">
            <a href="logout.php" class="w3-bar-item w3-button">Sign Out</a>
         </div>
      </div>

      <div class="w3-container w3-center">
         <header class="w3-panel w3-center">
            <h1 class="w3-text-dark-grey">
               Admin Portal
            </h1>
         </header>
      </div>

        <!-- global links are displayed for all admin roles -->
         <center>
      <div class="w3-card-4 w3-blue-gray w3-center" style="width:80%">
         <div class="w3-margin-top" style="padding-top:15px">
            <h2>Global Links</h2>
         </div>

         <div class="w3-container" style="padding-bottom:20px">
            <a href="ManageUserAccounts.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Manage User Accounts</a>
            <a href="AssignRoles.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Assign Roles</a>
            <a href="HelpDesk.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Help Desk</a>
         </div>
      </div>

        <!-- start the if-else statements that will display different links depending on the admin role -->

        <!-- if the admin has the finance role then display the finance links -->
      <?php if ($_SESSION['Admin_role'] == "FINANCE_ADMIN") : ?>
         <div class="w3-card-4 w3-blue-gray w3-center admin-links" style="width:80%">
            <div class="w3-margin-top" style="padding-top:15px">
               <h3>Finance Links</h3>
            </div>

            <div class="w3-container" style="padding-bottom:20px">
               <a href="FinanceReports.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Finance Reports</a>
               <a href="AccountsPayable.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Accounts Payable</a>
               <a href="AccountsReceivables.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Acconts Receivables</a>
               <a href="Tax.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Tax</a>
            </div>
         </div>

         <!-- if the admin has the sales role then display the sales links -->
         <?php elseif ($_SESSION['Admin_role'] == "SALES_ADMIN") : ?>
         <div class="w3-card-4 w3-blue-gray w3-center admin-links" style="width:80%">
            <div class="w3-margin-top" style="padding-top:15px">
               <h3>Sales Links</h3>
            </div>

            <div class="w3-container" style="padding-bottom:20px">
               <a href="SalesReports.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Sales Reports</a>
               <a href="SalesLeads.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Sales Leads</a>
               <a href="SalesDemo.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Sales Demo</a>
            </div>
         </div>

         <!-- if the admin has the hr role then display the hr links -->
         <?php elseif ($_SESSION['Admin_role'] == "HR_ADMIN") : ?>
         <div class="w3-card-4 w3-blue-gray w3-center admin-links" style="width:80%">
            <div class="w3-margin-top" style="padding-top:15px">
               <h3>HR Links</h3>
            </div>

            <div class="w3-container" style="padding-bottom:20px">
               <a href="NewHire.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">New Hire</a>
               <a href="Onboarding.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">On-boarding</a>
               <a href="Benefits.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Benefits</a>
               <a href="Payroll.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Payroll</a>
               <a href="Terminations.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Terminations</a>
               <a href="HRReports.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">HR Reports</a>
            </div>
         </div>

         <!-- if the admin has the engineering role then display the engineering links -->
         <?php elseif ($_SESSION['Admin_role'] == "ENGG_ADMIN") : ?>
         <div class="w3-card-4 w3-blue-gray w3-center admin-links" style="width:80%">
            <div class="w3-margin-top" style="padding-top:15px">
               <h3>Engineering Links</h3>
            </div>

            <div class="w3-container" style="padding-bottom:20px">
               <a href="ApplicationMonitoring.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Application Monitoring</a>
               <a href="TechSupport.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Tech Support</a>
               <a href="AppDevelopment.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">App Development</a>
               <a href="AppAdmin.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">App Admin</a>
               <a href="ReleaseManagement.php" class="w3-button w3-ripple w3-flat-midnight-blue w3-round w3-margin">Release Management</a>
            </div>
         </div>
      <?php endif; ?>
      </center>


   </body>

   </html>
