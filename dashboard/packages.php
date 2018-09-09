<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Packages</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active"><a href="packages.php">Packages</a></li>
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
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package Name</th>
                                    <th>Package Details</th>
                                    <th>Destinations</th>
                                    <th>Inclusions</th>
                                    <th>Exclusions</th>
                                    <th>Price</th>
                                    <th>Images</th>
                                  
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from package_view");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['packageId']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['packageDetails']; ?></td>
                                    <td>
                                        Destination(s): <?php $qry2 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "'");
                                        while ($res2 = mysqli_fetch_assoc($qry2)) {
                                             echo $res2['placeName'] . "<br>";
                                         } ?>

                                    </td>
                                    <td><?php echo $res['inclusion']; ?></td>
                                    <td><?php echo $res['exclusion']; ?></td>
                                    <td>‎₱<?php echo number_format($res['price'], 2); ?></td>
                                    <td><a href="view-package-images.php?packageId=<?php echo $res['packageId'] ?>"><button type="button" class="btn btn-block btn-outline-primary">Manage</button></a></td>
                         
                                    <td>
                                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#updateModal<?php echo $res['packageId']; ?>">Update</button>
                                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['packageId']; ?>">Delete</button>
                                    </td>
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
                            <label>Package Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="packageName" name="packageName" required="">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <label>Package Details</label>
                            <textarea class="form-control" rows="3" name="packageDetails" id="packageDetails" required=""></textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Destinations</label>
                            <div class="form-group">
                                <select class="select2 m-b-10 select2-multiple form-control" style="width: 100%;" multiple name="places[]" data-placeholder="Choose" required="">
                                        <?php $qry1 = mysqli_query($connection, "select * from place_view");
                                        while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                            <option value="<?php echo $res1['placeId'] ?>"><?php echo $res1['placeName']; ?></option>
                                        <?php } ?>                     
                                </select>
                            </div>            
                        </div>


                        <div class="col-md-6">
                            <label>Inclusions</label>
                            <textarea class="form-control" rows="3" name="inclusion" id="inclusion" required=""></textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Exclusions</label>
                            <textarea class="form-control" rows="3" name="exclusion" id="exclusion" required=""></textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Price</label>
                            <div class="form-group">
                                <input type="number" min="0" step="any" class="form-control" id="price" name="price" required="">
                            </div>
                        </div>


                    </div>



                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-package" hidden="">


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
$qry = mysqli_query($connection, "select * from package_view");
while ($res = mysqli_fetch_assoc($qry)) { ?>             
<!-- modal content -->
<div class="modal fade" id="updateModal<?php echo $res['packageId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                            <label>Package Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="packageName" name="packageName" required="" value="<?php echo $res['packageName'] ?>">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <label>Package Details</label>
                            <textarea class="form-control" rows="3" name="packageDetails" id="packageDetails" required=""><?php echo $res['packageDetails'] ?></textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Destinations</label>
                            <div class="form-group">
                                <select class="select2 m-b-10 select2-multiple form-control" style="width: 100%;" multiple name="places[]" data-placeholder="Choose" required="">
                                        <?php $qry1 = mysqli_query($connection, "select * from place_view");
                                        while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                            <option value="<?php echo $res1['placeId'] ?>" <?php $qry4 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "' and placeId = '" . $res1['placeId'] . "'"); if (mysqli_num_rows($qry4) > 0): ?>
                                                selected
                                            <?php endif ?>><?php echo $res1['placeName']; ?></option>
                                        <?php } ?>                     
                                </select>
                            </div>            
                        </div>


                        <div class="col-md-6">
                            <label>Inclusions</label>
                            <textarea class="form-control" rows="3" name="inclusion" id="inclusion" required=""><?php echo  $res['inclusion']; ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Exclusions</label>
                            <textarea class="form-control" rows="3" name="exclusion" id="exclusion" required=""><?php echo $res['exclusion']; ?></textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Price</label>
                            <div class="form-group">
                                <input type="number" min="0" step="any" class="form-control" id="price" name="price" required="" value="<?php echo $res['price'] ?>">
                            </div>
                        </div>


                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-package" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>"  hidden="">
              

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
<div class="modal fade" id="deleteModal<?php echo $res['packageId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                <input type="text" name="from" value="delete-package" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>" hidden="">
         

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

<div class="modal fade" id="updateStatusModal<?php echo $res['packageId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Change</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="form-group">
                                <select class="form-control custom-select" id="statusId" name="statusId">
                                        <option value="<?php echo $res['statusId'] ?>" selected disabled><?php echo $res['statusDescription']; ?></option>
                                    <?php $qry1 = mysqli_query($connection,"select * from status_table where statusOfWhat like '%package_table%'");
                                    while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                         <option value="<?php echo $res1['statusId'] ?>"><?php echo $res1['statusDescription'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-status-package" hidden="">
                <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>"  hidden="">

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

<?php include("includes/footer.php") ?>