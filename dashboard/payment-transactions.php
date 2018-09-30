<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Payments Transactions</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Billings</li>
                        <li class="breadcrumb-item active">Payments Transactions</li>
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
                                <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Travel and Tour ID</th>
                                    <th>Booking ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                                    <th>Proof Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
                                        $qry = mysqli_query($connection, "select * from payment_transaction_view");
                                        while ($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['paymentTransactionId']; ?></td>
                                                <td><?php echo $res['travelAndTourId']; ?></td>
                                                <td><?php echo $res['bookingId']; ?></td>
                                                <td><?php echo $res['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res['amount'],2); ?></td>
                                                <td><?php echo $res['dateOfPayment']; ?></td>
                                                <td><?php echo $res['transactionNumber']; ?></td>
                                                <td><?php echo $res['nameOfSender']; ?></td>
                                                <td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
                                                <td>
                                                    <?php $qry1 = mysqli_query($connection, "select * from payment_transaction_media_view where paymentTransactionId = '" . $res['paymentTransactionId'] . "'"); $res1 = mysqli_fetch_assoc($qry1);

                                                     ?>
                                                    <a  target="_blank" href="../<?php echo $res1['mediaLocation'] ?>">view image</a>
                                                </td>
                                                <td><?php echo $res['paymentStatus']; ?></td>
                                                <td><button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#updateModal<?php echo $res['paymentTransactionId']; ?>" <?php if ($res['paymentStatus'] == 'Recieved'): ?>
                                                    disabled
                                                <?php endif ?>>Update</button></td>
    

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

<?php $qry = mysqli_query($connection, "select * from payment_transaction_view");
while ($res = mysqli_fetch_assoc($qry)) { ?>
<!-- modal content -->
<div class="modal fade" id="updateModal<?php echo $res['paymentTransactionId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="form-group">
                                <select class="form-control" name="paymentStatus" required="">
                                   <!--  <option>Pending Confirmation</option> -->
                                    <option>Recieved</option>
                                    <option>Wrong Payment Details</option>
                                </select>
                            </div>
                            </div>

               
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-payment-transaction" hidden="">
                
                <input type="text" name="paymentType" value="<?php echo $res['paymentType'] ?>" hidden>
                <input type="text" name="paymentTransactionId" value="<?php echo $res['paymentTransactionId'] ?>"  hidden="">
                <input type="text" name="bookingId" value="<?php echo $res['bookingId'] ?>"  hidden="">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Submit</button>
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
<br><br>

<?php include("includes/footer.php") ?>