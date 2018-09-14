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
		$_SESSION['accountType'] = 'Online Customer';


		unset($_SESSION['firstName']);
		unset($_SESSION['middleName']);
		unset($_SESSION['lastName']);
		unset($_SESSION['province']);
		unset($_SESSION['city']);
		unset($_SESSION['barangay']);
		unset($_SESSION['street']);
		unset($_SESSION['buildingNumber']);
		unset($_SESSION['contactNumber']);

		header("Location: index.php");
	}
	else
	{

		$_SESSION['firstName'] = $_POST['firstName'];
		$_SESSION['middleName'] = $_POST['middleName'];
		$_SESSION['lastName'] = $_POST['lastName'];
		$_SESSION['province'] = $_POST['province1'];
		$_SESSION['city'] = $_POST['city1'];
		$_SESSION['barangay'] = $_POST['barangay'];
		$_SESSION['street'] = $_POST['street'];
		$_SESSION['buildingNumber'] = $_POST['buildingNumber'];
		$_SESSION['contactNumber'] = $_POST['contactNumber'];

		$_SESSION['do'] = 'username-taken';
		header("Location: register.php");
	}

	

}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
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

		if (isset($_POST['packageId'])) {
			header("Location: tour-details.php?packageId=".$_POST['packageId']."");
		}
		else
		{
			header("Location: index.php");
		}
		
	}
	else
	{

		if (isset($_POST['packageId'])) {
			header("Location: login.php?a=login=first&packageId=".$_POST['packageId']."");
		}
		else
		{
			$_SESSION['do'] = 'login-failed';
			header("Location: login.php");
		}


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
	header("Location: profile.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-password') {

	if ($_POST['passWord'] == md5($_POST['oldPassword']) and $_POST['newPassword'] == $_POST['confirmNewPassword']) {
		mysqli_query($connection, "update profile_table set passWord = '" . md5($_POST['newPassword']) . "' where profileId = '" . $_SESSION['profileId'] . "' ");
		$_SESSION['do'] = 'updated';
	}
	else
	{
		$_SESSION['do'] = 'updated-password-failed';
	}
	header("Location: change-password.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-booking') {

	mysqli_query($connection,"insert into booking_table (profileId, travelAndTourId, statusId, dateBooked, numberOfPaxBooked) values ('" . $_SESSION['profileId'] . "', '" . $_POST['travelAndTourId'] . "', '7', '" . date('Y-m-d') . "', '" . $_POST['pax'] . "')");
	$bookingId = mysqli_insert_id($connection);

	$_SESSION['do'] = 'added';
	header("Location: booking-reciept.php?bookingId=". $bookingId . "");
}



if (isset($_POST['from']) and $_POST['from'] == 'add-comment') {
	mysqli_query($connection, "insert into comment_table (commentInfo, profileId, dateCommented) values ('" . $_POST['commentInfo'] . "', '" . $_SESSION['profileId'] . "', '" . date('Y-m-d') . "')");


	$_SESSION['do'] = 'added';
	header("Location: feedbacks.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'search-package') {
	
	$dates = explode(' - ', $_POST['dates']);
	$date1 = $dates[0];
	$date2 = $dates[1];

	$date1 = date('Y-m-d', strtotime($date1));
	$date2 = date('Y-m-d', strtotime($date2));

	
	header("Location: index.php?from=".$date1."&to=".$date2."");


}

if (isset($_POST['from']) and $_POST['from'] == 'add-booking-online-customer') {
	mysqli_query($connection, "insert into booking_table (profileId, travelAndTourId, bookingStatus, dateBooked, numberOfPaxBooked) values ('" . $_SESSION['profileId'] . "', '" . $_POST['travelAndTourId'] . "', 'Pending Down Payment', '" . date('Y-m-d') . "', '" . $_POST['paxNumber'] . "')");

	$bookingId = mysqli_insert_id($connection);

	$bookingId = base64_encode($bookingId);

	$_SESSION['do'] = 'added';
	header("Location: confirmation.php?bookingId=".$bookingId."");
}


if (isset($_POST['from']) and $_POST['from'] == 'send-payment') {


	mysqli_query($connection, "insert into payment_transaction_table (bookingId,modeOfPaymentId, amount, dateOfPayment, transactionNumber, nameOfSender, paymentStatus,paymentType) values ('" . $_POST['bookingId'] . "','" . $_POST['modeOfPaymentId'] . "', '" . $_POST['amount'] . "', '" . date('Y-m-d') . "', '" . $_POST['transactionNumber'] . "', '" . $_POST['nameOfSender'] . "', 'Pending Confirmation','" . $_POST['paymentType'] . "')");

	$paymentTransactionId = mysqli_insert_id($connection);

	$target_dir = "dashboard/media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);

	mysqli_query($connection, "insert into media_table (mediaLocation, paymentTransactionId) values ('" . $target_file . "', '" . $paymentTransactionId . "')");


	$_SESSION['do'] = 'added';
	header("Location: send-payment.php?bookingId=".base64_encode($_POST['bookingStatus'])."");
}


if (isset($_GET['from']) and $_GET['from'] == 'tour-packages-login-first') {
	$_SESSION['do'] = 'login-first';
	header("Location: login.php?a=login=first&packageId=".$_GET['packageId']."");

}




?>