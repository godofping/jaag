<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Booking Schedules</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active">Booking Schedules</li>
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
                <?php if (isset($_GET['month']) and isset($_GET['packageId'])): ?>
                <a href="print/print-bookings-schedules.php?month=<?php echo $_GET['month'] ?>&packageId=<?php echo $_GET['packageId'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                    <form method="GET">

                    <div class="row">
                        <div class="col-md-4">
                            <label>Month</label>
                            <div class="form-group">
                                <input class="form-control" type="month" name="month"  value="<?php echo date('Y-m') ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Package Name</label>
                            <div class="form-group">
                                <select class="form-control" name="packageId">
                                    <option value="">All package</option>
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
                        <div class="col-md-4">
                            <button class="btn btn-success m-t-20 waves-effect text-left">Search</button>
                        </div>
                    </div>

                </form>

                    <?php if (isset($_GET['month']) and isset($_GET['packageId'])): ?>
                        <br>
                        <h4><?php
                        $string = "";

                        if (isset($_GET['month']) and !empty($_GET['packageId'])) {
                            $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                            $res13 = mysqli_fetch_assoc($qry13);
                            echo "All booking Schedules on " . date("F Y", strtotime($_GET['month'])) . " with the package name: " . $res13['packageName'];
                        }
                        else
                        {
                            echo "All booking Schedules on " . date("F Y", strtotime($_GET['month'])) . "";
                        }


                        echo $string;
                        ?></h4>
                        <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Travel ID</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th>Travel Dates</th>
                                    <th>Pax</th>
                                    <th>Booked Slots</th>
                                    <th>Status</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from travel_and_tour_view where (departureDate like '%" . $_GET['month'] . "%' or returnDate like '%" . $_GET['month'] . "%')  and packageId like '%" . $_GET['packageId'] ."%'");

                  


                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['travelAndTourId']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td>₱<?php echo number_format($res['price'],2) ?></td>
                                    <td><?php echo $res['departureDate']; ?> to <?php echo $res['returnDate'] ?></td>
                                    <td><?php echo $res['maxPax']; ?></td>
                                    <td>
                                    <?php 
                                    $slotsTaken = 0;
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res['travelAndTourId'] . "'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    $slotsTaken =  $res13['slotsTaken'];
                                    echo $slotsTaken;
                                    ?>
                                    
                                     </td>
                                     <td><?php echo $res['travelAndTourStatus']; ?></td>
                                    
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif ?>
                </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                

<br><br><br>
<?php include("includes/footer.php") ?>