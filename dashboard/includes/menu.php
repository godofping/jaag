<!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                     
                        <li class="nav-small-cap">Menu</li>

                        <li> <a href="home.php" class="waves-effect waves-dark"><i class="mdi mdi-gauge"></i>Dashboard</a></li>

                        <li> <a href="booking-schedules.php" class="waves-effect waves-dark"><i class="mdi mdi-calendar"></i>Booking Schedules</a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Bookings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-booking.php">Add Booking</a></li>
                                <li><a href="travel-and-tour.php">Travel and Tour</a></li>
                            
                            </ul>
                        </li>

                        <li><a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-washing-machine"></i><span class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="packages.php">Packages</a></li>
                              
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Customers</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="walk-in-customers.php">Walk-in Customers</a></li>
                                <li><a href="online-customers.php">Online Customers</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Billings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="payment-transactions.php">Payment Transactions</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="bookings-schedules.php">Booking Schedules</a></li>
                                <li><a href="customer-information.php">Customer Information</a></li>
                                <li><a href="unattended-customers.php">Unattended Customers</a></li>
                                <li><a href="cancellation.php">Cancellation</a></li>
                                <li><a href="report-payment-transactions.php">Payment Transaction</a></li>
                                <li><a href="statistical-reports.php">Statistical Report</a></li>
                            </ul>
                        </li>

                        <?php if ($_SESSION['accountType'] == 'Administrator'): ?>
                            <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="attendants.php">Attendants</a></li>
                                <li><a href="places.php">Places</a></li>
                                <li><a href="back-up-and-restore.php">Back-up and Restore</a></li>
                            </ul>
                        </li>

                        <?php endif ?>

                                             
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->