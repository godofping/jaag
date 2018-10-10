<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">ADD BOOKING SCHEDULE</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bookings</li>
            <li class="breadcrumb-item active">Add Booking</li>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
         
            

                <div id="travelAndtourForm">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="controller.php">
                
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Package</label>
                                    <div class="form-group">
                                        <select class="form-control" name="packageId" id="packageId" required="">
                                            <?php $qry = mysqli_query($connection, "select * from package_table order by packageName ASC");
                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Number of Pax</label>
                                    <div class="form-group">
                                        <input type="int" max="999" min="1" class="form-control" id="maxPax" name="maxPax" required="">
                                    </div>
                                </div>
                            </div>

 
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Departure and Return Date</label>
                                    <div class="form-group">
                                        <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
                                    </div>
                                </div>
                            </div>
                            
                            <!-- other hidden inputs -->
                            <input type="text" name="from" value="add-booking-travel" hidden="">
                           

                            <div class="row  float-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div> <!-- end tour -->



                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->



<?php include("includes/footer.php") ?>

