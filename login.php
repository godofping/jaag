<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<main>
<section id="hero" class="login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            	<div id="login">
                		<div class="text-center"><img src="img/logo_sticky.png" alt="Image" data-retina="true" ></div>
                        <hr>
                        <form method="POST" action="controller.php">
                        <div class="row">
                        </div> <!-- end row -->
                      
                   
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class=" form-control" name="userName" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class=" form-control" name="passWord" placeholder="Password" required="">
                            </div>
                       		<input type="text" name="from" value="login" hidden="
                       		">

                            <?php if (isset($_GET['packageId'])): ?>
                                <input type="text" name="packageId" value="<?php echo $_GET['packageId'] ?>" hidden="
                            ">

                            <?php endif ?>
                            <button type="submit" class="btn_full">Sign in</button>
                            <a href="register.php " class="btn_full_outline">Register</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End main -->


<?php include("includes/footer.php"); ?>