<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Notifications</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
   
                        <li class="breadcrumb-item active"><a href="notifications.php">Notifications</a></li>
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

                                <table class="table">
                                    <tbody>
                                        
                                    
                                <?php
                                             $qry = mysqli_query($connection, "select * from notification_view where profileId = '" . $_SESSION['profileId'] . "' order by notificationId DESC");



                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <tr>
                                            <td style="background-color: <?php if ($res['isRead'] == 0): ?>
                                                    
                                                <?php endif ?><?php if ($res['isRead'] == 1): ?>
                                                    black
                                                <?php endif ?>">
                                                <a href="<?php if (strpos($res['notificationMessage'], 'New payment with the Payment ID:') === 0): ?>
                                                    controller.php?from=payment-transactions&notificationId=<?php echo $res['notificationId'] ?>
                                                <?php elseif (strpos($res['notificationMessage'], 'New Booking with the Booking ID:') === 0): ?>
                                                    controller.php?from=bookings-notifications&notificationId=<?php echo $res['notificationId'] ?>
                                                <?php endif ?>">
                                                    <div class="mail-contnet">
                                                    <h5><?php echo $res['notificationMessage']; ?></h5> <span class="mail-desc"></span> <span class="time" style="color: white;"><small><?php echo $res['dateAndTime']; ?></small></span>
                                                </div>

                                                </a>
                                            </td>
                                        </tr>
                                                <a>
                                                
                                                    
                                                </a>
                                           <?php  } ?>
                                           </tbody>

                                </table>

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>