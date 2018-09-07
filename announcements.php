<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>

<main>
<div class="hero_in cart_section">
		<div class="wrapper">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>My Bookings</h1>
				</div>
				
					
				</span>
			</div>
		</div>
	</div>
	<!--/hero_in-->
<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h3>Announcements</h3>
					<p>get updated</p>
				</div>
				<div class="row">

					<?php $qry = mysqli_query($connection, "SELECT * FROM posting_view ORDER BY postingId desc");while ($res = mysqli_fetch_assoc($qry)) {  ?>
					<div class="col-lg-12">
						<a class="box_news" href="#0">
							<?php $qry1 = mysqli_query($connection, "select * from posting_media_view where postingId = '" . $res['postingId'] . "'"); $res1 = mysqli_fetch_assoc($qry1); ?>

							<figure><img src="dashboard/<?php echo $res1['mediaLocation'] ?>" alt="">
								
							</figure>
							<ul>
								<li><?php echo  $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] . " (" . $res['accountType'] . ")"; ?></li>
								<li><?php echo date("l, jS \of F Y",strtotime($res['datePosted'])); ?></li>
							</ul>
							
							<p><?php echo $res['postingDescription']; ?></p>
						</a>
					</div>
					<?php } ?>
					
				</div>
				<!-- /row -->
			
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
</main>
		<?php include("includes/footer.php"); ?>