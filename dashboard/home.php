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
                                    <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>iMac</h6> </li>
                                <li>
                                    <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>iPhone</h6> </li>
                                    
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
                   
                    <h4 class="card-title m-b-0">Order Stats</h4>
                </div>
                <div class="card-body collapse show">
                <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                    <ul class="list-inline m-t-20 text-center">
                    <li >
                        <h6 class="text-muted"><i class="fa fa-circle text-info"></i> Order</h65>
                        <h4 class="m-b-0">8500</h4>
                    </li>
                    <li>
                        <h6 class="text-muted"><i class="fa fa-circle text-danger"></i> Pending</h6>
                        <h4 class="m-b-0">3630</h4>
                    </li>
                    <li>
                        <h6 class="text-muted"> <i class="fa fa-circle text-success"></i> Delivered</h6>
                        <h4 class="m-b-0">4870</h4>
                    </li>
                </ul>

                </div>
            </div>
        </div>
    </div>

<div class="row">
<div class="col-lg-6">
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Annoucements</h4>
             <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add</button>
        </div>



        <?php $qry = mysqli_query($connection, "SELECT * FROM posting_view ORDER BY postingId desc"); 
        while ($res = mysqli_fetch_assoc($qry)) { ?>
            <div class="comment-widgets m-b-20">
            <!-- Comment Row -->

                <div class="d-flex flex-row comment-row">

                    <div class="comment-text w-100">
                        <h5><?php echo  $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] . " (" . $res['accountType'] . ")"; ?></h5>
                                        <div class="comment-footer">
                                            <span class="date"><?php echo date("l, jS \of F Y",strtotime($res['datePosted'])); ?></span>
                                            <span class="action-icons">
                                                  <!--   <a data-toggle="modal" data-target="#updateModal<?php echo $res['postingId'] ?>"><i class="mdi mdi-pencil-circle"></i></a> -->
                                                    <a data-toggle="modal" data-target="#deleteModal<?php echo $res['postingId'] ?>"><i class="mdi mdi-delete"></i></a>
                                               
                                                </span>
                                        </div>

                           
           
                        <?php $qry1 = mysqli_query($connection, "select * from posting_media_view where postingId = '" . $res['postingId'] . "'"); $res1 = mysqli_fetch_assoc($qry1); ?>
                        <img class="img img-responsive" src="<?php echo $res1['mediaLocation'] ?>">
                        <div class="comment-footer">
                            
                        </div>
                            <p class="m-b-5 m-t-10"><?php echo $res['postingDescription']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>




    </div>
    <!-- Column -->
</div>

<div class="col-lg-6">
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reviews</h4>
         
        </div>



        <?php $qry = mysqli_query($connection, "SELECT * from comment_view"); 
        while ($res = mysqli_fetch_assoc($qry)) { ?>
            <div class="comment-widgets m-b-20">
            <!-- Comment Row -->

                    
                    <div class="comment-text w-100">
                          <span class="action-icons">
                            
                                <span data-toggle="modal" data-target="#deleteModal<?php echo $res['commentId'] ?>"><i class="mdi mdi-delete"></i></span>
                                               
                                                </span>
                        <hr>
                        <h5><?php echo  $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] . " (" . $res['accountType'] . ")"; ?></h5>
                        
                   
                     
                            <p class="m-b-5 m-t-10"><?php echo $res['commentInfo']; ?></p>
                            <hr>
                    </div>
            

            </div>

        <?php } ?>




    </div>
    <!-- Column -->
</div>
</div>


</div>


                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->


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
<div class="modal fade" id="deleteModal<?php echo $res['postingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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


<?php } ?>


<?php include("includes/footer.php") ?>


