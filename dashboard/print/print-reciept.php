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
<h4>BLK. 4, LOT 28, YELLOW VILLAGE, NEW ISABELA <br> TACURONG CITY, SULTAN KUDARAT 9800</h4>
<h5>CONTACT #: 0997-260-9952    <br>  
WEBSITE: http://jaag.ml</h5>
<br>
<?php 
$qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . $_GET['bookingId'] . "'");
$res = mysqli_fetch_assoc($qry);
?>
<p>
<span style="float: left">Reciept #: <?php echo $res['bookingId']; ?></span>
<span style="float: right;">Date: <?php echo date('Y-m-d'); ?></span>
<br>
<span style="float: right;">Booking Date: <?php echo $res['dateBooked']; ?></span>
</p>         

<p>
<span style="float: left">Billed to: <?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName'] ; ?></span>
<br>
<span style="float: left"><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] ; ?></span>
<br>
<span style="float: left"><?php echo $res['city'] . " " . $res['province'] ; ?></span>
<br>
<span style="float: left"><?php echo $res['contactNumber']; ?></span>
</p>


<div style="text-align: left; margin-top: 60px;">
    <h3>Booking Summary</h3>
    <h4>Package Name: <?php echo $res['packageName']; ?></h4>
    <h4>Travel Date: <?php echo $res['departureDate'] . " - " . $res['returnDate']; ?></h4>
    <h4>Package Price: ₱<?php echo number_format($res['price'],2) ?></h4>
    <h4>Number of pax booked: <?php echo $res['numberOfPaxBooked']; ?></h4>

    <h3>Total: ₱<?php $total = $res['price'] * $res['numberOfPaxBooked']; echo number_format($total, 2); ?></h3>
    <?php $qry1 = mysqli_query($connection, "select sum(amount) as amountPaid from payment_transaction_view where bookingId = '" . $res['bookingId'] . "'");
        $res1 = mysqli_fetch_assoc($qry1);
     ?>
    <h3>Amount Paid: ₱<?php echo number_format($res1['amountPaid'],2); ?></h3>
    <p>------------------------------------------------------------</p>
    <h3>Balance: ₱<?php echo number_format($total - $res1['amountPaid'],2); ?></h3>
</div>


</body>
</html>