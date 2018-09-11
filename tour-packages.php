<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Tour Packages</h1>
			
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
				<li><a>Tour Packages</a>
				</li>
				<li>View All Packages</li>
			</ul>
		</div>
	</div>
	<!-- Position -->

	<div class="collapse" id="collapseMap">
		<div id="map" class="map"></div>
	</div>
	<!-- End Map -->


	<div class="container margin_60">

		<div class="row">
			<aside class="col-lg-3 col-md-3">
				<p>
					<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
				</p>



				<!--End filters col-->
				<div class="box_style_2">
				
                    <form method="POST" action="controller.php">
                    <div class="form-group">
                        <label>View Packages within this date</label>
                        <input class="form-control input-daterange-datepicker" type="text" name="dates" />
                    </div>
                    <input type="text" name="from" value="search-package" hidden="">
                    <br>
                    <button type="submit" class="btn_1 green">Search now</button>
                    <br>
                    <br>
                    <a href="tour-packages.php"><span class="btn_1 red">View All Packages</span></a>
                    </form>
               
             
				</div>

				<div class="box_style_2">
					<i class="icon_set_1_icon-57"></i>
					<h4>Need <span>Help?</span></h4>
					<a href="tel://+639972609952" class="phone">+63 997 260 9952</a>
					<small>Monday to Friday 9.00am - 7.30pm</small>
				</div>


			</aside>
			<!--End aside -->
			<div class="col-lg-9 col-md-9">

			<?php
			$counter = 0;
			if (isset($_GET['from']) and isset($_GET['to'])) {
			 	$qry = mysqli_query($connection, "SELECT * FROM travel_and_tour_view WHERE departureDate >= '" . $_GET['from'] . "' AND returnDate <= '" . $_GET['to'] .  "'
");
			 }
			 else
			 {
			 	$qry = mysqli_query($connection, "select * from package_view");
			 }

			


			while ($res = mysqli_fetch_assoc($qry)) {
				$counter++;
			 ?>

				<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
					<div class="row">
						<div class="col-lg-4">
							<div class="ribbon_3 popular"><span>Popular</span>
							</div>
					
							<div class="img_list">
								<?php $qry1 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'");
								$res1 = mysqli_fetch_assoc($qry1); ?>
								<a href="single_tour.html"><img src="dashboard/<?php echo $res1['mediaLocation']; ?>" alt="Image">
									
								</a>
							</div>
						</div>
						<div class="clearfix visible-xs-block"></div>
						<div class="col-lg-5">
							<div class="tour_list_desc">
								<h3><strong><?php echo $res['packageName']; ?></strong></h3>
								<p><?php echo $res['packageDetails']; ?></p>
								<ul class="add_info">
									
									<li>
										<div class="tooltip_styled tooltip-effect-4">
											<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
											<div class="tooltip-content">
												<h4>Address</h4> 
												<?php $qry2 = mysqli_query($connection, "SELECT * FROM destination_view where packageId = '" . $res['packageId'] . "'"); while ($res2 = mysqli_fetch_assoc($qry2)) { 
													echo $res2['placeName'] . "<br>";
													?>

												<?php } ?>
												<br>
											</div>
										</div>
									</li>
									
									
									
								</ul>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="price_list">
								<div><sup>₱</sup><?php echo number_format($res['price'], 2); ?><small><br>*Per person</small>
									<p><a href="tour-details.php?packageId=<?php echo $res['packageId'] ?>" class="btn_1">Details</a>
									</p>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!--End strip -->
			<?php } ?>
			<?php if ($counter == 0): ?>
				<h3>No Packages available from <?php echo $_GET['from']; ?> to <?php echo $_GET['to']; ?>.</h3>
				<?php endif ?>


    


				

				<hr>

			</div>
			<!-- End col lg-9 -->
		</div>
		<!-- End row -->
	</div>
	<!-- End container -->
</main>


<?php include("includes/footer.php"); ?>
<script type="text/javascript">
	$('#collapseMap').on('shown.bs.collapse', function(e){
	(function(A) {

	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function(action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
			};

		})(Array.prototype);

		var
		mapObject,
		markers = [],
		markersData = {
	
			'Sightseeing': [
			<?php $qry = mysqli_query($connection, "select * from package_view");
			while ($res = mysqli_fetch_assoc($qry)) { 

				$qry2 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'");
				$res2 = mysqli_fetch_assoc($qry2);

			$qry1 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "'");
			while ($res1 = mysqli_fetch_assoc($qry1)) { ?>


			{
				name: '<?php echo $res['packageName'] ?>',
				location_latitude: <?php echo $res1['latitude']; ?>, 
				location_longitude: <?php echo $res1['longitude']; ?>,
				map_image_url: 'dashboard/<?php echo $res2['mediaLocation'] ?>',
				name_point: '<?php echo $res['packageName'] ?>',
				description_point: '<?php echo $res1['placeName'] ?>',
				get_directions_start_address: '',
				phone: '+3934245255',
				url_point: 'tour-details.php?packageId=<?php echo $res['packageId'] ?>'
			},
			
			<?php } } ?>
			]
			

		};


			var mapOptions = {
				zoom: 8,
				center: new google.maps.LatLng(7.1907, 125.4553),
				mapTypeId: google.maps.MapTypeId.ROADMAP,

				mapTypeControl: false,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.LEFT_CENTER
				},
				panControl: false,
				panControlOptions: {
					position: google.maps.ControlPosition.TOP_RIGHT
				},
				zoomControl: true,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.LARGE,
					position: google.maps.ControlPosition.TOP_LEFT
				},
				scrollwheel: false,
				scaleControl: false,
				scaleControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: true,
				streetViewControlOptions: {
					position: google.maps.ControlPosition.LEFT_TOP
				},
				styles: [
							 {
					"featureType": "landscape",
					"stylers": [
						{
							"hue": "#FFBB00"
						},
						{
							"saturation": 43.400000000000006
						},
						{
							"lightness": 37.599999999999994
						},
						{
							"gamma": 1
						}
					]
				},
				{
					"featureType": "road.highway",
					"stylers": [
						{
							"hue": "#FFC200"
						},
						{
							"saturation": -61.8
						},
						{
							"lightness": 45.599999999999994
						},
						{
							"gamma": 1
						}
					]
				},
				{
					"featureType": "road.arterial",
					"stylers": [
						{
							"hue": "#FF0300"
						},
						{
							"saturation": -100
						},
						{
							"lightness": 51.19999999999999
						},
						{
							"gamma": 1
						}
					]
				},
				{
					"featureType": "road.local",
					"stylers": [
						{
							"hue": "#FF0300"
						},
						{
							"saturation": -100
						},
						{
							"lightness": 52
						},
						{
							"gamma": 1
						}
					]
				},
				{
					"featureType": "water",
					"stylers": [
						{
							"hue": "#0078FF"
						},
						{
							"saturation": -13.200000000000003
						},
						{
							"lightness": 2.4000000000000057
						},
						{
							"gamma": 1
						}
					]
				},
				{
					"featureType": "poi",
					"stylers": [
						{
							"hue": "#00FF6A"
						},
						{
							"saturation": -1.0989010989011234
						},
						{
							"lightness": 11.200000000000017
						},
						{
							"gamma": 1
						}
					]
				}
				]
			};
			var
			marker;
			mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
			for (var key in markersData)
				markersData[key].forEach(function (item) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
						map: mapObject,
						icon: 'img/pins/' + key + '.png',
					});

					if ('undefined' === typeof markers[key])
						markers[key] = [];
					markers[key].push(marker);
					google.maps.event.addListener(marker, 'click', (function () {
      closeInfoBox();
      getInfoBox(item).open(mapObject, this);
      mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
     }));

	});
	
		function hideAllMarkers () {
			for (var key in markers)
				markers[key].forEach(function (marker) {
					marker.setMap(null);
				});
		};

		function closeInfoBox() {
			$('div.infoBox').remove();
		};

		function getInfoBox(item) {
			return new InfoBox({
				content:
				'<div class="marker_info" id="marker_info">' +
				'<img src="' + item.map_image_url + '" width="280px" alt="Image"/>' +
				'<h3>'+ item.name_point +'</h3>' +
				'<span>'+ item.description_point +'</span>' +
				'<div class="marker_tools">' +
				
					'<a href="'+ item.url_point + '" class="btn_infobox">Details</a>' +
				'</div>',
				disableAutoPan: false,
				maxWidth: 0,
				pixelOffset: new google.maps.Size(10, 125),
				closeBoxMargin: '5px -20px 2px 2px',
				closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
				isHidden: false,
				alignBottom: true,
				pane: 'floatPane',
				enableEventPropagation: true
			});


		};

    });
</script>
<script src="js/infobox.js"></script>


