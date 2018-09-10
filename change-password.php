<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/admin_top.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Change Password</h1>
				
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
					<li><a>My Accounts</a></li>
					<li>Change Password</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="margin_60 container">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-booking"><span>Change Password</span></a>
						</li>

					</ul>
				</nav>
				<div class="content">


			<?php $qry = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'"); $res = mysqli_fetch_assoc($qry); ?>
					<section id="section-3">
						<div class="row">
							<div class="col-md-6 col-sm-6 add_bottom_30">
								<form method="POST" action="controller.php">
								<h4>Change your password</h4>
								<div class="form-group">
									<label>Old password</label>
									<input class="form-control" name="oldPassword" id="oldPassword" type="password" required="">
								</div>
								<div class="form-group">
									<label>New password</label>
									<input class="form-control" name="newPassword" id="newPassword" type="password" required="">
								</div>
								<div class="form-group">
									<label>Confirm new password</label>
									<input class="form-control" name="confirmNewPassword" id="confirmNewPassword" type="password" required="">
								</div>
								<input type="text" name="passWord" value="<?php echo $res['passWord'] ?>" hidden="">
								<input type="text" name="from" value="update-password" hidden="">


								<button type="submit" class="btn_1 green">Update Password</button>
								</form>
							</div>
							
						</div>
						<!-- End row -->

					</section>
					<!-- End section 3 -->

					</div>
					<!-- End content -->
				</div>
				<!-- End tabs -->
			</div>
			<!-- end container -->
	</main>
	<!-- End main -->
<?php include("includes/footer.php"); ?>

