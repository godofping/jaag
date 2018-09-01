<?php 
include("dashboard/includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'register') {

	$qry = mysqli_query($connection, "select * from account_table where userName = '" . $_POST['userName'] . "'");

	if (mysqli_num_rows($qry) == 0) {

		mysqli_query($connection, "insert into account_table (userName, passWord) values ('" . $_POST['userName'] . "', '" . md5($_POST['passWord']) . "')");
		$accountId = mysqli_insert_id($connection);

		mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, province, city, barangay, street, buildingNumber) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['contactNumber'] . "','" . $_POST['province'] . "', '" . $_POST['city'] . "', '" . $_POST['barangay'] . "', '" . $_POST['street'] . "', '" . $_POST['buildingNumber'] . "')");
		$profileId = mysqli_insert_id($connection);

		mysqli_query($connection, "insert into customer_table (profileId, accountId, customerType) values ('" . $profileId . "', '" . $accountId . "', 'Registered')");
		$customerId = mysqli_insert_id($connection);

		$_SESSION['customerId'] = $customerId;
		$_SESSION['do'] = 'registration-success';
		header("Location: index.php");
	}
	else
	{
		$_SESSION['do'] = 'username-taken';
		header("Location: register.php");
	}

	

}

if (isset($_POST['from']) and $_POST['from'] == 'logout') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'logout';
	header("Location: index.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from customer_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and customerType = 'Registered'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'customer';
		$_SESSION['customerId'] = $res['customerId'];
		$_SESSION['do'] = 'login-success';
		header("Location: index.php");
	}
	else
	{

		$_SESSION['do'] = 'login-failed';
		header("Location: login.php");

	}
}

?>