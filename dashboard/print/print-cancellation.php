<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>&nbsp;</title>

</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">


<img src="../assets/images/logo-blue.png" height="80px">
<h3>JAAG TRAVEL AND TOURS</h3>
<h2>Cancellation</h2>


                    <?php 
                    $string = "";
                     if (isset($_GET['travelAndTourId']) and !empty($_GET['travelAndTourId'])) {
                        $qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "' and (bookingStatus = 'Cancelled by the customer' or bookingStatus = 'Cancelled by the system')");
                         $qry1 = mysqli_query($connection,"select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");



                         $res1 = mysqli_fetch_assoc($qry1);

                        $string = "List of cancelled travelers in the Package Name: " . $res1['packageName'] . " and with the travel dates " . $res1['departureDate'] . " to " . $res1['returnDate'] . "";


                    }
                    else
                    {
                        if (isset($_GET['travelAndTourId'])) {
                            $qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'  and (bookingStatus = 'Cancelled by the customer' or bookingStatus = 'Cancelled by the system')");
                        $string = "No result.";
                        }
                    }
                     ?>

                     <br>
                    <p  style="margin-top: -15px;"><?php echo $string; ?></hp>
    <table align="center" border="2px;">
             <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php 

                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate']; ?> to <?php echo $res['returnDate']; ?></td>
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