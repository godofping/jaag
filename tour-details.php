<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");

$qry = mysqli_query($connection, "select * from travel_and_tour_view where packageId = '" . $_GET['packageId'] . "'");
$res = mysqli_fetch_assoc($qry);
 ?>
	
	<main>
		<section class="hero_in tours_detail">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span><?php echo $res['packageName']; ?></h1>
				</div>
				<span class="magnific-gallery">
					<?php $qry1 = mysqli_query($connection,"select * from package_media_view where packageId = '" . $res['packageId'] . "'");
					while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
					<a href="dashboard/<?php echo $res1['mediaLocation'] ?>" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">View photos</a>
					
					
					<?php } ?>
					
				</span>
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<nav class="secondary_nav sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#description" class="active">Description</a></li>
			
						<li><a href="#sidebar">Booking</a></li>
					</ul>
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<h2>Description</h2>

							<p><?php echo $res['packageDetails']; ?></p>

							<h4>Available Slots: 12 of <?php echo $res['maxPax']; ?></h4>
							
					
							<div id="instagram-feed" class="clearfix"></div>
							<hr>
							<p><strong>Date of departure:</strong> <?php echo date("l, jS \of F Y",strtotime($res['departureDate'])); ?> <br>

							<strong>Date of Return:</strong> <?php echo date("l, jS \of F Y",strtotime($res['returnDate'])); ?></p>

							<div class="row">
								<div class="col-lg-6">
									<p><strong>Inclusions</strong> <br>
									<?php echo $res['inclusion']; ?>
									</p>
									
								</div>
								<div class="col-lg-6">
									<p><strong>Exclusions</strong> <br>
									<?php echo $res['exclusion']; ?>
									</p>
									
								</div>
							</div>
							<!-- /row -->
							
							<hr>
							<h3>Location</h3>
							<div id="map" class="map map_single add_bottom_30"></div>
							<!-- End Map -->
						</section>
						<!-- /section -->
					


					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<div class="price">
								<span>‎₱<?php echo $res['price']; ?> <small>per person</small></span>
								<div class="score"></div>
							</div>

							<div class="form-group">
								<input class="form-control" type="number" name="pax" placeholder="Number of Pax">
								<i class="icon_profile"></i>
							</div>

							<a href="cart-1.html" class="btn_1 full-width purchase">Reserve Now</a>

						</div>

					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->


	<?php 
	$qry2 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "'");
	$res2 = mysqli_fetch_assoc($qry2)
	 ?>

	<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $res2['latitude']; ?>, lng: <?php echo $res2['longitude']; ?>},
          zoom: 15
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrM94NRHiWS652rYp3jenICI1Z24BH4dM&callback=initMap"
    async defer></script>
	
	
<?php include("includes/footer.php"); ?>