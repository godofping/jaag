<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Places</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Add Booking</a></li>
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active"><a href="add-booking.php">Add Booking</a></li>
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
                <!-- <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add Travel and Tour</button>
                <br>
                <button class="btn btn-success m-t-20 waves-effect text-left" data-toggle="modal" data-target="#addModal">Add Van Rental</button> -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Add booking for</label>
                        <select class="form-control" id="select" onchange="displayForm()">
                            <option value="Please Select" selected="" disabled="">Please Select</option>
                            <option value="Travel and Tour">Travel and Tour</option>
                            <option value="Van Rental">Van Rental</option>
                        </select>
                    </div>
                    </div>
                </div>

                <div id="travelAndtourForm">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="controller.php">
                
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Package</label>
                                    <div class="form-group">
                                        <select class="form-control" name="packageId" id="packageId" required="">
                                            <?php $qry = mysqli_query($connection, "select * from package_table order by packageName ASC");
                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Number of Pax</label>
                                    <div class="form-group">
                                        <input type="int" max="999" min="1" class="form-control" id="maxPax" name="maxPax" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Departure Date</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mdate" name="departureDate" required="">


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Return Date</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mdate1" name="returnDate" required="">


                                    </div>
                                </div>
                            </div>
                            
                            <!-- other hidden inputs -->
                            <input type="text" name="from" value="add-booking-travel" hidden="">
                           

                            <div class="row  float-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div> <!-- end tour -->

                <div id="vanRentalForm">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="controller.php">
                
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Van</label>
                                    <div class="form-group">
                                        <select class="form-control" name="vanId" id="vanId" required="">
                                            <?php $qry = mysqli_query($connection, "select * from van_table");
                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <option value="<?php echo $res['vanId'] ?>"><?php echo $res['vanMake'] . " " . $res['vanModel'] . " (PN: " . $res['vanPlateNumber'] . ")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Price</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" step="any" name="price" id="price" required="">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label>Rent Starting Date</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mdate2" name="rentalStartingDate" required="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Rent Ending Date</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mdate3" name="rentalEndingDate" required="">


                                    </div>
                                </div>
                            </div>
                            
                            <!-- other hidden inputs -->
                            <input type="text" name="from" value="add-booking-rental" hidden="">
                        

                            <div class="row  float-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div> <!-- end tour -->


                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->



<?php include("includes/footer.php") ?>

<script type="text/javascript">

    document.getElementById("travelAndtourForm").style.display = 'none';
    document.getElementById("vanRentalForm").style.display = 'none';

    function displayForm() {

    var select = document.getElementById("select").value;
    
    if (select == 'Travel and Tour') {
        document.getElementById("travelAndtourForm").style.display = 'block';
        document.getElementById("vanRentalForm").style.display = 'none';
    }else if(select = 'Van Rental'){
        document.getElementById("travelAndtourForm").style.display = 'none';
        document.getElementById("vanRentalForm").style.display = 'block';
    }

    }
</script>