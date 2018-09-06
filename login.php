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

   <link rel="stylesheet" href="assets/toastr/toastr.css">
    <link rel="stylesheet" href="assets/toastr.css">
  	 <link rel="stylesheet" href="assets/material-design/material-design.min.css">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

</head>


<body id="login_bg">
	
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
			  <form method="POST" action="controller.php">
		
				
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="userName" id="userName" required="">
	
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="passWord" id="passWord" required="">
		
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						
					</div>
					
				</div>
				<button type="submit" class="btn_1 rounded full-width">Login</button>
				<div class="text-center add_top_10">New to JAAG? <strong><a href="register.php">Sign up!</a></strong></div>
				<input type="text" name="from" value="login" hidden="">
			</form>
			<div class="copy">© 2018 JAAG</div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>	

	<script src="assets/toastr/toastr.js"></script>
	<script src="assets/toastr/toastr.js"></script>

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
            <?php if ($_SESSION['do'] == 'login-failed'): ?>

                toastr["error"]("Login Failed! Wrong account.", "Error");
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