<?php

include('includes/session.php');
if($_SESSION['security_level'] < 2){
  header("location:welcome.php");
}
include('includes/dbh.inc.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Annual Finances</title>
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

        p {
            text-align: left;
        }

        .content {
            max-width: 1000px;
            margin: auto;
            padding: 10px;
        }

        .column {
            float: left;
            width: 33%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript" src="js/num_comma.js"></script>
</head>

<body>
    <header class="w3-panel w3-center" style="padding-top:25px;">
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
        <i class="fa fa-snowflake-o" style="color: deepskyblue;"></i>
        Finance Report
        <i class='fas fa-fire-alt' style="color: orangered;"></i>
    </h2>
    <?php
      if(isset($_POST['finance_rep']))
               {
        header('Location:annual_finances.php');
      }
      if(isset($_POST['yearly_rep']))
               {
        header('Location:rideReport0.php');
      }
      if(isset($_POST['home']))
               {
        header('Location:welcome.php');
      }
      if(isset($_POST['customer']))
               {
        header('Location:customer_rep.php');
      }
      if(isset($_POST['weather']))
               {
        header('Location:weather_rep.php');
      }
    ?>
    <form method="post">
        <div class="w3-padding-16 w3-center">
            <div class="w3-bar ">
                <button class="w3-button" id="home_btn" name="home" type="submit">Home</button>
                <div class="w3-dropdown-hover">
                    <button class="w3-button">Reports</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="align-items: left; width: 75px;">
                        <button class="w3-button" id="report_btn" name="yearly_rep" type="submit" style=" border: none; text-align: left; width: 100%;">Ride Report Home</button>
                        <button class="w3-button" id="report_btn" name="finance_rep" type="submit" style=" border: none; text-align: left; width: 100%;">Finances</button>
                        <button class="w3-button" id="report_btn" name="customer" type="submit" style=" border: none; text-align: left; width: 100%;">Customer Traffic</button>
                        <button class="w3-button" id="report_btn" name="weather" type="submit" style=" border: none; text-align: left; width: 100%;">Weather</button>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <?php
            $pdo = new PDO('mysql:host=themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com; dbname=THEMEPARK', 'bryane', 'Bryan12');
            $y_sal = $pdo->query("SELECT Sum(Salary_hourly*Hours_per_week*52) FROM THEMEPARK.EMPLOYEE")->fetchColumn();
            $y_sal = (float)number_format((float)$y_sal, 2, '.', '');
            $cur_y_sal = $pdo->query("SELECT Sum(Salary_hourly*Hours_per_week*FLOOR(DATEDIFF(DATE(CURDATE()), DATE('2019-01-01'))/14)) FROM THEMEPARK.EMPLOYEE")->fetchColumn();
            $cur_y_sal = (float)number_format((float)$cur_y_sal, 2, '.', '');
            $tot_sal = ($y_sal*2) + $cur_y_sal;
            $conc_restroom = array();
            $conc_restaurant = array();
            $conc_firstaid = array();
            $conc_other = array();
            $conc_giftshop = array();
            $ticket_season_fam_pass = array();
            $ticket_season_sing_pass = array();
            $ticket_family = array();
            $ticket_single = array();
            $event_bday = array();
            $event_wedding = array();
            $event_comp_party = array();
            $event_other = array();
            $ad_tv = array();
            $ad_billboard = array();
            $ad_web = array();
            $ad_radio = array();
            $ad_other = array();
            $ad_mag = array();
            $maint_paint = array();
            $maint_break = array();
            $maint_part = array();
            $maint_comp = array();
            $maint_other = array();
            for ($x = 2017; $x <= 2019; $x++) 
                {
                    $c_restroom = $pdo->query("SELECT SUM(Purchase_cost) 
                                                FROM THEMEPARK.PURCHASES
                                                INNER JOIN THEMEPARK.CONCESSION
                                                ON PURCHASES.Conc_bought_from = CONCESSION.Conc_ID
                                                WHERE Conc_Type = 'Restroom' and  Date_purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $c_restroom = (float)number_format((float)$c_restroom, 2, '.', '');
                    array_push($conc_restroom, $c_restroom);
                    
                    $c_restaurant = $pdo->query("SELECT SUM(Purchase_cost) 
                                                FROM THEMEPARK.PURCHASES
                                                INNER JOIN THEMEPARK.CONCESSION
                                                ON PURCHASES.Conc_bought_from = CONCESSION.Conc_ID
                                                WHERE Conc_Type = 'Restaurant' and  Date_purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $c_restaurant = (float)number_format((float)$c_restaurant, 2, '.', '');
                    array_push($conc_restaurant, $c_restaurant);

                    $c_firstaid = $pdo->query("SELECT SUM(Purchase_cost) 
                                                FROM THEMEPARK.PURCHASES
                                                INNER JOIN THEMEPARK.CONCESSION
                                                ON PURCHASES.Conc_bought_from = CONCESSION.Conc_ID
                                                WHERE Conc_Type = 'First Aid' and  Date_purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $c_firstaid = (float)number_format((float)$c_firstaid, 2, '.', '');
                    array_push($conc_firstaid, $c_firstaid);

                    $c_gift = $pdo->query("SELECT SUM(Purchase_cost) 
                                            FROM THEMEPARK.PURCHASES
                                            INNER JOIN THEMEPARK.CONCESSION
                                            ON PURCHASES.Conc_bought_from = CONCESSION.Conc_ID
                                            WHERE Conc_Type = 'Gift Shop' and  Date_purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $c_gift = (float)number_format((float)$c_gift, 2, '.', '');
                    array_push($conc_giftshop, $c_gift);

                    $c_other = $pdo->query("SELECT SUM(Purchase_cost) 
                                                FROM THEMEPARK.PURCHASES
                                                INNER JOIN THEMEPARK.CONCESSION
                                                ON PURCHASES.Conc_bought_from = CONCESSION.Conc_ID
                                                WHERE Conc_Type = 'Other' and  Date_purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $c_other = (float)number_format((float)$c_other, 2, '.', '');
                    array_push($conc_other, $c_other);

                    $t_seas_fam = $pdo->query("SELECT SUM(Ticket_price) FROM THEMEPARK.TICKET WHERE Ticket_type = 'Season Pass Family' and Date_Purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $t_seas_fam = (float)number_format((float)$t_seas_fam, 2, '.', '');
                    array_push($ticket_season_fam_pass, $t_seas_fam);

                    $t_seas_sing = $pdo->query("SELECT SUM(Ticket_price) FROM THEMEPARK.TICKET WHERE Ticket_type = 'Season Pass Single' and Date_Purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $t_seas_sing = (float)number_format((float)$t_seas_sing, 2, '.', '');
                    array_push($ticket_season_sing_pass, $t_seas_sing);

                    $t_single = $pdo->query("SELECT SUM(Ticket_price) FROM THEMEPARK.TICKET WHERE Ticket_type = 'Single' and Date_Purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $t_single = (float)number_format((float)$t_single, 2, '.', '');
                    array_push($ticket_single, $t_single);

                    $t_family = $pdo->query("SELECT SUM(Ticket_price) FROM THEMEPARK.TICKET WHERE Ticket_type = 'Family' and Date_Purchased between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $t_family = (float)number_format((float)$t_family, 2, '.', '');
                    array_push($ticket_family, $t_family);

                    $e_bday = $pdo->query("SELECT SUM(Total_price) FROM THEMEPARK.PARK_EVENT WHERE Event_Type = 'Birthday' and Event_Date between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $e_bday = (float)number_format((float)$e_bday, 2, '.', '');
                    array_push($event_bday, $e_bday);

                    $e_wed = $pdo->query("SELECT SUM(Total_price) FROM THEMEPARK.PARK_EVENT WHERE Event_Type = 'Wedding' and Event_Date between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $e_wed = (float)number_format((float)$e_wed, 2, '.', '');
                    array_push($event_wedding, $e_wed);

                    $e_comp_party = $pdo->query("SELECT SUM(Total_price) FROM THEMEPARK.PARK_EVENT WHERE Event_Type = 'Company Party' and Event_Date between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $e_comp_party = (float)number_format((float)$e_comp_party, 2, '.', '');
                    array_push($event_comp_party, $e_comp_party);

                    $e_other = $pdo->query("SELECT SUM(Total_price) FROM THEMEPARK.PARK_EVENT WHERE Event_Type = 'Other' and Event_Date between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $e_bday = (float)number_format((float)$e_other, 2, '.', '');
                    array_push($event_other, $e_other);

                    $a_tv = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'TV' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_tv = (float)number_format((float)$a_tv, 2, '.', '');
                    array_push($ad_tv, $a_tv);

                    $a_bill = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'Billboard' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_bill = (float)number_format((float)$a_bill, 2, '.', '');
                    array_push($ad_billboard, $a_bill);

                    $a_web = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'Web' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_web = (float)number_format((float)$a_web, 2, '.', '');
                    array_push($ad_web, $a_web);

                    $a_radio = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'Radio' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_radio = (float)number_format((float)$a_radio, 2, '.', '');
                    array_push($ad_radio, $a_radio);

                    $a_mag = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'Magazine' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_mag = (float)number_format((float)$a_mag, 2, '.', '');
                    array_push($ad_mag, $a_mag);

                    $a_oth = $pdo->query("SELECT SUM(Ad_cost) FROM THEMEPARK.ADVERTISEMENT WHERE Ad_Medium = 'Other' AND Date_at_started between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $a_oth = (float)number_format((float)$a_oth, 2, '.', '');
                    array_push($ad_other, $a_oth);

                    $m_paint = $pdo->query("SELECT SUM(Maintenance_Cost) FROM THEMEPARK.RIDE_MAINTENANCE WHERE Maintenance_type = 'Paint' AND Start_date_maintenance between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $m_paint = (float)number_format((float)$m_paint, 2, '.', '');
                    array_push($maint_paint, $m_paint);

                    $m_break = $pdo->query("SELECT SUM(Maintenance_Cost) FROM THEMEPARK.RIDE_MAINTENANCE WHERE Maintenance_type = 'Breakdown' AND Start_date_maintenance between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $m_break = (float)number_format((float)$m_break, 2, '.', '');
                    array_push($maint_break, $m_break);

                    $m_comp = $pdo->query("SELECT SUM(Maintenance_Cost) FROM THEMEPARK.RIDE_MAINTENANCE WHERE Maintenance_type = 'Complaint' AND Start_date_maintenance between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $m_comp = (float)number_format((float)$m_comp, 2, '.', '');
                    array_push($maint_comp, $m_comp);

                    $m_part = $pdo->query("SELECT SUM(Maintenance_Cost) FROM THEMEPARK.RIDE_MAINTENANCE WHERE Maintenance_type = 'Part Needed' AND Start_date_maintenance between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $m_part = (float)number_format((float)$m_part, 2, '.', '');
                    array_push($maint_part, $m_part);

                    $m_other = $pdo->query("SELECT SUM(Maintenance_Cost) FROM THEMEPARK.RIDE_MAINTENANCE WHERE Maintenance_type = 'Other' AND Start_date_maintenance between '$x-01-01 00:00:00' and '$x-12-31 23:59:00';")->fetchColumn();
                    $m_other = (float)number_format((float)$m_other, 2, '.', '');
                    array_push($maint_other, $m_other);
                }
            $year_income = array();
            $year_expenses = array();
            $net = array();
            for($i = 0; $i < 3; $i++)
            {
                $income = $event_wedding[$i] + $event_other[$i] + $event_bday[$i] + $event_comp_party[$i] + $ticket_season_fam_pass[$i] + $ticket_season_sing_pass[$i] + $ticket_family[$i] + $ticket_single[$i] + $conc_firstaid[$i] + $conc_other[$i] + $conc_giftshop[$i] + $conc_restroom[$i] + $conc_restaurant[$i];
                $income = (float)number_format((float)$income, 2, '.', '');
                array_push($year_income, $income);
                $exp = $ad_billboard[$i] + $ad_tv[$i] + $ad_web[$i] + $ad_mag[$i] + $ad_radio[$i] + $ad_other[$i] + $maint_paint[$i] + $maint_break[$i] + $maint_part[$i] + $maint_comp[$i] + $maint_other[$i];
                $exp = (float)number_format((float)$exp, 2, '.', '');
                array_push($year_expenses, $exp);
            }
            $year_expenses[0] = $year_expenses[0] + $y_sal;
            $year_expenses[1] = $year_expenses[1] + $y_sal;
            $year_expenses[2] = $year_expenses[2] + $cur_y_sal;
            for($i = 0; $i < 3; $i++)
            {
                $y = $year_income[$i] - $year_expenses[$i];
                $y = (float)number_format((float)$y, 2, '.', '');
                array_push($net, $y);
            }
  ?>
    <script type="text/javascript">
        var exp = <?php echo json_encode($year_expenses); ?>;
        var inc = <?php echo json_encode($year_income); ?>;
        var e_bday = <?php echo json_encode(array_sum($event_bday)); ?>;
        var e_wed = <?php echo json_encode(array_sum($event_wedding)); ?>;
        var e_other = <?php echo json_encode(array_sum($event_other)); ?>;
        var e_comp_party = <?php echo json_encode(array_sum($event_comp_party)); ?>;
        var t_seas_sing = <?php echo json_encode(array_sum($ticket_season_sing_pass)); ?>;
        var t_seas_fam = <?php echo json_encode(array_sum($ticket_season_fam_pass)); ?>;
        var t_family = <?php echo json_encode(array_sum($ticket_family)); ?>;
        var t_single = <?php echo json_encode(array_sum($ticket_single)); ?>;
        var c_other = <?php echo json_encode(array_sum($conc_other)); ?>;
        var c_gift = <?php echo json_encode(array_sum($conc_giftshop)); ?>;
        var c_firstaid = <?php echo json_encode(array_sum($conc_firstaid)); ?>;
        var c_restaurant = <?php echo json_encode(array_sum($conc_restaurant)); ?>;
        var c_restroom = <?php echo json_encode(array_sum($conc_restroom)); ?>;
        var a_tv = <?php echo json_encode(array_sum($ad_tv)); ?>;
        var a_bill = <?php echo json_encode(array_sum($ad_billboard)); ?>;
        var a_rad = <?php echo json_encode(array_sum($ad_radio)); ?>;
        var a_web = <?php echo json_encode(array_sum($ad_web)); ?>;
        var a_mag = <?php echo json_encode(array_sum($ad_mag)); ?>;
        var a_other = <?php echo json_encode(array_sum($ad_other)); ?>;
        var m_paint = <?php echo json_encode(array_sum($maint_paint)); ?>;
        var m_break = <?php echo json_encode(array_sum($maint_break)); ?>;
        var m_part = <?php echo json_encode(array_sum($maint_part)); ?>;
        var m_comp = <?php echo json_encode(array_sum($maint_comp)); ?>;
        var m_other = <?php echo json_encode(array_sum($maint_other)); ?>;
        var sal = <?php echo json_encode($tot_sal); ?>;
        var net = <?php echo json_encode($net); ?>;
    </script>
    <div id="w3-container" align="center">
        <div id="chart1" style="width: 1200px; height: 600px"></div>
        <div class="content">
            <div class="row">
                <div class="column">
                    <h2 align="left">2017</h2>
                    <p>
                        Income:<span style="float: right;">$<script type="text/javascript">var a = inc[0]; document.write(a.toLocaleString());</script></span><br>
                        Expenses:<span style="float: right;">$<script type="text/javascript">var a = exp[0]; document.write(a.toLocaleString());</script></span><br>
                        Net:<span style="float: right;">$<script type="text/javascript">var a = net[0]; document.write(a.toLocaleString());</script></span><br>
                    </p>
                </div>
                <div class="column">
                    <h2>2018</h2>
                    <p>
                        Income:<span style="float: right;">$<script type="text/javascript">var a = inc[1]; document.write(a.toLocaleString());</script></span><br>
                        Expenses:<span style="float: right;">$<script type="text/javascript">var a = exp[1]; document.write(a.toLocaleString());</script></span><br>
                        Net:<span style="float: right;">$<script type="text/javascript">var a = net[1]; document.write(a.toLocaleString());</script></span><br>
                    </p>
                </div>
                <div class="column">
                    <h2 align="right">2019</h2>
                    <p>
                        Income:<span style="float: right;">$<script type="text/javascript">var a = inc[2]; document.write(a.toLocaleString());</script></span><br>
                        Expenses:<span style="float: right;">$<script type="text/javascript">var a = exp[2]; document.write(a.toLocaleString());</script></span><br>
                        Net:<span style="float: right;">$<script type="text/javascript">var a = net[2]; document.write(a.toLocaleString());</script></span><br>
                    </p>
                </div>
            </div>
        </div>
        <div id="space" style="height: 20px"></div>
        <div id="chart2" style="width: 1200px; height: 600px"></div>
        <div id="space" style="height: 20px"></div>
        <div id="chart3" style="width: 1200px; height: 600px"></div>
        <div id="space" style="height: 20px"></div>
    </div>

    <footer class="w3-container w3-padding-64 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="annual_finances.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>