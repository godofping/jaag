<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<?php $qry = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'"); $res = mysqli_fetch_assoc($qry); 
$qry1 = mysqli_query($connection,"select * from package_media_view where packageId = '" . $res['packageId'] . "'");
$res1 = mysqli_fetch_assoc($qry1);
?>


<section class="parallax-window" data-parallax="scroll" data-image-src="dashboard/<?php echo $res1['mediaLocation'] ?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?php echo $res['packageName']; ?></h1>
						
					</div>
					<div class="col-md-4 col-sm-4">
						<div id="price_single_main">
							from/per person <span><sup> ₱</sup><?php echo number_format($res['price'],2); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End section -->

<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="home.php">Home</a>
					</li>
					<li><a>Tour Packages</a>
					</li>
					<li>Tour Details</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">


					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->

					<div class="row">
						<div class="col-md-3">

							<h3>Description</h3>
						</div>
						<div class="col-md-9">
							
							<h4><?php echo $res['packageName']; ?></h4>
							<h5>from/per person ₱<?php echo number_format($res['price'],2); ?></h5>
							<p>
								<?php echo $res['packageDetails']; ?>
							</p>
							
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<h4>INCLUSIONS</h4>
									<ul class="list_ok">
										<li><?php echo $res['inclusion']; ?></li>
										
									</ul>
								</div>

								<div class="col-md-6 col-sm-6">
									<h4>EXCLUSIONS</h4>
									<ul class="list_ok">
										<li><?php echo $res['exclusion']; ?></li>
										
									</ul>
								</div>
			
							</div>
							<!-- End row  -->

							
<div class="row magnific-gallery">	

							<?php 
							$counter = 0;
							$qry5 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'"); while ($res5 = mysqli_fetch_assoc($qry5)) { ?>

								<div class="col-md-4 col-sm-4">
									<div class="img_wrapper_gallery">
										<div class="img_container_gallery">
											<a href="dashboard/<?php echo $res5['mediaLocation'] ?>" title="Photo title"><img src="dashboard/<?php echo $res5['mediaLocation'] ?>" alt="Image" class="img-responsive">
												<i class="icon-resize-full-2"></i>
											</a>
										</div>
									</div>
								</div>

				
							<?php $counter++;?> 
							
<?php if ($counter % 3 == 0): ?>
		</div><div class="row magnific-gallery">		
<?php endif ?>	
						<?php } ?>
</div>			

						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-3">
							<h3>Schedule</h3>

						</div>
						<div class="col-md-9">
							<?php if (!isset($_SESSION['profileId'])): ?>
								<p>Please login for you able to book.</p>
							<?php endif ?>
							<div class=" table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Travel ID</th>
											<th>Travel Dates</th>
											<th>Slots Booked</th>
											<th>Status</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>
										<?php $qry3 = mysqli_query($connection, "select * from travel_and_tour_view where packageId = '" . $_GET['packageId'] . "' and travelAndTourStatus = 'Available'");
										while ($res3 = mysqli_fetch_assoc($qry3)) { ?>
										<tr>
											<td><?php echo $res3['travelAndTourId']; ?></td>
											<td><?php echo $res3['departureDate']; ?> - <?php echo $res3['returnDate']; ?></td>
										
											<td>0/<?php echo $res3['maxPax']; ?></td>
											<td><?php echo $res3['travelAndTourStatus']; ?></td>
											<td><?php if (isset($_SESSION['profileId'])): ?>
												<a href="booking.php?travelAndTourId=<?php echo $res3['travelAndTourId'] ?>"><button class="btn btn-info">Book</button></a>
											<?php endif ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						
						</div>
					</div>

					<hr>

				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4">
					<p class="hidden-sm hidden-xs">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
				
			
				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
		
	<div id="overlay"></div>
	<!-- Mask on input focus -->
		
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
			<?php
			$lat = 7.1907;
			$long = 125.4553;
			 $qry = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
			while ($res = mysqli_fetch_assoc($qry)) { 

				$qry2 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'");
				$res2 = mysqli_fetch_assoc($qry2);

			$qry1 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "'");
			while ($res1 = mysqli_fetch_assoc($qry1)) { 
				$lat = $res1['latitude'];
				$long = $res1['longitude']
				?>


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
				zoom: 10,
				center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
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


