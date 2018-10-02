<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>&nbsp;</title>
</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
<h2>Cancellation</h2>
	<table align="center" border="1px;">
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
                            <?php $qry = mysqli_query($connection,"select * from booking_view where bookingStatus = 'Cancelled by the customer'");
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



</body>
</html>