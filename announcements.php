<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="img/bg_blog.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Announcements</h1>
				<p>Get updated with the latest announcements from JAAG</p>
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
					<li>Announcements</li>
				</ul>
			</div>
		</div>
		<!-- End position -->

		<div class="container margin_60">
			<div class="row">

				<div class="col-md-12">
					<div class="box_style_1">
			

						<hr>

						<?php 
						$qry = mysqli_query($connection, "select * from posting_view order by postingId DESC");
						while ($res = mysqli_fetch_assoc($qry)) { 
							$qry1 = mysqli_query($connection, "select * from posting_media_view where postingId = '" . $res['postingId'] . "'");
							$res1 = mysqli_fetch_assoc($qry1);
							?>
							<div class="post">
							<a href="blog_post_right_sidebar.html"><img src="dashboard/<?php echo $res1['mediaLocation'] ?>" alt="Image" class="img-responsive">
							</a>
							<div class="post_info clearfix">
								<div class="post-left">
									<ul>
										<li><i class="icon-calendar-empty"></i>Posted On <span><?php echo $res['datePosted']; ?></span>
										</li>
					
									</ul>
								</div>
						
							</div>
					
							<p>
								<?php echo $res['postingDescription']; ?>
							</p>
						
						</div>
						<!-- end post -->

						<hr>
						<?php } ?>

					
						<!-- end post -->
					</div>
					<hr>

				</div>
				<!-- End col-md-8-->

		

			</div>
			<!-- End row-->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

<?php include("includes/footer.php"); ?>