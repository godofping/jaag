<?php 
include("dashboard/includes/connection.php");
 ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jaag Travel and Tours">
    <meta name="author" content="STI">
    <title>JAGG | Travel and Tour and Van Rentals</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <link rel="stylesheet" href="dashboard/global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="dashboard/assets/examples/css/advanced/toastr.css">
  	 <link rel="stylesheet" href="dashboard/global/fonts/material-design/material-design.min.css">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="img/logo_sticky.png" width="155" height="36" data-retina="true" alt="" class="logo_sticky"></a>
			</figure>
			<form autocomplete="off" method="POST" action="controller.php">
				<div class="form-group">
					<label>First Name</label>
					<input class="form-control" type="text" name="firstName" id="firstName" required="">
					<i class="ti-arrow-up"></i>
				</div>
				<div class="form-group">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="middleName" id="middleName" required="">
					<i class="ti-arrow-right"></i>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input class="form-control" type="text" name="lastName" id="lastName" required="">
					<i class="ti-arrow-left"></i>
				</div>
				<div class="form-group">
					<label>Contact Number</label>
					<input class="form-control" type="text" name="contactNumber" id="contactNumber" required="">
					<i class="ti-arrow-down"></i>
				</div>
				<div class="form-group">
					<label>Building Number</label>
					<input class="form-control" type="text" name="buildingNumber" id="buildingNumber">
					<i class="ti-arrows-vertical"></i>
				</div>
				<div class="form-group">
					<label>Street</label>
					<input class="form-control" type="text" name="street" id="street">
					<i class="ti-arrows-horizontal"></i>
				</div>
				<div class="form-group">
					<label>Barangay</label>
					<input class="form-control" type="text" name="barangay" id="barangay">
					<i class="ti-angle-up"></i>
				</div>
				<div class="form-group">
					<label>City</label>
					<input class="form-control" type="text" name="city" id="city" required="">
					<i class="ti-angle-right"></i>
				</div>
				<div class="form-group">
					<label>Province</label>
					<input class="form-control" type="text" name="province" id="province" required="">
					<i class="ti-angle-left"></i>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" type="text" name="userName" id="userName" required="">
					<i class="ti-angle-down"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="passWord" id="passWord" required="">
					<i class="ti-key"></i>
				</div>

				
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 rounded full-width add_top_30">Register Now!</button>
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
				<input type="text" name="from" value="register" hidden="">
			</form>
			<div class="copy">© 2018 Panagea</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>

	<script src="dashboard/global/vendor/toastr/toastr.js"></script>
	<script src="dashboard/global/js/Plugin/toastr.js"></script>


	
	<?php 
	if (isset($_SESSION['do'])): ?>

        <script>
            <?php if ($_SESSION['do'] == 'added'): ?>
            toastr["success"]("Successfully added!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated'): ?>
                toastr["success"]("Successfully updated!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'deleted'): ?>
                toastr["success"]("Successfully deleted!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated-password-failed'): ?>
                toastr["error"]("Update password failed! Please try again.", "Error");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'username-taken'): ?>

                toastr["error"]("Username is already taken! Please try another one.", "Error");
            <?php endif ?>
        </script>



    <?php endif ?>



 		<?php
        if (isset($_SESSION['do'])) {
            unset($_SESSION['do']);
        }
        ?>

	
  
</body>
</html>