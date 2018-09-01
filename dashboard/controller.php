<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from admin_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'admin';
		$_SESSION['accountId'] = $res['accountId'];
		header("Location: home.php");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from employee_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "'");
		if (mysqli_num_rows($qry) > 0) {
			$res = mysqli_fetch_assoc($qry);
			$_SESSION['accountType'] = 'employee';
			$_SESSION['accountId'] = $res['accountId'];
			header("Location: home.php");
		}
		else
		{
			$_SESSION['do'] = 'failed';
			header("Location: login.php");
		}
	}
}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'logout';
	header("Location: login.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'login-first') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'login-first';
	header("Location: login.php");
}
 ?>