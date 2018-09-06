
<header class="header menu_fixed">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
		<div id="logo">
			<a href="index.php">
				<img src="img/logo_2x.png" width="150" height="36" data-retina="true" alt="" class="logo_normal">
				<img src="img/logo_sticky.png" width="150" height="36" data-retina="true" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
		
			<?php if (!isset($_SESSION['profileId'])): ?>
				<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
			<?php endif ?>

			<?php if (isset($_SESSION['profileId'])): ?>
				<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Log Out">Log Out</a></li>
			<?php endif ?>
		
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="index.php">Home</a></span></li>
				<li><span><a href="#">Services</a></span>
				<ul>
					<li><a href="tour-packages.php">Tour Packages</a></li>
					<li><a href="van-rentals.php">Van Rentals</a></li>
				</ul></li>
				<li><span><a href="van-rentals.php">Announcements</a></span></li>
				<li><span><a href="van-rentals.php">Reviews</a></span></li>
				<li><span><a href="van-rentals.php">About</a></span></li>
				<?php if (isset($_SESSION['profileId'])): ?>
					<li><span><a href="#0">My Account</a></span>
					<ul>
						<li><a href="my-bookings.php">My Bookings</a></li>
						<li><a href="view-profile.php">View Profile</a></li>
						<li><a href="update-profile.php">Update Profile</a></li>
						<li><a href="change-password.php">Change Password</a></li>
					</ul>
				</li>
				<?php endif ?>

				<?php if (!isset($_SESSION['profileId'])): ?>
					<li><span><a href="register.php">Create Account</a></span></li>
				<?php endif ?>

			</ul>
		</nav>
</header>
	<!-- /header -->