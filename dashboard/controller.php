<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "' and accountType = 'Administrator'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'Administrator';
		$_SESSION['profileId'] = $res['profileId'];
		$_SESSION['do'] = 'login-success';
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


	mysqli_query($connection, "insert into address_table (buildingNumber, street, barangay, city, province) values ('" . $_POST['buildingNumber'] . "', '" . $_POST['street'] . "', '" . $_POST['barangay'] . "', '" . $_POST['city1'] . "', '" . $_POST['province1'] . "')");
	$addressId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, addressId, accountTypeId) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['contactNumber'] . "', '" . $addressId . "', 5)");

	$_SESSION['do'] = 'added';
	header("Location: drivers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-driver') {
	mysqli_query($connection, "update driver_table set driverFirstName = '" . $_POST['driverFirstName'] . "', driverMiddleName = '" . $_POST['driverMiddleName'] . "', driverLastName = '" . $_POST['driverLastName'] . "', driverAddress = '" . $_POST['driverAddress'] . "', driverContactNumber = '" . $_POST['driverContactNumber'] . "' where driverId = '" . $_POST['driverId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: drivers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-driver') {
	mysqli_query($connection, "delete from profile_table where profileId = '" . $_POST['profileId'] . "'");

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

	mysqli_query($connection, "update address_table set buildingNumber = '" . $_POST['buildingNumber'] . "', street = '" . $_POST['street'] . "', barangay = '" . $_POST['barangay'] . "', city = '" . $_POST['city1'] . "', province = '" . $_POST['province1'] . "' where addressId = '" . $_POST['addressId'] . "'");

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

if (isset($_POST['from']) and $_POST['from'] == 'add-van') {
	mysqli_query($connection, "insert van_table (vanMake, vanModel, vanPlateNumber, statusId) values ('" . $_POST['vanMake'] . "', '" . $_POST['vanModel'] . "', '" . $_POST['vanPlateNumber'] . "', '1')");

	$_SESSION['do'] = 'added';
	header("Location: vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-van') {
	mysqli_query($connection, "update van_table set vanMake = '" . $_POST['vanMake'] . "', vanModel = '" . $_POST['vanModel'] . "', vanPlateNumber = '" . $_POST['vanPlateNumber'] . "' where vanId = '" . $_POST['vanId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-van') {
	mysqli_query($connection, "delete from van_table where vanId = '" . $_POST['vanId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-status-van') {
	mysqli_query($connection, "update van_table set statusId ='" . $_POST['statusId'] . "' where vanId = '" . $_POST['vanId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-package') {

	mysqli_query($connection,"insert into price_table (price) values ('" . $_POST['price'] . "')");
	$priceId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into package_table (packageName, packageDetails, priceId, inclusion, exclusion,statusId) values ('" . $_POST['packageName'] . "', '" . $_POST['packageDetails'] . "', '" . $priceId . "', '" . $_POST['inclusion'] . "', '" . $_POST['exclusion'] . "',  '1')");
	$packageId = mysqli_insert_id($connection);

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $packageId . "', '" . $placeId . "')");
	  
	}


	$_SESSION['do'] = 'added';
	header("Location: packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-package') {
	mysqli_query($connection, "update price_table set price = '" . $_POST['price'] . "' where priceId = '" . $_POST['priceId'] . "'");

	mysqli_query($connection, "update package_table set packageName = '" . $_POST['packageName'] . "', packageDetails = '" . $_POST['packageDetails'] . "', inclusion = '" . $_POST['inclusion'] . "', exclusion = '" . $_POST['exclusion'] . "' where packageId = '" . $_POST['packageId'] . "'");

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
	mysqli_query($connection, "delete from price_table where priceId = '" . $_POST['priceId'] . "'");
	$_SESSION['do'] = 'deleted';
	header("Location: packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-status-package') {
	mysqli_query($connection, "update package_table set statusId ='" . $_POST['statusId'] . "' where packageId = '" . $_POST['packageId'] . "'");

	$_SESSION['do'] = 'updated';
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

	mysqli_query($connection, "insert into travel_and_tour_table (packageId, departureDate, returnDate, maxPax) values ('" . $_POST['packageId'] . "', '" . $_POST['departureDate'] . "', '" . $_POST['returnDate'] . "', '" . $_POST['maxPax'] . "')");

		$_SESSION['do'] = 'added';
		header("Location: add-booking.php");

}


if (isset($_POST['from']) and $_POST['from'] == 'add-booking-rental') {

	mysqli_query($connection, "insert into price_table (price) values ('" . $_POST['price'] . "')");
	$priceId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into rental_table (vanId, priceId, rentalStartingDate, rentalEndingDate) values ('" . $_POST['vanId'] . "', '" . $priceId . "', '" . $_POST['rentalStartingDate'] . "', '" . $_POST['rentalEndingDate'] . "')");

		$_SESSION['do'] = 'added';
		header("Location: add-booking.php");
}




if (isset($_POST['from']) and $_POST['from'] == 'add-announcement') {

	mysqli_query($connection,"insert into posting_table (postingDescription, datePosted, profileId) values ('" . $_POST['postingDescription'] . "', '" . date('Y-m-d') . "', '" . $_SESSION['profileId'] . "')");

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



?>