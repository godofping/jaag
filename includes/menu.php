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
                    
                            
                            <?php if (isset($_SESSION['profileId'])): ?>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">My Accounts <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="all_restaurants_list.html">My Bookings</a></li>
                                    <li><a href="all_restaurants_list.html">View Profile</a></li>
                                    <li><a href="all_restaurants_list.html">Update Profile</a></li>
                                    <li><a href="all_restaurants_list.html">Change Password</a></li>
        
                                </ul>
                            </li>
                            <?php endif ?>
                            <li class="submenu"><a href="javascript:void(0);">About</a></li>
                            <li class="submenu"><a href="javascript:void(0);">Contact Us</a></li>


                       
                        </ul>
                    </div><!-- End main-menu -->
                
                </nav>