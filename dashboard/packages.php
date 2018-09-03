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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Packages</li>
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
                                    <th>Pax</th>
                                    <th>Inclusions</th>
                                    <th>Exclusions</th>
                                    <th>Price</th>
                                    <th>Images</th>
                                    <th>Status</th>
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
                                    <td><?php echo $res['pax']; ?></td>
                                    <td><?php echo $res['inclusion']; ?></td>
                                    <td><?php echo $res['exclusion']; ?></td>
                                    <td>images</td>
                                    <td><?php echo $res['statusDescription']; ?>
                                        <br><button type="button" class="btn btn-block btn-outline-info" data-toggle="modal" data-target="#updateStatusModal<?php echo $res['packageId']; ?>">Update</button>
                                    </td>
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
                            <div class="form-group">
                                <input type="text" class="form-control" id="packageDetails" name="packageDetails" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Pax</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="vanPlateNumber" name="vanPlateNumber" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Pax</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="vanPlateNumber" name="vanPlateNumber" required="">
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
                            <div class="form-group">
                                <input type="text" class="form-control" id="vanPackage Details" name="vanPackage Details" required="" value="<?php echo $res['vanPackage Details'] ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Pax</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="vanPlateNumber" name="vanPlateNumber" required="" value="<?php echo $res['vanPlateNumber'] ?>">
                            </div>
                        </div>
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-van" hidden="">
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
                <input type="text" name="from" value="delete-van" hidden="">
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
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
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
                                    <?php $qry1 = mysqli_query($connection,"select * from status_table where statusOfWhat like '%van_rental%'");
                                    while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                         <option value="<?php echo $res1['statusId'] ?>"><?php echo $res1['statusDescription'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-status-van" hidden="">
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