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

<br><br>
<img src="../assets/images/logo-blue.png" height="80px">
<h3>JAAG TRAVEL AND TOURS</h3>
<h2>Unattended Customers</h2>



                     <br>
                    <p  style="margin-top: -15px;"><?php
                        $string = "";

                     
                            if ($_GET['frequency'] == 'weekly') {

                                $week = explode('-', $_GET['week']);
                                $year = $week[0];
                                $weekNumber = substr($week[1],1);

                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Week ". $weekNumber ." of " . $year ." unattended customers list in the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'monthly') {
                                $yearmonth = explode('-', $_GET['monthly']);

                                $year = $yearmonth[0];
                                $month = $yearmonth[1];

                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo  date("F", strtotime($_GET['monthly'])) . " " . $year . " unattended customers list in the package name: " . $res13['packageName'];
                            }

                            if ($_GET['frequency'] == 'yearly') {
                                $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                                $res13 = mysqli_fetch_assoc($qry13);

                                echo "Year " . $_GET['year'] . " unattended customers list in the package name: " . $res13['packageName'];
                            }
                  
                        


                        echo $string;
                        ?></p>
    <table align="center" border="2px;">
              <?php if ($_GET['frequency']=='weekly'): ?>
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
                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $year . "' and isAttended = '2' and packageId = '" . $_GET['packageId'] . "' and WEEK(dateBooked) = '" . ($weekNumber-1) . "'");

                              
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

                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $year . "' and isAttended = '2' and packageId = '" . $_GET['packageId'] . "' and MONTH(dateBooked) = '" . $month . "'");

                              
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

                                    $qry3 = mysqli_query($connection, "SELECT * FROM booking_view where YEAR(dateBooked) = '" . $_GET['year'] . "' and isAttended = '2' and packageId = '" . $_GET['packageId'] . "'");

                              
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



</body>
</html>