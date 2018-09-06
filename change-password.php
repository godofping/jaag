<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>
<main>
<section class="hero_in contacts">
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span>Change Password</h1>
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

				
				<form autocomplete="off" method="POST" action="controller.php">
				<div class="form-group">
					<label>Old Password</label>
					<input class="form-control" type="password" name="oldPassword" id="oldPassword" required="">
				</div>

				<div class="form-group">
					<label>New Password</label>
					<input class="form-control" type="password" name="newPassword" id="newPassword" required="">
				</div>

				<div class="form-group">
					<label>Confirm New Password</label>
					<input class="form-control" type="password" name="confirmNewPassword" id="confirmNewPassword" required="">
				</div>



				
				<div id="pass-info" class="clearfix"></div>
				<button  class="btn_1 rounded  float-center"  type="submit">Update</button>
			
				<input type="text" name="from" value="update-password" hidden="">
				<input type="text" name="passWord" value="<?php echo $res['passWord'] ?>" hidden="">
				<input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
			

			

				</form>
			
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /bg_color_1 -->


</main>

 <?php include("includes/footer.php"); ?>

 