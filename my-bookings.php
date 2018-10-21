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
											<th>Package Name</th>
											<th>Travel Dates</th>
											<th>Number of Pax Booked</th>
											<th>Date Booked</th>
											<th>Tour Status</th>
											<th>Booking Status</th>
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
											<td><?php echo $res3['travelAndTourStatus']; ?></td>
											<td><?php echo $res3['bookingStatus']; ?></td>
											<td>
												<a href="send-payment.php?bookingId=<?php echo base64_encode($res3['bookingId']) ?>"><button class="btn btn-info">Send Payment</button></a> <br><br>

												<a class="btn btn-success" href="invoice.php?bookingId=<?php echo base64_encode($res3['bookingId']) ?>" target="_blank">View invoice</a> <br><br>

												<?php 
												$datedifference =  (strtotime($res3['departureDate']) - strtotime(date('Y-m-d'))) / 86400;

												if ($datedifference > 7 and $res3['bookingStatus'] != 'Cancelled by the customer') { ?>
													<a class="btn btn-danger" href="controller.php?from=cancel-booking&bookingId=<?php echo base64_encode($res3['bookingId']) ?>">Cancel Booking</a>
												<?php } elseif($datedifference < 8 and $res3['bookingStatus'] != 'Cancelled by the customer') { ?>
													<button class="btn btn-danger" disabled="" data-toggle="tooltip" title="Cancellation is not available because the departure date is now less than 7 days.">Cancel Booking</button>

												<?php } ?>
												<br><br>
												<a class="btn btn-success" href="dashboard/print/print-reciept.php?bookingId=<?php echo base64_encode($res3['bookingId']) ?>&from=customer" target="_blank">Print Booking Summary</a> 

												


											</td>
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

