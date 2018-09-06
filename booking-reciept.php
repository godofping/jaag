<?php 
include("dashboard/includes/connection.php");
include("includes/header.php"); ?>
		

	<?php $qry = mysqli_query($connection, "select * from booking_table where bookingId = '" . $_GET['bookingId'] . "'");
	$res = mysqli_fetch_assoc($qry); ?>

	<main>
		<div class="hero_in cart_section last">
			<div class="wrapper">
				<div class="container">
					<div class="bs-wizard clearfix">
						
					<!-- End bs-wizard -->
					<div id="confirm">
						<h4>Booking #<?php echo $_GET['bookingId']; ?> is now being process!</h4>
						<h5>Please deposit the reservation fee of <b>₱<?php echo $res['numberOfPaxBooked'] * 300; ?></b> to our bank account o sent the money through remittances</h5>
						<p>For Remittances (Palawan Express, Cebuana Padala, Smart Money)</p>
						<p>Name:Angela Mae Dagohoy</p>
						<p>Mobile Number: 09166085774</p>
						<p>Address: Tacurong City</p>

						<p>For Bank</p>
						<p>Name:Angela Mae Dagohoy</p>
						<p>BDO Account Number: 001820479151</p>
				
						<h3>After the payment please send the proof of billing in this <a href="">link</a>.</h3>

					</div>

				</div>
			</div>
		</div>
		<!--/hero_in-->

		<section>
			<div class="box_detail">
			<div id="total_cart">
				Total <span class="float-right">69.00$</span>
			</div>
			<ul class="cart_details">
				<li>From <span>02-11-18</span></li>
				<li>To <span>04-11-18</span></li>
				<li>Adults <span>2</span></li>
				<li>Childs <span>1</span></li>
			</ul>
			<a href="cart-3.html" class="btn_1 full-width purchase">Purchase</a>
			<div class="text-center"><small>No money charged in this step</small></div>
		</div>
		</section>
	</main>




	
	
<?php include("includes/footer.php"); ?>