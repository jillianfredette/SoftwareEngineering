<?php

include('session.php');
if($_SESSION['Admin_role']!="ENGG_ADMIN"){
	header("location:welcome.php");
}

?>

<html>

   <p>Redirecting to Application Monitoring...</p>

</html>