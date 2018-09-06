<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>
<main>
<section class="hero_in contacts">
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span>View Profile</h1>
		</div>
	</div>
</section>

<?php $qry = mysqli_query($connection,"select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'");
$res = mysqli_fetch_assoc($qry);

 ?>

<div class="bg_color_1">
	<div class="container margin_80_55">
		<div class="row justify-content-between">
	
			<div class="col-lg-6">

				<h5><small>Name</small>: <?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></h5>
				<h5><small>Address</small>: <span style="text-transform: uppercase;"><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] . " " . $res['city'] . " " . $res['province']; ?></span></h5>
				<h5><small>Contact Number</small>: <?php echo $res['contactNumber']; ?></h5>
				<h5><small>Username</small>: <?php echo $res['userName']; ?></h5>
			
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /bg_color_1 -->


</main>

 <?php include("includes/footer.php"); ?>