<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="img/header_bg.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Feedbacks</h1>
			<p>View and submit feedbacks</p>
		</div>
	</div>
</section>
<!-- End Section -->

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li>Feedbacks</li>
			</ul>
		</div>
	</div>
	<!-- End Position -->

	<div class="container margin_60">
		<div class="main_title">
			<h2>These are the <span>feedbacks </span>of the customers</h2>
	
		</div>
		<hr>
		<div class="row">
			<div class="col-md-9">
				<ul class="cbp_tmtimeline">
		<?php 
		$qry = mysqli_query($connection,"select * from comment_view order by commentId DESC");
		while ($res = mysqli_fetch_assoc($qry)) { ?>
			<li>
				<div class="cbp_tmlabel">
					<div class="pull-right hidden-xs">Feedback by <strong><?php echo $res['firstName']; ?></strong><br> <?php echo $res['dateCommented']; ?>
					</div>
				<br>
					<p><?php echo $res['commentInfo']; ?></p>
				</div>
			</li>
		<?php } ?>
		</ul>
			</div>

			<div class="col-md-3">
				<form method="POST" action="controller.php">
					<div class="box_style_1 expose">
						<h3 class="inner">Submit Feedback</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Feedback:</label>
									<textarea name="commentInfo" class="form-control" rows="5" required=""></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								
							</div>
						</div>
						
						<br>
						<input type="text" name="from" value="add-comment" hidden="">
						<input type="submit" class="btn_full" value="Submit">
					</div>
				</form>

			</div>
		</div>
	</div>
	<!-- End container -->
</main>

<?php include("includes/footer.php"); ?>