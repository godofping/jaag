<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<main>
<section id="hero" class="login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
            	<div id="login">
                		<div class="text-center"><img src="img/logo_sticky.png" alt="Image" data-retina="true" ></div>
                        <hr>
                        <form method="POST" action="controller.php">
                        <div class="row">
                        </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class=" form-control" name="firstName" required="" value="<?php if(isset($_SESSION['firstName'])){echo $_SESSION['firstName'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class=" form-control" name="middleName" required=""value="<?php if(isset($_SESSION['middleName'])){echo $_SESSION['middleName'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class=" form-control" name="lastName" required="" value="<?php if(isset($_SESSION['lastName'])){echo $_SESSION['lastName'];} ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <select class="form-control" name="province" id="province" required="" onchange="populateCity()" value="<?php if(isset($_SESSION['province'])){echo $_SESSION['province'];} ?>">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control" name="city" id="city" required="" onchange="populateBarangay()" >
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Barangay</label>
                                        <select class="form-control" name="barangay" id="barangay" required="">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" class=" form-control" name="street" required="" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Building Number</label>
                                        <input type="text" class=" form-control" name="buildingNumber" value="<?php if(isset($_SESSION['buildingNumber'])){echo $_SESSION['buildingNumber'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class=" form-control" name="contactNumber" required="" value="<?php if(isset($_SESSION['contactNumber'])){echo $_SESSION['contactNumber'];} ?>">
                                    </div>
                                </div>
                            </div>


                      
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class=" form-control" name="userName" placeholder="Username" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class=" form-control" name="passWord" placeholder="Password" required="">
                                    </div>
                                </div>
                            </div>

                            



                       		<input type="text" name="from" value="register" hidden="
                       		">
                            <input type="text" name="barangay1" hidden="
                            ">
                            <input type="text" name="city1" hidden="
                            ">



                            <button class="btn_full" onclick="pushData();">Create an account</button>
                           
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End main -->


<?php include("includes/footer.php"); ?>

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


populateProvince();
populateCity();
populateBarangay();

function populateProvince() {
    var $select = $('#province');

  $.getJSON('dashboard/JSON/refprovince.json', function(data){
    $select.html('');
 
    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }

  });

}

function populateCity() {

  var $selectCity = $('#city');

  $.getJSON('dashboard/JSON/refcitymun.json', function(data){
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

  $.getJSON('dashboard/JSON/refbrgy.json', function(data){
    $selectBarangay.html('');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>