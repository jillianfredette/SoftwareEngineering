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
    <title>Customer Report</title>
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
    <script type="text/javascript" src="js/chart2.js"></script>
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
        Customer Traffic Report
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
    ?>
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
                <button class="w3-button" id="home_btn" name="home" type="submit" >Home</button>
                <div class="w3-dropdown-hover">
                    <button class="w3-button" >Reports</button>
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
                $monthly_2017 = array();
                $monthly_2018 = array();
                $monthly_2019 = array();
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.TICKET WHERE Date_Purchased BETWEEN '2017-$x-01 00:00:00' and '2017-$x-31 23:59:00';")->fetchColumn(); 
                    array_push($monthly_2017, (int)$nRows);
                }
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.TICKET WHERE Date_Purchased BETWEEN '2018-$x-01 00:00:00' and '2018-$x-31 23:59:00';")->fetchColumn(); 
                    array_push($monthly_2018, (int)$nRows);
                }
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.TICKET WHERE Date_Purchased BETWEEN '2019-$x-01 00:00:00' and '2019-$x-31 23:59:00';")->fetchColumn(); 
                    array_push($monthly_2019, (int)$nRows);
                }
                $t_2017 = array_sum($monthly_2017);
                $t_2018 = array_sum($monthly_2018);
                $t_2019 = array_sum($monthly_2019);
    ?>
    <?php
    $week_data_18 = array();
    $week_data_19 = array();
    $pdo = new PDO('mysql:host=themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com; dbname=THEMEPARK', 'bryane', 'Bryan12');
    
    for($i = 0; $i < 52; $i++)
    {
        $sth = $pdo->prepare("SELECT COUNT(*) FROM THEMEPARK.TICKET WHERE Date_Purchased BETWEEN DATE_ADD('2018-01-01', INTERVAL $i WEEK) and DATE_ADD('2018-01-01', INTERVAL ($i+1) WEEK);");
        $sth->execute();
        $row = $sth->fetchColumn();
        array_push($week_data_18, (int)$row);
    }
    for($i = 0; $i < 52; $i++)
    {
        $sth = $pdo->prepare("SELECT COUNT(*) FROM THEMEPARK.TICKET WHERE Date_Purchased BETWEEN DATE_ADD('2019-01-01', INTERVAL $i WEEK) and DATE_ADD('2019-01-01', INTERVAL ($i+1) WEEK);");
        $sth->execute();
        $row = $sth->fetchColumn();
        array_push($week_data_19, (int)$row);
    }
     function nonzero($var){
        return ($var > 0); }
    
    $size = count(array_filter($week_data_19, "nonzero"));
    $avg19 = array_sum($week_data_19)/$size;
    $avg18 = array_sum($week_data_18)/sizeof($week_data_18);
    $min19 = min(array_filter($week_data_19, "nonzero"));
    ?>
    <script type="text/javascript">
        var m_2017 = <?php echo json_encode($monthly_2017); ?>;
        var m_2018 = <?php echo json_encode($monthly_2018); ?>;
        var m_2019 = <?php echo json_encode($monthly_2019); ?>;
        var t_2017 = <?php echo json_encode($t_2017); ?>;
        var t_2018 = <?php echo json_encode($t_2018); ?>;
        var t_2019 = <?php echo json_encode($t_2019); ?>;
        var w_data_18 = <?php echo json_encode($week_data_18); ?>;
        var w_data_19 = <?php echo json_encode($week_data_19); ?>;
    </script>
    <div id="w3-container" align="center">
        <div id="chart10" style="width: 1200px; height: 600px"></div>
        <div class="content">
            <div class="row">
                <div class="column">
                    <h2 align="left">2017</h2>
                    <p>
                    January:<span style="float: right;"><script type="text/javascript">var a = m_2017[0]; document.write(a.toLocaleString());</script></span><br>
                    February:<span style="float: right;"><script type="text/javascript">var a = m_2017[1]; document.write(a.toLocaleString());</script></span><br>
                    March:<span style="float: right;"><script type="text/javascript">var a = m_2017[2]; document.write(a.toLocaleString());</script></span><br>
                    April:<span style="float: right;"><script type="text/javascript">var a = m_2017[3]; document.write(a.toLocaleString());</script></span><br>
                    May:<span style="float: right;"><script type="text/javascript">var a = m_2017[4]; document.write(a.toLocaleString());</script></span><br>
                    June:<span style="float: right;"><script type="text/javascript">var a = m_2017[5]; document.write(a.toLocaleString());</script></span><br>
                    July:<span style="float: right;"><script type="text/javascript">var a = m_2017[6]; document.write(a.toLocaleString());</script></span><br>
                    August:<span style="float: right;"><script type="text/javascript">var a = m_2017[7]; document.write(a.toLocaleString());</script></span><br>
                    September:<span style="float: right;"><script type="text/javascript">var a = m_2017[8]; document.write(a.toLocaleString());</script></span><br>
                    October:<span style="float: right;"><script type="text/javascript">var a = m_2017[9]; document.write(a.toLocaleString());</script></span><br>
                    Novermber:<span style="float: right;"><script type="text/javascript">var a = m_2017[10]; document.write(a.toLocaleString());</script></span><br>
                    December:<span style="float: right;"><script type="text/javascript">var a = m_2017[11]; document.write(a.toLocaleString());</script></span><br>
                    Total:<span style="float: right;"><script type="text/javascript">var a = t_2017; document.write(a.toLocaleString());</script></span><br><br>
                    </p>
                </div>
                <div class="column">
                    <h2>2018</h2>
                    <p>
                    January:<span style="float: right;"><script type="text/javascript">var a = m_2018[0]; document.write(a.toLocaleString());</script></span><br>
                    February:<span style="float: right;"><script type="text/javascript">var a = m_2018[1]; document.write(a.toLocaleString());</script></span><br>
                    March:<span style="float: right;"><script type="text/javascript">var a = m_2018[2]; document.write(a.toLocaleString());</script></span><br>
                    April:<span style="float: right;"><script type="text/javascript">var a = m_2018[3]; document.write(a.toLocaleString());</script></span><br>
                    May:<span style="float: right;"><script type="text/javascript">var a = m_2018[4]; document.write(a.toLocaleString());</script></span><br>
                    June:<span style="float: right;"><script type="text/javascript">var a = m_2018[5]; document.write(a.toLocaleString());</script></span><br>
                    July:<span style="float: right;"><script type="text/javascript">var a = m_2018[6]; document.write(a.toLocaleString());</script></span><br>
                    August:<span style="float: right;"><script type="text/javascript">var a = m_2018[7]; document.write(a.toLocaleString());</script></span><br>
                    September:<span style="float: right;"><script type="text/javascript">var a = m_2018[8]; document.write(a.toLocaleString());</script></span><br>
                    October:<span style="float: right;"><script type="text/javascript">var a = m_2018[9]; document.write(a.toLocaleString());</script></span><br>
                    Novermber:<span style="float: right;"><script type="text/javascript">var a = m_2018[10]; document.write(a.toLocaleString());</script></span><br>
                    December:<span style="float: right;"><script type="text/javascript">var a = m_2018[11]; document.write(a.toLocaleString());</script></span><br>
                    Total:<span style="float: right;"><script type="text/javascript">var a = t_2018; document.write(a.toLocaleString());</script></span><br><br>
                    </p>
                </div>
                <div class="column">
                    <h2 align="right">2019</h2>
                    <p>
                    January:<span style="float: right;"><script type="text/javascript">var a = m_2019[0]; document.write(a.toLocaleString());</script></span><br>
                    February:<span style="float: right;"><script type="text/javascript">var a = m_2019[1]; document.write(a.toLocaleString());</script></span><br>
                    March:<span style="float: right;"><script type="text/javascript">var a = m_2019[2]; document.write(a.toLocaleString());</script></span><br>
                    April:<span style="float: right;"><script type="text/javascript">var a = m_2019[3]; document.write(a.toLocaleString());</script></span><br>
                    Total:<span style="float: right;"><script type="text/javascript">var a = t_2019; document.write(a.toLocaleString());</script></span><br><br>
                    </p>
                </div>
            </div>
        </div>
        <div class="content">
        	<h2 align="left">Monthly Statistical Data</h2>
        	<h3 align="left">2017</h3>
        	<p>
        		Average traffic per month of 2017: <script type="text/javascript">document.write(averageMonth(m_2017));</script><br>
        		Most trafficked month of 2017: <script type="text/javascript">document.write(maxMonth(m_2017));</script>.<br>The percentage increase for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmax(m_2017));</script>%.
        		<br>
        		Least trafficked month of 2017: <script type="text/javascript">document.write(minMonth(m_2017));</script>.<br>The percentage decrease for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmin(m_2017));</script>%.
   			</p>
   			<h3 align="left">2018</h3>
        	<p>
        		Average traffic per month of 2018: <script type="text/javascript">document.write(averageMonth(m_2018));</script><br>
        		Most trafficked month of 2018: <script type="text/javascript">document.write(maxMonth(m_2018));</script>.<br>The percentage increase for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmax(m_2018));</script>%.
        		<br>
        		Least trafficked month of 2018: <script type="text/javascript">document.write(minMonth(m_2018));</script>.<br>The percentage decrease for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmin(m_2018));</script>%.
   			</p>
   			<h3 align="left">2019</h3>
        	<p>
        		Average traffic per month of 2019: <script type="text/javascript">document.write(averageMonth(m_2019));</script><br>
        		Most trafficked month of 2019: <script type="text/javascript">document.write(maxMonth(m_2019));</script>.<br>The percentage increase for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmax(m_2019));</script>%.
        		<br>
        		Least trafficked month of 2019: <script type="text/javascript">document.write(minMonth(m_2019));</script>.<br>The percentage decrease for this month when compared to the mean is:
        		 <script type="text/javascript">document.write(percentDiffmin(m_2019));</script>%.
   			</p>
        </div>
        <div id="chart11" style="width: 1200px; height: 600px"></div>
        <div class="content">
            <h2 align="left">Weekly Statistical Data</h2>
            <h3 align="left">2018</h3>
            <p>
                Average tickets purchased in a week: <?php echo (number_format($avg18, 2))?><br>
                Most tickets purchased in a week: <?php echo number_format(max($week_data_18))?><br>
                Least tickets purchased in a week: <?php echo number_format(min($week_data_18))?><br>
            </p>
            <h3 align="left">2019</h3>
            <p>
                Average tickets purchased in a week: <?php echo (number_format($avg19, 2))?><br>
                Most tickets purchased in a week: <?php echo number_format(max($week_data_19))?><br>
                Least tickets purchased in a week: <?php echo $min19 ?><br>
            </p>
           
        </div>

    </div>
    <footer class="w3-container w3-padding-64 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="annual_finances.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>