<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>&nbsp;</title>
</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
<h2>Booking Schedules</h2>
	<table align="center" border="1px;">
              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th>Departure Date</th>
                                    <th>Return Date</th>
                                    <th>Pax</th>
                                    <th>Booked Slots</th>
                                    <th>Status</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from travel_and_tour_view");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['travelAndTourId']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td>₱<?php echo number_format($res['price'],2) ?></td>
                                    <td><?php echo $res['departureDate']; ?></td>
                                    <td><?php echo $res['returnDate']; ?></td>
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