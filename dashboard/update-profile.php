<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Update Profile</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                        <div class="col-md-4">
                            <label>First Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName" required="" value="<?php echo $res['firstName'] ?>">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="middleName" name="middleName" required="" value="<?php echo $res['middleName'] ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName" required="" value="<?php echo $res['lastName'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Building Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="buildingNumber" name="buildingNumber" required="" value="<?php echo $res['buildingNumber'] ?>">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Street</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street" name="street" value="<?php echo $res['street'] ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Barangay</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo $res['barangay'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="city" name="city" required="" value="<?php echo $res['firstName'] ?>">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Province</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="province" name="province" required="" value="<?php echo $res['firstName'] ?>">
                            </div>
                        </div>

                    
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>Contact Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required="" value="<?php echo $res['contactNumber'] ?>">
                            </div>
                        </div>
                    </div>

                    <!-- other hidden inputs -->
                    <input type="text" name="from" value="update-profile" hidden="">
                    <input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
                    <input type="text" name="addressId" value="<?php echo $res['addressId'] ?>" hidden="">

                    <div class="row float-right">
                        <button type="submit" class="btn btn-success waves-effect">Submit</button>
                    </div>

                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>