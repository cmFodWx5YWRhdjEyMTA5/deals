<br>

<footer>
    <div id="footer2">
        <div class="footer footer-home">
            <div class="container">
                <div class="footer-top">
                    <div class="logo-footer">
                        <a href="/"><img src="<?=$baseUrl?>/images/logo.jpg" alt="Company Logo" width="240" height="52" /></a>
                    </div>
                    <div class="menu-footer">
                        <ul>
                            <li><a href="#">Online Shop</a></li>
                            <li><a href="#">Broadband Packages</a></li>
                            <li  class="<?php if($active_menu == 'help') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="https://www.bdbroadbanddeals.com/help">FAQs</a></li>
                            <li><a href="http://www.btrc.gov.bd/" target="_blank">BTRC Links</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list-footer-box">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h2>My Account</h2>
                                <ul class="footer-menu-box">
                                    <?php if (!$session){ ?>

                                        <li class="top-mobile"><a href="<?php echo 'https://www.bdbroadbanddeals.com/sign-in'; ?>"> Sign in</a></li>
                                        <li class="top-mobile"><a href="<?php echo 'https://www.bdbroadbanddeals.com/sign-in'; ?>"> Register</a></li>
                                    <?php } ?>
                                    <?php if ($session){ ?>
                                        <li class="top-account has-child">
                                            <a href="javascript:void(0);">My Account</a>
                                            <ul class="sub-menu-top">
                                                <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/my-profile/dashboard'?>"> My Profile</a></li>
                                                <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/my-profile/my-ads';?>"> My ads</a></li>
                                                <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/logout';?>"> Logout</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <p>&nbsp;</p>
                            <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=NPmaTd2Shq3eOJTc8KPEYrnY6lSwsieq4c0gMrzU4mfVOUoMTocze5F0K6sT"></script></span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h2>Our Services</h2>
                                <ul class="footer-menu-box">
                                    <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/recently-viewed-ad'; ?>">Recently Viewed</a></li>
                                    <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/help';?>">Help/Support</a></li>
                                    <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/contact-us';?>">Advertise With Us</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h2>Further information</h2>
                                <ul class="footer-menu-box">
                                    <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/contact-us';?>">Contact Us</a></li>
                                    <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/terms-&-conditions';?>">Terms & Conditions</a></li>
                                    <li  class="<?php if($active_menu == 'help') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="<?php echo 'https://www.bdbroadbanddeals.com/help';?>">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h2>Contact Us</h2>
                                <ul class="footer-box-contact">
                                    <li><i class="fa fa-home"></i> 944 Upper Jashore Road (1st Floor),Joragate Moor,Khulna-9000,Bangladesh.</li>
                                    <li><i class="fa fa-mobile"></i> 09610203060, 09639114455</li>
                                    <li><i class="fa fa-envelope"></i> <a href="mailto:support@bdbroadbanddeals.com">support@bdbroadbanddeals.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright text-center">
                                <p> All Rights Reserved &copy; <a href="http://bdbroadbanddeals.com">bdbroadbanddeals</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer Bottom -->
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(window).scroll(function(){
      var sticky = $('.header'),
          scroll = $(window).scrollTop();

      if (scroll >= 100) sticky.addClass('sticky');
      else sticky.removeClass('sticky');
      
    });

    $(".number_input").keydown(function(e){if($.inArray(e.keyCode,[46,8,9,27,13,110,190])!==-1||(e.keyCode===65&&(e.ctrlKey===true||e.metaKey===true))||(e.keyCode>=35&&e.keyCode<=40)){return;}
    if((e.shiftKey||(e.keyCode<48||e.keyCode>57))&&(e.keyCode<96||e.keyCode>105)){e.preventDefault();}});
</script>
