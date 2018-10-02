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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="morris-area-chart2" style="height: 405px;"></div>


                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>

<script type="text/javascript">

$(function () {
    "use strict";
    // ============================================================== 
    // Product chart
    // ============================================================== 
    Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '2015',
            Bookings: 152000,
        },{
            period: '2016',
            Bookings: 230000,
        },
        {
            period: '2017',
            Bookings: 200000,
        },
        {
            period: '2018',
            Bookings: <?php $qry15 = mysqli_query($connection, "SELECT coalesce(sum(amount),0) as result FROM payment_transaction_view WHERE paymentStatus = 'Recieved'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,
        }

        ],
        xkey: 'period',
        ykeys: ['Bookings'],
        labels: ['Bookings Income'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#b4becb', '#01c0c8'],
        behaveLikeLine: true,
        gridLineColor: 'rgba(120, 130, 140, 0.13)',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#b4becb', '#01c0c8'],
        resize: true
        
    });
   // ============================================================== 
   // Morris donut chart
   // ==============================================================       
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Reserved - Pending Down Payment",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserved - Pending Down Payment'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,

        }, {
            label: "Reserve",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Reserve'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>,
        }, {
            label: "Booked",
            value: <?php $qry15 = mysqli_query($connection, "SELECT COUNT(*) as result FROM booking_view WHERE bookingStatus = 'Booked'"); $res15 = mysqli_fetch_assoc($qry15); echo $res15['result']; ?>
        }],
        resize: true,
        colors:['#26c6da', '#1976d2', '#ef5350']
    });
    // ============================================================== 
    // sales difference
    // ==============================================================
    
    // ============================================================== 
    // sparkline chart
    // ==============================================================
    var sparklineLogin = function() { 
       $('#sparklinedash').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#sparklinedash2').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          $('#sparklinedash3').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#03a9f3'
        });
           $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#f62d51'
        });
       
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
});


</script>
