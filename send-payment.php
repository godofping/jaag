<?php 
include("dashboard/includes/connection.php");
include("includes/header.php"); ?>
		

<main>
	<div class="hero_in cart_section">
		<div class="wrapper">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Send Payment</h1>
				</div>
				
					
				</span>
			</div>
		</div>
	</div>
	<!--/hero_in-->

	<?php $qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . $_GET['bookingId'] . "'");
	$res = mysqli_fetch_assoc($qry); ?>

	<div class="bg_color_1">
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-12">
					<div class="box_cart">
						<h4>Send payment to Booking #<?php echo $_GET['bookingId']; ?></h4>
						<h5>For down payment please pay ₱<?php echo 300 * $res['numberOfPaxBooked']; ?>. For full payment please pay ₱<?php echo $res['price'] * $res['numberOfPaxBooked']; ?></h5>
						<form method="POST" action="controller.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Payment for</label>
										<select class="form-control" name="modeOfPaymentId" id="modeOfPaymentId" required="">
											<?php $qry = mysqli_query($connection, "select * from mode_of_payment_table");
											while ($res = mysqli_fetch_assoc($qry)) { ?>
												<option value="<?php echo $res['modeOfPaymentId'] ?>"><?php echo $res['modeOfPayment']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-4">
									<div class="form-group">
										<label>Amount</label>
										<input class="form-control" type="number"  step="any" name="amount" required="">
									</div>
								</div>
							</div>


							<div class="row">
									<div class="col-md-4">
									<div class="form-group">
										<label>Name of sender</label>
										<input class="form-control" type="text"  name="nameOfSender" required="">
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-4">
									<div class="form-group">
										<label>Transaction Number</label>
										<input class="form-control" type="text"  name="transactionNumber" required="">
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-4">
									<div class="form-group">
										<label>Proof Image</label>
										<input class="form-control" type="file"  name="mediaLocation" required="">
									</div>
								</div>
							</div>

							<button  class="btn_1 rounded  float-center" type="submit">Submit</button>
							<input type="text" name="from" value="send-payment" hidden="">

						</form>
					
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