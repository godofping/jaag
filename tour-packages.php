<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>


 <main>
		
		<section class="hero_in tours">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Tour Packages</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->


		<div class="container margin_60_35">



			<?php $qry = mysqli_query($connection, "select * from travel_and_tour_view");
			while ($res = mysqli_fetch_assoc($qry)) { ?>
			 	<!-- /box_list -->
				<div class="box_list">
					<div class="row no-gutters">
						<div class="col-lg-5">
							<figure>
								
								<?php $qry1 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "' LIMIT 1");
								$res1 = mysqli_fetch_assoc($qry1);?>
								<a href="tour-details.php?packageId=<?php echo $res['packageId']; ?>"><img src="dashboard/<?php echo $res1['mediaLocation'] ?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
							</figure>
						</div>
						<div class="col-lg-7">
							<div class="wrapper">
							
								<h3><a href="tour-details.php?packageId=<?php echo $res['packageId']; ?>"><?php echo $res['packageName']; ?></a></h3>
								<p><?php echo $res['packageDetails']; ?></p>
							<p>Departure: <?php echo date("l, jS \of F Y",strtotime($res['departureDate'])); ?> <br>
							Return: <?php echo date("l, jS \of F Y",strtotime($res['returnDate'])); ?></p>
							<p>Remaining Slots: 12 of 14</p>
								<span class="price">From <strong>₱<?php echo $res['price']; ?></strong> per person</span>
							</div>
					
						</div>
					</div>
				</div>
			<?php } ?>
			
			
			
		
		</div>

	</main>
	<!--/main-->

<?php include("includes/footer.php"); ?>