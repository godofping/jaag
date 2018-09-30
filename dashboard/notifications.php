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
                                <?php
                                             $qry = mysqli_query($connection, "select * from notification_view where profileId = '" . $_SESSION['profileId'] . "' order by notificationId DESC LIMIT 10");



                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <a>
                                                
                                                    <div class="mail-contnet">
                                                    <h5><?php echo $res['notificationMessage']; ?></h5> <span class="mail-desc"></span> <span class="time"><small><?php echo $res['dateAndTime']; ?></small></span> </div>
                                                </a>
                                           <?php  } ?>




                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>