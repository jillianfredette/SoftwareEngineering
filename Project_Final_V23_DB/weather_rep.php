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
    <title>Weather Report</title>
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
    <script type="text/javascript" src="js/chart3.js"></script>
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
        Weather Report
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
                <button class="w3-button" id="home_btn" name="home" type="submit" >Home</button>
                <div class="w3-dropdown-hover">
                    <button class="w3-button" >Reports</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-left-align" style=" align-items: left; width: 75px;">
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
                $rain_tot =  array();
                $rain_2011 = array();
                $rain_2012 = array();
                $rain_2013 = array();
                $rain_2014 = array();
                $rain_2015 = array();
                $rain_2016 = array();
                $rain_2017 = array();
                $rain_2018 = array();
                $rain_2019 = array();
                for ($i = 2011; $i <= 2019; $i++) 
                {
                    for ($k = 1; $k <= 12; $k++) 
                    {
                        $nRows = $pdo->query("SELECT COUNT(*) FROM THEMEPARK.RAINOUT WHERE Rainout_Date between '$i-$k-01' and '$i-$k-31';")->fetchColumn(); 
                        array_push($rain_tot, (int)$nRows);
                    }
                }
                    for ($k = 0; $k < 12; $k++) 
                    {
                        
                            array_push($rain_2011, $rain_tot[$k]);
                        
                    }
                    for ($k = 12; $k < 24; $k++) 
                    {
                        
                            array_push($rain_2012, $rain_tot[$k]);
                        
                    }
                    for ($k = 24; $k < 36; $k++) 
                    {
                    
                            array_push($rain_2013, $rain_tot[$k]);
                        
                    }
                    for ($k = 36; $k < 48; $k++) 
                    {
                        
                            array_push($rain_2014, $rain_tot[$k]);
                        
                    }
                    for ($k = 48; $k < 60; $k++) 
                    {
                        
                            array_push($rain_2015, $rain_tot[$k]);
                        
                    }
                    for ($k = 60; $k < 72; $k++) 
                    {
                        
                            array_push($rain_2016, $rain_tot[$k]);
                        
                    }
                    for ($k = 72; $k < 84; $k++) 
                    {
                        
                            array_push($rain_2017, $rain_tot[$k]);
                        
                    }
                    for ($k = 84; $k < 96; $k++) 
                    {
                        
                            array_push($rain_2018, $rain_tot[$k]);
                        
                    }
                    for ($k = 96; $k < 108; $k++) 
                    {
                        
                            array_push($rain_2019, $rain_tot[$k]);
                        
                    }
    ?>
    <script type="text/javascript">
        var w_2011 = <?php echo json_encode($rain_2011); ?>;
        var w_2012 = <?php echo json_encode($rain_2012); ?>;
        var w_2013 = <?php echo json_encode($rain_2013); ?>;
        var w_2014 = <?php echo json_encode($rain_2014); ?>;
        var w_2015 = <?php echo json_encode($rain_2015); ?>;
        var w_2016 = <?php echo json_encode($rain_2016); ?>;
        var w_2017 = <?php echo json_encode($rain_2017); ?>;
        var w_2018 = <?php echo json_encode($rain_2018); ?>;
        var w_2019 = <?php echo json_encode($rain_2019); ?>;
        var w_tot = <?php echo json_encode($rain_tot); ?>;       
    </script>
    <div id="w3-container" align="center">
        <div id="chart20" style="width: 1200px; height: 600px"></div>
        <div class="content">
            <div class="row">
                <div class="column">
                    <h2 align="left">2011</h2>
                    <p>
                        January:<span style="float: right;"><?php if($rain_2011[0] != 0){echo json_encode($rain_2011[0]);}?></span><br>
                        February:<span style="float: right;"><?php if($rain_2011[1] != 0){echo json_encode($rain_2011[1]);}?></span><br>
                        March:<span style="float: right;"><?php if($rain_2011[2] != 0){echo json_encode($rain_2011[2]);}?></span><br>
                        April:<span style="float: right;"><?php if($rain_2011[3] != 0){echo json_encode($rain_2011[3]);}?></span><br>
                        May:<span style="float: right;"><?php if($rain_2011[4] != 0){echo json_encode($rain_2011[4]);}?></span><br>
                        June:<span style="float: right;"><?php if($rain_2011[5] != 0){echo json_encode($rain_2011[5]);}?></span><br>
                        July:<span style="float: right;"><?php if($rain_2011[6] != 0){echo json_encode($rain_2011[6]);}?></span><br>
                        August:<span style="float: right;"><?php if($rain_2011[7] != 0){echo json_encode($rain_2011[7]);}?></span><br>
                        September:<span style="float: right;"><?php if($rain_2011[8] != 0){echo json_encode($rain_2011[8]);}?></span><br>
                        October:<span style="float: right;"><?php if($rain_2011[9] != 0){echo json_encode($rain_2011[9]);}?></span><br>
                        Novermber:<span style="float: right;"><?php if($rain_2011[10] != 0){echo json_encode($rain_2011[10]);}?></span><br>
                        December:<span style="float: right;"><?php if($rain_2011[11] != 0){echo json_encode($rain_2011[11]);}?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2011));?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2011));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2011));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2011));</script></span><br>
                    </p>
                    <h2 align="left">2014</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2014[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2014[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2014[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2014[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2014[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2014[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2014[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2014[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2014[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2014[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2014[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2014[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2014)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2014));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2014));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2014));</script></span><br>
                    </p>
                    <h2 align="left">2017</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2017[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2017[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2017[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2017[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2017[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2017[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2017[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2017[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2017[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2017[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2017[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2017[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2017)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2017));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2017));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2017));</script></span><br>
                    </p>
                </div>
                <div class="column">
                    <h2>2012</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2012[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2012[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2012[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2012[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2012[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2012[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2012[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2012[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2012[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2012[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2012[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2012[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2012)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2012));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2012));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2012));</script></span><br>
                    </p>
                    <h2>2015</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2015[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2015[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2015[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2015[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2015[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2015[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2015[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2015[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2015[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2015[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2015[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2015[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2015)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2015));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2015));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2015));</script></span><br>
                    </p>
                    <h2>2018</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2018[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2018[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2018[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2018[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2018[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2018[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2018[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2018[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2018[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2018[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2018[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2018[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2018)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2018));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2018));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2018));</script></span><br>
                    </p>
                </div>
                <div class="column">
                    <h2 align="right">2013</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2013[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2013[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2013[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2013[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2013[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2013[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2013[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2013[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2013[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2013[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2013[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2013[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2013)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2013));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2013));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2013));</script></span><br>
                    </p>
                    <h2 align="right">2016</h2>
                    <p>
                        January:<span style="float: right;"><?php echo json_encode($rain_2016[0]); ?></span><br>
                        February:<span style="float: right;"><?php echo json_encode($rain_2016[1]); ?></span><br>
                        March:<span style="float: right;"><?php echo json_encode($rain_2016[2]); ?></span><br>
                        April:<span style="float: right;"><?php echo json_encode($rain_2016[3]); ?></span><br>
                        May:<span style="float: right;"><?php echo json_encode($rain_2016[4]); ?></span><br>
                        June:<span style="float: right;"><?php echo json_encode($rain_2016[5]); ?></span><br>
                        July:<span style="float: right;"><?php echo json_encode($rain_2016[6]); ?></span><br>
                        August:<span style="float: right;"><?php echo json_encode($rain_2016[7]); ?></span><br>
                        September:<span style="float: right;"><?php echo json_encode($rain_2016[8]); ?></span><br>
                        October:<span style="float: right;"><?php echo json_encode($rain_2016[9]); ?></span><br>
                        Novermber:<span style="float: right;"><?php echo json_encode($rain_2016[10]); ?></span><br>
                        December:<span style="float: right;"><?php echo json_encode($rain_2016[11]); ?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2016)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2016));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2016));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2016));</script></span><br>
                    </p>
                    <h2 align="right">2019</h2>
                    <p>
                        January:<span style="float: right;"><?php if($rain_2019[0] != 0){echo json_encode($rain_2019[0]);}?></span><br>
                        February:<span style="float: right;"><?php if($rain_2019[1] != 0){echo json_encode($rain_2019[1]);}?></span><br>
                        March:<span style="float: right;"><?php if($rain_2019[2] != 0){echo json_encode($rain_2019[2]);}?></span><br>
                        April:<span style="float: right;"><?php if($rain_2019[3] != 0){echo json_encode($rain_2019[3]);}?></span><br>
                        May:<span style="float: right;"><?php if($rain_2019[4] != 0){echo json_encode($rain_2019[4]);}?></span><br>
                        June:<span style="float: right;"><?php if($rain_2019[5] != 0){echo json_encode($rain_2019[5]);}?></span><br>
                        July:<span style="float: right;"><?php if($rain_2019[6] != 0){echo json_encode($rain_2019[6]);}?></span><br>
                        August:<span style="float: right;"><?php if($rain_2019[7] != 0){echo json_encode($rain_2019[7]);}?></span><br>
                        September:<span style="float: right;"><?php if($rain_2019[8] != 0){echo json_encode($rain_2019[8]);}?></span><br>
                        October:<span style="float: right;"><?php if($rain_2019[9] != 0){echo json_encode($rain_2019[9]);}?></span><br>
                        Novermber:<span style="float: right;"><?php if($rain_2019[10] != 0){echo json_encode($rain_2019[10]);}?></span><br>
                        December:<span style="float: right;"><?php if($rain_2019[11] != 0){echo json_encode($rain_2019[11]);}?></span><br>
                        Total:<span style="float: right;"><?php echo json_encode(array_sum($rain_2019)); ?></span><br><br>
                        Average rainouts per month:<span style="float: right;"><script type="text/javascript">document.write(averageMonth(w_2019));</script></span><br>
                        Max month:<span style="float: right;"><script type="text/javascript">document.write(maxMonth(w_2019));</script></span><br>
                        Min. month:<span style="float: right;"> <script type="text/javascript">document.write(minMonth(w_2019));</script></span><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-padding-64 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="weather_rep.php"><i class='fa fa-refresh w3-hover-opacity' title="clear page" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>