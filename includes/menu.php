<nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>

                            <li class="submenu"><a href="index.php">Home</a></li>
                            <li class="submenu"><a href="tour-packages.php">Tour Packages</a></li>
                            <li class="submenu"><a href="announcements.php">Announcements</a></li>
                            <li class="submenu"><a href="feedbacks.php">Feedbacks</a></li>
                            <li class="submenu"><a href="about-us.php">About Us</a></li>
                            <li class="submenu"><a href="contact-us.php">Contact Us</a></li>
                             <?php if (isset($_SESSION['profileId'])): ?>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">My Account<i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="my-bookings.php">My Bookings</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
        
                                </ul>
                            </li>
                            <?php endif ?>
                            

                            <?php if (!isset($_SESSION['profileId'])): ?>
                               <li class="submenu"><a href="login.php">Log in</a></li>
                               <li class="submenu"><a href="register.php">Register</a></li>
                            <?php endif ?>

                         


                       
                        </ul>
                    </div><!-- End main-menu -->
                
                </nav>