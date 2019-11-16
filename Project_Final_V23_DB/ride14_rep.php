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
    <title>Khaleesi Ride Report</title>
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
    <script src="/js/themes/gray.js"></script>
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
        Khaleesi Ride Report
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
      if(isset($_POST['r1_r']))
      {
         header('Location:ride01_rep.php');
      }
      if(isset($_POST['r2_r']))
      {
         header('Location:ride02_rep.php');
      }
      if(isset($_POST['r3_r']))
      {
         header('Location:ride03_rep.php');
      }
      if(isset($_POST['r4_r']))
      {
         header('Location:ride04_rep.php');
      }
      if(isset($_POST['r5_r']))
      {
         header('Location:ride05_rep.php');
      }
      if(isset($_POST['r6_r']))
      {
         header('Location:ride06_rep.php');
      }
      if(isset($_POST['r7_r']))
      {
         header('Location:ride07_rep.php');
      }
      if(isset($_POST['r8_r']))
      {
         header('Location:ride08_rep.php');
      }
      if(isset($_POST['r9_r']))
      {
         header('Location:ride09_rep.php');
      }
      if(isset($_POST['r10_r']))
      {
         header('Location:ride10_rep.php');
      }
      if(isset($_POST['r11_r']))
      {
         header('Location:ride11_rep.php');
      }
      if(isset($_POST['r12_r']))
      {
         header('Location:ride12_rep.php');
      }
      if(isset($_POST['r13_r']))
      {
         header('Location:ride13_rep.php');
      }
      if(isset($_POST['r14_r']))
      {
         header('Location:ride14_rep.php');
      }
      if(isset($_POST['r15_r']))
      {
         header('Location:ride15_rep.php');
      }
      if(isset($_POST['r16_r']))
      {
         header('Location:ride16_rep.php');
      }
      if(isset($_POST['r17_r']))
      {
         header('Location:ride17_rep.php');
      }
      if(isset($_POST['r18_r']))
      {
         header('Location:ride18_rep.php');
      }
      if(isset($_POST['r19_r']))
      {
         header('Location:ride19_rep.php');
      }
      if(isset($_POST['r20_r']))
      {
         header('Location:ride20_rep.php');
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
              <button class="w3-button" id = "home_btn" name = "home" type = "submit">Home</button>
                <div class="w3-dropdown-hover">
                    <button class="w3-button">Individual Ride Reports</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="align-items: left; width: 200px;">
                        <button class="w3-button" id="rep_btn" name="yearly_rep" style="border: none; text-align: left; width: 100%;" type="submit">Ride Report Home</button>
                        <button class="w3-button" id="rep_btn" name="r1_r" style="border: none; text-align: left; width: 100%;" type="submit">Drogon</button>
                        <button class="w3-button" id="rep_btn" name="r2_r" style="border: none; text-align: left; width: 100%;" type="submit">Rhaegal</button>
                        <button class="w3-button" id="rep_btn" name="r3_r" style="border: none; text-align: left; width: 100%;" type="submit">Viserion</button>
                        <button class="w3-button" id="rep_btn" name="r4_r" style="border: none; text-align: left; width: 100%;" type="submit">Goodbye Ned Stark</button>
                        <button class="w3-button" id="rep_btn" name="r5_r" style="border: none; text-align: left; width: 100%;" type="submit">Birth of Dragons</button>
                        <button class="w3-button" id="rep_btn" name="r6_r" style="border: none; text-align: left; width: 100%;" type="submit">Battle of the Blackwater</button>
                        <button class="w3-button" id="rep_btn" name="r7_r" style="border: none; text-align: left; width: 100%;" type="submit">Red Wedding</button>
                        <button class="w3-button" id="rep_btn" name="r8_r" style="border: none; text-align: left; width: 100%;" type="submit">Pyramids of Meereen</button>
                        <button class="w3-button" id="rep_btn" name="r9_r" style="border: none; text-align: left; width: 100%;" type="submit">Hardhome</button>
                        <button class="w3-button" id="rep_btn" name="r10_r" style="border: none; text-align: left; width: 100%;" type="submit">Battle of Castle Black</button>
                        <button class="w3-button" id="rep_btn" name="r11_r" style="border: none; text-align: left; width: 100%;" type="submit">Son's of the Harpy</button>
                        <button class="w3-button" id="rep_btn" name="r12_r" style="border: none; text-align: left; width: 100%;" type="submit">Snow's Resurrection</button>
                        <button class="w3-button" id="rep_btn" name="r13_r" style="border: none; text-align: left; width: 100%;" type="submit">Sand Snakes Take Over</button>
                        <button class="w3-button" id="rep_btn" name="r14_r" style="border: none; text-align: left; width: 100%;" type="submit">Khaleesi</button>
                        <button class="w3-button" id="rep_btn" name="r15_r" style="border: none; text-align: left; width: 100%;" type="submit">Hodor</button>
                        <button class="w3-button" id="rep_btn" name="r16_r" style="border: none; text-align: left; width: 100%;" type="submit">The Sept Goes Boom</button>
                        <button class="w3-button" id="rep_btn" name="r17_r" style="border: none; text-align: left; width: 100%;" type="submit">Battle of the Bastards</button>
                        <button class="w3-button" id="rep_btn" name="r18_r" style="border: none; text-align: left; width: 100%;" type="submit">Three Eyed Raven</button>
                        <button class="w3-button" id="rep_btn" name="r19_r" style="border: none; text-align: left; width: 100%;" type="submit">Arya's List</button>
                        <button class="w3-button" id="rep_btn" name="r20_r" style="border: none; text-align: left; width: 100%;" type="submit">Northern Expedition</button>
                        <br>
                    </div>
                </div>
                <div class="w3-dropdown-hover">
                  <button class="w3-button">Reports</button>
                  <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style="align-items: left; width: 75px;">
                    <button class="w3-button" id = "report_btn" name = "yearly_rep" type = "submit" style="border: none; text-align: left; width: 100%;">Ride Report Home</button>
                    <button class="w3-button" id = "report_btn" name = "finance_rep" type = "submit" style="border: none; text-align: left; width: 100%;">Finances</button>
                    <button class="w3-button" id="report_btn" name="customer" type="submit" style="border: none; text-align: left; width: 100%;">Customer Traffic</button>
                    <button class="w3-button" id="report_btn" name="weather" type="submit" style="border: none; text-align: left; width: 100%;">Weather</button>
                  <br>
                  </div>
              </div>

            </div>
        </div>
    </form>
    <div id="container" style="width: 1000px; height: 600px; margin: 0 auto;">
        <script type="text/javascript">
            <?php
                $pdo = new PDO('mysql:host=themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com; dbname=THEMEPARK', 'bryane', 'Bryan12');
                $amount0 = array();
                $amount1 = array();
                $amount2 = array();
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.RIDES_ON WHERE Ride_date between '2017-$x-01 00:00:00' and '2017-$x-31 23:59:00' and RideOn_ride_id = 14")->fetchColumn(); 
                    array_push($amount0, (int)$nRows);
                }
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.RIDES_ON WHERE Ride_date between '2018-$x-01 00:00:00' and '2018-$x-31 23:59:00' and RideOn_ride_id = 14")->fetchColumn(); 
                    array_push($amount1, (int)$nRows);
                }
                for ($x = 1; $x <= 12; $x++) 
                {
                    $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.RIDES_ON WHERE Ride_date between '2019-$x-01 00:00:00' and '2019-$x-31 23:59:00' and RideOn_ride_id = 14")->fetchColumn(); 
                    array_push($amount2, (int)$nRows);
                }
                $sum0 = array_sum($amount0);
                $sum1 = array_sum($amount1);
                $sum2 = array_sum($amount2);
            ?>
            var amount0 = <?php echo json_encode($amount0); ?>;
            var amount1 = <?php echo json_encode($amount1); ?>;
            var amount2 = <?php echo json_encode($amount2); ?>;
            document.addEventListener('DOMContentLoaded', function() {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Monthly Totals by Year'
                    },
                    legend: {
                        itemStyle: {
                            fontWeight: 'bold'
                        }
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Rides in Month'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        name: '2017',
                        data: amount0,
                        color: '#87CEFA'
                    }, {
                        name: '2018',
                        data: amount1,
                        color: '#FF4500'
                    }, {
                        name: '2019',
                        data: amount2,
                        color: '#2B2B2B'
                    }]
                });
            });
        </script>
    </div>
 <div class="content">
        <h2>Totals</h2>
        <div class="row">
            <div class="column">
                <h3 align="left">2017</h2>
                    <p>
                        January:<span style="float: right;"><?php if($amount0[0] != 0){echo json_encode($amount0[0]);} ?></span><br>
                        February:<span style="float: right;"><?php if($amount0[1] != 0){echo json_encode($amount0[1]);} ?></span><br>
                        March:<span style="float: right;"><?php if($amount0[2] != 0){echo json_encode($amount0[2]);} ?></span><br>
                        April:<span style="float: right;"><?php if($amount0[3] != 0){echo json_encode($amount0[3]);} ?></span><br>
                        May:<span style="float: right;"><?php if($amount0[4] != 0){echo json_encode($amount0[4]);} ?></span><br>
                        June:<span style="float: right;"><?php if($amount0[5] != 0){echo json_encode($amount0[5]);} ?></span><br>
                        July:<span style="float: right;"><?php if($amount0[6] != 0){echo json_encode($amount0[6]);} ?></span><br>
                        August:<span style="float: right;"><?php if($amount0[7] != 0){echo json_encode($amount0[7]);} ?></span><br>
                        September:<span style="float: right;"><?php if($amount0[8] != 0){echo json_encode($amount0[8]);} ?></span><br>
                        October:<span style="float: right;"><?php if($amount0[9] != 0){echo json_encode($amount0[9]);} ?></span><br>
                        Novermber:<span style="float: right;"><?php if($amount0[10] != 0){echo json_encode($amount0[10]);} ?></span><br>
                        December:<span style="float: right;"><?php if($amount0[11] != 0){echo json_encode($amount0[11]);} ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode($sum0); ?></span><br><br>
                    </p>
            </div>
            <div class="column">
                <h3>2018</h2>
                    <p>
                        January:<span style="float: right;"><?php if($amount1[0] != 0){echo json_encode($amount1[0]);} ?></span><br>
                        February:<span style="float: right;"><?php if($amount1[1] != 0){echo json_encode($amount1[1]);} ?></span><br>
                        March:<span style="float: right;"><?php if($amount1[2] != 0){echo json_encode($amount1[2]);} ?></span><br>
                        April:<span style="float: right;"><?php if($amount1[3] != 0){echo json_encode($amount1[3]);} ?></span><br>
                        May:<span style="float: right;"><?php if($amount1[4] != 0){echo json_encode($amount1[4]);} ?></span><br>
                        June:<span style="float: right;"><?php if($amount1[5] != 0){echo json_encode($amount1[5]);} ?></span><br>
                        July:<span style="float: right;"><?php if($amount1[6] != 0){echo json_encode($amount1[6]);} ?></span><br>
                        August:<span style="float: right;"><?php if($amount1[7] != 0){echo json_encode($amount1[7]);} ?></span><br>
                        September:<span style="float: right;"><?php if($amount1[8] != 0){echo json_encode($amount1[8]);} ?></span><br>
                        October:<span style="float: right;"><?php if($amount1[9] != 0){echo json_encode($amount1[9]);} ?></span><br>
                        Novermber:<span style="float: right;"><?php if($amount1[10] != 0){echo json_encode($amount1[10]);} ?></span><br>
                        December:<span style="float: right;"><?php if($amount1[11] != 0){echo json_encode($amount1[11]);} ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode($sum1); ?></span><br><br>
                    </p>
            </div>
            <div class="column">
                <h3>2019</h2>
                    <p>
                        January:<span style="float: right;"><?php if($amount2[0] != 0){echo json_encode($amount2[0]);} ?></span><br>
                        February:<span style="float: right;"><?php if($amount2[1] != 0){echo json_encode($amount2[1]);} ?></span><br>
                        March:<span style="float: right;"><?php if($amount2[2] != 0){echo json_encode($amount2[2]);} ?></span><br>
                        April:<span style="float: right;"><?php if($amount2[3] != 0){echo json_encode($amount2[3]);} ?></span><br>
                        May:<span style="float: right;"><?php if($amount2[4] != 0){echo json_encode($amount2[4]);} ?></span><br>
                        June:<span style="float: right;"><?php if($amount2[5] != 0){echo json_encode($amount2[5]);} ?></span><br>
                        July:<span style="float: right;"><?php if($amount2[6] != 0){echo json_encode($amount2[6]);} ?></span><br>
                        August:<span style="float: right;"><?php if($amount2[7] != 0){echo json_encode($amount2[7]);} ?></span><br>
                        September:<span style="float: right;"><?php if($amount2[8] != 0){echo json_encode($amount2[8]);} ?></span><br>
                        October:<span style="float: right;"><?php if($amount2[9] != 0){echo json_encode($amount2[9]);} ?></span><br>
                        Novermber:<span style="float: right;"><?php if($amount2[10] != 0){echo json_encode($amount2[10]);} ?></span><br>
                        December:<span style="float: right;"><?php if($amount2[11] != 0){echo json_encode($amount2[11]);} ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode($sum2); ?></span><br><br>
                    </p>
            </div>
        </div>
    </div>
    <div class="content">
        <h2 align="left">Statistical Data</h2>
        <h3 align="left">2017</h3>
        <p>
            Average rides per month: <script type="text/javascript">
                document.write(averageMonth(amount0));
            </script><br>
            Most ridden month: <script type="text/javascript">
                document.write(maxMonth(amount0));
            </script>.<br>The percentage increase for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmax(amount0));
            </script>%.
            <br>
            Least ridden month: <script type="text/javascript">
                document.write(minMonth(amount0));
            </script>.<br>The percentage decrease for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmin(amount0));
            </script>%.
        </p>
        <h3 align="left">2018</h3>
        <p>
            Average rides per month: <script type="text/javascript">
                document.write(averageMonth(amount1));
            </script><br>
            Most ridden month: <script type="text/javascript">
                document.write(maxMonth(amount1));
            </script>.<br>The percentage increase for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmax(amount1));
            </script>%.
            <br>
            Least ridden month: <script type="text/javascript">
                document.write(minMonth(amount1));
            </script>.<br>The percentage decrease for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmin(amount1));
            </script>%.
        </p>
        <h3 align="left">2019</h3>
        <p>
            Average rides per month: <script type="text/javascript">
                document.write(averageMonth(amount2));
            </script><br>
            Most ridden month: <script type="text/javascript">
                document.write(maxMonth(amount2));
            </script>.<br>The percentage increase for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmax(amount2));
            </script>%.
            <br>
            Least ridden month: <script type="text/javascript">
                document.write(minMonth(amount2));
            </script>.<br>The percentage decrease for this month when compared to the mean is:
            <script type="text/javascript">
                document.write(percentDiffmin(amount2));
            </script>%.
    </div>
    <div class="content">
        <h2 align="left">Maintenance History</h2>
        <?php
            $pdo = new PDO('mysql:host=themepark.cuoy9m1wadpe.us-east-2.rds.amazonaws.com; dbname=THEMEPARK', 'bryane', 'Bryan12');
            $sth = $pdo->prepare("SELECT Start_date_maintenance, Date_maintenance_closed, Maintenance_type, Maintenance_cost FROM THEMEPARK.RIDE_MAINTENANCE WHERE Ride_ID_maintenance = 14 ORDER BY Start_date_maintenance DESC;");
      $sth->execute();

      /* Fetch all of the remaining rows in the result set */
      $start = array();
      $end = array();
      $type = array();
      $cost = array();
      while($row = $sth->fetch(PDO::FETCH_ASSOC))
      {
        array_push($start, $row['Start_date_maintenance']);
        array_push($end, $row['Date_maintenance_closed']);
        array_push($type, $row['Maintenance_type']);
        array_push($cost, number_format($row['Maintenance_cost'], 2));
      }

    ?>
        <p>
            <?php 
        for($i = 0; $i < sizeof($start); $i++)
      {
        echo "<br>";
        echo "Type: $type[$i]";
        echo "<br>";
        echo "Start Date: $start[$i]";
        echo "<br>";
        echo "End Date: $end[$i]";
        echo "<br>";
        echo "Cost: $$cost[$i]";
        echo "<br>";
      }
      ?>
        </p>
    </div>
    <footer class="w3-container w3-padding-32 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="ride14_rep.php"><i class='fa fa-refresh w3-hover-opacity' title="refresh" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>