<?php

include('includes/session.php');
if($_SESSION['security_level']==1){
	header("location:welcome.php");
}

include('includes/dbh.inc.php');
	@$concid = "";
	@$type = "";
	@$operating = "";
	@$dateopened = "";
	@$areaid = "";
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<title>Concessions</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <style type = "text/css">
    td{
      padding-top: 10px;
      padding-bottom: 10px;
    }
    tr:nth-child(even){background-color: #D5D5D5;}

    body
    {
      font-family: 'Raleway', Arial, sans-serif;
      font-size:14px;
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
    h3
    {
      font-size: 20px;
      padding-bottom: 0px;
    }
    form
    {
      border: 0px;
      overflow: hidden;
    }
    fieldset
    {
      border: 0px;
    }
    label
    {
    	display: inline-block;
    	float: left;
    	clear: left;
    	width: 250px;
    	padding-right: 50px;
    	text-align: right;
    }
 	  input
 	  {
  		display: inline-block;
  		float: left;
	   }
  </style>
</head>

<body>
	<header class="w3-panel w3-center"style="padding-top:25px">
         <h1>
            A Park of
            <span style = "color: deepskyblue;">
            Ice</span>
             and
            <span style="color: orangered">
            Fire</span>
         </h1>
    </header>

    <h2 align="center">
       <i class="fa fa-snowflake-o" style="color: deepskyblue"></i>
          Concessions
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
				$concid = $_POST['concid'];

				if ($concid == "")
				{
					echo '<script type = "text/javascript">alert("Enter Concession ID to get concession details")</script>';
				}
				else
				{
					$query = "SELECT * from CONCESSION WHERE Conc_ID = $concid";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						if(mysqli_num_rows($query_run) > 0)
						{
							$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
							@$concid = $row['Conc_ID'];
							@$type = $row['Conc_Type'];
							@$operating = $row['Operating_Conc'];
							@$dateopened = $row['Date_Opened'];
							@$areaid = $row['Conc_area_ID'];
						}
						else
						{
							echo '<script type = "text/javascript">alert("Invalid Concession ID")</script>';
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
    		<label for="eid">Concession ID:</label>
    		<input type = "text" placeholder = "Concession ID" name = "concid" value ="<?php echo $concid; ?>">
    		<br><br>

    		<button class="w3-button" id = "btn_go" name = "fetch_btn" type = "submit">Select</button>
    		<br><br>

    		<label for="date">Concession Type:</label>
    		<input type = "text" placeholder = "Concession Type" name = "type" value ="<?php echo $type; ?>">
    		<br><br>

    		<label for="eventtype">Operating?:</label>
    		<input type = "text" placeholder = "Operating" name = "operating" value ="<?php echo $operating; ?>">
    		<br><br>

    		<label for="starttime">Date Opened (YYYY-MM-DD):</label>
    		<input type = "text" placeholder = "Date Opened" name = "dateopened" value ="<?php echo $dateopened; ?>">
    		<br><br>

    		<label for="endtime">Area ID of concession:</label>
    		<input type = "text" placeholder = "Area ID" name = "areaid" value ="<?php echo $areaid; ?>">
    		<br><br>

    		<br><br>
				<?php if($_SESSION['security_level'] == 3): ?>
    		<div class="w3-bar" style="padding-bottom: 10px">
    			<button class="w3-bar-item w3-button" id = "btn_insert" name = "insert_btn" type = "submit">Insert</button>
    			<button class="w3-bar-item w3-button" id = "btn_update" name = "update_btn" type = "submit">Update</button>
    			<button class="w3-bar-item w3-button" id = "btn_delete" name = "delete_btn" type = "submit">Flag for Deletion</button>
          <button class="w3-bar-item w3-button" id="btn_viewAll" name="viewAll_btn" type="submit">View All</button>
          <button class="w3-bar-item w3-button" id="btn_clear" name="concessionTable" type="submit">Clear Page</button>
    		</div>
				<?php endif; ?>
    	</fieldset>
    </form>

</div>

<?php
    if(isset($_POST['viewAll_btn']))
      {
        echo '<table style = "margin: auto; text-align:left; width:75%;">';
        echo "<tr>";
        echo "<th>Concession ID</th>
        <th>Type</th>
        <th>Operating?</th>
        <th>Date Opened</th>
        <th>Area ID where Concession located</th>";
        echo "</tr>";
        $testing = "SELECT * FROM CONCESSION";
        $query_run = mysqli_query($conn, $testing);
        while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
          echo "<tr>";
        echo "<td>" .$row['Conc_ID']. "</td>";
        echo "<td>" .$row['Conc_Type']. "</td>";
        echo "<td>" .$row['Operating_Conc']. "</td>";
        echo "<td>" .$row['Date_Opened']. "</td>";
        echo "<td>" .$row['Conc_area_ID']. "</td>";
        echo "</tr>";
        }
        echo "<table>";
      }

			if(isset($_POST['insert_btn']))
			{
				@$concid = $_POST['concid'];
				@$type = $_POST['type'];
				@$operating = $_POST['operating'];
				@$dateopened = $_POST['dateopened'];
				@$areaid = $_POST['areaid'];

				if($concid == "" || $type == "" || $operating == "" || $dateopened == "" || $areaid == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "INSERT into CONCESSION values($concid, '$type', $operating, '$dateopened', $areaid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Concession inserted successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: Concession not inserted")</script>';
					}
				}

			}//endif(isset($_POST['insert_btn']))

			else if(isset($_POST['update_btn']))
			{
				@$concid = $_POST['concid'];
				@$type = $_POST['type'];
				@$operating = $_POST['operating'];
				@$dateopened = $_POST['dateopened'];
				@$areaid = $_POST['areaid'];

				if($concid == "" || $type == "" || $operating == "" || $dateopened == "" || $areaid == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "UPDATE CONCESSION SET Conc_Type = '$type', Operating_Conc = $operating, Date_Opened = '$dateopened', Conc_area_ID = $areaid WHERE Conc_ID = $concid";
					$query_run = mysqli_query($conn,$query);

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Concession updated successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error updating concession.")</script>';
					}
				}
			}
			else if(isset($_POST['delete_btn']))
			{
				if($_POST['concid']=='')
				{
					echo '<script type = "text/javascript">alert("Enter Concession ID to delete ticket")</script>';
				}
			    else
				{
					$concid = $_POST['concid'];
					$query = "INSERT INTO FLAGGED_FOR_DELETION(Table_name_del, ID_of_entry) VALUES('CONCESSION',$concid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Flagged Concession for Deletion successfully.")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error in query - flag for deletion unsuccessful.")</script>';
					}
				}
			}



			?>

<footer class="w3-container w3-padding-8 w3-center w3-large">
    <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
   	<a href="concessionTable.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
    <a href = "logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
</footer>
</body>

</html>