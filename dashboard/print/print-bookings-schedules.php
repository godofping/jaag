<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>&nbsp;</title>
    <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
    <br>
    <br>
    <img src="../assets/images/logo-blue.png" height="80px">
<h3>JAAG TRAVEL AND TOURS</h3>
<h2>Booking Schedules</h2>

<?php 

$dates = explode('- ', $_GET['daterange']);
$date1 = date("Y-m-d", strtotime($dates[0]));
$date2 = date("Y-m-d", strtotime($dates[1]));

$string = "";



    if (isset($_GET['daterange']) and !empty($_GET['packageId'])) {
        $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
        $res13 = mysqli_fetch_assoc($qry13);
        $string =  "All booking Schedules from " . date("F Y", strtotime($date1)) . " to ". date("F Y", strtotime($date2)) ." with the package name: " . $res13['packageName'] ."";
    }
    else
    {
        $string =  "All booking Schedules from " . date("F d Y", strtotime($date1)) . " to " . date("F d Y", strtotime($date2))."";
    }



 ?>

<br>
                    <p style="margin-top: -15px;"><?php echo $string; ?></p>
    <table align="center" border="2px;">
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
                            <?php

                             if (empty($_GET['packageId'])) {
                                    $qry = mysqli_query($connection,"select * from travel_and_tour_view where departureDate between '" . $date1 . "' and '" . $date2 . "' AND returnDate between '" . $date1 . "' and '" . $date2 . "' ");

                                }
                                else
                                {
                                    $qry = mysqli_query($connection,"select * from travel_and_tour_view where  packageId like '%" . $_GET['packageId'] ."%' AND (departureDate between '" . $date1 . "' and '" . $date2 . "' AND returnDate between '" . $date1 . "' and '" . $date2 . "') ");

                                }

                  


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



</body>
</html>