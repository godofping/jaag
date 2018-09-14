<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Customer Information</h3>

    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item">Reports</li>
            <li class="breadcrumb-item active">Customer Information</li>
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
                     <a href="customer-information.php?accountType=Online Customer"><button class="btn btn-info">View All Online Customers</button></a> <a href="customer-information.php?accountType=Walk-in Customer"><button class="btn btn-info">View All Walk-in Customers</button></a> <a href="customer-information.php"><button class="btn btn-info">View All Customers</button></a>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Account Type</th>
             
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if (isset($_GET['accountType']) and $_GET['accountType'] == 'Walk-in Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3");
                            }
                            elseif (isset($_GET['accountType']) and $_GET['accountType'] == 'Online Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 4");
                            }else
                            {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3 or accountTypeId = 4");
                            }
                            



                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['profileId']; ?></td>
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] . " " . $res['city'] . " " . $res['province']; ?></td>
                                    <td><?php echo $res['contactNumber']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                  
                           
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    


<?php include("includes/footer.php") ?> 