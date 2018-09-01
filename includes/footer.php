	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="img/logo_2x.png" width="150" height="36" data-retina="true" alt=""></p>
					<p>JAAG Travel and Tour and Van Rentals offers the cheapest tour packages and van rentals in the town!</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="https://www.facebook.com/jaagtravelandtour23/"><i class="ti-facebook"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="about.php">About</a></li>
						<?php if (!isset($_SESSION['customerId'])): ?>
							<li><a href="login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
						<?php endif ?>
						<li><a href="announcement.php">Announcements</a></li>
						<li><a href="reviews.php">Reviews</a></li>
			
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://639972609952"><i class="ti-mobile"></i> + 63 997 260 9952</a></li>
						<li><a href="mailto:info@jaag.com"><i class="ti-email"></i> info@jaag.com</a></li>
					</ul>
					
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						
						
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2018 JAAG</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<?php if (!isset($_SESSION['customerId'])): ?>
		<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
			<form method="POST" action="controller.php">
				<div class="sign-in-wrapper">

				
					<div class="form-group">
						<label>UserName</label>
						<input type="text" class="form-control" name="userName" id="userName" required="">
						<i class="icon_mail_alt"></i>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="passWord" id="passWord" required="">
						<i class="icon_lock_alt"></i>
					</div>

					<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
					<div class="text-center">
						Don’t have an account? <a href="register.php">Sign up</a>
					</div>
					
				</div>
				<input type="text" name="from" value="login" hidden="">
			</form>
			<!--form -->
		</div>
		<!-- /Sign In Popup -->
	<?php endif ?>

	<?php if (isset($_SESSION['customerId'])): ?>
		<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Log Out</h3>
		</div>
			<form method="POST" action="controller.php">
				<div class="sign-in-wrapper">

					<h4>Are you sure to Log Out?</h4>

					<div class="text-center"><input type="submit" value="Yes, Log Out" class="btn_1 full-width"></div>
					
					
				</div>
				<input type="text" name="from" value="logout" hidden="">
			</form>
			<!--form -->
		</div>
		<!-- /Sign In Popup -->
	<?php endif ?>
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/video_header.js"></script>
	<script>
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>

	<script src="js/toastr/toastr.js"></script>
	<script src="js/toastr.js"></script>

	<?php 
	if (isset($_SESSION['do'])): ?>

        <script>
            <?php if ($_SESSION['do'] == 'added'): ?>
            toastr["success"]("Successfully added!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated'): ?>
                toastr["success"]("Successfully updated!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'deleted'): ?>
                toastr["success"]("Successfully deleted!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated-password-failed'): ?>
                toastr["error"]("Update password failed! Please try again.", "Error");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'login-failed'): ?>

                toastr["error"]("Login Failed! Wrong account.", "Error");
            <?php endif ?>

            <?php if ($_SESSION['do'] == 'Success'): ?>
            toastr["success"]("Login Success!", "Message");
            <?php endif ?>
        </script>



    <?php endif ?>



 		<?php
        if (isset($_SESSION['do'])) {
            unset($_SESSION['do']);
        }
        ?>

        
	
	
</body>
</html>