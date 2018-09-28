<?php include("dashboard/includes/connection.php");include("includes/header.php"); ?>

<main>
<section id="hero" class="login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
            	<div id="login">
                		<div class="text-center"><img src="img/logo_sticky.png" alt="Image" data-retina="true" ></div>
                        <hr>
                        <form method="POST" action="controller.php" id="form">
                        <div class="row">
                        </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name <small style="color: red"> * required</small></label>
                                        <input type="text" class=" form-control" name="firstName" id="firstName" required="" value="<?php if(isset($_SESSION['firstName'])){echo $_SESSION['firstName'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name <small style="color: red"> * required</small></label>
                                        <input type="text" class=" form-control" name="middleName" id="middleName" required=""value="<?php if(isset($_SESSION['middleName'])){echo $_SESSION['middleName'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name <small style="color: red"> * required</small></label>
                                        <input type="text" class=" form-control" name="lastName" id="lastName" required="" value="<?php if(isset($_SESSION['lastName'])){echo $_SESSION['lastName'];} ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Province <small style="color: red"> * required</small></label>
                                        <select class="form-control" name="province" id="province" required="" onchange="populateCity()" value="<?php if(isset($_SESSION['province'])){echo $_SESSION['province'];} ?>">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City <small style="color: red"> * required</small></label>
                                        <select class="form-control" name="city" id="city" required="" onchange="populateBarangay()" >
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Barangay <small style="color: red"> * required</small></label>
                                        <select class="form-control" name="barangay" id="barangay" required="">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Street <small style="color: red"> (optional)</small></label>
                                        <input type="text" class=" form-control" name="street" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Building Number <small style="color: red"> (optional)</small></label>
                                        <input type="text" class=" form-control" name="buildingNumber" value="<?php if(isset($_SESSION['buildingNumber'])){echo $_SESSION['buildingNumber'];} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact Number <small style="color: red"> * required</small></label>
                                        <input type="text" minlength="11" maxlength="11" class=" form-control" name="contactNumber" id="contactNumber1" required="" value="<?php if(isset($_SESSION['contactNumber'])){echo $_SESSION['contactNumber'];} ?>" placeholder="09xxxxxxxxx">
                                        <span id="contactNumberResult"></span>
                                    </div>
                                </div>
                            </div>


                      
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username <small style="color: red"> * required</small></label>
                                        <input type="text" class=" form-control" name="userName" id="userName1" placeholder="Username" required="">

                                    </div>
                                    <span id="userNameResult"></span>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <small style="color: red"> * required</small></label>
                                        <input type="password" class=" form-control" name="passWord" id="passWord1" placeholder="Password" required="">
                                    </div>
                                </div>

                            </div>

                            



                       		<input type="text" name="from" value="register" hidden="
                       		">
                            <input type="text" id="province1" hidden="">
                            <input type="text" id="city1" hidden="">

                            <br>
                            
                        
                            <button type="submit" name="submitform" class="btn_full" onclick="pushData(); return false;">Create an account</button>
                            </form>
         
                           
                        
                    </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End main -->


<?php include("includes/footer.php"); ?>

<script type="text/javascript">

$(document).ready(function(){

    var userName = $('#userName1').val();

    $.post('check.php',{userName:userName,from:"userName"},
    function(data)
    {
        $('#userNameResult').html(data);
    });


    var contactNumber = $('#contactNumber1').val();


    $.post('check.php',{contactNumber:contactNumber,from:"contactNumber"},
    function(data)
    {
        $('#contactNumberResult').html(data);
    });

 
});

$('#userName1').keyup(function()
{
    var userName = $('#userName1').val();


        $.post('check.php',{userName:userName,from:"userName"},
        function(data)
        {
            $('#userNameResult').html(data);
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
    var passWord = document.getElementById("passWord1").value;
    var contactNumber = document.getElementById("contactNumber1").value;
    var userName = document.getElementById("userName1").value;

    var userNameResult = document.getElementById('userNameResult').innerText;
    var contactNumberResult = document.getElementById('contactNumberResult').innerText;

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
    if (userName.length == 0) {
        error += "Please enter username. \n";
    }
    if (passWord.length == 0) {
        error += "Please enter password. \n";
    }

    if (userName.length != 0 && userNameResult != "Username is available") {
        error += "Please change username. \n";
    }

    if (contactNumber.length != 0 && contactNumberResult != "Contact number is available") {
        error += "Please change contact number. \n";
    }

    if (error.length == 0) {
        document.getElementById("form").submit();
    }
    else
    {
        window.alert(error);
    }

    
    
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