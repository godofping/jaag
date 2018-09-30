<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Customers</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item">Bookings</li>
            <li class="breadcrumb-item"><a href="travel-and-tour.php">Travel and Tour</a></li>
            <li class="breadcrumb-item active"><a href="travel-and-tour.php">View Customers</a></li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <?php $qry = mysqli_query($connection, "select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'"); $res = mysqli_fetch_assoc($qry); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Travel and Tour ID: <?php echo $res['travelAndTourId']; ?><br><br>
                        Package Name: <?php echo $res['packageName']; ?><br><br>
                        price: ₱<?php echo number_format($res['price'],2); ?><br><br>
                        Travel Dates: <?php echo $res['departureDate']; ?> - <?php echo $res['returnDate']; ?><br><br>
                        Slots Booked: <?php 
                                    $slotsTaken = 0;
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res['travelAndTourId'] . "'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    $slotsTaken =  $res13['slotsTaken'];
                                    echo $slotsTaken;
                                    ?>/<?php echo $res['maxPax']; $maxPax = $res['maxPax']; ?><br><br>
                        Status: <?php echo $res['travelAndTourStatus']; ?>
                        <br><br>

                        <div class="row">
                            <div class="col-md-5">
                                <button type="button" class="btn btn-block btn-outline-info" data-toggle="modal" data-target="#updateModal">Change Status</button>
                            </div>

                          
                        </div>

                    </h4> 
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>List of clients for travel</h2>
                    <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal" <?php if ($maxPax - $slotsTaken == 0 or $res['travelAndTourStatus'] != 'Available'): ?>
                        disabled
                    <?php endif ?>>Add</button>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                                    <th>Attendance</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                    <td><?php if ($res['isAttended'] == 0) {
                                        echo "TBA";
                                    }elseif ($res['isAttended'] == 1) {
                                        echo "Present";
                                    }elseif ($res['isAttended'] == 2) {
                                        echo "Absent";
                                    } ?></td>
                                    <td> 
                                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#viewPaymentsModal<?php echo $res['bookingId'] ?>">View Payments</button>
                                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#attendanceModal<?php echo $res['bookingId'] ?>">Attendance</button>

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<!-- modal content -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="middleName" name="middleName" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Province</label>
                            <div class="form-group">
                                <select class="form-control" name="province" id="province" required="" onchange="populateCity();populateBarangay();">
                             
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <label>City</label>
                            <div class="form-group">
                                <select class="form-control" name="city" id="city" required="" onchange="populateBarangay()">
                            
                                </select>
                            </div>
                            </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Barangay</label>
                            <div class="form-group">
                                <select class="form-control" name="barangay" id="barangay" required="">
                                  <option selected="" value="<?php echo $res['barangay'] ?>" disabled>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label>Street</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street" name="street">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Building Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street_number" name="buildingNumber">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label>Contact Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required="">
                            </div>
                        </div>
                    </div>

                    <hr>

                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>Pax Number</label>
                            <div class="form-group">
                                <select class="form-control" name="paxNumber" id="paxNumber" onchange="calculate();">
                                    <?php
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    for ($i=1; $i <=  $maxPax - $slotsTaken ; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <small class="form-control-feedback" id="totalPriceTobePaid"></small>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Payment Type</label>
                            <div class="form-group">
                                <select class="form-control" name="paymentType" required="">
                                    <option>Down Payment</option>
                                    <option>Full Payment</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Remittance</label>
                                <select class="form-control" name="modeOfPaymentId" id="modeOfPaymentId" required="">
                                    <?php $qry = mysqli_query($connection, "select * from mode_of_payment_view"); while ($res = mysqli_fetch_assoc($qry)) { ?>
                                            <option value="<?php echo $res['modeOfPaymentId'] ?>"><?php echo $res['paymentMode'] . " - " . $res['nameOfRemittanceOrBank']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount</label>
                                <input class="form-control" type="number" step="any" name="amount" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sender</label>
                                <input class="form-control" type="text" name="nameOfSender">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Transaction Code/ OR Number</label>
                                <input class="form-control" type="text" name="transactionNumber">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Proof Image</label>
                                <input class="form-control" type="file" name="mediaLocation">
                            </div>
                        </div>
                    </div>






                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-walk-in-customer" hidden="">
                <input type="text" name="province1" id="province1" hidden="">
                <input type="text" name="city1" id="city1" hidden="">
                <input type="text" name="travelAndTourId" value="<?php echo $_GET['travelAndTourId']; ?>" hidden="">



            </div>
            <div class="modal-footer">
                <button class="btn btn-success waves-effect text-left" onclick="pushData()">Submit</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- modal content -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="form-group">
                                <select class="form-control" name="travelAndTourStatus" required="">
                                    <option value="Available">Available</option>
                                    <option value="Fully Booked">Fully Booked</option>
                                    <option value="Cancelled due to weather">Cancelled due to weather</option>
                                    <option value="Cancelled due to unsufficient pax">Cancelled due to unsufficient pax</option>
                                    <option value="Finished">Finished</option>
                                </select>
                            </div>
                        </div>

                        
                    </div>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="update-travel-and-tour-status" hidden="">
                <input type="text" name="travelAndTourId" value="<?php echo $_GET['travelAndTourId'] ?>"  hidden="">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Submit</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 
$qry = mysqli_query($connection, "select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
while ($res = mysqli_fetch_assoc($qry)) { ?>             


<!-- modal content -->
<div class="modal fade" id="viewPaymentsModal<?php echo $res['bookingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
               
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
                                        $qry1 = mysqli_query($connection, "select * from payment_transaction_view where profileId = '" . $res['profileId'] . "' and travelAndTourId = '" . $res['travelAndTourId'] . "'");
                                        while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                                            <tr>
                                                <td><?php echo $res1['paymentTransactionId']; ?></td>
    
                                                <td><?php echo $res1['paymentType']; ?></td>
                                                <td>₱<?php echo number_format($res1['amount'],2); ?></td>
                                                <td><?php echo $res1['dateOfPayment']; ?></td>
                                                <td><?php echo $res1['transactionNumber']; ?></td>
                                                <td><?php echo $res1['nameOfSender']; ?></td>
                                                <td><?php echo $res1['paymentMode']." " .$res1['nameOfRemittanceOrBank']; ?></td>
                                                <td><?php $qry12 = mysqli_query($connection, "select * from payment_transaction_media_view where paymentTransactionId = '" . $res1['paymentTransactionId'] . "'"); $res12 = mysqli_fetch_assoc($qry12);

                                                     ?>
                                                    <a  target="_blank" href="../<?php echo $res12['mediaLocation'] ?>">view image</a>
                                                </td>
                                                <td><?php echo $res1['paymentStatus']; ?></td>
                                            
                                               
    

                                            </tr>
                                        <?php } ?>
                            </tbody>
                        </table>
                </div>
         

            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 



<!-- modal content -->
<div class="modal fade" id="attendanceModal<?php echo $res['bookingId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form method="POST" action="controller.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Attendance</label>
                            <select class="form-control" name="isAttended" required="">
                                <option value="0">TBA</option>
                                <option value="1">Present</option>
                                <option value="2">Absent</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <input type="text" name="from" value="attendance" hidden="">
            <input type="text" name="bookingId" value="<?php echo $res['bookingId'] ?>" hidden="">
            <input type="text" name="travelAndTourId" value="<?php echo $_GET['travelAndTourId'] ?>" hidden="">
            
         

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Submit</button>
                 </form>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
<?php } ?>



<?php include("includes/footer.php") ?>

<script type="text/javascript">


function pushData()
{
    document.getElementById("province1").value = $("#province option:selected").text();
    document.getElementById("city1").value = $("#city option:selected").text();

    var form = document.getElementById("form");

    document.getElementById("submitButton").addEventListener("click", function () {
    form.submit();
    });
}

var $select = $('[name=province]');

  $.getJSON('JSON/refprovince.json', function(data){
    $select.html('');

    $select.append('<option value="<?php echo $res['province'] ?>" selected disabled><?php echo $res['province'] ?></option>');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });



function populateCity() {



  var $selectCity = $('[name=city]');

  $.getJSON('JSON/refcitymun.json', function(data){
    $selectCity.html('');
    for (var i = 0; i < data['CITIES'].length; i++) {
     if (data['CITIES'][i]['provCode'] == $("#province option:selected").val()) {
       $selectCity.append('<option value="'+ data['CITIES'][i]['citymunCode'] + '">' + data['CITIES'][i]['citymunDesc'] + '</option>');
     }


    }

    populateBarangay();

  });
}

function populateBarangay() {

  var $selectBarangay = $('[name=barangay]');

  $.getJSON('JSON/refbrgy.json', function(data){
    $selectBarangay.html('');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>



<script type="text/javascript">

calculate(); 
function calculate()
{
        <?php $qry15 = mysqli_query($connection, "select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
        $res15 = mysqli_fetch_assoc($qry15); ?>

        var paxNumber = document.getElementById("paxNumber").value;
        document.getElementById("totalPriceTobePaid").textContent = '‎Customer have to pay ₱' + (paxNumber * <?php echo $res15['price']; ?>).toFixed(2) + " for Full Payment and ₱" + (paxNumber * <?php echo $res15['price'] / 2; ?>).toFixed(2) + " for Down Payment.";
}

function pushData()
{
    document.getElementById("province1").value = $("#province option:selected").text();
    document.getElementById("city1").value = $("#city option:selected").text();

    var form = document.getElementById("form");

    document.getElementById("submitButton").addEventListener("click", function () {
    form.submit();
    });
}

// populateProvince();
// populateCity();
// populateBarangay();

function populateProvince(){
    var $select = $('[name=province]');

  $.getJSON('JSON/refprovince.json', function(data){
    $select.html('');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });
}



function populateCity() {

  var $selectCity = $('[name=city]');

  $.getJSON('JSON/refcitymun.json', function(data){
    $selectCity.html('');
    for (var i = 0; i < data['CITIES'].length; i++) {
     if (data['CITIES'][i]['provCode'] == $("#province option:selected").val()) {
       $selectCity.append('<option value="'+ data['CITIES'][i]['citymunCode'] + '">' + data['CITIES'][i]['citymunDesc'] + '</option>');
     }


    }

  });
}
function populateBarangay() {

  var $selectBarangay = $('[name=barangay]');

  $.getJSON('JSON/refbrgy.json', function(data){
    $selectBarangay.html('');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>