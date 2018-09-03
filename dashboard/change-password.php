<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Change Password</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php $qry = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'");
                    $res = mysqli_fetch_assoc($qry); ?>
                
                <form method="POST" action="controller.php">
                    
                    <div class="row">
		                <div class="col-md-12">
		                    <label>Old Password</label>
		                    <div class="form-group">
		                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required="">
		                    </div>
		                </div>
                    </div>

                    <div class="row">
		                <div class="col-md-12">
		                    <label>New Password</label>
		                    <div class="form-group">
		                        <input type="password" class="form-control" id="newPassword" name="newPassword" required="">
		                    </div>
		                </div>
                    </div>

                    <div class="row">
		                <div class="col-md-12">
		                    <label>Confim New Password</label>
		                    <div class="form-group">
		                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required="">
		                    </div>
		                </div>
                    </div>


                    <!-- other hidden inputs -->
                    <input type="text" name="from" value="change-password" hidden="">
                    <input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
                    <input type="text" name="passWord" value="<?php echo $res['passWord'] ?>" hidden="">
  

                    <div class="row float-right">
                        <button type="submit" class="btn btn-success waves-effect">Submit</button>
                    </div>

                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>