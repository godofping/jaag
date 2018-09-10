<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/admin_top.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>My Bookings</h1>
				
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
					<li>My Bookings</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="margin_60 container">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-booking"><span>My Bookings</span></a>
						</li>

					</ul>
				</nav>
				<div class="content">


			<?php $qry = mysqli_query($connection, "select * from booking_view where profileId = '" . $_SESSION['profileId'] . "' order by bookingId DESC"); ?>
					<section id="section-1">
						
						<?php while ($res = mysqli_fetch_assoc($qry)) { ?>
						<div class="strip_booking">
							<div class="row">
								<div class="col-md-2 col-sm-2">
									<div class="date">
										<span class="month">Status</span>
										<span class="day"><strong></strong><?php echo $res['bookingStatus']; ?></span>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<h3 class="tours_booking"><?php echo $res['packageName']; ?><span>2 Adults / 2 Nights</span></h3>
								</div>
								<div class="col-md-2 col-sm-3">
									<ul class="info_booking">
										<li><strong>Booking id</strong> <?php echo $res['bookingId']; ?></li>
										<li><strong>Booked on</strong> <?php echo $res['dateBooked']; ?></li>
									</ul>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="booking_buttons">

										<a href="#0" class="btn_2">Payments</a>
										<a href="#0" class="btn_3">Cancel</a>
									</div>
								</div>
							</div>
							<!-- End row -->
						</div>
						<!-- End strip booking -->

					<?php } ?>
	

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

