<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">List of Travelers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active"><a href="list-of-travelers.php">List of Travelers</a></li>
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

                    <form method="POST" action="controller.php">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="form-group">
                				<label>Package Name</label>
	                			<select class="form-control" name="packageId" id="packageId" required="">
	                				<option disabled="" selected="">Please select</option>
	                				<?php $qry = mysqli_query($connection, "select * from package_view");
	                				while ($res = mysqli_fetch_assoc($qry)) { ?>
	                					<option value="<?php echo $res['packageId'] ?>"><?php echo $res['packageName']; ?></option>
	                				<?php } ?>
	                			</select>
                			</div>
                		</div>
                		
                	</div>


           
                	<div id="travelAndTourDiv"></div>
              
                	<input type="text" name="from" value="search-list-of-travelers" hidden="">

            		<div class="row">
            			<div class="col-md-4">
            				<button class="btn btn-success m-t-20 waves-effect text-left">Search</button>
            			</div>
            		</div>

            		<?php 
            		$string = "";
            		 if (isset($_GET['travelAndTourId']) and !empty($_GET['travelAndTourId'])) {
                        $qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                         $qry1 = mysqli_query($connection,"select * from travel_and_tour_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                         $res1 = mysqli_fetch_assoc($qry1);

                        $string = "List of travelers in the Package Name: " . $res1['packageName'] . " and with the travel dates " . $res1['departureDate'] . " - " . $res1['returnDate'];


                    }
                    else
                    {
                    	if (isset($_GET['travelAndTourId'])) {
                    		$qry = mysqli_query($connection,"select * from booking_view where travelAndTourId = '" . $_GET['travelAndTourId'] . "'");
                    	$string = "No result.";
                    	}
                    }
            		 ?>

            		 <br>
            		<h4><?php echo $string; ?></h4>
                    	
                    	
                    </form>

                    <?php if (isset($_GET['travelAndTourId'])): ?>
                    	<div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number of Pax Booked</th>
                                    <th>Date Booked</th>
                                    <th>Booking Status</th>
                                    <th>Customer Type</th>
                             
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php 

                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['numberOfPaxBooked']; ?></td>
                                    <td><?php echo $res['dateBooked']; ?></td>
                                    <td><?php echo $res['bookingStatus']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                         
                          
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif ?>
                </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                


<?php include("includes/footer.php") ?>

<script type="text/javascript">

	$(document).ready(function(){

 
});

$('#packageId').change(function()
{
	var packageId = $('#packageId').val();

    $.post('check.php',{packageId:packageId,from:"list-of-travelers"},
    function(data)
    {
        $('#travelAndTourDiv').html(data);
    });

        
});

</script>