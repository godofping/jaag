<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<section class="parallax-window" data-parallax="scroll" data-image-src="img/header_bg.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>About us</h1>
			
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
				<li>About Us</li>
			</ul>
		</div>
	</div>
	<!-- End Position -->

	<div class="container margin_60">

		<div class="main_title">
			<h2>Some <span>good </span>reasons</h2>
			<p>why you need to choose us..</p>
		</div>



		<div class="row">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-41"></i>
                        <h3><span>+20</span> Premium tours</h3>
                        <p>
                            Variety of package tours to choose from.
                        </p>
                       
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-30"></i>
                        <h3><span>+1000</span> Customers</h3>
                        <p>
                            More than 1000 happy customers is satisfied with our services.
                        </p>
                     
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <i class="icon-money"></i>
                        <h3><span>Affordable </span> Prices</h3>
                        <p>
                            Jaag offers the cheapest travel and tour packages in the town.
                        </p>
                     
                    </div>
                </div>

            </div>
            <!--End row -->
		<!-- End row -->
	</div>
	<!-- End container -->

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 nopadding features-intro-img">
				<div class="features-bg">
					<div class="features-img"></div>
				</div>
			</div>
			<div class="col-md-6 nopadding">
				<div class="features-content">
					<h3>"About Us"</h3>
					<p>JAAG Travel and Tours aims to provide services to those customers that want to experience to visit tourist spot of different. <br>Last 28th of November 2015 at Blk.4 Lot 28, Yellow Village Subdivision New Isabela Tacurong City, Sultan Kudarat, JAAG Travel and Tours starts operating led by Arra Mae Agusan. JAAG Travel and Tours aims to provide services to those customers that want to experience to visit tourist spot of different places. JAAG Travel and Tours consist of Sales and Marketing Department that has 8 employees, 12 drivers. </p>

					
				</div>
			</div>
		</div>
	</div>
	<!-- End container-fluid  -->

	<div class="container margin_60">

		<div class="main_title">
			<h2>What <span>customers </span>says</h2>
			
		</div>

		<div class="row">

		<?php 
		$qry = mysqli_query($connection,"select * from comment_view order by commentId DESC LIMIT 4");
		while ($res = mysqli_fetch_assoc($qry)) { ?>

			<div class="col-md-6">
				<div class="review_strip">
			
					<h5>Feedback by <?php echo $res['firstName']; ?></h5>
					<p>
						<?php echo $res['commentInfo']; ?>
					</p>
			
				</div>
				<!-- End review strip -->
			</div>

		<?php } ?>

		</div>
		<!-- End row -->

	
		
	</div>
	<!-- End Container -->
</main>
<!-- End main -->





<?php include("includes/footer.php"); ?>


