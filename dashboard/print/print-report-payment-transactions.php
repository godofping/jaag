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
<h2>Payment Transactions</h2>



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
                                    <th>Payment ID</th>
                                    <th>Name</th>
                                    <th>Travel and Tour ID</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Booking ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                              
                                    <th>Status</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   
                                    $qry3 = mysqli_query($connection, "SELECT * FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and packageId = '" . $_GET['packageId'] . "' and WEEK(dateBooked) = '" . ($weekNumber-1) . "'");

                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                                <td><?php echo $res['paymentTransactionId']; ?></td>
                                                <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                                <td><?php echo $res['travelAndTourId']; ?></td>
                                                <td><?php echo $res['packageName']; ?></td>
                                                <td><?php echo $res['departureDate'] . " to " . $res['returnDate']; ?></td>
                                                <td><?php echo $res['bookingId']; ?></td>
                                                <td><?php echo $res['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res['amount'],2); ?></td>
                                                <td><?php echo $res['dateOfPayment']; ?></td>
                                                <td><?php echo $res['transactionNumber']; ?></td>
                                                <td><?php echo $res['nameOfSender']; ?></td>
                                                <td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
                                         
                                                <td><?php echo $res['paymentStatus']; ?></td>
                                     
    

                                            </tr>
                                        <?php } ?>
                            <?php endif ?>

                            <?php if ($_GET['frequency']=='monthly'): ?>
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Name</th>
                                    <th>Travel and Tour ID</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Booking ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                           
                                    <th>Status</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   

                                    $qry3 = mysqli_query($connection, "SELECT * FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $year . "' and packageId = '" . $_GET['packageId'] . "' and MONTH(dateOfPayment) = '" . $month . "'");

                              
                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                                <td><?php echo $res['paymentTransactionId']; ?></td>
                                                <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                                <td><?php echo $res['travelAndTourId']; ?></td>
                                                <td><?php echo $res['packageName']; ?></td>
                                                <td><?php echo $res['departureDate'] . " to " . $res['returnDate']; ?></td>
                                                <td><?php echo $res['bookingId']; ?></td>
                                                <td><?php echo $res['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res['amount'],2); ?></td>
                                                <td><?php echo $res['dateOfPayment']; ?></td>
                                                <td><?php echo $res['transactionNumber']; ?></td>
                                                <td><?php echo $res['nameOfSender']; ?></td>
                                                <td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
                                    
                                                <td><?php echo $res['paymentStatus']; ?></td>
                                     
    

                                            </tr>
                                        <?php } ?>
                            <?php endif ?>

                            <?php if ($_GET['frequency']=='yearly'): ?>
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Name</th>
                                    <th>Travel and Tour ID</th>
                                    <th>Package Name</th>
                                    <th>Travel Dates</th>
                                    <th>Booking ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                           
                                    <th>Status</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php   

                                    $qry3 = mysqli_query($connection, "SELECT * FROM payment_transaction_view where YEAR(dateOfPayment) = '" . $_GET['year'] . "' and packageId = '" . $_GET['packageId'] . "'");

                              
                                    while ($res = mysqli_fetch_assoc($qry3)) { ?>
                                <tr>
                                                <td><?php echo $res['paymentTransactionId']; ?></td>
                                                <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                                <td><?php echo $res['travelAndTourId']; ?></td>
                                                <td><?php echo $res['packageName']; ?></td>
                                                <td><?php echo $res['departureDate'] . " to " . $res['returnDate']; ?></td>
                                                <td><?php echo $res['bookingId']; ?></td>
                                                <td><?php echo $res['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res['amount'],2); ?></td>
                                                <td><?php echo $res['dateOfPayment']; ?></td>
                                                <td><?php echo $res['transactionNumber']; ?></td>
                                                <td><?php echo $res['nameOfSender']; ?></td>
                                                <td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
                                          
                                                <td><?php echo $res['paymentStatus']; ?></td>
                                     
    

                                            </tr>
                                        <?php } ?>
                            <?php endif ?>
                        </tbody>
            </table>



</body>
</html>