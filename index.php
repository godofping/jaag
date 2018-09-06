<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>
	
	<main>
		<section class="header-video">
			<div id="hero_video">
				<div class="wrapper">
				<div class="container">
					<img class="img img-responsive" src="img/logo-blue.png" height="200px">
					<h3>JAAG TRAVEL AND TOUR</h3>
					<p>travel while you can</p>
				
				</div>
			</div>
			</div>
			<img src="img/video_fix.png" alt="" class="header-video--media" data-video-src="video/intro.mp4" data-teaser-source="video/intro" data-provider="" data-video-width="1980" data-video-height="1080">
		</section>
		<!-- /header-video -->


		<div class="container-fluid margin_80_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Our Available Package</h2>
				<p>here is some of our packages.</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php
				$qry = mysqli_query($connection, "select * from travel_and_tour_view LIMIT 6");
				while ($res = mysqli_fetch_assoc($qry)) { 

					$qry1 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "' LIMIT 1");
					$res1 = mysqli_fetch_assoc($qry1);

					?>
				 <div class="item">
					<div class="box_grid">
						<figure>
					
							<a href="tour-details.php?packageId=<?php echo $res['packageId'] ?>"><img src="<?php echo "dashboard/". $res1['mediaLocation'];?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
							<!-- <small><?php echo $res['packageId']; ?></small> -->
						</figure>
						<div class="wrapper">
							<h3><a href="tour-details.php?packageId=<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></a></h3>
							<p><?php echo $res['packageDetails']; ?></p>
							<p>Departure: <?php echo date("l, jS \of F Y",strtotime($res['departureDate'])); ?> <br>
							Return: <?php echo date("l, jS \of F Y",strtotime($res['returnDate'])); ?></p>

							<span class="price">From <strong>₱<?php echo $res['price']; ?></strong> per person</span>
						</div>
				
					</div>
				</div>
				<!-- /item -->
				<?php } ?>
			
				
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="tour-packages.php" class="btn_1 rounded">View all Tours</a></p>
			</div>
			<!-- /container -->
			<hr class="large">
		</div>
		<!-- /container -->

		<div class="container-fluid margin_30_95 pl-lg-5 pr-lg-5">
			<section class="add_bottom_45">
				<div class="main_title_3">
					<span><em></em></span>
					<h2>Vans for Rentals</h2>
					<p>here is some of the van ready for rentals.</p>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6">
						<a href="hotel-detail.html" class="grid_item">
							<figure>
								<div class="score"><strong>8.9</strong></div>
								<img src="img/hotel_1.jpg" class="img-fluid" alt="">
								<div class="info">
									<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
									<h3>Toyota Hi-ace</h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
					
				</div>
				<!-- /row -->
				<a href="hotels-grid-isotope.html"><strong>View all (157) <i class="arrow_carrot-right"></i></strong></a>
			</section>
			<!-- /section -->
			
			<section>
				<div class="main_title_3">
					<span><em></em></span>
					<h2>Popular Restaurants</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6">
						<a href="restaurant-detail.html" class="grid_item">
							<figure>
								<div class="score"><strong>8.5</strong></div>
								<img src="img/restaurant_1.jpg" class="img-fluid" alt="">
								<div class="info">
									<h3>Da Alfredo</h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
					<div class="col-xl-3 col-lg-6 col-md-6">
						<a href="restaurant-detail.html" class="grid_item">
							<figure>
								<div class="score"><strong>7.9</strong></div>
								<img src="img/restaurant_2.jpg" class="img-fluid" alt="">
								<div class="info">
									<h3>Slow Food</h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
					<div class="col-xl-3 col-lg-6 col-md-6">
						<a href="restaurant-detail.html" class="grid_item">
							<figure>
								<div class="score"><strong>7.5</strong></div>
								<img src="img/restaurant_3.jpg" class="img-fluid" alt="">
								<div class="info">
									<h3>Bella Napoli</h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
					<div class="col-xl-3 col-lg-6 col-md-6">
						<a href="restaurant-detail.html" class="grid_item">
							<figure>
								<div class="score"><strong>9.0</strong></div>
								<img src="img/restaurant_4.jpg" class="img-fluid" alt="">
								<div class="info">
									<h3>Marcus</h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /row -->
				<a href="restaurants-grid-isotope.html"><strong>View all (157) <i class="arrow_carrot-right"></i></strong></a>
			</section>
			<!-- /section -->
		</div>
		<!-- /container -->
		


		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h3>Announcements</h3>
					<p>get updated</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_1.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Mark Twain</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Pri oportere scribentur eu</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_2.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Jhon Doe</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Duo eius postea suscipit ad</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_3.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Luca Robinson</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Elitr mandamus cu has</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_4.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Paula Rodrigez</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Id est adhuc ignota delenit</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all announcements</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>Enjoy a GREAT travel with us</h3>
							<p>We offer the cheapest tour packages and van rentals in the town.</p>
							<!-- <a href="#0" class="btn_1 rounded">Read more</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>
	<!-- /main -->

<?php include("includes/footer.php"); ?>