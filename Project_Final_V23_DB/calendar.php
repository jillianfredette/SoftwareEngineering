<?php
   include('includes/session.php');
?>
<html>

<head>
    <title>HTML5/JavaScript Event Calendar</title>
    <!-- demo stylesheet -->
    <link type="text/css" rel="stylesheet" href="themes/calendar_g.css" />

    <!-- helper libraries -->
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

    <!-- daypilot libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
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
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

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

        p {
            display: inline;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        .modal {
            background-color: white;
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
        Events Calendar
        <i class='fas fa-fire-alt' style="color: orangered"></i>
    </h2>

    <div class="main">

        <div style="float:left; width: 160px;">
            <div id="nav"></div>
        </div>
        <div style="margin-left: 160px;">
            <div id="dp"></div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <span style="color: black;">
                    <p><b>Event ID: </b></p>
                    <p id="EventID"></p>
                    <p> <br> </p>
                    <p><br><b>Event Type: </b></p>
                    <p id="EventType"></p>
                    <p> <br> </p>
                    <p><br><b>Worker IDs: </b></p>
                    <p id="WorkerID"></p>
                </span>

            </div>
        </div>

        <script type="text/javascript">
            var nav = new DayPilot.Navigator("nav");
            nav.showMonths = 3;
            nav.skipMonths = 3;
            nav.selectMode = "week";
            nav.onTimeRangeSelected = function(args) {
                dp.startDate = args.day;
                dp.update();
                loadEvents();
            };
            nav.init();

            var dp = new DayPilot.Calendar("dp");
            dp.viewType = "Week";
            dp.theme = "calendar_g";
            dp.eventMoveHandling = "Disabled";
            dp.eventResizeHandling = "Disabled";
            dp.timeRangeSelectedHandling = "Disabled";

            var modal = document.getElementById('myModal');
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            dp.onEventClick = function(args) {
                document.getElementById("EventID").innerHTML = args.e.id();
                document.getElementById("EventType").innerHTML = args.e.text();
                document.getElementById("WorkerID").innerHTML = args.e.tag();
                modal.style.display = "block";
            };

            dp.init();

            loadEvents();

            function loadEvents() {
                dp.events.load("backend_events.php");
            }
        </script>

    </div>
    <div class="clear"></div>
    <footer class="w3-container w3-padding-8 w3-center w3-large">
        <a href="welcome.php"><i class='fa fa-home w3-hover-opacity' title="home" style="text-align: center; padding-right: 15px"></i></a>
        <a href="logout.php"><i class="fas fa-power-off w3-hover-opacity" title="logout" style="text-align: center;"></i></a>
    </footer>
</body>

</html>