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
<h2>Payment Transactions</h2>


<br>
                    <p  style="margin-top: -15px;"><?php
                        $string = "";

                        if (isset($_GET['month']) and !empty($_GET['packageId'])) {
                            $qry13 = mysqli_query($connection, "select * from package_view where packageId = '" . $_GET['packageId'] . "'");
                            $res13 = mysqli_fetch_assoc($qry13);
                            echo "All payment transactions on " . date("F Y", strtotime($_GET['month'])) . " with the package name: " . $res13['packageName'];
                        }
                        else
                        {
                            echo "All payment transactions on " . date("F Y", strtotime($_GET['month'])) . "";
                        }


                        echo $string;
                        ?></p>
    <table align="center" border="2px;">
              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Travel and Tour ID</th>
                                    <th>Booking ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount Sent</th>
                                    <th>Date Sent</th>
                                    <th>Transaction Code</th>
                                    <th>Sender</th>
                                    <th>Remittance</th>
                                    <th>Proof Image</th>
                                    <th>Status</th>
             
                            
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
                                        $qry = mysqli_query($connection, "select * from payment_transaction_view where (departureDate like '%" . $_GET['month'] . "%' or returnDate like '%" . $_GET['month'] . "%')  and packageId like '%" . $_GET['packageId'] ."%'");
                                        while ($res = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $res['paymentTransactionId']; ?></td>
                                                <td><?php echo $res['travelAndTourId']; ?></td>
                                                <td><?php echo $res['bookingId']; ?></td>
                                                <td><?php echo $res['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res['amount'],2); ?></td>
                                                <td><?php echo $res['dateOfPayment']; ?></td>
                                                <td><?php echo $res['transactionNumber']; ?></td>
                                                <td><?php echo $res['nameOfSender']; ?></td>
                                                <td><?php echo $res['paymentMode']." " .$res['nameOfRemittanceOrBank']; ?></td>
                                                <td>
                                                    <?php $qry1 = mysqli_query($connection, "select * from payment_transaction_media_view where paymentTransactionId = '" . $res['paymentTransactionId'] . "'"); $res1 = mysqli_fetch_assoc($qry1);

                                                     ?>
                                                    <img src="../../<?php echo $res1['mediaLocation'] ?>" height="200px">
                                                </td>
                                                <td><?php echo $res['paymentStatus']; ?></td>
                                     
    

                                            </tr>
                                        <?php } ?>
                            </tbody>
            </table>



</body>
</html>