<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>
<?php 

if (!isset($_SESSION['profileId'])) {
	?>
<script type="text/javascript">
	window.location.href = "index.php";
</script>
	<?php
}
 ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/admin_top.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Profile</h1>
				
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="index.php">Home</a>
					</li>
					<li><a>My Account</a></li>
					<li>Profile</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="margin_60 container">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-booking"><span>Profile</span></a>
						</li>

					</ul>
				</nav>
				<div class="content">


			<?php $qry = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'"); $res = mysqli_fetch_assoc($qry); ?>
					<section id="section-4">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<h4>Your profile</h4>
								<ul id="profile_summary">
									<li>Username <span><?php echo $res['userName']; ?></span>
									</li>
									<li>First name <span><?php echo $res['firstName']; ?></span>
									</li>
									<li>Middle name <span><?php echo $res['middleName']; ?></span>
									</li>
									<li>Last name <span><?php echo $res['lastName']; ?></span>
									</li>
									<li>Contact number <span><?php echo $res['contactNumber']; ?></span>
									</li>
									<li>Building number <span><?php echo $res['buildingNumber']; ?></span>
									</li>
									<li>Street <span><?php echo $res['street']; ?></span>
									</li>
									<li>Barangay <span><?php echo $res['barangay']; ?></span>
									</li>
									<li>City <span><?php echo $res['city']; ?></span>
									</li>
									<li>Province <span><?php echo $res['province']; ?></span>
									</li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-6">
								<!-- <img src="img/tourist_guide_pic.jpg" alt="Image" class="img-responsive styled profile_pic"> -->
								</p>
							</div>
						</div>
						<!-- End row -->

						<div class="divider"></div>
						<form method="POST" action="controller.php" id="form">
						<div class="row">
							<div class="col-md-12">
								<h4>Edit profile</h4>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>First name <small style="color: red"> * required</small></label>
									<input class="form-control" name="firstName" id="firstName" type="text" value="<?php echo $res['firstName'] ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Middle name <small style="color: red"> * required</small></label>
									<input class="form-control" name="middleName" id="middleName" type="text" value="<?php echo $res['middleName'] ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Last name <small style="color: red"> * required</small></label>
									<input class="form-control" name="lastName" id="lastName" type="text" value="<?php echo $res['lastName'] ?>" required>
								</div>
							</div>

						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Contact number <small style="color: red"> * required</small></label>
									<input class="form-control" name="contactNumber" id="contactNumber1" type="text" value="<?php echo $res['contactNumber'] ?>" required placeholder="09xxxxxxxxx" minlength="11" maxlength="11" disabled>
                                        <span id="contactNumberResult"></span>
								</div>
							</div>
						</div>
						<!-- End row -->


						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>Edit address</h4>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Province <small style="color: red"> * required</small></label>
									<select class="form-control" name="province" id="province" required="" onchange="populateCity();populateBarangay();"></select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>City <small style="color: red"> * required</small></label>
									<select class="form-control" name="city" id="city" required="" onchange="populateBarangay()">
										<option><?php echo $res['city']; ?></option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label>Barangay <small style="color: red"> * required</small></label>
								<select class="form-control" name="barangay" id="barangay">
									<option><?php echo $res['barangay']; ?></option>
								</select>
							</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Street <small style="color: red"> (optional)</small></label>
									<input class="form-control" name="street" type="text" value="<?php echo $res['street'] ?>" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Building number <small style="color: red"> (optional)</small></label>
									<input class="form-control" name="buildingNumber" type="text" value="<?php echo $res['buildingNumber'] ?>" >
								</div>
							</div>
						</div>
						<!-- End row -->

						<input type="text" name="from" value="update-profile" hidden="">
						<input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
						<input type="text" name="addressId" value="<?php echo $res['addressId'] ?>" hidden="">

						<input type="text" name="province1" id="province1" hidden="">
		                <input type="text" name="city1" id="city1" hidden="">

							<hr>
							<button type="button" class="btn btn-success waves-effect" name="submitform" id="submitButton" onclick="pushData()">Submit</button>
					</section>
					<!-- End section 4 -->
				</form>
					</div>
					<!-- End content -->
				</div>
				<!-- End tabs -->
			</div>
			<!-- end container -->
	</main>
	<!-- End main -->
<?php include("includes/footer.php"); ?>

<script type="text/javascript">

function pushData()
{

    var error = "";

    document.getElementById("province1").value = $("#province option:selected").text();
    document.getElementById("city1").value = $("#city option:selected").text();

    var firstName = document.getElementById("firstName").value;
    var middleName = document.getElementById("middleName").value;
    var lastName = document.getElementById("lastName").value;

    var contactNumber = document.getElementById("contactNumber1").value;
 
    var province = document.getElementById("province").value;
    var city = document.getElementById("city").value;
    var barangay = document.getElementById("barangay").value;

    var contactNumberResult = document.getElementById('contactNumberResult').innerText;

    if (firstName.length == 0) {
        error += "Please enter first name. \n";
    }
    if (middleName.length == 0) {
        error += "Please enter middle name. \n";
    }
    if (lastName.length == 0) {
        error += "Please enter last name. \n";
    }



    if (province.length == 0) {
        error += "Please select province. \n";
    }
    if (city.length == 0) {
        error += "Please select city. \n";
    }
    if (barangay.length == 0) {
        error += "Please select barangay. \n";
    }


    if (!middleName.match(/^[a-zA-Z]+$/)){
        error += "Please change middle name. Only characters in alphabet is allowed. \n";
    }

    if (!lastName.match(/^[a-zA-Z]+$/)){
        error += "Please change last name. Only characters in alphabet is allowed.  \n";
    }

    if (error.length == 0) {
        document.getElementById("form").submit();
    }
    else
    {
        window.alert(error);
    }

    
    
}



populateProvince();


function populateProvince() {
    var $select = $('#province');

  $.getJSON('dashboard/JSON/refprovince.json', function(data){
    $select.html('');
 
 	$select.append('<option><?php echo $res['province']; ?></option>');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });

}

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

