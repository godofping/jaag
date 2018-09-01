<?php 
include("includes/connection.php");
// if (isset($_SESSION['accountType']) and isset($_SESSION['accountId']) and ($_SESSION['accountType'] == 'admin' or $_SESSION['accountType'] == 'employee')) {

if (true) {
	header("Location: home.php");
}
else
{
	header("Location: login.php");
}

 ?>