<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>
<section id="hero_2">
		<div class="intro_title animated fadeInDown">
			<h1>Booking Placed</h1>
	
		</div>
		<!-- End intro-title -->
	</section>
	<!-- End Section hero_2 -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="home.php">Home</a>
					</li>
					</li>
					<li>Booking Placed</li>
				</ul>
			</div>
		</div>
		<!-- End position -->

		<?php $qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'"); $res = mysqli_fetch_assoc($qry); ?>

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8 add_bottom_15">

					<div class="form_title">
						<h3><strong><i class="icon-ok"></i></strong>Thank you! </h3>
					
					</div>
					<div class="step">
						<p>
							Your booking is now placed. Thank you very much for booking with us. 
						</p>
						<p>For down payment please pay <span style="font-weight: bold; font-size: 20px;">₱<?php echo number_format(($res['price'] *  $res['numberOfPaxBooked']) * 0.50,2); ?></span>.

						For full payment please pay <span style="font-weight: bold; font-size: 20px;">₱<?php echo number_format($res['price'] *  $res['numberOfPaxBooked'],2); ?></span>. </p>
						<p>For sending payments please go to My Account > My Bookings > Send Payment.</p>
						<p>Take note that you are not yet reserved unless you pay the down payment or the full payment.</p>

						<h4>Policy</h4>

						<p>Upon reservation no cancellation.</p>
 						<p>7 days before the tour cancelations are accepted.</p>
 						<p>3 days before the tour cancellations are acceptable, but you oblige to pay the slot you reserved either you join nor not.</p>
 						<p>The reservation fee is non refundable.</p>
   



					</div>
					<!--End step -->
					

					<div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
					</div>
					<div class="step">
						<table class="table confirm">
							<thead>
								<tr>
									<th colspan="2">
										Booking Details
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<strong>Booking ID</strong>
									</td>
									<td>
										<?php echo $res['bookingId']; ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Package</strong>
									</td>
									<td>
										<a href="tour-details.php?packageId=<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></a>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Travel Date</strong>
									</td>
									<td>
										<?php echo $res['departureDate']; ?> - <?php echo $res['returnDate']; ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Number of Pax Booked</strong>
									</td>
									<td>
										<?php echo $res['numberOfPaxBooked']; ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Total Payment</strong>
									</td>
									<td>
										₱<?php echo number_format($res['price'] *  $res['numberOfPaxBooked'],2); ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--End step -->
				</div>
				<!--End col-md-8 -->

				<aside class="col-md-4">
					<div class="box_style_1">
						
						<a class="btn_full_outline" href="invoice.php?bookingId=<?php echo base64_encode($res['bookingId']) ?>" target="_blank">View your invoice</a>
					</div>
					<div class="box_style_4">
						<i class="icon_set_1_icon-89"></i>
						<h4>Have <span>questions?</span></h4>
						<a href="tel://004542344599" class="phone">+63 9972 609 9529</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
				</aside>

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
<?php include("includes/footer.php"); ?>