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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add</button>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   
                                    <th>Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <!-- <th>Actions</th> -->
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
                                   <!--  <td>
                                        <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal" data-target="#updateModal<?php echo $res['placeId']; ?>">Update</button>
                                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['placeId']; ?>">Delete</button>
                                    </td> -->
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
                <form method="POST" action="controller.php">
                    
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
                                <select class="form-control" name="province" id="province" required="" onchange="populateCity()">
                             
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
                                <select class="form-control" name="paxNumber" id="paxNumber">
                                    <?php 
                                    $qry12 = mysqli_query($connection, "select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                                    $res12 = mysqli_fetch_assoc($qry12);

                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $_GET['travelAndTourId'] . "' AND (bookingStatus = 'Reserved - Pending Outstanding Payment' OR bookingStatus = 'Officially Reserved')");

                                    $res13 = mysqli_fetch_assoc($qry13);

                                    for ($i=1; $i <=  $res12['maxPax'] - $res13['slotsTaken'] ; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>






                <!-- other hidden inputs -->
                <input type="text" name="from" value="add-attendant" hidden="">
                <input type="text" name="province1" id="province1" hidden="">
                <input type="text" name="city1" id="city1" hidden="">



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