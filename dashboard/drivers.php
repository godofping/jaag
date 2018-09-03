<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Drivers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Drivers</li>
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
                                <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target=".bs-example-modal-lg">Add</button>
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
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

                <!-- sample modal content -->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Add</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="controller.php">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>First Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="driverFirstName" name="driverFirstName" required="">
                                                            </div>
                                                            </div>

                                                        <div class="col-md-4">
                                                            <label>Middle Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="driverMiddleName" name="driverMiddleName" required="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Last Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="driverLastName" name="driverLastName" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Address</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="driverAddress" name="driverAddress" required="">
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Contact Number</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="driverContactNumber" name="driverContactNumber" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- other hidden inputs -->


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
                

<?php include("includes/footer.php") ?>