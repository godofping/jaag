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
<h2>Booking Schedules</h2>

<?php 
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



</body>
</html>