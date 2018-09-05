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
                
                <form method="POST" action="controller.php" id="address">
                    
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
                        <div class="col-md-12">
                            <label></label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="autocomplete" placeholder="Enter address..." onFocus="geolocate()"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Building Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street_number" name="buildingNumber" required="" >
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Street</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street" name="street">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Barangay</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="barangay" name="barangay" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="locality" name="city" required="" >
                            </div>
                            </div>

                        <div class="col-md-4">
                            <label>Province</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="province" name="province" required="" value="">
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

                    <div class="row float-right">
                        <button type="submit" class="btn btn-success waves-effect">Submit</button>
                    </div>

                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

                <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3CL__ArRSv8my9WeW3ealb1WOquARXJA&libraries=places&callback=initAutocomplete" async defer></script>
                


<?php include("includes/footer.php") ?>