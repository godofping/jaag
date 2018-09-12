<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/admin_top - Copy.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Send Payment</h1>
				
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
					<li><a href="my-bookings.php">My Bookings</a></li>
					<li>Send Payment</li>
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
											<th>Package Name</th>
											<th>Travel Dates</th>
											<th>Number of Pax Booked</th>
											<th>Date Booked</th>
											<th>Status</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>
										<?php $qry3 = mysqli_query($connection, "select * from booking_view where profileId = '" . $_SESSION['profileId'] . "' order by bookingId DESC");
										while ($res3 = mysqli_fetch_assoc($qry3)) { ?>
										<tr>
											<td><?php echo $res3['bookingId']; ?></td>
											<td><?php echo $res3['packageName']; ?></td>
											<td><?php echo $res3['departureDate']; ?> - <?php echo $res3['returnDate']; ?></td>
										
											<td><?php echo $res3['numberOfPaxBooked']; ?></td>
											<td><?php echo $res3['dateBooked']; ?></td>
											<td><?php echo $res3['bookingStatus']; ?></td>
											<td><a href="send-payment.php?bookingId=<?php echo $res3['bookingId'] ?>"><button class="btn btn-info">Send Payment</button></a></td>
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

