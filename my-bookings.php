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
					<section id="section-1">
						
						<div class=" table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Booking ID</th>
											<th>Travel Dates</th>
											<th>Slots Booked</th>
											<th>Status</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>
										<?php $qry3 = mysqli_query($connection, "select * from booking_view where profileId = '" . $_SESSION['profileId'] . "' order by bookingId DESC");
										while ($res3 = mysqli_fetch_assoc($qry3)) { ?>
										<tr>
											<td><?php echo $res3['travelAndTourId']; ?></td>
											<td><?php echo $res3['departureDate']; ?> - <?php echo $res3['returnDate']; ?></td>
										
											<td>0/<?php echo $res3['maxPax']; ?></td>
											<td><?php echo $res3['travelAndTourStatus']; ?></td>
											<td><a href="booking.php?travelAndTourId=<?php echo $res3['travelAndTourId'] ?>"><button class="btn btn-info">Book</button></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						
	

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

