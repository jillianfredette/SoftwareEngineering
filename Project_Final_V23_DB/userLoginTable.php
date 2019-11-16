<?php

include('includes/session.php');
if($_SESSION['security_level']==1){
	header("location:welcome.php");
}

include('includes/dbh.inc.php');
	@$employeeid = "";
	@$password = "";
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
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
            width: 300px;
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
        User Login Information
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
               <button class="w3-button" >Edits</button>
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
				$employeeid = $_POST['employeeid'];

				if ($employeeid == "")
				{
					echo '<script type = "text/javascript">alert("Enter Employee Login ID to get details")</script>';
				}
				else
				{
					$query = "SELECT * from THEMEPARK.LOGIN where Employee_ID_login = $employeeid";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						if(mysqli_num_rows($query_run) > 0)
						{
							$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

							@$employeeid = $row['Employee_ID_login'];
							@$password = $row['Employee_password'];
						}
						else
						{
							echo '<script type = "text/javascript">alert("Invalid Employee ID")</script>';
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
                <label for="eid">Employee ID:</label>
                <input type="text" placeholder="Employee ID" name="employeeid" value="<?php echo $employeeid; ?>">
                <br><br>

                <button class="w3-button" id="btn_go" name="fetch_btn" type="submit">Select</button>
                <br><br>

                <label for="eventtype">Password:</label>
                <input type="text" placeholder="Password" name="password" value="<?php echo "Hidden for security"; ?>">
                <br><br>

                <br><br>
                <div class="w3-bar" style="padding-bottom: 10px">
                    <button class="w3-bar-item w3-button" id="btn_insert" name="insert_btn" type="submit">Insert</button>
                    <?php if($_SESSION['security_level'] == 3): ?>
                    <button class="w3-bar-item w3-button" id="btn_update" name="update_btn" type="submit">Update</button>
                    <?php endif; ?>
                    <button class="w3-bar-item w3-button" id="btn_delete" name="delete_btn" type="submit">Flag for Deletion</button>

                </div>
            </fieldset>
        </form>

    </div>

    <?php
			if(isset($_POST['insert_btn']))
			{
				@$employeeid = $_POST['employeeid'];
				@$password = $_POST['password'];

				if($employeeid == "" || $password == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "INSERT into THEMEPARK.LOGIN (Employee_ID_login, Employee_password) values('$employeeid', AES_ENCRYPT('$password', '3800'))";

					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("User Login Information inserted successfully!")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: user login information not inserted")</script>';
					}
				}

			}

			else if(isset($_POST['update_btn']))
			{
				@$employeeid = $_POST['employeeid'];
				if($_POST['password'] != "Hidden for security"){
					@$password = $_POST['password'];}

				if($employeeid == "" || $password == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each field")</script>';
				}
				else
				{
					$query = "UPDATE THEMEPARK.LOGIN SET Employee_password = AES_ENCRYPT('$password', 'COSC3800') WHERE Employee_ID_login = $employeeid";

					$query_run = mysqli_query($conn,$query);

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("User Login Information updated successfully!")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: user login information not updated.")</script>';
					}
				}
			}
			else if(isset($_POST['delete_btn']))
			{
				if($_POST['employeeid']=='')
				{
					echo '<script type = "text/javascript">alert("Enter Employee Login ID to delete")</script>';
				}
			    else
				{
                    $employeeid = $_POST['employeeid'];

                    $queryget = "SELECT Login_ID FROM THEMEPARK.LOGIN WHERE Employee_ID_login = $employeeid";
                    $query_get_run = mysqli_query($conn, $queryget);
                    $row = mysqli_fetch_array($query_get_run,MYSQLI_ASSOC);
                    $empid = $row['Login_ID'];

					$query = "INSERT INTO FLAGGED_FOR_DELETION(Table_name_del, ID_of_entry) VALUES('LOGIN',$empid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Flagged Login User Information for Deletion successfully.")</script>';
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
        <a href="userLoginTable.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>