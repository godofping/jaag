<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="home.php">Dashboard</a></li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-account-check text-info"></i></h2>
                            <h3 class=""><?php $qry = mysqli_query($connection, "SELECT count(*) as Total FROM profile_view WHERE accountTypeID = 4"); $res = mysqli_fetch_assoc($qry); echo $res['Total'] ?></h3>
                            <h6 class="card-subtitle">Online Customers</h6></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-account-circle text-info"></i></h2>
                            <h3 class=""><?php $qry = mysqli_query($connection, "SELECT count(*) as Total FROM profile_view WHERE accountTypeID = 3"); $res = mysqli_fetch_assoc($qry); echo $res['Total'] ?></h3>
                            <h6 class="card-subtitle">Walk-in Customers</h6></div>
                    </div>
                    </div>

            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-book text-info"></i></h2>
                            <h3 class=""><?php $qry = mysqli_query($connection, "SELECT count(*) as Total FROM booking_view WHERE dateBooked = '" . date('Y-m-d') . "'"); $res = mysqli_fetch_assoc($qry); echo $res['Total'] ?></h3>
                            <h6 class="card-subtitle">Today Bookings</h6></div>
                    </div>
                    </div>

            </div>
        </div>


<div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-account-circle text-info"></i></h2>
                            <h3 class=""><?php $qry = mysqli_query($connection, "SELECT count(*) as Total FROM payment_transaction_view WHERE dateOfPayment = '" . date('Y-m-d') . "'"); $res = mysqli_fetch_assoc($qry); echo $res['Total'] ?></h3>
                            <h6 class="card-subtitle">Today Payments Sent</h6></div>
                    </div>
                    </div>

            </div>
        </div>



    </div>
        
    <!-- Row -->
    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap">
                        <div>
                            <h4 class="card-title">Yearly Earning</h4>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li>
                                    <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Bookings Income</h6> </li>
                                <li>
                                  
                                    
                            </ul>
                        </div>
                    </div>
                    <div id="morris-area-chart2" style="height: 405px;"></div>

                </div>
            </div>

        </div>



        <div class="col-lg-4 col-md-5">
            <!-- Column -->
            <div class="card card-default">
                <div class="card-header">
                   
                    <h4 class="card-title m-b-0">Booking Stats</h4>
                </div>
                <div class="card-body collapse show">
                <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                    <ul class="list-inline m-t-20 text-center">
                    <li >
                        <h6 class="text-muted"><i class="fa fa-circle text-success"></i> Reserved - Pending Down Payment</h6>
                        <h4 class="m-b-0"><?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserved - Pending Down Payment'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?></h4>
                    </li>
                    <li>
                        <h6 class="text-muted"><i class="fa fa-circle text-info"></i> Reserve</h6>
                        <h4 class="m-b-0"><?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserve'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?></h4>
                    </li>
                    <li>
                        <h6 class="text-muted"> <i class="fa fa-circle text-danger"></i> Booked</h6>
                        <h4 class="m-b-0"><?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Booked'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?></h4>
                    </li>
                </ul>

                </div>
            </div>
        </div>
    </div>

<div class="row">

<div class="col-lg-6">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Annoucements</h4>
        <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add</button>
        <br>
        <br>
        <div class="message-box">
            <div class="message-widget message-scroll">
                <!-- Message -->
                <?php $qry = mysqli_query($connection, "SELECT * FROM posting_view ORDER BY postingId desc"); 
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <a>
                    
                 <div class="mail-contnet">
                    <h5><?php echo  $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] . " (" . $res['accountType'] . ")"; ?> <button class="btn btn-circle btn-warning" data-toggle="modal" data-target="#deletePostingModal<?php echo $res['postingId'] ?>"><i class="mdi mdi-delete"></i></button></h5> 
                        <span class="mail-desc">
                            <?php $qry1 = mysqli_query($connection, "select * from posting_media_view where postingId = '" . $res['postingId'] . "'"); $res1 = mysqli_fetch_assoc($qry1); ?>
                        <span class="time">Date Posted: <?php echo $res['datePosted']; ?></span>
                        <br>

                       
                        <img class="img img-responsive" src="<?php echo $res1['mediaLocation'] ?>">
                        <br><br>
                        </span>
                        <p><?php echo $res['postingDescription']; ?></p>
                            

                </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

    <!-- Column -->
</div>

<div class="col-lg-6">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Reviews</h4>
        <div class="message-box">
            <div class="message-widget message-scroll">
                <!-- Message -->
                <?php $qry = mysqli_query($connection, "SELECT * from comment_view"); 
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                        <a>
                         <div class="mail-contnet">
                                <h5><?php echo  $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] . " (" . $res['accountType'] . ")"; ?> <button class="btn btn-circle btn-warning" data-toggle="modal" data-target="#deleteModal<?php echo $res['commentId'] ?>"><i class="mdi mdi-delete"></i></button> <button class="btn btn-circle btn-info" data-toggle="modal" data-target="#replyModal<?php echo $res['commentId'] ?>"><i class="mdi mdi-reply"></i></button></h5>
                                
                                <span class="time">Date Posted: <?php echo $res['dateCommented']; ?></span>
                                
                                <br>
                                <span><?php echo $res['commentInfo']; ?></span> 
                                <?php if (!is_null($res['respond'])): ?>
                                     <hr>

                                <h4>Reply: <?php echo $res['respond']; ?></h4> 
                                 <?php endif ?>
                               


                                
                        </div>
                        </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

    <!-- Column -->
</div>

</div>


</div>




<!-- modal content -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php" enctype="multipart/form-data">
                    
                    <div class="row">

                        <div class="col-md-12">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="postingDescription" name="postingDescription" required="" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Image</label>
                            <div class="form-group">
                                <input type="file" name="mediaLocation" class="dropify" required="" />
                            </div>
                        </div>

                    </div>



                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-announcement" hidden="">


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


<?php $qry = mysqli_query($connection, "select * from posting_view"); while ($res = mysqli_fetch_assoc($qry)) { ?>

<!-- modal content -->
<div class="modal fade" id="updateModal<?php echo $res['postingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php" enctype="multipart/form-data">
                    
                    <div class="row">

                        <div class="col-md-12">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="postingDescription" name="postingDescription" required="" rows="3"><?php echo $res['postingDescription']; ?></textarea>
                            </div>
                        </div>

                        <?php $qry1 = mysqli_query($connection,"select * from posting_media_view where postingId = '" . $res['postingId'] . "'");
                        $res1 = mysqli_fetch_assoc($qry1); ?>

                        <div class="col-md-12">
                            <label>Image</label>
                            <div class="form-group">
                                <input type="file" name="mediaLocation" class="dropify" data-default-file="<?php echo $res1['mediaLocation'] ?>" />
                            </div>
                        </div>

                    </div>



                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-announcement" hidden="">
                <input type="text" name="postingId" value="<?php echo $res['postingId'] ?>" hidden="">


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

<!-- modal content -->
<div class="modal fade" id="deletePostingModal<?php echo $res['postingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <h2>Are you sure to delete?</h2>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="delete-announcement" hidden="">
                <input type="text" name="postingId" value="<?php echo $res['postingId']; ?>" hidden="">
                <input type="text" name="mediaId" value="<?php echo $res['mediaId'] ?>" hidden="">
               

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Yes</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 

<?php } ?>

<?php $qry = mysqli_query($connection, "SELECT * from comment_view"); 
        while ($res = mysqli_fetch_assoc($qry)) { ?>

            <!-- modal content -->
<div class="modal fade" id="deleteModal<?php echo $res['commentId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <h2>Are you sure to delete?</h2>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="delete-comment" hidden="">
                <input type="text" name="commentId" value="<?php echo $res['commentId']; ?>" hidden="">

               

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Yes</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 


            <!-- modal content -->
<div class="modal fade" id="replyModal<?php echo $res['commentId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Reply</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Message</label>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="respond" name="respond" required="" rows="3"></textarea>
                            </div>
                        </div>

                    </div> 
                

                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-reply" hidden="">
                <input type="text" name="commentId" value="<?php echo $res['commentId']; ?>" hidden="">

               

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

<br><br><br>

<?php include("includes/footer.php") ?>


<script type="text/javascript">

$(function () {
    "use strict";
    // ============================================================== 
    // Product chart
    // ============================================================== 
    Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '2015',
            Bookings: 152000,
        },{
            period: '2016',
            Bookings: 230000,
        },
        {
            period: '2017',
            Bookings: 200000,
        },
        {
            period: '2018',
            Bookings: <?php $qry15 = mysqli_query($connection, "SELECT coalesce(sum(amount),0) as result FROM payment_transaction_view WHERE paymentStatus = 'Recieved'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,
        }

        ],
        xkey: 'period',
        ykeys: ['Bookings'],
        labels: ['Bookings Income'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#b4becb', '#01c0c8'],
        behaveLikeLine: true,
        gridLineColor: 'rgba(120, 130, 140, 0.13)',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#b4becb', '#01c0c8'],
        resize: true
        
    });
   // ============================================================== 
   // Morris donut chart
   // ==============================================================       
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Reserved - Pending Down Payment",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserved - Pending Down Payment'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,

        }, {
            label: "Reserve",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserve'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,
        }, {
            label: "Booked",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Booked'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>
        }],
        resize: true,
        colors:['#26c6da', '#1976d2', '#ef5350']
    });
    // ============================================================== 
    // sales difference
    // ==============================================================
    
    // ============================================================== 
    // sparkline chart
    // ==============================================================
    var sparklineLogin = function() { 
       $('#sparklinedash').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#sparklinedash2').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          $('#sparklinedash3').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#03a9f3'
        });
           $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#f62d51'
        });
       
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
});


</script>

