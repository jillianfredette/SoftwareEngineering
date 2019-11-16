<?php

include('includes/session.php');
if($_SESSION['security_level']==1){
	header("location:welcome.php");
}

include('includes/dbh.inc.php');
	@$eid = "";
	@$date = "";
	@$eventtype = "";
	@$starttime = "";
	@$endtime = "";
	@$totalprice = "";
	@$numguests = "";
	@$eventareaid = "";
	@$customerbooked = "";

?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>

<head>
    <title>Events</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style type="text/css">
        td{
          padding-top: 10px;
          padding-bottom: 10px;
        }
        tr:nth-child(even){background-color: #D5D5D5;}

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
            overflow: hidden;
        }

        fieldset {
            border: 0px;
        }

        label {
            display: inline-block;
            float: left;
            clear: left;
            width: 250px;
            padding-right: 50px;
            text-align: right;
        }

        input {
            display: inline-block;
            float: left;
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

    <h2 align="center">
        <i class="fa fa-snowflake-o" style="color: deepskyblue"></i>
        Events
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>
    <?php
      if(isset($_POST['home']))
               {
        header('Location:welcome.php');
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
      if(isset($_POST['edit_login_table']))
      {
        header('Location:userLoginTable.php');
      }
      ?>
    <form method="post">
      <div class="w3-padding-16 w3-center">
         <div class="w3-bar ">

         <?php if(($_SESSION['security_level'] == 3) or ($_SESSION['security_level'] == 2)): ?>
         <button class="w3-button" id = "home_btn" name = "home" type = "submit" >Home</button>
            <div class="w3-dropdown-hover">
               <button class="w3-button" >Edit</button>
               <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="align-items: left">
               <?php if($_SESSION['security_level'] == 3): ?>
                  <button class="w3-button" id = "edit_btn" name = "edit_advertisement_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Advertisements</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_customer_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Customers</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_purchase_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Purchases</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_ridesOn_table" type = "submit" style=" border: none; text-align: left; width: 100%;">Rides On</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_ticket_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Tickets</button>
                  <br>
               <?php endif; ?>
                  <button class="w3-button" id = "edit_btn" name = "edit_worksEvent_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Works Events</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_employee_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Employees</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_parkArea_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Park Areas</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_park_event_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Park Events</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_rainout_table" type = "submit" style=" border: none; text-align: left; width: 100%;">Rainouts</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_ride_table" type = "submit" style=" border: none; text-align: left; width: 100%;">Rides</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_rideMaintenance_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Ride Maintenances</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_carLot_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Car Lots</button>
                  <br>
                  <button class="w3-button" id = "edit_btn" name = "edit_concession_table" style=" border: none; text-align: left; width: 100%;" type = "submit">Concessions</button>
                  <br>
                        <button class="w3-button" id = "edit_btn" name = "edit_login_table" style=" border: none; text-align: left; width: 100%;" type = "submit">User Login Information</button>
               </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</form>
    <?php
			if (isset($_POST['fetch_btn']))
			{
				//echo '<script type = "text/javascript">alert("Select button clicked")</script>';
				$eid = $_POST['eid'];

				if ($eid == "")
				{
					echo '<script type = "text/javascript">alert("Enter EID to get Park Event details")</script>';
				}
				else
				{
					$query = "select * from PARK_EVENT where Event_ID = $eid";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						if(mysqli_num_rows($query_run) > 0)
						{
							$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
							@$eid = $row['Event_ID'];
							@$date = $row['Event_Date'];
							@$eventtype = $row['Event_Type'];
							@$starttime = $row['Event_Start_Time'];
							@$endtime = $row['Event_End_Time'];
							@$totalprice = $row['Total_price'];
							@$numguests = $row['Num_guests'];
							@$eventareaid = $row['Event_area_ID'];
							@$customerbooked = $row['Cust_booked'];
						}
						else
						{
							echo '<script type = "text/javascript">alert("Invalid Event ID")</script>';
						}
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error in query")</script>';
					}
				}
			}
		?>
    <div class="w3-container w3-center">
        <form action="" method="post" accept-charset='UTF-8' style="margin: 0px auto; width: 500px;">
            <fieldset style="width:500px;">
                <label for="eid">Event ID:</label>
                <input type="text" placeholder="Event ID" name="eid" value="<?php echo $eid; ?>">
                <br><br>

                <button class="w3-button" id="btn_go" name="fetch_btn" type="submit">Select</button>
                <br><br>

                <label for="date">Date (YYYY-MM-DD):</label>
                <input type="text" placeholder="Data" name="date" value="<?php echo $date; ?>">
                <br><br>

                <label for="eventtype">Event Type:</label>
                <input type="text" placeholder="Event Type" name="eventtype" value="<?php echo $eventtype; ?>">
                <br><br>

                <label for="starttime">Start Time:</label>
                <input type="text" placeholder="Start Time" name="starttime" value="<?php echo $starttime; ?>">
                <br><br>

                <label for="endtime">End Time:</label>
                <input type="text" placeholder="End Time" name="endtime" value="<?php echo $endtime; ?>">
                <br><br>

                <label for="totalprice">Event Price:</label>
                <input type="text" placeholder="Event Price" name="totalprice" value="<?php echo $totalprice; ?>">
                <br><br>

                <label for="numguests"># of Guests:</label>
                <input type="text" placeholder="# of Guests" name="numguests" value="<?php echo $numguests; ?>">
                <br><br>

                <label for="eventareaid">Area ID:</label>
                <input type="text" placeholder="Area ID" name="eventareaid" value="<?php echo $eventareaid; ?>">
                <br><br>

                <label for="customerbooked">Customer ID:</label>
                <input type="text" placeholder="Customer ID:" name="customerbooked" value="<?php echo $customerbooked; ?>">
                <br><br>
                <div class="w3-bar" style="padding-bottom: 10px">
                    <button class="w3-bar-item w3-button" id="btn_insert" name="insert_btn" type="submit">Insert</button>
                    <button class="w3-bar-item w3-button" id="btn_update" name="update_btn" type="submit">Update</button>
                    <button class="w3-bar-item w3-button" id="btn_delete" name="delete_btn" type="submit">Flag for Deletion</button>
                    <button class="w3-bar-item w3-button" id="btn_viewAll" name="viewAll_btn" type="submit">View All</button>
                    <button class="w3-bar-item w3-button" id="btn_clear" name="parkEventTable" type="submit">Clear Page</button>
                </div>
            </fieldset>
        </form>

    </div>

    <?php
      if(isset($_POST['viewAll_btn']))
      {
        echo '<table style = "margin: auto; text-align:left; width:75%;">';
        echo "<tr>";
        echo "<th>Event ID</th>
        <th>Date of Event</th>
        <th>Type</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Price($)</th>
        <th>Number of Guests</th>
        <th>Area ID where Event held</th>
        <th>Customer ID</th>";
        echo "</tr>";
        $testing = "SELECT * FROM PARK_EVENT WHERE Event_ID <= 500";
        $query_run = mysqli_query($conn, $testing);
        while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
          echo "<tr>";
        echo "<td>" .$row['Event_ID']. "</td>";
        echo "<td>" .$row['Event_Date']. "</td>";
        echo "<td>" .$row['Event_Type']. "</td>";
        echo "<td>" .$row['Event_Start_Time']. "</td>";
        echo "<td>" .$row['Event_End_Time']. "</td>";
        echo "<td>" .$row['Total_price']. "</td>";
        echo "<td>" .$row['Num_guests']. "</td>";
        echo "<td>" .$row['Event_area_ID']. "</td>";
        echo "<td>" .$row['Cust_booked']. "</td>";
        echo "</tr>";
        }
        echo "<table>";
      }


			if(isset($_POST['insert_btn']))
			{
				@$eid = $_POST['eid'];
				@$date = $_POST['date'];
				@$eventtype = $_POST['eventtype'];
				@$starttime = $_POST['starttime'];
				@$endtime = $_POST['endtime'];
				@$totalprice = $_POST['totalprice'];
				@$numguests = $_POST['numguests'];
				@$eventareaid = $_POST['eventareaid'];
				@$customerbooked = $_POST['customerbooked'];

				if($eid == "" || $date == "" || $eventtype == "" || $starttime == "" || $endtime == "" || $totalprice == "" || $numguests == "" || $eventareaid == "" || $customerbooked == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "insert into PARK_EVENT values($eid, '$date', '$eventtype', '$starttime', '$endtime', $totalprice, $numguests, $eventareaid, $customerbooked)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Park Event inserted successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: Event not inserted")</script>';
					}
				}

			}//endif(isset($_POST['insert_btn']))

			else if(isset($_POST['update_btn']))
			{
				//echo '<script type = "text/javascript">alert("Update button clicked!")</script>';
				if($_POST['rid'] == "" || $_POST['rname'] == "" || $_POST['ropendate'] == "" || $_POST['rsqrft'] == "" || $_POST['rmaxspeed'] == "" || $_POST['rheight'] == "" || $_POST['rnumseats'] == "" || $_POST['roperating'] == "" || $_POST['rareaid'] == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field when updating")</script>';
				}
				else
				{
					@$eid = $_POST['eid'];
					@$date = $_POST['date'];
					@$eventtype = $_POST['eventtpye'];
					@$starttime = $_POST['starttime'];
					@$endtime = $_POST['endtime'];
					@$totalprice = $_POST['totalprice'];
					@$numguests = $_POST['numguests'];
					@$eventareaid = $_POST['eventareaid'];
					@$customerbooked = $_POST['customerbooked'];

					$query = "update RIDE SET Event_Date = '$date', Event_Type = '$eventtype', Event_Start_Time = '$starttime', Event_End_Time = '$endtime', Total_Price = $totalprice, Num_guests = $numguests, Event_area_ID = $eventareaid, Cust_booked = $customerbooked WHERE Event_ID = $eid";
					$query_run = mysqli_query($conn,$query);

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Park Event updated successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error updating event")</script>';
					}
				}
			}
			else if(isset($_POST['delete_btn']))
			{
				if($_POST['eid']=='')
				{
					echo '<script type = "text/javascript">alert("Enter Event ID to delete")</script>';
				}
			    else
				{
					$eid = $_POST['eid'];
					$query = "INSERT INTO FLAGGED_FOR_DELETION(Table_name_del, ID_of_entry) VALUES('PARK_EVENT',$eid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Flagged Event for Deletion successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error in query - flag for deletion unsuccessful.")</script>';
					}
				}
			}

			?>

    <footer class="w3-container w3-padding-32 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="parkEventTable.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>