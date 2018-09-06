<?php 
include("dashboard/includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'register') {

	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "'");

	if (mysqli_num_rows($qry) == 0) {

		mysqli_query($connection, "insert into address_table (province, city, barangay, street, buildingNumber) values ('" . $_POST['province1'] . "', '" . $_POST['city1'] . "', '" . $_POST['barangay'] . "', '" . $_POST['street'] . "', '" . $_POST['buildingNumber'] . "')");
		$addressId = mysqli_insert_id($connection);

		mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, addressId, accountTypeId, userName, passWord) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "','" . $_POST['lastName'] . "','" . $_POST['contactNumber'] . "','" . $addressId . "','4', '" . $_POST['userName'] . "', '" . md5($_POST['passWord']) . "')");
		$profileId = mysqli_insert_id($connection);

		$_SESSION['profileId'] = $profileId;
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
	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountTypeId = '4'");

	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'Online Customer';
		$_SESSION['profileId'] = $res['profileId'];
		$_SESSION['do'] = 'login-success';
		header("Location: index.php");
	}
	else
	{

		$_SESSION['do'] = 'login-failed';
		header("Location: login.php");

	}
}

if (isset($_GET['from']) and $_GET['from'] == 'notvalid') {
	session_destroy();
	session_start();
	header("Location: index.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-profile') {
	mysqli_query($connection, "update address_table set buildingNumber = '" . $_POST['buildingNumber'] . "', street = '" . $_POST['street'] . "', barangay = '" . $_POST['barangay'] . "', city = '" . $_POST['city1'] . "', province = '" . $_POST['province1'] . "' where addressId = '" . $_POST['addressId'] . "'");

	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "', middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "', contactNumber = '" . $_POST['contactNumber'] . "' where profileId = '" . $_POST['profileId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: update-profile.php");
}

?>