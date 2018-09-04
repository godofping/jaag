<?php
include("includes/connection.php");
include("includes/header.php");
$qry = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
$res = mysqli_fetch_assoc($qry);

 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Images of "<?php echo  $res['packageName']; ?>"</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item"><a href="packages.php">Packages</a></li>
            <li class="breadcrumb-item active">Manage Images</li>
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
                    <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add</button>

                </div>
            </div>

                <div class="card-columns el-element-overlay">
                	<?php $qry2 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'");
                	while ($res2 = mysqli_fetch_assoc($qry2)) { ?>
                	<div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <a class="image-popup-vertical-fit" href="<?php echo $res2['mediaLocation'] ?>"> <img src="<?php echo $res2['mediaLocation'] ?>" alt="user" /> </a>
                            </div>
                            <div class="el-card-content">
                            	<div class="row">
                            		<div class="col-md-1"></div>
                            		<div class="col-md-5">
                            			<button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#updateModal<?php echo $res2['mediaId'] ?>">Update</button> 
                            		</div>
                            		<div class="col-md-5">
                            			 <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res2['mediaId'] ?>">Delete</button>
                            		</div>
                            		<div class="col-md-1"></div>
                            	</div>
                 
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
                </div>

                    

              

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
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
                <form action="controller.php" method="POST" class="" enctype="multipart/form-data">
                   
                    <input type="file" name="mediaLocation" class="dropify" required="" />

               
                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-package-image" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId']; ?>" hidden="">


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


<?php $qry = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "'");
while($res = mysqli_fetch_assoc($qry)) { ?>
	<!-- modal content -->
<div class="modal fade" id="updateModal<?php echo $res['mediaId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="controller.php" method="POST" class="" enctype="multipart/form-data">
                   
                    <input type="file" name="mediaLocation" class="dropify" required="" data-default-file="<?php echo $res['mediaLocation'] ?>" />

               
                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-package-image" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId']; ?>" hidden="">
                <input type="text" name="mediaId" value="<?php echo $res['mediaId']; ?>" hidden="">


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
<div class="modal fade" id="deleteModal<?php echo $res['mediaId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                <input type="text" name="from" value="delete-package-image" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId']; ?>" hidden="">
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


<?php include("includes/footer.php") ?>