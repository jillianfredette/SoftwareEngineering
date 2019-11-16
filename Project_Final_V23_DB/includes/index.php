<?php
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php
  $sql = "SELECT Emp_ID, Emp_Fname, Emp_Lname, AES_DECRYPT(Employee_password,'COSC3800') FROM THEMEPARK.EMPLOYEE;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row['Emp_ID'] . " " . $row['Emp_Fname'] . " " . $row['Emp_Lname'] . " " . $row["AES_DECRYPT(Employee_password,'COSC3800')"] . "<br>";
    }
  }
?>

</body>
</html>