<?php

include('includes/session.php');
if($_SESSION['security_level']!=3){
	header("location:welcome.php");
}

include('includes/dbh.inc.php');
	@$discountinc = "";
	@$enddate = "";
	@$startdate = "";
	@$cost = "";
	@$adid = "";
	@$type = "";
	@$areaid = "";
	@$rideid = "";
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>

<head>
    <title>Advertisements</title>
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
            align-content: center;
        }

        fieldset {
            border: 2px;
            align-content: center;
        }

        label {
            display: inline-block;
            float: left;
            clear: left;
            width: 300px;
            padding-right: 50px;
            text-align: right;
            align-self: center;
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
        Advertisements
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>
    <?php
      if(isset($_POST['edit_ride_table']))
               {
        header('Location:rideTable.php');
      }
      if(isset($_POST['home']))
               {
        header('Location:welcome.php');
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
         <button class="w3-button" id = "home_btn" name = "home" type = "submit">Home</button>
            <div class="w3-dropdown-hover">

               <button class="w3-button">Edit</button>
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
				$adid = $_POST['adid'];

				if ($adid == "")
				{
					echo '<script type = "text/javascript">alert("Enter Advertisement ID to get advertisement details")</script>';
				}
				else
				{
					$query = "SELECT * from ADVERTISEMENT WHERE Ad_ID = $adid";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						if(mysqli_num_rows($query_run) > 0)
						{
							$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
							@$discountinc = $row['Discount_included'];
							@$enddate = $row['Date_ad_ends'];
							@$startdate = $row['Date_at_started'];
							@$cost = $row['Ad_cost'];
							@$adid = $row['Ad_ID'];
							@$type = $row['Ad_Medium'];
							@$areaid = $row['Area_prom_ID'];
							@$rideid = $row['Ride_prom_ID'];
						}
						else
						{
							echo '<script type = "text/javascript">alert("Invalid Advertisement ID")</script>';
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
        <form action="" method="post" accept-charset='UTF-8' style="margin: 0px auto; width: 550px;">
            <fieldset style="width:550px;">
                <label for="eid">Advertisement ID:</label>
                <input type="text" placeholder="Advertisement ID" name="adid" value="<?php echo $adid; ?>">
                <br><br>

                <button class="w3-button" id="btn_go" name="fetch_btn" type="submit">Select</button>
                <br><br>

                <label for="eventtype">Discount Included:</label>
                <input type="text" placeholder="Discount included" name="discountinc" value="<?php echo $discountinc; ?>">
                <br><br>

                <label for="eventtype">Date ad started (YYYY-MM-DD):</label>
                <input type="text" placeholder="Date ad started" name="startdate" value="<?php echo $startdate; ?>">
                <br><br>

                <label for="date">Date ad ended (YYYY-MM-DD):</label>
                <input type="text" placeholder="Date ad ends" name="enddate" value="<?php echo $enddate; ?>">
                <br><br>

                <label for="eventtype">Cost of Ad:</label>
                <input type="text" placeholder="Cost" name="cost" value="<?php echo $cost; ?>">
                <br><br>

                <label for="eventtype">Type of Ad:</label>
                <input type="text" placeholder="Type of Ad" name="type" value="<?php echo $type; ?>">
                <br><br>
                <label for="eventtype">Area ID of area promoted:</label>
                <input type="text" placeholder="Area ID" name="areaid" value="<?php echo $areaid; ?>">
                <br><br>
                <label for="eventtype">Ride ID of ride promoted:</label>
                <input type="text" placeholder="Ride ID" name="rideid" value="<?php echo $rideid; ?>">
                <br><br>

                <br><br>
                <div class="w3-bar" style="padding-bottom: 10px">
                    <button class="w3-bar-item w3-button" id="btn_insert" name="insert_btn" type="submit">Insert</button>
                    <button class="w3-bar-item w3-button" id="btn_update" name="update_btn" type="submit">Update</button>
                    <button class="w3-bar-item w3-button" id="btn_delete" name="delete_btn" type="submit">Flag for Deletion</button>
                    <button class="w3-bar-item w3-button" id="btn_viewAll" name="viewAll_btn" type="submit">View All</button>
                    <button class="w3-bar-item w3-button" id="btn_clear" name="advertisementTable" type="submit">Clear Page</button>

                </div>
            </fieldset>
        </form>

    </div>

    <?php
      if(isset($_POST['viewAll_btn']))
      {
        echo '<table id="main-table" style = "margin: auto; text-align:left; width:75%;">';
        echo "<tr>";
        echo "
        <th>Ad ID</th>
        <th>Discount Included</th>
        <th>Date Ad Started</th>
        <th>Date Ad ended</th>
        <th>Cost of Ad ($)</th>
        <th>Type of Ad</th>
        <th>Area ID of area promoted</th>
        <th>Ride ID of ride promoted</th>";
        echo "</tr>";
        $testing = "SELECT * FROM ADVERTISEMENT WHERE Ad_ID <= 500";
        $query_run = mysqli_query($conn, $testing);
        while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
          echo "<tr>";
          echo "<td>" .$row['Ad_ID']. "</td>";
          echo "<td>" .$row['Discount_included']. "</td>";
          echo "<td>" .$row['Date_at_started']. "</td>";
          echo "<td>" .$row['Date_ad_ends']. "</td>";
          echo "<td>" .$row['Ad_cost']. "</td>";
          echo "<td>" .$row['Ad_Medium']. "</td>";
          echo "<td>" .$row['Area_prom_ID']. "</td>";
          echo "<td>" .$row['Ride_prom_ID']. "</td>";
          echo "</tr>";
        }
        echo "<table>";
      }


			if(isset($_POST['insert_btn']))
			{
				@$discountinc = $_POST['discountinc'];
				@$enddate = $_POST['enddate'];
				@$startdate = $_POST['startdate'];
				@$cost = $_POST['cost'];
				@$adid = $_POST['adid'];
				@$type = $_POST['type'];
				@$areaid = $_POST['areaid'];
				@$rideid = $_POST['rideid'];

				if($discountinc == "" || $enddate == "" || $startdate == "" || $cost == "" || $adid == "" || $type == "" || $areaid == "" || $rideid == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "INSERT into ADVERTISEMENT values($discountinc, '$enddate', '$startdate', $cost, $adid, '$type', $areaid, $rideid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Advertisement inserted successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: Advertisement not inserted")</script>';
					}
				}

			}//endif(isset($_POST['insert_btn']))

			else if(isset($_POST['update_btn']))
			{
				@$discountinc = $_POST['discountinc'];
				@$enddate = $_POST['enddate'];
				@$startdate = $_POST['startdate'];
				@$cost = $_POST['cost'];
				@$adid = $_POST['adid'];
				@$type = $_POST['type'];
				@$areaid = $_POST['areaid'];
				@$rideid = $_POST['rideid'];

				if($discountinc == "" || $enddate == "" || $startdate == "" || $cost == "" || $adid == "" || $type == "" || $areaid == "" || $rideid == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field when updating")</script>';
				}
				else
				{
					$query = "UPDATE ADVERTISEMENT SET Date_ad_ends = '$enddate', Date_at_started = '$startdate', Ad_cost = $cost, Ad_Medium = '$type', Area_prom_ID = $areaid, Ride_prom_ID = $rideid WHERE Ad_ID = $adid";
					$query_run = mysqli_query($conn,$query);

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Advertisement updated successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error updating advertisement.")</script>';
					}
				}
			}
			else if(isset($_POST['delete_btn']))
			{
				if($_POST['adid']=='')
				{
					echo '<script type = "text/javascript">alert("Enter Advertisement ID to delete advertisement")</script>';
				}
			    else
				{
					$adid = $_POST['adid'];
					$query = "INSERT INTO FLAGGED_FOR_DELETION(Table_name_del, ID_of_entry) VALUES('ADVERTISEMENT',$adid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Flagged Advertisement for Deletion successfully.")</script>';
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
        <a href="advertisementTable.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>