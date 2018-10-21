<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Statistical Report</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active"><a href="statistical-reports.php">Statistical Report</a></li>
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
                    <a href="print/print-statistical-reports.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>&week=<?php echo $_GET['week'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>

                <?php if ($_GET['frequency'] == 'monthly'): ?>
                    <a href="print/print-statistical-reports.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>&year=<?php echo $GET['year'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
                <?php endif ?>

                <?php if ($_GET['frequency'] == 'yearly'): ?>
                    <a href="print/print-statistical-reports.php?frequency=<?php echo $_GET['frequency'] ?>&packageId=<?php echo $_GET['packageId'] ?>" target="blank"><button class="btn btn-info btn-sm mr5"  style="margin-bottom: 20px;">Print</button></a> 
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
                        $string = "";

                     
                            if ($_GET['frequency'] == 'weekly') {

                                $week = explode('-', $_GET['week']);
                                $year = $week[0];
                                $weekNumber = substr($week[1],1);

                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Week ". $weekNumber ." in " . $year ." statistical reports of the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'monthly') {
                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo $_GET['year'] . " monthly statistical reports of the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'yearly') {
                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Yearly statistical reports of the package name: " . $res13['packageName'];
                            }
                  
                        


                        echo $string;
                        ?></h4>
                     
                 
                        <div id="morris-area-chart2" style="height: 405px;"></div>
                        <br>



                        <div class="table-responsive m-t-20">
                        <table class="table">

                                       <?php if ($_GET['frequency']=='weekly'): ?>
                                           <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Income</th>
                                                    <th>Number of customers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    <?php  $last_sunday = strtotime('last Sunday');
                                    
                                    for ($day=1; $day <= 7 ; $day++) { 
                                        $dow_numeric = $day;

                                        $week = explode('-', $_GET['week']);
                                        $year = $week[0];
                                        $weekNumber = substr($week[1],1);
                                        $dow_text = date('l', strtotime('+'.$dow_numeric.' day', $last_sunday));

                                        ?>
                                        <tr>
                                        <td><?php echo $dow_text; ?> (<?php echo date('Y-m-d', strtotime($year."W".$weekNumber.$day)); ?>)</td>
                                        <td><?php 
                                        
                                            $total = 0;
                                            $qry16 = mysqli_query($connection, "SELECT *, WEEK(dateOfPayment)+1 AS weekOfPayment, DAYOFWEEK(dateOfPayment)-1 AS dayOfWeekOfPayment FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                            while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                if ($res16['weekOfPayment'] ==  $weekNumber and $res16['dayOfWeekOfPayment'] ==  $day) {
                                                    $total += $res16['amount'];
                                                }
                                            }
                                            echo "₱" . number_format($total, 2); ?></td>
                                        <td><?php 
                                        
                                            $total = 0;
                                            $qry16 = mysqli_query($connection, "SELECT *, WEEK(dateOfPayment)+1 AS weekOfPayment, DAYOFWEEK(dateOfPayment)-1 AS dayOfWeekOfPayment FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                            while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                if ($res16['weekOfPayment'] ==  $weekNumber and $res16['dayOfWeekOfPayment'] ==  $day) {
                                                    $total += $res16['numberOfPaxBooked'];
                                                }
                                            }
                                            echo $total; ?></td>
                                        </tr>
                                        <?php } ?>
                                       <?php endif ?>

                                       <?php if ($_GET['frequency']=='monthly'): ?>
                                            <thead>
                                                <tr>
                                                    <th>Month and Year</th>
                                                    <th>Income</th>
                                                    <th>Number of customers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                for ($month=1; $month <= 12 ; $month++) { ?>
                                                    <tr>
                                                        <td><?php echo date("F", strtotime($_GET['year']."-".$month)); ?> <?php echo $_GET['year']; ?></td>
                                                    <td><?php 
                                                        $total = 0;
                                                        $qry16 = mysqli_query($connection, "select * from payment_transaction_view where MONTH(dateOfPayment) = '" . $month . "' AND YEAR(dateOfPayment) = '" . $_GET['year'] . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                        while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                            $total += $res16['amount'];
                                                        }
                                                        echo "₱" . number_format($total, 2); ?></td>
                                                    <td><?php 
                                                        $total = 0;
                                                        $qry16 = mysqli_query($connection, "select * from payment_transaction_view where MONTH(dateOfPayment) = '" . $month . "' AND YEAR(dateOfPayment) = '" . $_GET['year'] . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                        while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                            $total += $res16['numberOfPaxBooked'];
                                                        }
                                                        echo $total; ?></td>
                                                    </tr>
                                                <?php } ?>
                                       <?php endif ?>

                                       <?php if ($_GET['frequency']=='yearly'): ?>
                                            <thead>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Income</th>
                                                    <th>Number of customers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                            for ($year=2017; $year <= 2022 ; $year++) { ?>
                                                <tr>
                                                <td><?php echo $year; ?></td>
                                                <td><?php 
                                                    $total = 0;
                                                    $qry16 = mysqli_query($connection, "select * from payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                    while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                        $total += $res16['amount'];
                                                    }
                                                    echo "₱" . number_format($total, 2); ?>
                                                        
                                                </td>
                                                <td><?php 
                                                    $total = 0;
                                                    $qry16 = mysqli_query($connection, "select * from payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                    while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                        $total += $res16['numberOfPaxBooked'];
                                                    }
                                                    echo $total; ?>
                                                        
                                                    </td>
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
                        <label>Year</label>
                        <div class="form-group">
                            <select class="form-control" name="year">
                         
                                <?php

                                for ($year=2017; $year <= 2022 ; $year++) { ?>
                                 ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php } ?>
                            </select>
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

<script type="text/javascript">

$(function () {
    "use strict";

<?php if (isset($_GET['frequency']) and $_GET['frequency'] == 'weekly') { ?>


    //start area
    Morris.Area({
        element: 'morris-area-chart2',
        data: [  <?php  
            $last_sunday = strtotime('last Sunday');
        
        for ($day=1; $day <= 7 ; $day++) { 
            $dow_numeric = $day;

            $week = explode('-', $_GET['week']);
            $year = $week[0];
            $weekNumber = substr($week[1],1);
            $dow_text = date('l', strtotime('+'.$dow_numeric.' day', $last_sunday));

            ?>
        
            {
            period: '<?php echo date('Y-m-d', strtotime($year."W".$weekNumber.$day)); ?>',
            a: '<?php 
            
                $total = 0;
                $qry16 = mysqli_query($connection, "SELECT *, WEEK(dateOfPayment)+1 AS weekOfPayment, DAYOFWEEK(dateOfPayment)-1 AS dayOfWeekOfPayment FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    if ($res16['weekOfPayment'] ==  $weekNumber and $res16['dayOfWeekOfPayment'] ==  $day) {
                        $total += $res16['amount'];
                    }
                }
                echo $total; ?>',
            b: '<?php 
            
                $total = 0;
                $qry16 = mysqli_query($connection, "SELECT *, WEEK(dateOfPayment)+1 AS weekOfPayment, DAYOFWEEK(dateOfPayment)-1 AS dayOfWeekOfPayment FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    if ($res16['weekOfPayment'] ==  $weekNumber and $res16['dayOfWeekOfPayment'] ==  $day) {
                        $total += $res16['numberOfPaxBooked'];
                    }
                }
                echo $total; ?>',
            },<?php } ?>

        ],
        xkey: 'period',
        ykeys: ['a','b'],
        labels: ['Income', 'Number of customers'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#55ce63', '#1a76d8'],
        behaveLikeLine: true,
        gridLineColor: 'rgba(120, 130, 140, 0.13)',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#ccff33', '#01c0c8'],
        resize: true
        
    });
    //end area


<?php } ?>

<?php if (isset($_GET['frequency']) and $_GET['frequency'] == 'monthly') { ?>

    //start area
    Morris.Area({
        element: 'morris-area-chart2',
        data: [  <?php 
        for ($month=1; $month <= 12 ; $month++) { ?>
            
            {
            period: '<?php echo $_GET['year']."-".$month; ?>',
            a: <?php 
                $total = 0;
                $qry16 = mysqli_query($connection, "select * from payment_transaction_view where MONTH(dateOfPayment) = '" . $month . "' AND YEAR(dateOfPayment) = '" . $_GET['year'] . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    $total += $res16['amount'];
                }
                echo $total; ?>,
            b: <?php 
                $total = 0;
                $qry16 = mysqli_query($connection, "select * from payment_transaction_view where MONTH(dateOfPayment) = '" . $month . "' AND YEAR(dateOfPayment) = '" . $_GET['year'] . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    $total += $res16['numberOfPaxBooked'];
                }
                echo $total; ?>,
            },

        <?php } ?>

        ],
        xkey: 'period',
        ykeys: ['a','b'],
        labels: ['Income', 'Number of customers'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#55ce63', '#1a76d8'],
        behaveLikeLine: true,
        gridLineColor: 'rgba(120, 130, 140, 0.13)',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#ccff33', '#01c0c8'],
        resize: true
        
    });
    //end area



<?php } ?>

<?php if (isset($_GET['frequency']) and $_GET['frequency'] == 'yearly') { ?>


    //start area
    Morris.Area({
        element: 'morris-area-chart2',
        data: [  <?php 
        for ($year=2017; $year <= 2022 ; $year++) { ?>
            
            {
            period: '<?php echo $year; ?>',
            a: <?php 
                $total = 0;
                $qry16 = mysqli_query($connection, "select * from payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    $total += $res16['amount'];
                }
                echo $total; ?>,
            b: <?php 
                $total = 0;
                $qry16 = mysqli_query($connection, "select * from payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                while ($res16 = mysqli_fetch_assoc($qry16)) {
                    $total += $res16['numberOfPaxBooked'];
                }
                echo $total; ?>,
            },

        <?php } ?>

        ],
        xkey: 'period',
        ykeys: ['a','b'],
        labels: ['Income', 'Number of customers'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#55ce63', '#1a76d8'],
        behaveLikeLine: true,
        gridLineColor: 'rgba(120, 130, 140, 0.13)',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#ccff33', '#01c0c8'],
        resize: true
        
    });
    //end area





<?php } ?>

});


</script>