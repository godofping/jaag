<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>&nbsp;</title>
</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
<h2>Payment Transactions</h2>
    <table align="center" border="1px;">
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
                                        $qry = mysqli_query($connection, "select * from payment_transaction_view");
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