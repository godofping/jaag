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
			<div class="row">
				
				<div class="col-md-8">

					<div class="row">
						<div class="col-md-3">
							<h3>Payment History of Booking ID <?php echo base64_decode($_GET['bookingId']); ?></h3>
							<hr>
							<?php
							$totalAmountPaid = 0;
							 $qry = mysqli_query($connection, "select COALESCE(SUM(amount),0) as totalAmountPaid from payment_transaction_view where bookingId = '" . base64_decode($_GET['bookingId']) . "' and paymentStatus = 'Recieved'"); $res = mysqli_fetch_assoc($qry); ?>
							<h4>Total Amount Paid: ₱<?php echo number_format($res['totalAmountPaid'],2);$totalAmountPaid =  $res['totalAmountPaid'];?></h4>

							<?php $qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'"); $res = mysqli_fetch_assoc($qry); ?>
							<h4>Outstanding Balance: ₱ <?php echo number_format($res['price'] * $res['numberOfPaxBooked'] - $totalAmountPaid ,2) ; ?></h4>



						</div>
						<div class="col-md-9">
						
							<div class=" table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Payment ID</th>
											<th>Payment Type</th>
											<th>Amount Sent</th>
											<th>Date Sent</th>
											<th>Transaction Code</th>
											<th>Sender</th>
											<th>Remittance</th>
											<th>Proof Image</th>
											<th>Status</th>
											
										
										</tr>
									</thead>
									<tbody>
										
										<?php
										$outstandingbalance = 0;
										$fullypaid = 0;
										$counter = 0;
										 $qry = mysqli_query($connection, "select * from payment_transaction_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'");
										while ($res = mysqli_fetch_assoc($qry)) { 

											if ($res['paymentStatus'] == 'Recieved' and ($res['paymentType'] == 'Full Payment' or $res['paymentType'] == 'Outstanding Payment')) {
												$fullypaid = 1;
											}

											if ($res['paymentStatus'] == 'Recieved' and $res['paymentType'] == 'Down Payment') {
												$outstandingbalance += $res['amount'];
											}



											?>
											<tr>
												<td><?php echo $res['paymentTransactionId']; ?></td>
												<td><?php echo $res['paymentType']; ?></td>
												<td>₱<?php echo number_format($res['amount'],2); ?></td>
												<td><?php echo $res['dateOfPayment']; ?></td>
												<td><?php echo $res['transactionNumber']; ?></td>
												<td><?php echo $res['nameOfSender']; ?></td>
												<td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
												<td>
													<?php $qry1 = mysqli_query($connection, "select * from payment_transaction_media_view where paymentTransactionId = '" . $res['paymentTransactionId'] . "'"); $res1 = mysqli_fetch_assoc($qry1);

													 ?>
													<a  target="_blank" href="<?php echo $res1['mediaLocation'] ?>">view image</a>
												</td>
												<td><?php echo $res['paymentStatus']; ?></td>
	

											</tr>
										<?php $counter++; } ?>
									
									</tbody>
								</table>
							</div>
						
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box_style_1 expose">
						<h3 class="inner">- Payment Form -</h3>
						<div class="row">
						<form method="POST" action="controller.php" enctype="multipart/form-data">


							<div class="col-md-12">
								<?php if ($counter == 0): ?>
								<?php 
								$qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'");
								$res = mysqli_fetch_assoc($qry); 
								?>

								<p>For Down Payment please pay ₱<?php echo number_format(($res['price'] * $res['numberOfPaxBooked']) * .50,2); ?><br>For Full Payment please pay ₱<?php echo number_format($res['price']*$res['numberOfPaxBooked'],2); ?></p>
								<?php endif ?>

								<?php if ($counter > 0): ?>
								<?php 
								$qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'");
								$res = mysqli_fetch_assoc($qry); 
								?>

								<p>For Outstanding Payment please pay ₱<?php echo number_format($outstandingbalance,2); ?></p>
								<?php endif ?>

								<div class="form-group">
									<label>Payment Type</label>
									<select class="form-control" name="paymentType" id="paymentType" required="">
										<?php if ($counter == 0): ?>
											<option value="Down Payment">Down Payment</option>
											<option value="Full Payment">Full Payment</option>
										<?php endif ?>
										

										<?php if ($counter > 0): ?>
											<option>Outstanding Payment</option>
										<?php endif ?>
										
								
									</select>
								</div>

								<div class="form-group">
									<label>Remittance</label>
									<select class="form-control" name="modeOfPaymentId" id="modeOfPaymentId" required="">
										<?php $qry = mysqli_query($connection, "select * from mode_of_payment_view where paymentMode = 'Bank Transfer' or paymentMode = 'Remittance'"); while ($res = mysqli_fetch_assoc($qry)) { ?>
												<option value="<?php echo $res['modeOfPaymentId'] ?>"><?php echo $res['paymentMode'] . " - " . $res['nameOfRemittanceOrBank']; ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Amount</label>
									<input class="form-control" type="number" step="any" name="amount" required="">
								</div>
								
								<div class="form-group">
									<label>Sender</label>
									<input class="form-control" type="text" name="nameOfSender" required="">
								</div>

								<div class="form-group">
									<label>Transaction Code</label>
									<input class="form-control" type="text" name="transactionNumber" required="">
								</div>

								<div class="form-group">
									<label>Proof Image</label>
									<input class="form-control" type="file" name="mediaLocation" required="">
								</div>

								
							</div>


						
						</div>
					
						<br>
						<input type="text" name="bookingId" value="<?php echo base64_decode($_GET['bookingId']) ?>" hidden="">
						<input type="text" name="from" value="send-payment" hidden="">

						<button type="submit" class="btn_full" <?php if ($fullypaid == 1): ?>
							disabled
						<?php endif ?>>Send Payment</button>
						</form>
					</div>
					<!--/box_style_1 -->

			
				</div>


			</div>
			<!-- end row -->
		</div>
		<!-- End tabs -->
			
			<!-- end container -->
	</main>
	<!-- End main -->
<?php include("includes/footer.php"); ?>

