<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountType = 'Administrator'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'Administrator';
		$_SESSION['profileId'] = $res['profileId'];
		$_SESSION['do'] = '';
		header("Location: home.php");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountType = 'Employee'");
		if (mysqli_num_rows($qry) > 0) {
			$res = mysqli_fetch_assoc($qry);
			$_SESSION['accountType'] = 'Employee';
			$_SESSION['profileId'] = $res['profileId'];
			$_SESSION['do'] = 'login-success';
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


if (isset($_POST['from']) and $_POST['from'] == 'add-driver') {
	mysqli_query($connection,"insert into driver_table (driverFirstName, driverMiddleName, driverLastName, driverAddress, driverContactNumber) values ('" . $_POST['driverFirstName'] . "', '" . $_POST['driverMiddleName'] . "', '" . $_POST['driverLastName'] . "', '" . $_POST['driverAddress'] . "', '" . $_POST['driverContactNumber'] . "')");

	$_SESSION['do'] = 'added';
	header("Location: drivers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-driver') {
	mysqli_query($connection, "update driver_table set driverFirstName = '" . $_POST['driverFirstName'] . "', driverMiddleName = '" . $_POST['driverMiddleName'] . "', driverLastName = '" . $_POST['driverLastName'] . "', driverAddress = '" . $_POST['driverAddress'] . "', driverContactNumber = '" . $_POST['driverContactNumber'] . "' where driverId = '" . $_POST['driverId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: drivers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-driver') {
	mysqli_query($connection, "delete from driver_table where driverId = '" . $_POST['driverId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: drivers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-place') {
	mysqli_query($connection, "insert into place_table (placeName, latitude, longitude) values ('" . $_POST['placeName'] . "', '" . $_POST['latitude'] . "', '" . $_POST['longitude'] . "')");

	$_SESSION['do'] = 'added';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-place') {
	mysqli_query($connection, "update place_table set placeName = '" . $_POST['placeName'] . "',latitude = '" . $_POST['latitude'] . "', longitude = '" . $_POST['longitude'] . "' where placeId = '" . $_POST['placeId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-place') {
	mysqli_query($connection, "delete from place_table where placeId = '" . $_POST['placeId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-profile') {
	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "', middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "', contactNumber = '" . $_POST['contactNumber'] . "' where profileId = '" . $_POST['profileId'] . "'");

	mysqli_query($connection, "update address_table set buildingNumber = '" . $_POST['buildingNumber'] . "', street = '" . $_POST['street'] . "', barangay = '" . $_POST['barangay'] . "', city = '" . $_POST['city'] . "', province = '" . $_POST['province'] . "' where addressId = '" . $_POST['addressId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: update-profile.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'change-password') {
	if ($_POST['passWord'] == md5($_POST['oldPassword']) and $_POST['newPassword'] == $_POST['confirmNewPassword']) {
		mysqli_query($connection, "update profile_table set passWord = '" . md5($_POST['newPassword']) . "' where profileId = '" . $_POST['profileId'] . "' ");
		$_SESSION['do'] = 'updated';
	}
	else
	{
		$_SESSION['do'] = 'update-password-failed';
	}
	header("Location: change-password.php");
}


 ?>