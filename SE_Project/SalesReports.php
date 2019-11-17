<?php

include('session.php');
if($_SESSION['Admin_role']!="SALES_ADMIN"){
	header("location:welcome.php");
}

?>

<html>

   <p>Redirecting to Sales Reports...</p>

</html>