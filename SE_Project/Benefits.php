<?php

include('session.php');
if($_SESSION['Admin_role']!="HR_ADMIN"){
	header("location:welcome.php");
}

?>

<html>

   <p>Redirecting to Benefits...</p>

</html>