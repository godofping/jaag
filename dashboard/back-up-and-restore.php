<?php
include("includes/connection.php");
include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Back-up and Restore</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Back-up and Restore</li>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Back-up current data.</h2>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-info m-t-10 waves-effect text-left">Back-up</button>
                        </div>
                    </div>
                    
                    <div class="row m-t-20">
                        <div class="col-md-12">
                            <h2>Restore last back-up data.</h2>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success m-t-10 waves-effect text-left">Restore</button>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    
   
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->



<?php include("includes/footer.php") ?>