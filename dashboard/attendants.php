<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Attendants</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Attendants</li>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 5 and isDeleted = 0");
                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['profileId']; ?></td>
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] . " " . $res['city'] . " " . $res['province']; ?></td>
                                    <td><?php echo $res['contactNumber']; ?></td>
                                    <td><?php echo $res['userName']; ?></td>
                                    <td>
                                       
                                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?php echo $res['profileId']; ?>">Delete</button>
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
                <form method="POST" action="controller.php">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName" required="">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Middle Name <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="middleName" name="middleName" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Last Name <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Province <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <select class="form-control" name="province" id="province" required="" onchange="populateCity();populateBarangay();">
                             
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <label>City <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <select class="form-control" name="city" id="city" required="" onchange="populateBarangay()">
                            
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Barangay <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <select class="form-control" name="barangay" id="barangay" required="">
                                  <option selected="" value="<?php echo $res['barangay'] ?>" disabled>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Street <small style="color: red"> (optional)</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street" name="street">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Building Number <small style="color: red"> (optional)</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street_number" name="buildingNumber">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Contact Number <small style="color: red"> * required</small></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="contactNumber1" name="contactNumber" required="" value="<?php echo $res['contactNumber'] ?>" maxlength="11" minlength='11' placeholder="09xxxxxxxxxxx">
                                <small id="contactNumberResult" class="form-control-feedback"> </small>
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

<?php 
$qry = mysqli_query($connection, "select * from profile_view where accountTypeId = 5 and isDeleted = 0");
while ($res = mysqli_fetch_assoc($qry)) { ?>             


<!-- modal content -->
<div class="modal fade" id="deleteModal<?php echo $res['profileId'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php">
                    
                    <h2>Are you sure to delete?</h2>

                <!-- other hidden inputs -->
                <input type="text" name="from" value="delete-attendant" hidden="">
                <input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left">Yes</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">No</button>
            </div>
            </form>
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



$(document).ready(function(){

    var contactNumber = $('#contactNumber1').val();


    $.post('check.php',{contactNumber:contactNumber,from:"contactNumber"},
    function(data)
    {
        $('#contactNumberResult').html(data);
    });

 
});


$('#contactNumber1').keyup(function()
{
    var contactNumber = $('#contactNumber1').val();


        $.post('check.php',{contactNumber:contactNumber,from:"contactNumber"},
        function(data)
        {
            $('#contactNumberResult').html(data);
        });

        
});




function pushData()
{

    var error = "";

    document.getElementById("province1").value = $("#province option:selected").text();
    document.getElementById("city1").value = $("#city option:selected").text();

    var firstName = document.getElementById("firstName").value;
    var middleName = document.getElementById("middleName").value;
    var lastName = document.getElementById("lastName").value;
    var contactNumber = document.getElementById("contactNumber1").value;
    var contactNumberResult = document.getElementById('contactNumberResult').innerText;
    var province = $("#province option:selected").text();
    var city = $("#city option:selected").text();
    var barangay = $("#barangay option:selected").text();

    if (firstName.length == 0) {
        error += "Please enter first name. \n";
    }
    if (middleName.length == 0) {
        error += "Please enter middle name. \n";
    }
    if (lastName.length == 0) {
        error += "Please enter last name. \n";
    }
    if (contactNumber.length == 0) {
        error += "Please enter contact number. \n";
    }
    if (province.length == 0) {
        error += "Please select province. \n";
    }
    if (city.length == 0) {
        error += "Please select city. \n";
    }
    if (barangay.length == 33) {
        error += "Please select barangay. \n";
    }



    if (contactNumber.length != 0 && (contactNumberResult == "Incorrect format" || contactNumberResult == "Contact number is already taken")) {
        error += "Please change contact number. \n";
    }

    if (error.length == 0) {
        document.getElementById("form").submit();
    }
    else
    {

        window.alert(error);
    }


    error = "";
    
    
}

function populateProvince() {

    var $select = $('#province');
    $.getJSON('JSON/refprovince.json', function(data){
    $select.html('');

    $select.append('<option value="<?php echo $res['province'] ?>" selected disabled><?php echo $res['province'] ?></option>');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

    });

}

function populateCity() {

  var $selectCity = $('#city');

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

  var $selectBarangay = $('#barangay');

  $.getJSON('JSON/refbrgy.json', function(data){
    $selectBarangay.html('');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}


populateProvince();



</script>