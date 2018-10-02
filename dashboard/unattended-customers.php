<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Unattended Customers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active"><a href="unattended-customers.php">Unattended Customers</a></li>
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
                <a href="print/print-unattended-customers.php" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                    <!-- <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add</button> -->
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from booking_view where isAttended = 2");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                         
                          
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
                

<br><br><br>
<?php include("includes/footer.php") ?>