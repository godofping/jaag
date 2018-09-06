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
				
				</div>
				<div class="form-group">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="middleName" id="middleName" required="">
			
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input class="form-control" type="text" name="lastName" id="lastName" required="">
				
				</div>
				<div class="form-group">
					<label>Contact Number</label>
					<input class="form-control" type="text" name="contactNumber" id="contactNumber" required="">
				
				</div>
				<div class="form-group">
					<label>Province</label>
					<select class="form-control" name="province" id="province" required="" onchange="populateCity()"></select>
				
				</div>
				<div class="form-group">
					<label>City</label>
					<select class="form-control" name="city" id="city" required="" onchange="populateBarangay()"></select>
				
				</div>
				<div class="form-group">
					<label>Barangay</label>
					<select class="form-control" name="barangay" id="barangay"></select>
			
				</div>
				<div class="form-group">
					<label>Building Number</label>
					<input class="form-control" type="text" name="buildingNumber" id="buildingNumber">
				
				</div>
				<div class="form-group">
					<label>Street</label>
					<input class="form-control" type="text" name="street" id="street">
			
				</div>
				
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" type="text" name="userName" id="userName" required="">
				
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="passWord" id="passWord" required="">
				
				</div>

				
				<div id="pass-info" class="clearfix"></div>
				<button  class="btn_1 rounded full-width add_top_30"  onclick="pushData()">Register Now!</button>
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
				<input type="text" name="from" value="register" hidden="">
				<input type="text" name="province1" id="province1" hidden="">
                <input type="text" name="city1" id="city1" hidden="">
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

	<script src="assets/toastr/toastr.js"></script>
	<script src="assets/toastr/toastr.js"></script>



	
	<?php 
	if (isset($_SESSION['do'])): ?>

        <script>

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

        <script type="text/javascript">

function pushData()
{
    document.getElementById("province1").value = $("#province option:selected").text();
    document.getElementById("city1").value = $("#city option:selected").text();

    var form = document.getElementById("form");

    document.getElementById("submitButton").addEventListener("click", function () {
    form.submit();
    });
}

var $select = $('#province');

  $.getJSON('dashboard/JSON/refprovince.json', function(data){
    $select.html('');

  

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });



function populateCity() {

  var $selectCity = $('#city');

  $.getJSON('dashboard/JSON/refcitymun.json', function(data){
    $selectCity.html('');
    for (var i = 0; i < data['CITIES'].length; i++) {
     if (data['CITIES'][i]['provCode'] == $("#province option:selected").val()) {
       $selectCity.append('<option value="'+ data['CITIES'][i]['citymunCode'] + '">' + data['CITIES'][i]['citymunDesc'] + '</option>');
     }


    }

  });
}

function populateBarangay() {

  var $selectBarangay = $('#barangay');

  $.getJSON('dashboard/JSON/refbrgy.json', function(data){
    $selectBarangay.html('');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>

	
  
</body>
</html>