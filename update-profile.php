<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>
<main>
<section class="hero_in contacts">
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span>Update Profile</h1>
		</div>
	</div>
</section>

<?php $qry = mysqli_query($connection,"select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'");
$res = mysqli_fetch_assoc($qry);

 ?>

<div class="bg_color_1">
	<div class="container margin_80_55">
		<div class="row justify-content-between">
	
			<div class="col-lg-6">

				
				<form autocomplete="off" method="POST" action="controller.php">
				<div class="form-group">
					<label>First Name</label>
					<input class="form-control" type="text" name="firstName" id="firstName" required="" value="<?php echo $res['firstName'] ?>">
		
				</div>
				<div class="form-group">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="middleName" id="middleName" required="" value="<?php echo $res['middleName'] ?>">
	
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input class="form-control" type="text" name="lastName" id="lastName" required="" value="<?php echo $res['lastName'] ?>">
		
				</div>
				<div class="form-group">
					<label>Contact Number</label>
					<input class="form-control" type="text" name="contactNumber" id="contactNumber" required="" value="<?php echo $res['contactNumber'] ?>">
		
				</div>
				<div class="form-group">
					<label>Province</label>
					<select class="form-control" name="province" id="province" required="" onchange="populateCity()"></select>
				
				</div>
				<div class="form-group">
					<label>City</label>
					<select class="form-control" name="city" id="city" required="" onchange="populateBarangay()">
						<option><?php echo $res['city']; ?></option>
					</select>
				
				</div>
				<div class="form-group">
					<label>Barangay</label>
					<select class="form-control" name="barangay" id="barangay">
						<option><?php echo $res['barangay']; ?></option>
					</select>

			
				</div>
				<div class="form-group">
					<label>Building Number</label>
					<input class="form-control" type="text" name="buildingNumber" id="buildingNumber" value="<?php echo $res['buildingNumber'] ?>">
			
				</div>
				<div class="form-group">
					<label>Street</label>
					<input class="form-control" type="text" name="street" id="street" value="<?php echo $res['street'] ?>">
		
				</div>
	

				
				<div id="pass-info" class="clearfix"></div>
				<button  class="btn_1 rounded  float-center"  onclick="pushData()">Update</button>
			
				<input type="text" name="from" value="update-profile" hidden="">
				<input type="text" name="profileId" value="<?php echo $res['profileId'] ?>" hidden="">
				<input type="text" name="addressId" value="<?php echo $res['addressId'] ?>" hidden="">

				<input type="text" name="province1" id="province1" hidden="">
                <input type="text" name="city1" id="city1" hidden="">
			

				</form>
			
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /bg_color_1 -->


</main>

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

var $select = $('#province');

  $.getJSON('dashboard/JSON/refprovince.json', function(data){
    $select.html('');

  	$select.append('<option><?php echo $res['province']; ?></option>');

    for (var i = 0; i < data['PROVINCES'].length; i++) {
      $select.append('<option value="'+ data['PROVINCES'][i]['provCode'] + '">' + "Region " + data['PROVINCES'][i]['regCode'] + ": " + data['PROVINCES'][i]['provDesc'] + '</option>');
    }


  });



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

    $select.append('<option><?php echo $res['barangay']; ?></option>');

    for (var i = 0; i < data['BARANGAYS'].length; i++) {

     if (data['BARANGAYS'][i]['citymunCode'] == $("#city option:selected").val()) {
       $selectBarangay.append('<option value="'+ data['BARANGAYS'][i]['brgyDesc'] + '">' + data['BARANGAYS'][i]['brgyDesc'] + '</option>');
     }


    }

  });
}



</script>