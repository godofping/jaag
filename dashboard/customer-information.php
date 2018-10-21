<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Customer Information</h3>

    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Reports</li>
            <li class="breadcrumb-item active">Customer Information</li>
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
    

    <?php if (!isset($_GET['accountType'])): ?>
        <a href="print/print-customer-information.php" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a>
    <?php endif ?>
    <?php if (isset($_GET['accountType'])): ?>
        <a href="print/print-customer-information.php?accountType=<?php echo $_GET['accountType'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a>
    <?php endif ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <a href="customer-information.php?accountType=Online Customer"><button class="btn btn-info">View All Online Customers</button></a> <a href="customer-information.php?accountType=Walk-in Customer"><button class="btn btn-info">View All Walk-in Customers</button></a> <a href="customer-information.php"><button class="btn btn-info">View All Customers</button></a>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Account Type</th>
                                    <th>View</th>
             
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if (isset($_GET['accountType']) and $_GET['accountType'] == 'Walk-in Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3");
                            }
                            elseif (isset($_GET['accountType']) and $_GET['accountType'] == 'Online Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 4");
                            }else
                            {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3 or accountTypeId = 4");
                            }
                            



                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['profileId']; ?></td>
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] . " " . $res['city'] . " " . $res['province']; ?></td>
                                    <td><?php echo $res['contactNumber']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                    <td><button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#viewModal<?php echo $res['profileId'] ?>">View</button></td>

                                  
                           
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    

    <?php 
    if (isset($_GET['accountType']) and $_GET['accountType'] == 'Walk-in Customer') {
        $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3");
    }
    elseif (isset($_GET['accountType']) and $_GET['accountType'] == 'Online Customer') {
        $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 4");
    }else
    {
        $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3 or accountTypeId = 4");
    }


    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <!-- modal content -->
<div class="modal fade" id="viewModal<?php echo $res['profileId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bookings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                
                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Travel ID</th>
                                                <th>Package Name</th>
                                              
                                                <th>Travel Dates</th>
                                                <th>Package Price</th>
                                                <th>Booked Slots</th>

                                                <th>Booking Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php 

                                $qry1 = mysqli_query($connection,"select * from booking_view where profileId = '" . $res['profileId'] . "'");


                                    while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                <tr>
                                    <td><?php echo $res1['travelAndTourId']; ?></td>
                                    <td><?php echo $res1['packageName']; ?></td>
                                  
                                    <td><?php echo $res1['departureDate']; ?> to <?php echo $res1['returnDate'] ?></td>
                                 
                                    <td>₱<?php echo number_format($res1['price'],2) ?></td>
                                    <td>
                                    <?php 
                                    $slotsTaken = 0;
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res1['travelAndTourId'] . "'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    $slotsTaken =  $res13['slotsTaken'];
                                    echo $slotsTaken;
                                    ?>
                                    
                                     </td>
                                     <td><?php echo $res1['bookingStatus']; ?></td>
                                    
                                </tr>
                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>



            </div>
            <div class="modal-footer">
          
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
<?php } ?>


<?php include("includes/footer.php") ?> 