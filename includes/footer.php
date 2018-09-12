 <footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+09168574996</a>
                    <a href="mailto:help@jaag.com" id="email_footer">help@jaag.com</a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="about-us.php">About Us</a></li>
                      
                        <?php if (!isset($_SESSION['profileId'])): ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        <?php endif ?>
                     
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="feedbacks.php">Feedbacks</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <li><a href="announcements.php">Announcements</a></li>
                       
                    </ul>
                </div>
          
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="https://www.facebook.com/jaagtravelandtour23/"><i class="icon-facebook"></i></a></li>
              
                        </ul>
                        <p>© JAAG <?php echo date('Y'); ?></p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->
    
    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon_set_1_icon-78"></i>
            </button>
        </form>
    </div><!-- End Search Menu -->

    <!-- Common scripts -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="js/functions.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="rev-slider-files/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="rev-slider-files/js/extensions/revolution.extension.video.min.js"></script>
    <link href="css/timeline.css" rel="stylesheet">

<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/daterangepicker.min.js"></script>
<!-- Specific scripts -->
    <script src="js/tabs.js"></script>
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>
    <script>
        $('.wishlist_close_admin').on('click', function (c) {
            $(this).parent().parent().parent().fadeOut('slow', function (c) {});
        });
    </script>

<script src="assets/toastr/toastr.js"></script>





    <?php 
    if (isset($_SESSION['do'])): ?>

        <script>
            <?php if ($_SESSION['do'] == 'added'): ?>
                toastr["success"]("Successfully added!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated'): ?>
                toastr["success"]("Successfully updated!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'deleted'): ?>
                toastr["success"]("Successfully deleted!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'updated-password-failed'): ?>
                toastr["error"]("Update password failed! Please try again.", "Error");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'login-failed'): ?>
                toastr["error"]("Login Failed! Wrong account.", "Error");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'login-success'): ?>
                toastr["success"]("Login Success!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'registration-success'): ?>
                toastr["success"]("Registration Success!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'logout'): ?>
                toastr["success"]("Successfully logout!", "Message");
            <?php endif ?>
            <?php if ($_SESSION['do'] == 'username-taken'): ?>
                toastr["error"]("Username is already taken!", "Message");
            <?php endif ?>



          
        </script>



    <?php endif ?>



        <?php
        if (isset($_SESSION['do'])) {
            unset($_SESSION['do']);
        }
        ?>

    <script type="text/javascript">
        $('input[name="dates"]').daterangepicker({
            minDate : new Date()
        });
    </script>
    <script type="text/javascript">
        var tpj = jQuery;

        var revapi54;
        tpj(document).ready(function () {
            if (tpj("#rev_slider_54_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_54_1");
            } else {
                revapi54 = tpj("#rev_slider_54_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "rev-slider-files/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                            keyboardNavigation:"off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
                            onHoverStop:"off",
                            touch:{
                                touchenabled:"on",
                                touchOnDesktop:"off",
                                swipe_threshold: 75,
                                swipe_min_touches: 50,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            }
                            ,
                            arrows: {
                                style:"uranus",
                                enable:true,
                                hide_onmobile:true,
                                hide_under:778,
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                tmp:'',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                }
                            }
                        },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [700, 550, 860, 480],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],
                        disable_onmobile: "on"
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>
    
    <!-- Cat nav mobile -->
    <script src="js/cat_nav_mobile.js"></script>
    <script>
        $('#cat_nav').mobileMenu();
    </script>
    <!-- Check and radio inputs -->
    <script src="js/icheck.js"></script>
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey'
        });
    </script>
    <!-- Map -->
<!--Review modal validation -->
    <script src="assets/validate.js"></script>
    

</body>

</html>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3CL__ArRSv8my9WeW3ealb1WOquARXJA&callback=initMap"
    async defer></script>
