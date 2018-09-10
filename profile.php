<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

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
						<form method="POST" action="controller.php">
						<div class="row">
							<div class="col-md-12">
								<h4>Edit profile</h4>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>First name</label>
									<input class="form-control" name="firstName" type="text" value="<?php echo $res['firstName'] ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Middle name</label>
									<input class="form-control" name="middleName" type="text" value="<?php echo $res['middleName'] ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>Last name</label>
									<input class="form-control" name="lastName" type="text" value="<?php echo $res['lastName'] ?>" required>
								</div>
							</div>

						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Contact number</label>
									<input class="form-control" name="contactNumber" type="text" value="<?php echo $res['contactNumber'] ?>" required>
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
									<label>Province</label>
									<select class="form-control" name="province" id="province" required="" onchange="populateCity()"></select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<select class="form-control" name="city" id="city" required="" onchange="populateBarangay()">
										<option><?php echo $res['city']; ?></option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label>Barangay</label>
								<select class="form-control" name="barangay" id="barangay">
									<option><?php echo $res['barangay']; ?></option>
								</select>
							</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Street</label>
									<input class="form-control" name="street" type="text" value="<?php echo $res['street'] ?>" >
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Building number</label>
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
							<button  class="btn_1 green" onclick="pushData()">Update Profile</button>
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

  	$select.append('<option><?php echo $res['province']; ?></option>');

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

    $select.append('<option><?php echo $res['barangay']; ?></option>');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>

