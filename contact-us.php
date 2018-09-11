<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>


<section class="parallax-window" data-parallax="scroll" data-image-src="img/header_bg1.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Contact us</h1>
			
		</div>
	</div>
</section>
<!-- End Section -->

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="home.php">Home</a>
				</li>
				<li>Contact Us</li>
			</ul>
		</div>
	</div>
	<!-- End Position -->

	<div class="container margin_60">
		<div class="row">
		
			
			<div class="col-md-12">
				<div class="box_style_1">
					<span class="tape"></span>
					<h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
					<p>
						Blk.4 Lot 28, Yellow Village Subdivision New Isabela Tacurong City, Sultan Kudarat
					</p>
					<hr>
					<h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
					<p>
						If you have any questions please call  this contact details.
					</p>
					<ul id="contact-info">
						<li>+63 997 2609 952 / + 61 (2) 8093 3402</li>
						<li><a href="#">info@jaag.com</a>
						</li>
					</ul>
				</div>
				<div class="box_style_4">
					<i class="icon_set_1_icon-57"></i>
					<h4>Need <span>Help?</span></h4>
					<a href="tel://004542344599" class="phone">+63 997 2609 952</a>
					<small>Monday to Friday 9.00am - 7.30pm</small>
				</div>
			</div>
			<!-- End col-md-4 -->
		</div>
		<!-- End row -->
	</div>
	<!-- End container -->

	<div id="map"></div>
	<!-- end map-->
	<div id="directions">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form action="http://maps.google.com/maps" method="get" target="_blank">
						<div class="input-group">
							<input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
							<input type="hidden" name="daddr" value="Block 4, New Isabela, Tacurong City, Sultan Kudarat" />
							<!-- Write here your end point -->
							<span class="input-group-btn">
				<button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
				</span>
						</div>
						<!-- /input-group -->
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end directions-->
</main>
<!-- End main -->
<?php include("includes/footer.php"); ?>

	<!-- Specific scripts -->
	<script src="assets/validate.js"></script>
	<script src="js/map_contact.js"></script>
	<script src="js/infobox.js"></script>

	<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 6.681545, lng: 124.671505},
          zoom: 15
        });

        var marker = new google.maps.Marker({
          position: {lat: 6.681545, lng: 124.671505},
          map: map,
          title: 'Here'
        });
      }
    </script>