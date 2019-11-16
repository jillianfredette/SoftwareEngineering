<?php
   include('includes/session.php');
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

        h3 {
            font-size: 20px;
            padding-bottom: 0px;
        }

        form {
            border: 0px;
        }

        fieldset {
            border: 0px;
        }

        input {
            border: 0px;
        }

        a {
            text-align: center;
        }

        .content {
            max-width: 1000px;
            margin: auto;
            padding: 10px;
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

    <?php
      if(isset($_POST['weather']))
               {
        header('Location:weather_rep.php');
      }
      if(isset($_POST['edit_ride_table']))
               {
        header('Location:rideTable.php');
      }

      if(isset($_POST['edit_park_event_table']))
      {
         header('Location:parkEventTable.php');
      }

      if(isset($_POST['edit_customer_table']))
      {
         header('Location:customerTable.php');
      }

      if(isset($_POST['edit_ticket_table']))
      {
         header('Location:ticketTable.php');
      }

      if(isset($_POST['edit_purchase_table']))
      {
         header('Location:purchasesTable.php');
      }

      if(isset($_POST['edit_carLot_table']))
      {
         header('Location:carLotTable.php');
      }

      if(isset($_POST['edit_concession_table']))
      {
         header('Location:concessionTable.php');
      }

      if(isset($_POST['edit_parkArea_table']))
      {
         header('Location:parkAreaTable.php');
      }

      if(isset($_POST['edit_advertisement_table']))
      {
         header('Location:advertisementTable.php');
      }

      if(isset($_POST['edit_rideMaintenance_table']))
      {
         header('Location:rideMaintenanceTable.php');
      }

      if(isset($_POST['edit_ridesOn_table']))
      {
         header('Location:ridesOnTable.php');
      }

      if(isset($_POST['edit_worksEvent_table']))
      {
         header('Location:worksEventTable.php');
      }

      if(isset($_POST['edit_rainout_table']))
      {
         header('Location:rainoutTable.php');
      }

      if(isset($_POST['edit_employee_table']))
      {
         header('Location:employeeTable.php');
      }

      if(isset($_POST['event_calendar']))
      {
        header('Location:calendar.php');
      }
      if(isset($_POST['ride_report0']))
      {
        header('Location:rideReport0.php');
      }
      if(isset($_POST['fin_report']))
      {
        header('Location:annual_finances.php');
      }
      if(isset($_POST['customer']))
               {
        header('Location:customer_rep.php');
      }
      if(isset($_POST['edit_login_table']))
      {
        header('Location:userLoginTable.php');
      }
      ?>

    <?php if($_SESSION['security_level'] == 3): ?>
    <h2 align="center">
        <i class="fa fa-snowflake-o" style="color: deepskyblue"></i>
        Welcome
        <?php echo $_SESSION['Employee_name'].", Admin"; ?>
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>
    <?php elseif($_SESSION['security_level'] == 2): ?>
    <h2 align="center">
        <i class="fa fa-snowflake-o" style="color: deepskyblue"></i>
        Welcome
        <?php echo $_SESSION['Employee_name'].", Manager"; ?>
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>
    <?php else: ?>
    <h2 align="center">
        <i class="fa fa-snowflake-o" style="color: deepskyblue"></i>
        Welcome
        <?php echo $_SESSION['Employee_name'].", Employee"; ?>
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>
    <?php endif; ?>


    <center>
        <h3>Main Menu</h3>
    </center>
    <form method="post">
        <div class="w3-padding-16 w3-center">
            <div class="w3-bar ">

                <?php if(($_SESSION['security_level'] == 3) or ($_SESSION['security_level'] == 2)): ?>
                <div class="w3-dropdown-hover">
                    <button class="w3-button" style="background-color: white;">Edit</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="; align-items: left">
                        <?php if($_SESSION['security_level'] == 3): ?>
                        <button class="w3-button" id="edit_btn" name="edit_advertisement_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Advertisements</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_customer_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Customers</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_purchase_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Purchases</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_ridesOn_table" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Rides On</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_ticket_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Tickets</button>
                        <br>
                        <?php endif; ?>
                        <button class="w3-button" id="edit_btn" name="edit_worksEvent_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Works Events</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_employee_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Employees</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_parkArea_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Park Areas</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_park_event_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Park Events</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_rainout_table" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Rainouts</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_ride_table" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Rides</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_rideMaintenance_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Ride Maintenances</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_carLot_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Car Lots</button>
                        <br>
                        <button class="w3-button" id="edit_btn" name="edit_concession_table" style="color: black; border: none; text-align: left; width: 100%;" type="submit">Concessions</button>
                        <br>
                        <button class="w3-button" id = "edit_btn" name = "edit_login_table" style=" border: none; text-align: left; width: 100%;" type = "submit">User Login Information</button>
                    </div>
                </div>
                <?php endif; ?>

                <button class="w3-button" id="calendar_btn" name="event_calendar" type="submit" >Event Calendar
                </button>

                <?php if(($_SESSION['security_level'] == 3) or ($_SESSION['security_level'] == 2)): ?>
                <div class="w3-dropdown-hover">
                    <button class="w3-button">Reports</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="; align-items: left; width: 75px;">
                        <button class="w3-button" id="report_btn" name="ride_report0" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Rides</button>
                        <button class="w3-button" id="report_btn" name="fin_report" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Finances</button>
                        <button class="w3-button" id="report_btn" name="customer" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Customer Traffic</button>
                        <button class="w3-button" id="report_btn" name="weather" type="submit" style="color: black; border: none; text-align: left; width: 100%;">Weather</button>
                        <br>

                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
        </form>
        <?php if(($_SESSION['security_level'] == 1) or ($_SESSION['security_level'] == 2)): ?>
        <div class="content" style="max-width: 550px;">
            <h3 align="left">Event Work Schedule</h2>
                <p>
                    <?php
            $emp_id = $_SESSION['login_user'];
      $e_id = array();
      $e_date = array();
      $e_type = array();
      $e_start_time = array();
      $e_end_time = array();
      $e_area = array();
            $pdo = new PDO('mysql:host=themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com; dbname=THEMEPARK', 'bryane', 'Bryan12');
            $sth = $pdo->prepare("SELECT PARK_EVENT.Event_ID, PARK_EVENT.Event_Date, PARK_EVENT.Event_Type, PARK_EVENT.Event_Start_Time, PARK_EVENT.Event_End_Time, PARK_AREA.Area_Name
FROM THEMEPARK.PARK_EVENT
INNER JOIN THEMEPARK.WORKS_EVENT
ON PARK_EVENT.Event_ID = WORKS_EVENT.Event_worked_ID
INNER JOIN THEMEPARK.PARK_AREA
ON PARK_EVENT.Event_area_ID = PARK_AREA.Area_ID
WHERE Worker_ID = $emp_id and Event_Date > CURDATE()
ORDER BY PARK_EVENT.Event_Date ASC;");
             $sth->execute();
             while($row = $sth->fetch(PDO::FETCH_ASSOC))
            {
               array_push($e_id, $row['Event_ID']);
               array_push($e_date, $row['Event_Date']);
               array_push($e_type, $row['Event_Type']);
               array_push($e_start_time, $row['Event_Start_Time']);
               array_push($e_end_time, $row['Event_End_Time']);
               array_push($e_area, $row['Area_Name']);
            }
            if(sizeof($e_id) == 0)
            {
              echo "Nothing scheduled, enjoy your time off!";
            }
            for($i = 0; $i < sizeof($e_id); $i++)
            {
            echo "Event ID: $e_id[$i]";
            echo "<br>";
            echo "Event Date: $e_date[$i]";
            echo "<br>";
            echo "Start Time: ";
            echo date( 'g:i A', strtotime( $e_start_time[$i] ) );
            echo "<br>";
            echo "End Time: ";
            echo date( 'g:i A', strtotime( $e_end_time[$i] ) );
            echo "<br>";
            echo "Event Type: $e_type[$i]";
            echo "<br>";
            echo "Event Area: $e_area[$i]";
            echo "<br>";
            echo "<br>";
            }

    ?>
                </p>
        </div>
        <?php endif; ?>

    <footer class="w3-container w3-padding-64 w3-center w3-large">
        <a href="logout.php"><i class="fas fa-power-off" style="text-align: center;"></i></a>
    </footer>
</body>

</html>