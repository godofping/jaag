<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>

<main>
		<section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Reviews</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			
			<div class="row">

				<div class="col-md-8">


					<?php $qry = mysqli_query($connection, "select * from comment_view");while ($res = mysqli_fetch_assoc($qry)) {  ?>
					<article class="blog wow fadeIn">
						<div class="margin_60_35 text-center">
							<p><?php echo $res['commentInfo']; ?></p>
							<p>- <?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></p>

						</div>
					</article>
					<?php } ?>

				</div>

				<div class="col-md-4">
					<?php if (isset($_SESSION['profileId'])): ?>
					
					
						<div class="widget">
						<form method="POST" action="controller.php">
								
									<div class="col-md-12">
										<div class="form-group">
									<label>Leave a review</label>
									<textarea class="form-control" name="commentInfo" required="" rows="5"></textarea>
									
									</div>
									</div>
								<input type="text" name="from" value="add-comment" hidden="">
								<button type="submit" id="submit" class="btn_1 rounded"> Submit</button>
							
								
							</form>
						</div>
				
					
					<?php endif ?>
				</div>


				
			
					


			</div>
		</div> <!-- container -->
			
	
	</main>
	<!--/main-->
		<?php include("includes/footer.php"); ?>