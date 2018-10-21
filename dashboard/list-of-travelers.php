<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">List of Travelers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active"><a href="statistical-reports.php">List of Travelers</a></li>
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

                <?php if (isset($_GET['frequency']) and isset($_GET['packageId'])): ?>
                
                <?php if ($_GET['frequency'] == 'weekly'): ?>
                    <a href="print/print-list-of-travelers.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>&week=<?php echo $_GET['week'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>

                <?php if ($_GET['frequency'] == 'monthly'): ?>
                    <a href="print/print-list-of-travelers.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>&monthly=<?php echo $_GET['monthly'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>

                <?php if ($_GET['frequency'] == 'yearly'): ?>
                    <a href="print/print-list-of-travelers.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>&year=<?php echo $_GET['year'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>


                <?php endif ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#weeklyModal">Weekly</button>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#monthlyModal">Monthly</button>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#yearlyModal">Yearly</button>
                                </div>
                            </div>

                

                <?php if (isset($_GET['frequency']) and isset($_GET['packageId'])): ?>
                        <br>
                        <h4><?php
               

                     
                            if ($_GET['frequency'] == 'weekly') {

                                $week = explode('-', $_GET['week']);
                                $year = $week[0];
                                $weekNumber = substr($week[1],1);

                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Week ". $weekNumber ." of " . $year ." customers list in the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'monthly') {
                                $yearmonth = explode('-', $_GET['monthly']);

                                $year = $yearmonth[0];
                                $month = $yearmonth[1];

                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo  date("F", strtotime($_GET['monthly'])) . " " . $year . " customers list in the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'yearly') {
                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Year " . $_GET['year'] . " customers list in the package name: " . $res13['packageName'];
                            }
                  
                        


                        ?></h4>
                     
                 
             


                        <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">

                        <?php if ($_GET['frequency']=='weekly'): ?>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tour ID</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                                    <th>Attendance</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   
                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $year . "' and packageId = '" . $_GET['packageId'] . "' and WEEK(dateBooked) = '" . ($weekNumber-1) . "'");

                              
                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['travelAndTourId']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate']; ?> to <?php echo $res['returnDate']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                    <td><?php if ($res['isAttended'] == '0') {
                                        echo "TBA";
                                    }elseif ($res['isAttended']=='1') {
                                        echo "Present";
                                    }elseif ($res['isAttended']=='2') {
                                        echo "Absent";
                                    } ?></td>
                          
                                </tr>
                                        <?php } ?>
                            <?php endif ?>

                            <?php if ($_GET['frequency']=='monthly'): ?>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                                    <th>Attendance</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   

                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $year . "' and packageId = '" . $_GET['packageId'] . "' and MONTH(dateBooked) = '" . $month . "'");

                              
                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate']; ?> to <?php echo $res['returnDate']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                    <td><?php if ($res['isAttended'] == '0') {
                                        echo "TBA";
                                    }elseif ($res['isAttended']=='1') {
                                        echo "Present";
                                    }elseif ($res['isAttended']=='2') {
                                        echo "Absent";
                                    } ?></td>
                         
                          
                                </tr>
                                        <?php } ?>
                            <?php endif ?>

                            <?php if ($_GET['frequency']=='yearly'): ?>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                                    <th>Attendance</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   

                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $_GET['year'] . "' and packageId = '" . $_GET['packageId'] . "'");

                              
                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate']; ?> to <?php echo $res['returnDate']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                    <td><?php if ($res['isAttended'] == '0') {
                                        echo "TBA";
                                    }elseif ($res['isAttended']=='1') {
                                        echo "Present";
                                    }elseif ($res['isAttended']=='2') {
                                        echo "Absent";
                                    } ?></td>
                         
                          
                                </tr>
                                        <?php } ?>
                            <?php endif ?>

                                
                            </tbody>
                        </table>
                        </div>


                    </div>
                    <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
             
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

<!-- modal content -->
<div class="modal fade" id="weeklyModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Weekly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="GET">

                <div class="row">

                    <div class="col-md-12">
                        <label>Package Name</label>
                        <div class="form-group">
                            <select class="form-control" name="packageId" required="">
                         
                                <?php
                                $qry = mysqli_query($connection,"select * from package_view");
                                while ($res = mysqli_fetch_assoc($qry)) { ?>
                                    <option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>Month and Year</label>
                        <div class="form-group">
                            <input class="form-control" type="week" name="week" required="">
                        </div>
                    </div>

                </div>

                     


                <!-- other hidden inputs -->
                <input type="text" name="frequency" value="weekly" hidden="">


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
<div class="modal fade" id="monthlyModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Monthly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="GET">

                <div class="row">
                    <div class="col-md-12">
                        <label>Package Name</label>
                        <div class="form-group">
                            <select class="form-control" name="packageId" required="">
                         
                                <?php
                                $qry = mysqli_query($connection,"select * from package_view");
                                while ($res = mysqli_fetch_assoc($qry)) { ?>
                                    <option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Month</label>
                        <div class="form-group">
                            <input class="form-control" name="monthly" required="" type="month">
                        </div>
                    </div>
                </div>

                     


                <!-- other hidden inputs -->
                <input type="text" name="frequency" value="monthly" hidden="">


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
<div class="modal fade" id="yearlyModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Yearly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="GET">

                <div class="row">
                    <div class="col-md-12">
                        <label>Package Name</label>
                        <div class="form-group">
                            <select class="form-control" name="packageId">
                         
                                <?php
                                $qry = mysqli_query($connection,"select * from package_view");
                                while ($res = mysqli_fetch_assoc($qry)) { ?>
                                    <option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Package Name</label>
                        <div class="form-group">
                            <select class="form-control" name="year">
                                <?php 
                                    for ($year=2017; $year <= 2022 ; $year++)  { ?>
                                        <option><?php echo $year; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                </div>

                
                <!-- other hidden inputs -->
                <input type="text" name="frequency" value="yearly" hidden="">


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
