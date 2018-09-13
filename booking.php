<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<?php 

$qry4 = mysqli_query($connection, "select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
$res4 = mysqli_fetch_assoc($qry4);

$qry = mysqli_query($connection, "select * from package_view where packageId = '" . $res4['packageId'] . "'"); $res = mysqli_fetch_assoc($qry); 
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
							<h5>Travel Dates: <strong><?php echo $res4['departureDate']; ?> - <?php echo $res4['returnDate']; ?></strong></h5>

							<h5>from/per person ₱<?php echo number_format($res['price'],2); ?></h5>

							<h5>Slots Booked: <?php 
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res4['travelAndTourId'] . "' AND bookingStatus = 'Reserved - Pending Outstanding Payment' OR bookingStatus = 'Officially Reserved'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    echo $res13['slotsTaken'];

                                    ?>/<?php echo $res4['maxPax']; ?></h5>
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


				


				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4">
					<p class="hidden-sm hidden-xs">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>

					<div class="box_style_1">
				
						<form>
							<h3 class="inner">- Booking -</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Pax Number</label>
										<select class="form-control" name="paxNumber" id="paxNumber">
											<?php 
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res4['travelAndTourId'] . "' AND bookingStatus = 'Reserved - Pending Outstanding Payment' OR bookingStatus = 'Officially Reserved'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    for ($i=1; $i <=  $res4['maxPax'] - $res13['slotsTaken'] ; $i++) { ?>
                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                	<?php } ?>
										</select>
									</div>
								</div>
				
							</div>
			
							<hr>
							<input type="text" name="from" value="add-booking-1" hidden="">
							<button type="submit" class="btn_full" id="theButton" onclick="showBelowDiv()">Book now</button>
							<button type="button" class="btn_full" id="changeButton" onclick="displayButton()" style="display: none;">Change</button>

						
					</div>
					<!--/box_style_1 -->
					</form>
			<div class="row" id="belowDiv" style="display: none;">
		<aside class="col-md-12">
			<div class="box_style_1">
				<h3 class="inner">- Billing Statement -</h3>
				<table class="table table_summary">
					<tbody>
						<tr>
							<td>
								Pax Number
							</td>
							<td class="text-right">
								<span id="paxNumberSpan"></span>
							</td>
						</tr>
						<tr>
							<td>
								Package Cost
							</td>
							<td class="text-right">
								₱<?php echo number_format($res['price'],2); ?>
							</td>
						</tr>
						
						
						<tr class="total">
							<td>
								Total cost
							</td>
							<td class="text-right">
								₱<span id="costSpan"></span>
							</td>
						</tr>
					</tbody>
				</table>
				<p>For down payment please pay ₱<span id="downpayment"></span>.</p>
				<p>For full payment please pay ₱<span id="fullpayment"></span>.</p>

				<form method="POST" action="controller.php">
				<input type="text" name="travelAndTourId" value="<?php echo $res4['travelAndTourId']; ?>" hidden = "">
				<input type="text" name="paxNumber" id="paxNumberFinal" hidden="">
				<input type="text" name="from" value="add-booking-online-customer" hidden="">
				<button type="submit" class="btn_full">Confirm Booking</button>
				</form>

			</div>

		</aside>

	
		<!-- End aside -->
	</div>
	<!-- end belowDiv -->
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
	function showBelowDiv() {
		var paxNumber = document.getElementById("paxNumber").value;
		

		if (paxNumber) {

			var x = document.getElementById("belowDiv");
			var theButton = document.getElementById("theButton");
			var changeButton = document.getElementById("changeButton");

		    if (x.style.display === "none") {
		        x.style.display = "block";
		        document.getElementById("theButton").disabled = true;

		       	theButton.style.display = "none";
		       	changeButton.style.display = "block";
		        document.getElementById("paxNumber").disabled = true;

		        calculate();
		        
		    } else {
		        x.style.display = "none";
		    }
		}

	}

	function displayButton() {
		var x = document.getElementById("belowDiv");
		var theButton = document.getElementById("theButton");
		var changeButton = document.getElementById("changeButton");

		x.style.display = "none";
		changeButton.style.display = "none";
		theButton.style.display = "block";
		document.getElementById("theButton").disabled = false;
		document.getElementById("paxNumber").disabled = false;
	}

	function calculate() {
		var paxNumber = document.getElementById("paxNumber").value;

		document.getElementById("paxNumberFinal").value = paxNumber;
		
		document.getElementById("paxNumberSpan").textContent = paxNumber ;

		document.getElementById("costSpan").textContent = (paxNumber * <?php echo $res['price']; ?>).toFixed(2);


		document.getElementById("downpayment").textContent = ((paxNumber * <?php echo $res['price']; ?>) * .50).toFixed(2);

		document.getElementById("fullpayment").textContent = (paxNumber * <?php echo $res['price']; ?>).toFixed(2);

	}


</script>



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
			 $qry = mysqli_query($connection, "select * from package_view where packageId = '" . $res4['packageId'] . "'");
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


