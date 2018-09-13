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
            <li class="breadcrumb-item">Bookings</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
         
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   
                                    <th>Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                   <!--  <td>
                                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#updateModal<?php echo $res['placeId']; ?>">Update</button>
                                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['placeId']; ?>">Delete</button>
                                    </td> -->
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

<!-- modal content -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Place Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="placeName" name="placeName" required="">
                            </div>
                            </div>

                        <div class="col-md-12">
                            <label>Latitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="latitude" name="latitude" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="longitude" name="longitude" required="">
                            </div>
                        </div>
                    </div>



                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-place" hidden="">


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

<?php 
$qry = mysqli_query($connection, "select * from place_view");
while ($res = mysqli_fetch_assoc($qry)) { ?>             
<!-- modal content -->
<div class="modal fade" id="updateModal<?php echo $res['placeId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                            <label>Place Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="placeName" name="placeName" required="" value="<?php echo $res['placeName'] ?>">
                            </div>
                            </div>

                        <div class="col-md-12">
                            <label>Latitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="latitude" name="latitude" required="" value="<?php echo $res['latitude'] ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="longitude" name="longitude" required="" value="<?php echo $res['longitude'] ?>">
                            </div>
                        </div>
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-place" hidden="">
                <input type="text" name="placeId" value="<?php echo $res['placeId'] ?>"  hidden="">

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
<div class="modal fade" id="deleteModal<?php echo $res['placeId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                <input type="text" name="from" value="delete-place" hidden="">
                <input type="text" name="placeId" value="<?php echo $res['placeId'] ?>" hidden="">

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