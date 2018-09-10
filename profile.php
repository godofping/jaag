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

						<div class="row">
							<div class="col-md-12">
								<h4>Edit profile</h4>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>First name</label>
									<input class="form-control" name="first_name" id="first_name" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Last name</label>
									<input class="form-control" name="last_name" id="last_name" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Phone number</label>
									<input class="form-control" name="email_2" id="email_2" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Date of birth <small>(dd/mm/yyyy)</small>
									</label>
									<input class="form-control" name="email" id="email" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>Edit address</h4>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Street address</label>
									<input class="form-control" name="first_name" id="first_name" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>City/Town</label>
									<input class="form-control" name="last_name" id="last_name" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Zip code</label>
									<input class="form-control" name="email" id="email" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Country</label>
									<select id="country" class="form-control" name="country">
										<option value="">Select...</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->

	

							<hr>
							<button type="submit" class="btn_1 green">Update Profile</button>
					</section>
					<!-- End section 4 -->

					</div>
					<!-- End content -->
				</div>
				<!-- End tabs -->
			</div>
			<!-- end container -->
	</main>
	<!-- End main -->
<?php include("includes/footer.php"); ?>

