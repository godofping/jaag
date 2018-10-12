<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Customers</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item">Notifications</li>
            <li class="breadcrumb-item"><a href="travel-and-tour.php">Travel and Tour</a></li>
            <li class="breadcrumb-item active"><a href="travel-and-tour.php">View Customers</a></li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>New Bookings</h2>
                    <div class="table-responsive m-t-20">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                	<th>Booking ID</th>
                                	<th>Package Name</th>
                                	<th>Travel Dates</th>
                                 	<th>Customer Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                
                                
                               		<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from booking_view order by bookingId DESC");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['bookingId']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate'] ?> to <?php echo $res['returnDate']; ?></td>
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><a href="view-travel-and-tour.php?travelAndTourId=<?php echo $res['travelAndTourId'] ?>"><button class="btn btn-success">View</button></a></td>
                         
                               
                                    
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<?php 
$qry = mysqli_query($connection, "select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
while ($res = mysqli_fetch_assoc($qry)) { ?>             


<!-- modal content -->
<div class="modal fade" id="addPaymentModal<?php echo $res['bookingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ADD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form method="POST" action="controller.php" enctype="multipart/form-data">
                <div class="container">
                    <?php
                    $totalAmountPaid = 0;
                     $qry1 = mysqli_query($connection, "select COALESCE(SUM(amount),0) as totalAmountPaid from payment_transaction_view where bookingId = '" . $res['bookingId'] . "' and paymentStatus = 'Recieved'"); $res1 = mysqli_fetch_assoc($qry1); ?>

                    <h4>Total Amount Paid: ₱<?php echo number_format($res1['totalAmountPaid'],2);$totalAmountPaid =  $res1['totalAmountPaid'];?></h4>

                    <?php $qry1 = mysqli_query($connection, "select * from booking_view where bookingId = '" . $res['bookingId'] . "'"); $res1 = mysqli_fetch_assoc($qry1); ?>


                    <h4>Outstanding Balance: ₱ <?php echo number_format($res1['price'] * $res1['numberOfPaxBooked'] - $totalAmountPaid ,2) ; ?></h4>

                    <br>

                    <div class="row">
          

                        <div class="col-md-4">
                            <label>Payment Type <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <select class="form-control" name="paymentType" required="">
                                    <option>Outstanding Payment</option>
                             
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Remittance <small style="color: red"> * required</small></label>
                                <select class="form-control" name="modeOfPaymentId" id="modeOfPaymentId" required="">
                                    <?php $qry23 = mysqli_query($connection, "select * from mode_of_payment_view"); while ($res23 = mysqli_fetch_assoc($qry23)) { ?>
                                            <option value="<?php echo $res23['modeOfPaymentId'] ?>"><?php echo $res23['paymentMode'] . " - " . $res23['nameOfRemittanceOrBank']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount <small style="color: red"> * required</small></label>
                                <input class="form-control" type="number" step="any" name="amount" required="">
                            </div>
                        </div>

                    </div>
                    

                    <div class="row">
                        

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sender <small style="color: red"> (optional)</small></label>
                                <input class="form-control" type="text" name="nameOfSender">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Transaction Code/ OR Number <small style="color: red"> (optional)</small></label>
                                <input class="form-control" type="text" name="transactionNumber">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Proof Image <small style="color: red"> (optional)</small></label>
                                <input class="form-control" type="file" name="mediaLocation">
                            </div>
                        </div>
                    </div>

 
            
                </div>
            <input type="text" name="from" value="add-payment-on-admin" hidden="">
            <input type="text" name="bookingId" value="<?php echo $res['bookingId'] ?>" hidden="">
            <input type="text" name="contactNumber" value="<?php echo $res['contactNumber'] ?>" hidden="">
            <input type="text" name="travelAndTourId" value="<?php echo $_GET['travelAndTourId'] ?>" hidden="">
            
         

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Submit</button>
                 </form>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 




<?php } ?>



<?php include("includes/footer.php") ?>