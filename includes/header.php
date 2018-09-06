<?php 
    if (isset($_SESSION['profileId']) and $_SESSION['accountType'] != 'Online Customer'){
        header("Location: controller.php?from=notvalid");
    }
    
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jaag Travel and Tours">
    <meta name="author" content="STI">
    <title>JAGG | Travel and Tour and Van Rentals</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/iconn.ico" type="image/x-icon">


    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

	<link rel="stylesheet" href="js/toastr/toastr.css">

  	<link rel="stylesheet" href="assets/material-design/material-design.min.css">
	


</head>

<body>
		
	<div id="page">
		<?php include("menu.php");?>		
	