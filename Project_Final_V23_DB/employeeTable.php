<?php

include('includes/session.php');
if($_SESSION['security_level']==1){
	header("location:welcome.php");
}

include('includes/dbh.inc.php');
	@$employeeid = "";
	@$fname = "";
	@$lname = "";
	@$email = "";
	@$phonenum = "";
	@$gender = "";
	@$bday = "";
	@$stname = "";
	@$stnumaddress = "";
	@$city = "";
	@$state = "";
	@$zipcode = "";
	@$salaryhr = "";
	@$hrsperweek = "";
	@$worksride = "";
	@$worksconc = "";
	@$workslot = "";
	//@$password = "";
	@$security = "";

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
        Employees
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
					echo '<script type = "text/javascript">alert("Enter Employee ID to get details")</script>';
				}
				else
				{
					$query = "SELECT * from EMPLOYEE where Emp_ID = $employeeid";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						if(mysqli_num_rows($query_run) > 0)
						{
							$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

							@$employeeid = $row['Emp_ID'];
							@$fname = $row['Emp_Fname'];
							@$lname = $row['Emp_Lname'];
							@$email = $row['Emp_email'];
							@$phonenum = $row['Emp_phone'];
							if($_SESSION['security_level'] == 3):
							@$gender = $row['Sex'];
							@$bday = $row['Birth_date'];
							@$stname = $row['Street_Name_Address'];
							@$stnumaddress = $row['Street_num_add'];
							@$city = $row['City_add'];
							@$state = $row['State_add'];
							@$zipcode = $row['Zip_code'];
							@$salaryhr = $row['Salary_hourly'];
							endif;
							@$hrsperweek = $row['Hours_per_week'];
							@$worksride = $row['Works_ride'];
							@$worksconc = $row['Works_conc'];
							@$workslot = $row['Works_lot'];
							@$security = $row['Emp_security'];
							//@$password = $row['Employee_password'];
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

                <label for="date">First Name*:</label>
                <input type="text" placeholder="First name" name="fname" value="<?php echo $fname; ?>">
                <br><br>

                <label for="eventtype">Last Name*:</label>
                <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
                <br><br>

                <label for="eventtype">E-mail:</label>
                <input type="text" placeholder="E-mail" name="email" value="<?php echo $email; ?>">
                <br><br>

                <label for="eventtype">Phone Number:</label>
                <input type="text" placeholder="XXXXXXXXXX" name="phonenum" value="<?php echo $phonenum; ?>">
                <br><br>

                <label for="eventtype">Sex:</label>
                <input type="text" placeholder="M or F" name="gender" value="<?php echo $gender; ?>">
                <br><br>

                <label for="eventtype">Birthday:</label>
                <input type="text" placeholder="YYYY-MM-DD" name="bday" value="<?php echo $bday; ?>">
                <br><br>

                <label for="eventtype">Street Name:</label>
                <input type="text" placeholder="Street Name" name="stname" value="<?php echo $stname; ?>">
                <br><br>

                <label for="eventtype">Street Number:</label>
                <input type="text" placeholder="Street Number" name="stnumaddress" value="<?php echo $stnumaddress; ?>">
                <br><br>

                <label for="eventtype">City:</label>
                <input type="text" placeholder="City" name="city" value="<?php echo $city; ?>">
                <br><br>

                <label for="eventtype">State:</label>
                <input type="text" placeholder="State" name="state" value="<?php echo $state; ?>">
                <br><br>

                <label for="eventtype">Zip Code:</label>
                <input type="text" placeholder="Zip Code" name="zipcode" value="<?php echo $zipcode; ?>">
                <br><br>

                <label for="eventtype">Salary (hourly):</label>
                <input type="text" placeholder="Salary" name="salaryhr" value="<?php echo $salaryhr; ?>">
                <br><br>

                <label for="eventtype">Hours worked per week:</label>
                <input type="text" placeholder="Hours Worked Weekly" name="hrsperweek" value="<?php echo $hrsperweek; ?>">
                <br><br>

                <label for="eventtype">Ride ID (if works ride):</label>
                <input type="text" placeholder="Ride ID" name="worksride" value="<?php echo $worksride; ?>">
                <br><br>

                <label for="eventtype">Concession ID (if works concession):</label>
                <input type="text" placeholder="Concession ID" name="worksconc" value="<?php echo $worksconc; ?>">
                <br><br>

                <label for="eventtype">Car Lot ID (if works lots):</label>
                <input type="text" placeholder="Car Lot ID" name="workslot" value="<?php echo $workslot; ?>">
                <br><br>

                <label for="eventtype">Security Level:</label>
                <input type="text" placeholder="1, 2, or 3" name="security" value="<?php echo $security; ?>">
                <br><br>

                <p>* Required Field for Insertion</p>

                <br><br>
                <div class="w3-bar" style="padding-bottom: 10px">
                    <button class="w3-bar-item w3-button" id="btn_insert" name="insert_btn" type="submit">Insert</button>
                    <?php if($_SESSION['security_level'] == 3): ?>
                    <button class="w3-bar-item w3-button" id="btn_update" name="update_btn" type="submit">Update</button>
                    <?php endif; ?>
                    <button class="w3-bar-item w3-button" id="btn_delete" name="delete_btn" type="submit">Flag for Deletion</button>
                    <button class="w3-bar-item w3-button" id="btn_viewAll" name="viewAll_btn" type="submit">View All</button>
                    <button class="w3-bar-item w3-button" id="btn_clear" name="employeeTable" type="submit">Clear Page</button>

                </div>
            </fieldset>
        </form>

    </div>

    <?php
      if($_SESSION['security_level'] == 2 or $_SESSION['security_level'] == 3){
        if(isset($_POST['viewAll_btn']))
        {
          echo '<table style = "margin: auto; text-align:left; width:90%;">';
          echo "<tr>";
          echo "<th>Employee ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>E-mail</th>
          <th>Phone Number</th>";
          if ($_SESSION['security_level'] == 3)
          {
            echo "<th>Sex</th>
            <th>Birthday</th>
            <th>Street Name</th>
            <th>Street Number</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Salary (hourly) ($)</th>";
          }
          echo "<th>Hours Worked per Week</th>
          <th>Ride ID (if works ride)</th>
          <th>Concession ID (if works concession)</th>
		  <th>Car Lot ID (if works lots)</th>
		  <th>Employee Security Level</th>";
          echo "</tr>";
          $testing = "SELECT * FROM EMPLOYEE WHERE Emp_ID <=500";
          $query_run = mysqli_query($conn, $testing);
          while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
          echo "<tr>";
          echo "<td>" .$row['Emp_ID']. "</td>";
          echo "<td>" .$row['Emp_Fname']. "</td>";
          echo "<td>" .$row['Emp_Lname']. "</td>";
          echo "<td>" .$row['Emp_email']. "</td>";
          echo "<td>" .$row['Emp_phone']. "</td>";
          if ($_SESSION['security_level'] == 3)
          {
            echo "<td>" .$row['Sex']. "</td>";
            echo "<td>" .$row['Birth_date']. "</td>";
            echo "<td>" .$row['Street_Name_Address']. "</td>";
            echo "<td>" .$row['Street_num_add']. "</td>";
            echo "<td>" .$row['City_add']. "</td>";
            echo "<td>" .$row['State_add']. "</td>";
            echo "<td>" .$row['Zip_code']. "</td>";
            echo "<td>" .$row['Salary_hourly']. "</td>";
          }
          echo "<td>" .$row['Hours_per_week']. "</td>";
          echo "<td>" .$row['Works_ride']. "</td>";
          echo "<td>" .$row['Works_conc']. "</td>";
		  echo "<td>" .$row['Works_lot']. "</td>";
		  echo "<td>" .$row['Emp_security']. "</td>";
          echo "</tr>";
        }
        echo "<table>";
        }
      }


			if(isset($_POST['insert_btn']))
			{
				@$employeeid = $_POST['employeeid'];
				@$fname = $_POST['fname'];
				@$lname = $_POST['lname'];
				@$email = $_POST['email'];
				@$phonenum = $_POST['phonenum'];
				@$gender = $_POST['gender'];
				@$bday = $_POST['bday'];
				@$stname = $_POST['stname'];
				@$stnumaddress = $_POST['stnumaddress'];
				@$city = $_POST['city'];
				@$state = $_POST['state'];
				@$zipcode = $_POST['zipcode'];
				@$salaryhr = $_POST['salaryhr'];
				@$hrsperweek = $_POST['hrsperweek'];
				@$worksride = $_POST['worksride'];
				@$worksconc = $_POST['worksconc'];
				@$workslot = $_POST['workslot'];
				//@$password = $_POST['password'];
				@$security = $_POST['security'];

				if($fname == "" || $lname == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each required field")</script>';
				}
				else
				{
					$query = "INSERT into EMPLOYEE (Emp_Fname, Emp_Lname) values('$fname', '$lname')";

					//$query = "INSERT into EMPLOYEE (Emp_ID, Emp_Fname, Emp_Lname) values($employeeid, '$fname', '$lname')";//, AES_ENCRYPT('$password', '3800'))";
					$query_run = mysqli_query($conn, $query);

					$queryid = "SELECT MAX(Emp_ID) FROM EMPLOYEE WHERE Emp_Fname = '$fname' AND Emp_Lname = '$lname'";

					$query_run_id = mysqli_query($conn, $queryid);
					$row = mysqli_fetch_array($query_run_id,MYSQLI_ASSOC);
					$employeeid = intval($row['MAX(Emp_ID)']);



					if($worksride != "")
					{
						$query2 = "UPDATE EMPLOYEE SET Works_ride = $worksride WHERE Emp_ID = $employeeid";
						$query_run2 = mysqli_query($conn,$query2);
					}
					if($worksconc != "")
					{
						$query3 = "UPDATE EMPLOYEE SET Works_conc = $worksconc WHERE Emp_ID = $employeeid";
						$query_run3 = mysqli_query($conn,$query3);
					}
					if($workslot != "")
					{
						$query4 = "UPDATE EMPLOYEE SET Works_lot = $workslot WHERE Emp_ID = $employeeid";
						$query_run4 = mysqli_query($conn,$query4);
					}
					if($email != "")
					{
						$query5 = "UPDATE EMPLOYEE SET Emp_email = '$email' WHERE Emp_ID = $employeeid";
						$query_run5 = mysqli_query($conn,$query5);
					}
					if($phonenum != "")
					{
						$query6 = "UPDATE EMPLOYEE SET Emp_phone = $phonenum WHERE Emp_ID = $employeeid";
						$query_run6 = mysqli_query($conn,$query6);
					}
					if($gender != "")
					{
						$query7 = "UPDATE EMPLOYEE SET Sex = '$gender' WHERE Emp_ID = $employeeid";
						$query_run7 = mysqli_query($conn,$query7);
					}
					if($bday != "")
					{
						$query8 = "UPDATE EMPLOYEE SET Birth_date = '$bday' WHERE Emp_ID = $employeeid";
						$query_run8 = mysqli_query($conn,$query8);
					}
					if($stname != "")
					{
						$query9 = "UPDATE EMPLOYEE SET Street_Name_Address = '$stname' WHERE Emp_ID = $employeeid";
						$query_run9 = mysqli_query($conn,$query9);
					}
					if($stnumaddress != "")
					{
						$query10 = "UPDATE EMPLOYEE SET Street_num_Add = '$stnumaddress' WHERE Emp_ID = $employeeid";
						$query_run10 = mysqli_query($conn,$query10);
					}
					if($city != "")
					{
						$query11 = "UPDATE EMPLOYEE SET City_add = '$city' WHERE Emp_ID = $employeeid";
						$query_run11 = mysqli_query($conn,$query11);
					}
					if($state != "")
					{
						$query12 = "UPDATE EMPLOYEE SET State_add = '$state' WHERE Emp_ID = $employeeid";
						$query_run12 = mysqli_query($conn,$query12);
					}
					if($zipcode != "")
					{
						$query13 = "UPDATE EMPLOYEE SET Zip_code = '$zipcode' WHERE Emp_ID = $employeeid";
						$query_run13 = mysqli_query($conn,$query13);
					}
					if($zipcode != "")
					{
						$query14 = "UPDATE EMPLOYEE SET Zip_code = $zipcode WHERE Emp_ID = $employeeid";
						$query_run14 = mysqli_query($conn,$query14);
					}
					if($salaryhr!= "")
					{
						$query15 = "UPDATE EMPLOYEE SET Salary_hourly = $salaryhr WHERE Emp_ID = $employeeid";
						$query_run15 = mysqli_query($conn,$query15);
					}
					if($hrsperweek!= "")
					{
						$query16 = "UPDATE EMPLOYEE SET Hours_per_week = $hrsperweek WHERE Emp_ID = $employeeid";
						$query_run16 = mysqli_query($conn,$query16);
					}
					if($security!= "")
					{
						$query17 = "UPDATE EMPLOYEE SET Emp_security = $security WHERE Emp_ID = $employeeid";
						$query_run17 = mysqli_query($conn,$query17);
					}

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Employee inserted successfully!")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: Employee not inserted")</script>';
					}
				}

			}//endif(isset($_POST['insert_btn']))

			else if(isset($_POST['update_btn']))
			{
				@$employeeid = $_POST['employeeid'];
				@$fname = $_POST['fname'];
				@$lname = $_POST['lname'];
				@$email = $_POST['email'];
				@$phonenum = $_POST['phonenum'];
				@$gender = $_POST['gender'];
				@$bday = $_POST['bday'];
				@$stname = $_POST['stname'];
				@$stnumaddress = $_POST['stnumaddress'];
				@$city = $_POST['city'];
				@$state = $_POST['state'];
				@$zipcode = $_POST['zipcode'];
				@$salaryhr = $_POST['salaryhr'];
				@$hrsperweek = $_POST['hrsperweek'];
				@$worksride = $_POST['worksride'];
				@$worksconc = $_POST['worksconc'];
				@$workslot = $_POST['workslot'];
				/*if($_POST['password'] != "Hidden for security"){
					@$password = $_POST['password'];}*/
				@$security = $_POST['security'];

				if($employeeid == "" || $fname == "" || $lname == "")
				{
					echo '<script type = "text/javascript">alert("Please insert a value for each required field and the employee ID")</script>';
				}
				else
				{
					$query = "UPDATE EMPLOYEE SET Emp_Fname = '$fname', Emp_Lname = '$lname' WHERE Emp_ID = $employeeid";

					$query_run = mysqli_query($conn,$query);

					if($worksride != "")
					{
						$query2 = "UPDATE EMPLOYEE SET Works_ride = $worksride, Works_conc = null, Works_lot = null WHERE Emp_ID = $employeeid";
						$query_run2 = mysqli_query($conn,$query2);
					}
					if($worksconc != "")
					{
						$query3 = "UPDATE EMPLOYEE SET Works_conc = $worksconc, Works_ride = null, Works_lot = null WHERE Emp_ID = $employeeid";
						$query_run3 = mysqli_query($conn,$query3);
					}
					if($workslot != "")
					{
						$query4 = "UPDATE EMPLOYEE SET Works_lot = $workslot, Works_ride = null, Works_conc = null WHERE Emp_ID = $employeeid";
						$query_run4 = mysqli_query($conn,$query4);
					}
					if($email != "")
					{
						$query5 = "UPDATE EMPLOYEE SET Emp_email = '$email' WHERE Emp_ID = $employeeid";
						$query_run5 = mysqli_query($conn,$query5);
					}
					if($phonenum != "")
					{
						$query6 = "UPDATE EMPLOYEE SET Emp_phone = $phonenum WHERE Emp_ID = $employeeid";
						$query_run6 = mysqli_query($conn,$query6);
					}
					if($gender != "")
					{
						$query7 = "UPDATE EMPLOYEE SET Sex = '$gender' WHERE Emp_ID = $employeeid";
						$query_run7 = mysqli_query($conn,$query7);
					}
					if($bday != "")
					{
						$query8 = "UPDATE EMPLOYEE SET Birth_date = '$bday' WHERE Emp_ID = $employeeid";
						$query_run8 = mysqli_query($conn,$query8);
					}
					if($stname != "")
					{
						$query9 = "UPDATE EMPLOYEE SET Street_Name_Address = '$stname' WHERE Emp_ID = $employeeid";
						$query_run9 = mysqli_query($conn,$query9);
					}
					if($stnumaddress != "")
					{
						$query10 = "UPDATE EMPLOYEE SET Street_num_Add = '$stnumaddress' WHERE Emp_ID = $employeeid";
						$query_run10 = mysqli_query($conn,$query10);
					}
					if($city != "")
					{
						$query11 = "UPDATE EMPLOYEE SET City_add = '$city' WHERE Emp_ID = $employeeid";
						$query_run11 = mysqli_query($conn,$query11);
					}
					if($state != "")
					{
						$query12 = "UPDATE EMPLOYEE SET State_add = '$state' WHERE Emp_ID = $employeeid";
						$query_run12 = mysqli_query($conn,$query12);
					}
					if($zipcode != "")
					{
						$query13 = "UPDATE EMPLOYEE SET Zip_code = '$zipcode' WHERE Emp_ID = $employeeid";
						$query_run13 = mysqli_query($conn,$query13);
					}
					if($zipcode != "")
					{
						$query14 = "UPDATE EMPLOYEE SET Zip_code = $zipcode WHERE Emp_ID = $employeeid";
						$query_run14 = mysqli_query($conn,$query14);
					}
					if($salaryhr!= "")
					{
						$query15 = "UPDATE EMPLOYEE SET Salary_hourly = $salaryhr WHERE Emp_ID = $employeeid";
						$query_run15 = mysqli_query($conn,$query15);
					}
					if($hrsperweek!= "")
					{
						$query16 = "UPDATE EMPLOYEE SET Hours_per_week = $hrsperweek WHERE Emp_ID = $employeeid";
						$query_run16 = mysqli_query($conn,$query16);
					}
					if($security!= "")
					{
						$query17 = "UPDATE EMPLOYEE SET Emp_security = $security WHERE Emp_ID = $employeeid";
						$query_run17 = mysqli_query($conn,$query17);
					}
					/*if($password != "")
					{
						$query18 = "UPDATE EMPLOYEE SET Employee_password = AES_ENCRYPT('$password','COSC3800') WHERE Emp_ID = $employeeid";
						$query_run18 = mysqli_query($conn,$query18);
					}*/

					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Employee updated successfully!")</script>';
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error: Employee not updated.")</script>';
					}
				}
			}
			else if(isset($_POST['delete_btn']))
			{
				if($_POST['employeeid']=='')
				{
					echo '<script type = "text/javascript">alert("Enter Employee ID to delete")</script>';
				}
			    else
				{
					$employeeid = $_POST['employeeid'];
					$query = "INSERT INTO FLAGGED_FOR_DELETION(Table_name_del, ID_of_entry) VALUES('EMPLOYEE',$employeeid)";
					$query_run = mysqli_query($conn, $query);
					if($query_run)
					{
						echo '<script type = "text/javascript">alert("Flagged Employee for Deletion successfully.")</script>';
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
        <a href="employeeTable.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>