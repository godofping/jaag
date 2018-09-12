<?php include("dashboard/includes/connection.php");?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>Jaag Travel and Tours</title>
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- CSS -->
    <link href="css/base.css" rel="stylesheet">
	
    <!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
    
	<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }
    
    .table > tbody > tr > .no-line {
        border-top: none;
    }
    
    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    
    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
        
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        
</head>

<?php $qry = mysqli_query($connection, "select * from booking_view where bookingId = '" . base64_decode($_GET['bookingId']) . "'"); $res = mysqli_fetch_assoc($qry); ?>
<body>
  <div class="container">

    <div class="row">

        <div class="col-xs-12">
            <br>
            <button id="printpagebutton" onclick="printpage()">Print</button>

    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Booking ID # <?php echo $res['bookingId']; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?><br>
    					<?php echo $res['buildingNumber'] . " " . $res['street']; ?><br>
    					<?php echo $res['barangay'] . " " . $res['city']; ?><br>
    					<?php echo $res['province']; ?>
    				</address>
    			</div>
    	
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Booking Date:</strong><br>
    					<?php echo $res['dateBooked']; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Booking summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Package Name</strong></td>
                                    <td><strong>Travel Date</strong></td>
                                    <td><strong>Package Price</strong></td>
                                    <td><strong>Number of Pax Booked</strong></td>
        				
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?php echo $res['packageName']; ?></td>
                                    <td><?php echo $res['departureDate'] . " - " . $res['returnDate']; ?></td>
    								<td class="text-center">₱<?php echo number_format($res['price'],2); ?></td>
    								<td class="text-center"><?php echo $res['numberOfPaxBooked']; ?></td>
    								<td class="text-right">₱<?php echo number_format($res['price'] * $res['numberOfPaxBooked'],2); ?></td>
    							</tr>
                                
    							<tr>
                                    <td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">₱<?php echo number_format($res['price'] * $res['numberOfPaxBooked'],2); ?></td>
    							</tr>
    					
    							<tr>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">₱<?php echo number_format($res['price'] * $res['numberOfPaxBooked'],2); ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>

  </body>
</html>