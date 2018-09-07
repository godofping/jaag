<?php 
include("dashboard/includes/connection.php");
include("includes/header.php"); ?>
		

<main>
	<div class="hero_in cart_section">
		<div class="wrapper">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>My Bookings</h1>
				</div>
				
					
				</span>
			</div>
		</div>
	</div>
	<!--/hero_in-->

	<div class="bg_color_1">
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-12">
					<div class="box_cart">
					<table class="table table-striped cart-list">
						<thead>
							<tr>
								<th>
									Booking #
								</th>
								<th>
									Booking
								</th>
								<th>
									Price
								</th>
								<th>
									Status
								</th>
								<th>
									Actions
								</th>
							</tr>
						</thead>
						<tbody>

							<?php $qry = mysqli_query($connection, "select * from booking_table where profileId = '" . $_SESSION['profileId'] . "'");
							while ($res = mysqli_fetch_assoc($qry)) { 

								if (is_null($res['rentId'])) {
									$qry1 = mysqli_query($connection, "select * from booking_travel_and_tour_view where bookingId = '" . $res['bookingId'] . "'");
									$res1 = mysqli_fetch_assoc($qry1); 
									}

								?>



								<tr>
								<td>
									<?php echo $res1['bookingId']; ?>
								</td>
								<td>
									<?php echo $res1['packageName']; ?>
								</td>
								<td>
									<strong>₱<?php echo $res1['price'] * $res1['numberOfPaxBooked']; ?></strong>
								</td>
								<td>
									<?php echo $res1['statusDescription']; ?>
								</td>
								<td class="options" style="width:5%; text-align:center;">
									<a href="">Cancel</a>
									<a href="send-payment.php?bookingId=<?php echo $res['bookingId'] ?>">Send Payment</a>
								</td>
							</tr>



							<?php } ?>						
						</tbody>
					</table>
					
				</div>
				</div>
				<!-- /col -->


				
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bg_color_1 -->
</main>
<!--/main-->



	
	
<?php include("includes/footer.php"); ?>