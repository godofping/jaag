<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>&nbsp;</title>
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet">
     <!-- Bootstrap Core CSS -->

    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
   <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    
</style>



</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
<br><br>

<img src="../assets/images/logo-blue.png" height="115px">
<h3 >JAAG TRAVEL AND TOURS</h3>
<h2>Statistical Report</h2>



                     <br>
                    <p  style="margin-top: -15px;"><?php
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
                        ?></p>

                        <div style="width: 720px;">
                            <div id="morris-area-chart2" style="height: 405px;"></div>
                        </div>

    <table align="center" border="2px;" style="margin-top: 50px;">
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
                                        <td>₱<?php 
                                        
                                            $total = 0;
                                            $qry16 = mysqli_query($connection, "SELECT *, WEEK(dateOfPayment)+1 AS weekOfPayment, DAYOFWEEK(dateOfPayment)-1 AS dayOfWeekOfPayment FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                            while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                if ($res16['weekOfPayment'] ==  $weekNumber and $res16['dayOfWeekOfPayment'] ==  $day) {
                                                    $total += $res16['amount'];
                                                }
                                            }
                                            echo number_format($total, 2); ?></td>
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
                                                    <td>₱<?php 
                                                        $total = 0;
                                                        $qry16 = mysqli_query($connection, "select * from payment_transaction_view where MONTH(dateOfPayment) = '" . $month . "' AND YEAR(dateOfPayment) = '" . $_GET['year'] . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                        while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                            $total += $res16['amount'];
                                                        }
                                                        echo  number_format($total, 2); ?></td>
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
                                            for ($year=2018; $year <= 2022 ; $year++) { ?>
                                                <tr>
                                                <td><?php echo $year; ?></td>
                                                <td>₱<?php 
                                                    $total = 0;
                                                    $qry16 = mysqli_query($connection, "select * from payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and paymentStatus = 'Recieved' and packageId = '" . $_GET['packageId'] . "'");
                                                    while ($res16 = mysqli_fetch_assoc($qry16)) {
                                                        $total += $res16['amount'];
                                                    }
                                                    echo number_format($total, 2); ?>
                                                        
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

<!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->



    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--Morris JavaScript -->
    <script src="../assets/plugins/raphael/raphael-min.js"></script>
    <script src="../assets/plugins/morrisjs/morris.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

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
        for ($year=2018; $year <= 2022 ; $year++) { ?>
            
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


</body>
</html>