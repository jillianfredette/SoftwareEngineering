<?php

include('session.php');
if($_SESSION['Admin_role']!="FINANCE_ADMIN"){
	header("location:welcome.php");
}

?>

<html>

   <p>Redirecting to Accounts Receivables...</p>

</html>