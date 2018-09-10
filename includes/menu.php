<nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>

                            <li class="submenu"><a href="javascript:void(0);">Home</a></li>
                            <li class="submenu"><a href="javascript:void(0);">Tour Packages</a></li>
                            <li class="submenu"><a href="javascript:void(0);">Announcements</a></li>
                            <li class="submenu"><a href="javascript:void(0);">Feedbacks</a></li>
                            <li class="submenu"><a href="javascript:void(0);">About</a></li>
                            <li class="submenu"><a href="javascript:void(0);">Contact Us</a></li>
                             <?php if (isset($_SESSION['profileId'])): ?>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">My Accounts <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="my-bookings.php">My Bookings</a></li>
                                    <li><a href="view-profile.php">View Profile</a></li>
                                    <li><a href="update-profile.php">Update Profile</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
        
                                </ul>
                            </li>
                            <?php endif ?>


                       
                        </ul>
                    </div><!-- End main-menu -->
                
                </nav>