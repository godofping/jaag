<?php 
include("includes/connection.php");



if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountType = 'Administrator' and isDeleted = '0'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'Administrator';
		$_SESSION['profileId'] = $res['profileId'];
		$_SESSION['do'] = 'login-success';
		header("Location: home.php");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountType = 'Attendant' and isDeleted = '0'");
		if (mysqli_num_rows($qry) > 0) {
			$res = mysqli_fetch_assoc($qry);
			$_SESSION['accountType'] = 'Attendant';
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


if (isset($_POST['from']) and $_POST['from'] == 'add-attendant') {
	$fourCharacters = substr(md5($_POST['firstName']), 0, 4);
	$userName = strtolower($_POST['firstName'] . $fourCharacters);

	mysqli_query($connection, "insert into address_table (buildingNumber, street, barangay, city, province) values ('" . mysqli_escape_string($connection, $_POST['buildingNumber']) . "', '" . mysqli_escape_string($connection, $_POST['street']) . "', '" . $_POST['barangay'] . "', '" . $_POST['city1'] . "', '" . $_POST['province1'] . "')");
	$addressId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, addressId, accountTypeId, userName, passWord) values ('" . mysqli_escape_string($connection, $_POST['firstName']) . "', '" . mysqli_escape_string($connection, $_POST['middleName']) . "', '" . mysqli_escape_string($connection, $_POST['lastName']) . "', '" . mysqli_escape_string($connection, $_POST['contactNumber']) . "', '" . $addressId . "', 5, '" . $userName . "', '" . md5($fourCharacters) . "')");

	$_SESSION['do'] = 'added';
	header("Location: attendants.php");
}


if (isset($_POST['from']) and $_POST['from'] == 'delete-attendant') {
	mysqli_query($connection, "update profile_table set isDeleted = 1 where profileId = '" . $_POST['profileId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: attendants.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-place') {
	mysqli_query($connection, "insert into place_table (placeName, latitude, longitude) values ('" . mysqli_escape_string($connection, $_POST['placeName']) . "', '" . $_POST['latitude'] . "', '" . $_POST['longitude'] . "')");

	$_SESSION['do'] = 'added';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-place') {
	mysqli_query($connection, "update place_table set placeName = '" . mysqli_escape_string($connection, $_POST['placeName']) . "',latitude = '" . $_POST['latitude'] . "', longitude = '" . $_POST['longitude'] . "' where placeId = '" . $_POST['placeId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-place') {
	mysqli_query($connection, "delete from place_table where placeId = '" . $_POST['placeId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: places.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-profile') {
	mysqli_query($connection, "update profile_table set firstName = '" . mysqli_escape_string($connection, $_POST['firstName']) . "', middleName = '" . mysqli_escape_string($connection, $_POST['middleName']) . "', lastName = '" . mysqli_escape_string($connection, $_POST['lastName']) . "', contactNumber = '" . mysqli_escape_string($connection, $_POST['contactNumber']) . "' where profileId = '" . $_POST['profileId'] . "'");

	mysqli_query($connection, "update address_table set buildingNumber = '" . mysqli_escape_string($connection, $_POST['buildingNumber']) . "', street = '" . mysqli_escape_string($connection, $_POST['street']) . "', barangay = '" . $_POST['barangay'] . "', city = '" . $_POST['city1'] . "', province = '" . $_POST['province1'] . "' where addressId = '" . $_POST['addressId'] . "'");

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




if (isset($_POST['from']) and $_POST['from'] == 'add-package') {

	mysqli_query($connection, "insert into package_table (packageName, packageDetails, price, inclusion, exclusion) values ('" . mysqli_escape_string($connection, $_POST['packageName']) . "', '" . mysqli_escape_string($connection, $_POST['packageDetails']) . "', '" . $_POST['price'] . "', '" . mysqli_escape_string($connection, $_POST['inclusion']) . "', '" . mysqli_escape_string($connection, $_POST['exclusion']) . "')");
	$packageId = mysqli_insert_id($connection);

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $packageId . "', '" . $placeId . "')");
	  
	}


	$_SESSION['do'] = 'added';
	header("Location: packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-package') {


	mysqli_query($connection, "update package_table set packageName = '" . mysqli_escape_string($connection, $_POST['packageName']) . "', packageDetails = '" . mysqli_escape_string($connection, $_POST['packageDetails']) . "', inclusion = '" . mysqli_escape_string($connection, $_POST['inclusion']) . "', exclusion = '" . mysqli_escape_string($connection, $_POST['exclusion']) . "', price= '" . $_POST['price'] . "' where packageId = '" . $_POST['packageId'] . "'");

	mysqli_query($connection, "delete from destination_table where packageId = '" . $_POST['packageId'] . "'");

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $_POST['packageId'] . "', '" . $placeId . "')");
	  
	}

	$_SESSION['do'] = 'updated';
	header("Location: packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-package') {
	mysqli_query($connection, "delete from destination_table where packageId = '" . $_POST['packageId'] . "'");
	mysqli_query($connection, "delete from package_table where packageId = '" . $_POST['packageId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: packages.php");
}





if (isset($_POST['from']) and $_POST['from'] == 'add-package-image') {


	$target_dir = "media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);



	mysqli_query($connection, "insert into media_table (mediaLocation, packageId) values ('" . $target_file . "', '" . $_POST['packageId'] . "')");


	$_SESSION['do'] = 'added';
	header("Location: view-package-images.php?packageId=".$_POST['packageId']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-package-image') {


	$target_dir = "media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);

	mysqli_query($connection, "update media_table set mediaLocation = '" . $target_file . "' where mediaId = '" . $_POST['mediaId'] . "'");
	

	$_SESSION['do'] = 'updated';
	header("Location: view-package-images.php?packageId=".$_POST['packageId']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'delete-package-image') {

	mysqli_query($connection, "delete from media_table where mediaId = '" . $_POST['mediaId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: view-package-images.php?packageId=".$_POST['packageId']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'add-booking-travel') {

	$date = explode(" - ", $_POST['daterange']);


	mysqli_query($connection, "insert into travel_and_tour_table (packageId, departureDate, returnDate, maxPax, travelAndTourStatus) values ('" . $_POST['packageId'] . "', '" . date("Y-m-d", strtotime($date[0])) . "', '" . date("Y-m-d", strtotime($date[1])) . "', '" . $_POST['maxPax'] . "', 'Available')");

		$_SESSION['do'] = 'added';
		header("Location: add-booking.php");

}







if (isset($_POST['from']) and $_POST['from'] == 'add-announcement') {

	mysqli_query($connection,"insert into posting_table (postingDescription, datePosted, profileId) values ('" . mysqli_escape_string($connection, $_POST['postingDescription']) . "', '" . date('Y-m-d') . "', '" . $_SESSION['profileId'] . "')");

	$postingId = mysqli_insert_id($connection);


	$target_dir = "media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);



	mysqli_query($connection, "insert into media_table (mediaLocation, postingId) values ('" . $target_file . "', '" . $postingId . "')");

	$_SESSION['do'] = 'added';
	header("Location: home.php");


}

if (isset($_POST['from']) and $_POST['from'] == 'update-announcement') {

	mysqli_query($connection, "update posting_table set postingDescription = '" . $_POST['postingDescription'] . "' where postingId = '" . $_POST['postingId'] . "'");


	$target_dir = "media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);


    if ($target_file != 'media/') {
    	
		mysqli_query($connection, "update media_table set mediaLocation = '" . $target_file . "' where postingId = '" . $_POST['postingId'] . "' ");

    }


	$_SESSION['do'] = 'updated';
	header("Location: home.php");


}


if (isset($_POST['from']) and $_POST['from'] == 'delete-announcement') {

	mysqli_query($connection, "delete from posting_table where postingId = '" . $_POST['postingId'] . "'");
	mysqli_query($connection, "delete from media_table where mediaId = '" . $_POST['mediaId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: home.php");


}

if (isset($_POST['from']) and $_POST['from'] == 'delete-comment') {

	mysqli_query($connection, "delete from comment_table where commentId = '" . $_POST['commentId'] . "'");


	$_SESSION['do'] = 'deleted';
	header("Location: home.php");


}

if (isset($_POST['from']) and $_POST['from'] == 'update-payment-transaction') {



	mysqli_query($connection, "update payment_transaction_table set paymentStatus = '" . $_POST['paymentStatus'] . "' where paymentTransactionId = '" . $_POST['paymentTransactionId'] . "'");

	if ($_POST['paymentStatus'] != 'Wrong Payment Details') {
		$qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . $_POST['bookingId'] . "'");

		$res = mysqli_fetch_assoc($qry);

		if ($_POST['paymentType'] == 'Down Payment') {
			mysqli_query($connection, "update booking_table set bookingStatus = 'Reserve' where bookingId = '" . $_POST['bookingId'] . "'");

			mysqli_query($connection, "insert into notification_table (notificationMessage, profileId, isRead, dateAndTime) values ('" . 'Your payment with the Payment ID: ' . $_POST['paymentTransactionId'] .' is now Recieved and Your booking with the Booking ID: ' . $_POST['bookingId'] . " has now the status of Reserve" . "', '" . $res['profileId'] . "', '0', '" . date('Y-m-d H:i:s') . "') ");

				$thisismymessage = "Your payment with the Payment ID: " . $_POST['paymentTransactionId'] . " is now Recieved and Your booking with the Booking ID: " . $_POST['bookingId'] . " has now the status of Reserve";
		}

		if ($_POST['paymentType'] == 'Full Payment' or $_POST['paymentType'] == 'Outstanding Payment') {
			mysqli_query($connection, "update booking_table set bookingStatus = 'Booked' where bookingId = '" . $_POST['bookingId'] . "'");

			mysqli_query($connection, "insert into notification_table (notificationMessage, profileId, isRead, dateAndTime) values ('" . 'Your payment with the Payment ID: ' . $_POST['paymentTransactionId'] .' is now Recieved and Your booking with the Booking ID: ' . $_POST['bookingId'] . " has now the status of Booked" . "', '" . $res['profileId'] . "', '0', '" . date('Y-m-d H:i:s') . "') ");

				$thisismymessage = "Your payment with the Payment ID: " . $_POST['paymentTransactionId'] . " is now Recieved and Your booking with the Booking ID: " . $_POST['bookingId'] . " has now the status of Booked";

		
		}

		
		$ch = curl_init();
		$parameters = array(
		    'apikey' => $apikey, //Your API KEY
		    'number' => $res['contactNumber'],
		    'message' => $thisismymessage,
		    'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		echo $output;
	}
	else
	{	
		$qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . $_POST['bookingId'] . "'");

		$res = mysqli_fetch_assoc($qry);

		mysqli_query($connection, "insert into notification_table (notificationMessage, profileId, isRead, dateAndTime) values ('" . 'Your payment with the Payment ID: ' . $_POST['paymentTransactionId'] .' has a Wrong Payment Details'."','" . $res['profileId'] . "', '0', '" . date('Y-m-d H:i:s') . "') ");



				$thisismymessage = "Your payment with the Payment ID: " . $_POST['paymentTransactionId'] . " has a Wrong Payment Details";
				$ch = curl_init();
		$parameters = array(
		    'apikey' => $apikey, //Your API KEY
		    'number' => $res['contactNumber'],
		    'message' => $thisismymessage,
		    'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		echo $output;

	}


	$_SESSION['do'] = 'updated';
	header("Location: payment-transactions.php");


}

if (isset($_POST['from']) and $_POST['from'] == 'update-travel-and-tour-status') {

	mysqli_query($connection, "update travel_and_tour_table set travelAndTourStatus = '" . $_POST['travelAndTourStatus'] . "' where travelAndTourId = '" . $_POST['travelAndTourId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: view-travel-and-tour.php?travelAndTourId=".$_POST['travelAndTourId']."");

}


if (isset($_GET['from']) and $_GET['from'] == 'back-up') {


	define("BACKUP_PATH", "database/");

	$server_name   = "localhost";
	$username      = "root";
	$password      = "";
	$database_name = "jaag_db";


	$cmd = "mysqldump -h {$server_name} -u {$username} -p{$password} {$database_name} cart_item_table cart_table customer_table goodies_inventory_table menu_category_table menu_item_table order_table review_table user_table > " . BACKUP_PATH . "{$database_name}.sql";


	exec($cmd);

	$_SESSION['do'] = 'added';
	header("Location: back-up-and-restore.php");

}


if (isset($_GET['from']) and $_GET['from'] == 'restore') {


	$restore_file  = "database/jaag_db.sql";
	$server_name   = "localhost";
	$username      = "root";
	$password      = "";
	$database_name = "jaag_db";

	$cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";
	exec($cmd);
	
	$_SESSION['do'] = 'updated';
	header("Location: back-up-and-restore.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'add-walk-in-customer') {


	mysqli_query($connection, "insert into address_table (buildingNumber, street, barangay, city, province) values ('" . $_POST['buildingNumber'] . "', '" . $_POST['street'] . "', '" . $_POST['barangay'] . "', '" . $_POST['city1'] . "', '" . $_POST['province1'] . "')");
	$addressId = mysqli_insert_id($connection);



	mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, addressId, accountTypeId) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['contactNumber'] . "', '" . $addressId . "', '3')");

	$profileId = mysqli_insert_id($connection);




	mysqli_query($connection,"insert into booking_table (profileId, travelAndTourId, bookingStatus, dateBooked, numberOfPaxBooked) values ('" . $profileId . "', '" . $_POST['travelAndTourId'] . "', 'Reserve', '" . date('Y-m-d') . "', '" . $_POST['paxNumber'] . "')");
	$bookingId = mysqli_insert_id($connection);



	mysqli_query($connection, "insert into payment_transaction_table (bookingId,modeOfPaymentId, amount, dateOfPayment, transactionNumber, nameOfSender, paymentStatus,paymentType) values ('" . $bookingId . "','" . $_POST['modeOfPaymentId'] . "', '" . $_POST['amount'] . "', '" . date('Y-m-d') . "', '" . $_POST['transactionNumber'] . "', '" . $_POST['nameOfSender'] . "', 'Recieved','" . $_POST['paymentType'] . "')");


	if ($_POST['paymentType'] == 'Outstanding Balance' or $_POST['paymentType'] == 'Full Payment') {
		mysqli_query($connection, "update booking_table set bookingStatus = 'Booked' where bookingId = '" . $bookingId . "'");
	}


	$paymentTransactionId = mysqli_insert_id($connection);
	


	$target_dir = "media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);

    $target_file = "dashboard/" . $target_file;

	mysqli_query($connection, "insert into media_table (mediaLocation, paymentTransactionId) values ('" . $target_file . "', '" . $paymentTransactionId . "')");

	$mediaId = mysqli_insert_id($connection);



	

	$_SESSION['do'] = 'added';
	header("Location: view-travel-and-tour.php?travelAndTourId=".$_POST['travelAndTourId']."");

}


if (isset($_POST['from']) and $_POST['from'] == 'add-reply') {

	mysqli_query($connection, "update comment_table set respond = '" . $_POST['respond'] . "' where commentId = '" . $_POST['commentId'] . "'");

	$_SESSION['do'] = 'added';
	header("Location: home.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'attendance') {
	mysqli_query($connection, "update booking_table set isAttended = '" . $_POST['isAttended'] . "' where bookingId = '" . $_POST['bookingId'] . "' ");

	$_SESSION['do'] = 'updated';
	header("Location: view-travel-and-tour.php?travelAndTourId=".$_POST['travelAndTourId']."");
}

?>