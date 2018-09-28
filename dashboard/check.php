<?php 
include("includes/connection.php");


$from = mysqli_real_escape_string($connection,htmlentities(trim($_POST['from'])));

if ($from == 'userName') {

	$userName = mysqli_real_escape_string($connection,htmlentities(trim($_POST['userName'])));

	$qry = mysqli_query($connection, "select * from profile_view where userName = '" . $userName . "'");

	if (mysqli_num_rows($qry) > 0) {
		echo "Username is already taken";
	}
	elseif(mysqli_num_rows($qry) == 0 and $userName != "")
	{
		echo "Username is available";
	}
}

if ($from == 'contactNumber') {

	$contactNumber = mysqli_real_escape_string($connection,htmlentities(trim($_POST['contactNumber'])));

	$qry = mysqli_query($connection, "select * from profile_view where contactNumber = '" . $contactNumber . "'");

	if (mysqli_num_rows($qry) > 0) {
		echo "Contact number is already taken";
	}
	elseif(mysqli_num_rows($qry) == 0 and strlen($contactNumber) == "11" and substr($contactNumber, 0, 2) == "09")
	{
		echo "Contact number is available";
	}
	elseif (preg_match ('/[^0-9]/i', $contactNumber) or substr($contactNumber, 0, 2) != "09") {
		if ($contactNumber == "") {
				echo "Please enter contat number";
			}
			else
			{
				echo "Incorrect format";
			}
	}
	else
	{
		$remaining = 11 - strlen($contactNumber);
		echo abs($remaining) . " character(s) left";

	}

}


if ($from == 'contactNumberProfile') {

	$qry1 = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'");
	$res1 = mysqli_fetch_assoc($qry1);

	$contactNumber = mysqli_real_escape_string($connection,htmlentities(trim($_POST['contactNumber'])));

	if ($contactNumber != $res1['contactNumber']) {
		
		$qry = mysqli_query($connection, "select * from profile_view where contactNumber = '" . $contactNumber . "'");

		if (mysqli_num_rows($qry) > 0) {
			echo "Contact number is already taken";
		}
		elseif(mysqli_num_rows($qry) == 0 and strlen($contactNumber) == "11" and substr($contactNumber, 0, 2) == "09")
		{
			echo "Contact number is available";
		}
		elseif (preg_match ('/[^0-9]/i', $contactNumber) or substr($contactNumber, 0, 2) != "09") {
			if ($contactNumber == "") {
				echo "Please enter contat number";
			}
			else
			{
				echo "Incorrect format";
			}
		}
		else
		{
			$remaining = 11 - strlen($contactNumber);
			echo abs($remaining) . " character(s) left";

		}
	}

}

?>