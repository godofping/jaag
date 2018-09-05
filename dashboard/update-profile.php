<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Update Profile</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                <?php $qry = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'");
                    $res = mysqli_fetch_assoc($qry); ?>
                
                <form method="POST" action="controller.php" id="form">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName" required="" value="<?php echo $res['firstName'] ?>">
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Middle Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="middleName" name="middleName" required="" value="<?php echo $res['middleName'] ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName" required="" value="<?php echo $res['lastName'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Province</label>
                            <div class="form-group">
                                <select class="form-control" name="province" id="province" required="" onchange="populateCity()">
                                  <option selected="" value="<?php echo $res['province'] ?>" disabled><?php echo $res['province'] ?></option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <label>City</label>
                            <div class="form-group">
                                <select class="form-control" name="city" id="city" required="" onchange="populateBarangay();">
                                  <option selected="" value="<?php echo $res['city'] ?>" disabled><?php echo $res['city'] ?></option>
                                </select>
                            </div>
                            </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Barangay</label>
                            <div class="form-group">
                                <select class="form-control" name="barangay" id="barangay" required="">
                                  <option selected="" value="<?php echo $res['barangay'] ?>" disabled><?php echo $res['barangay'] ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label>Street</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street" name="street" value="<?php echo $res['street'] ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Building Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street_number" name="buildingNumber" required="" value="<?php echo $res['buildingNumber'] ?>">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>Contact Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required="" value="<?php echo $res['contactNumber'] ?>">
                            </div>
                        </div>
                    </div>

                    <!-- other hidden inputs -->
                    <input type="text" name="from" value="update-profile" hidden="">
                    <input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
                    <input type="text" name="addressId" value="<?php echo $res['addressId'] ?>" hidden="">

                    <input type="text" name="province1" id="province1" hidden="">
                    <input type="text" name="city1" id="city1" hidden="">

                    <div class="row float-right">
                        
                         <button  class="btn btn-success waves-effect" id="submitButton" onclick="pushData()">Submit</button>
                    </div>

                </form>
               

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

            
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

var $select = $('#province');

  $.getJSON('JSON/refprovince.json', function(data){
    $select.html('');

    $select.append('<option value="<?php echo $res['province'] ?>" selected disabled><?php echo $res['province'] ?></option>');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });



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



</script>