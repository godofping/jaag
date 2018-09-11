<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="img/header_bg.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
		<div class="animated fadeInDown">
			<h1>Feedbacks</h1>
			<p>Feedbacks of the customers</p>
		</div>
	</div>
</section>
<!-- End Section -->

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="#">Home</a>
				</li>
				<li><a href="#">Category</a>
				</li>
				<li>Page active</li>
			</ul>
		</div>
	</div>
	<!-- End Position -->

	<div class="container margin_60">
		<div class="main_title">
			<h2>Detailed <span>timeline </span>for Louvre Tour</h2>
			<p>
				Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
			</p>
		</div>
		<hr>
		<ul class="cbp_tmtimeline">
			<li>
				<time class="cbp_tmtime" datetime="09:30"><span>30 minutes</span> <span>09:30</span>
				</time>
				<div class="cbp_tmicon timeline_icon_point"></div>
				<div class="cbp_tmlabel">
					<div class="pull-right hidden-xs">Guide <strong>John Doe</strong><img src="img/guide_1.jpg" alt="Image" class="img-circle speaker">
					</div>
					<h2><span>Lorem ipsum</span>Meeting point</h2>
					<p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean black-eyed pea maize eggplant. </p>
				</div>
			</li>
			<li>
				<time class="cbp_tmtime" datetime="11:30"><span>2 hours</span> <span>11:30</span>
				</time>
				<div class="cbp_tmicon timeline_icon_pic"></div>
				<div class="cbp_tmlabel">
					<div class="pull-right hidden-xs">Guide <strong>John Doe</strong><img src="img/guide_2.jpg" alt="Image" class="img-circle speaker">
					</div>
					<h2><span>Lorem ipsum</span>Exhibitions</h2>
					<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
				</div>
			</li>
			
		</ul>
	</div>
	<!-- End container -->
</main>

<?php include("includes/footer.php"); ?>