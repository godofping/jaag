<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Booking Schedules</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active">Booking Schedules</li>
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
               
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                                    <th>Proof Image</th>
                                    <th>Status</th>
                                 
                            
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
                                        $qry1 = mysqli_query($connection, "select * from payment_transaction_view where profileId = '" . $res['profileId'] . "' and travelAndTourId = '" . $res['travelAndTourId'] . "'");
                                        while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                            <tr>
                                                <td><?php echo $res1['paymentTransactionId']; ?></td>
    
                                                <td><?php echo $res1['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res1['amount'],2); ?></td>
                                                <td><?php echo $res1['dateOfPayment']; ?></td>
                                                <td><?php echo $res1['transactionNumber']; ?></td>
                                                <td><?php echo $res1['nameOfSender']; ?></td>
                                                <td><?php echo $res1['paymentMode']." " .$res1['nameOfRemittanceOrBank']; ?></td>
                                                <td><?php echo "select * from payment_transaction_media_view where paymentTransactionId = '" . $res1['paymentTransactionId'] . "'"; ?>
                                                    <?php $qry12 = mysqli_query($connection, "select * from payment_transaction_media_view where paymentTransactionId = '" . $res1['paymentTransactionId'] . "'"); $res12 = mysqli_fetch_assoc($qry12);

                                                     ?>
                                                    <a  target="_blank" href="../<?php echo $res12['mediaLocation'] ?>">view image</a>
                                                </td>
                                                <td><?php echo $res1['paymentStatus']; ?></td>
                                               
    

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
                


<?php include("includes/footer.php") ?>