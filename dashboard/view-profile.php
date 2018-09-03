<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">View Profile</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Profile</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="assets/images/users/user.jpg" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $res['accountType']; ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                     
                                    </div>
                                </center>
                          
                                <hr> 
                            	<div class="card-body"> <small class="text-muted">Address</small>
	                                <h6><?php echo $res['buildingNumber'] .", " . $res['street'] . ", " . $res['barangay'] . ", " . $res['city'] . ", " . $res['province']; ?></h6> <small class="text-muted p-t-30 db">Contact Number</small>
	                                <h6><?php echo $res['contactNumber']; ?></h6> <small class="text-muted p-t-30 db">Username</small>
	                                <h6><?php echo $res['userName']; ?></h6>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>