<?php include("includes/connection.php");
if (isset($_SESSION['accountType']) and ($_SESSION['accountType'] == 'Administrator' or $_SESSION['accountType'] == 'Attendant')) {
    header("Location: home.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="jaag travel and tour">
    <meta name="author" content="sti">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Jaag Travel and Tours</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/P0420.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="controller.php">
                        <h2 class="box-title m-b-20 text-center"><img src="assets/images/logo-no-number.png" class="img img-responsive"></h2>
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="userName" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="passWord" required="" placeholder="Password"> </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <input type="text" name="from" value="login" hidden="">

                    </form>
                    
                </div>
            </div>
        </div>


    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="js/toastr.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <?php if (isset($_SESSION['do'])): ?>

    <script>

        <?php if ($_SESSION['do'] == 'failed'): ?>
            $.toast({
            heading: 'Message',
            text: 'Login Failed! Please login again.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
        <?php endif ?>
        <?php if ($_SESSION['do'] == 'logout'): ?>
            $.toast({
            heading: 'Message',
            text: 'Successfully Logout!',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
        <?php endif ?>
        <?php if ($_SESSION['do'] == 'login-first'): ?>
            $.toast({
            heading: 'Message',
            text: 'Oppss! Please login first using your authorized account for you to access.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 5000, 
            stack: 6
          });
        <?php endif ?>
    </script>



    <?php endif;
        if (isset($_SESSION['do'])) {
            unset($_SESSION['do']);
        }
     ?>

</body>

</html>