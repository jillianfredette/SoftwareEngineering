<?php
  include_once 'includes/dbh.inc.php';
  include('includes/session.php');

  $sql = "SELECT Event_Start_Time, Event_End_Time, Event_Date, Event_ID, Event_Type, Worker_ID FROM THEMEPARK.PARK_EVENT, THEMEPARK.WORKS_EVENT WHERE THEMEPARK.PARK_EVENT.Event_ID = THEMEPARK.WORKS_EVENT.Event_worked_ID ORDER BY Event_ID ASC;";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);

  class Event {}
  $events = array();

  $workers = "";
  $currentevent = "";
  $workerlist = array();
  $i = -1;

  while($row=mysqli_fetch_assoc($result)) {
    if(strval($row['Event_ID'])==$currentevent){
      $workers = strval($row['Worker_ID']).", ".$workers;
      $workerlist[$i] = $workers;
    }
    else{
      $i = $i+1;
      $currentevent = strval($row['Event_ID']);
      $workers = strval($row['Worker_ID']);
      array_push($workerlist,$workers);
    }
  }

  $sql = "SELECT DISTINCT a.Event_Start_Time, a.Event_End_Time, a.Event_Date, a.Event_ID, a.Event_Type  FROM(
    SELECT Event_Start_Time, Event_End_Time, Event_Date, Event_ID, Event_Type, Worker_ID FROM THEMEPARK.PARK_EVENT, THEMEPARK.WORKS_EVENT WHERE THEMEPARK.PARK_EVENT.Event_ID = THEMEPARK.WORKS_EVENT.Event_worked_ID ORDER BY Event_ID ASC) a ORDER BY Event_ID ASC;";

  $result = mysqli_query($conn,$sql);
  $i = 0;

  while($row=mysqli_fetch_assoc($result)) {
    if(count($workerlist)>$i){
    $starttime = $row['Event_Start_Time'];
    $endtime = $row['Event_End_Time'];
    $date=$row['Event_Date'];
    $datetimestart = date('Y-m-d H:i:s', strtotime("$date $starttime"));
    $datetimeend = date('Y-m-d H:i:s', strtotime("$date $endtime"));
    $e = new Event();
    $e->id = $row['Event_ID'];
    $e->text = $row['Event_Type'];
    $e->start = $datetimestart;
    $e->end = $datetimeend;
    $e->tag = $workerlist[$i];
    $e->moveDisabled = true;
    $e->resizeDisabled = true;
    $events[] = $e;
    $i = $i + 1;
  }
  }



  header('Content-Type: application/json');
  echo json_encode($events);

?>