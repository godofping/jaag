<?php
    if (!isset($_SESSION['accountType']) or ($_SESSION['accountType'] != 'Administrator' and $_SESSION['accountType'] != 'Attendant') or $_SESSION['accountType'] == 'Online Customer') {
        header("Location: controller.php?from=login-first");
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
    <title>Jaag | Travel and Tours</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    
    <!-- You can change the theme colors from here -->
    
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">

    <link href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!-- Popup CSS -->
    <link href="assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

    <!-- Color picker plugins css -->
    <link href="assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/green.css" id="theme" rel="stylesheet">
    
</head>

<body class="fix-header card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                         
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-blue.png" alt="homepage" class="dark-logo" height="40px" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --> <span>JAAG Dashboard</span></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify">  </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            
                                            
                                            <?php
                                             $qry = mysqli_query($connection, "select * from notification_view where profileId = '" . $_SESSION['profileId'] . "' order by notificationId DESC LIMIT 10");



                                            while ($res = mysqli_fetch_assoc($qry)) { ?>
                                                <a>
                                                
                                                    <div class="mail-contnet">
                                                    <h5><?php echo $res['notificationMessage']; ?></h5> <span class="mail-desc"></span> <span class="time"><?php echo $res['dateAndTime']; ?></span> </div>
                                                </a>
                                           <?php  } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="notifications.php"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                       
                        <?php $qry10 = mysqli_query($connection, "select * from profile_view where profileId = '" . $_SESSION['profileId'] . "'"); 
                            $res10 = mysqli_fetch_assoc($qry10);
                        ?>
                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/user.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="assets/images/users/user.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $res10['firstName'] . " " . $res10['middleName'] . " " . $res10['lastName']; ?></h4>
                                                <p class="text-muted"><?php echo $res10['accountType']; ?></p><a href="view-profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="update-profile.php"><i class="ti-user"></i> Update Profile</a></li>
                                    <li><a href="change-password.php"><i class="ti-key"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="controller.php?from=logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="assets/images/users/user.jpg" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text" style="color:white; font-weight: 500;"><?php echo $res10['firstName'] . " " . $res10['middleName'] . " " . $res10['lastName']; ?></h4>
                                                <p class="text-muted"><?php echo $res10['accountType']; ?>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <?php include("includes/menu.php"); ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a></a>
                <!-- item-->
                <a href="controller.php?from=logout" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <!-- item-->
                <a></a>
                
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">