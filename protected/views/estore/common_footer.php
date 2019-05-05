<div id="footer">
		<div class="newsletter6">
			<div class="container">
				<div class="newsletter-form">

				</div>
			</div>
		</div>
		<div class="footer6">
			<div class="container">
				<div class="list-footer-box6">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="footer-box6 first-item">
								<h2 class="estore">ABOUT US</h2>
							    <p><?=$store_details->about_us?></p>
							</div>
						</div>
						<!-- <div class="col-md-4 col-sm-6 col-xs-12">
							<div class="footer-box6">
								<h2>WHY BUY FROM US</h2>
								<ul class="footer-menu-box">

									<li><a href="#">Secure Shopping</a></li>
									<li><a href="#">Group Sales</a></li>
									<li><a href="#">Orders and Returns</a></li>
								</ul>
							</div>
						</div> -->

						<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-box6 footer-contact6">
                                <h2 class="estore">Contact Us</h2>
                                <ul class="footer-box-contact">
                                    <li><i class="fa fa-home isp"></i> <?=$user_details->address?></li>
                                    <?php if(!empty($store_details->company_hotline_number)){ ?>
                                        <li><i class="fa fa-mobile isp"></i><?="Hotline Phone Number: ".$store_details->company_hotline_number?></li>
                                    <?php } ?>
                                    <?php if(!empty($store_details->sales_phone_number) && ($store_details->company_hotline_number != $store_details->sales_phone_number)){ ?>
                                        <li><i class="fa fa-mobile isp"></i><?="Sales Phone Number: ".$store_details->sales_phone_number?></li>
                                    <?php } ?>
                                    <?php if(!empty($store_details->company_email)){ ?>
                                        <li><i class="fa fa-envelope isp"></i> <a href="mailto:<?=$store_details->company_email?>" class="isp"><?=$store_details->company_email?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-box6">
                                <div class="social-footer social-network">
                                    <ul>
                                        <?php if(!empty($store_details->facebook_link)) { ?>
                                            <li><a target="_blank" href="<?=Generic::getURLwithScheme($store_details->facebook_link)?>"><img alt="facebook" src="<?=$base_url?>/images/home1/s1.png"></a></li>
                                        <?php } ?>
                                        <?php if(!empty($store_details->twitter_link)) { ?>
                                            <li><a target="_blank" href="<?=Generic::getURLwithScheme($store_details->twitter_link)?>"><img alt="twitter" src="<?=$base_url?>/images/home1/s2.png"></a></li>
                                        <?php } ?>
                                        <?php if(!empty($store_details->linkedin_link)) { ?>
                                            <li><a target="_blank" href="<?=Generic::getURLwithScheme($store_details->linkedin_link)?>"><img alt="LinkedIn" src="<?=$base_url?>/images/home1/s3.png"></a></li>
                                        <?php } ?>
                                        <?php if(!empty($store_details->google_plus_link)) { ?>
                                            <li><a target="_blank" href="<?=Generic::getURLwithScheme($store_details->google_plus_link)?>"><img alt="Google Plus" src="<?=$base_url?>/images/home1/s4.png"></a></li>
                                        <?php } ?>
                                        <?php if(!empty($store_details->web_address)) { ?>
                                            <li><a target="_blank" href="<?=Generic::getURLwithScheme($store_details->web_address)?>"><img alt="Google Plus" src="<?=$base_url?>/images/home1/s7.png"></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p class="footer_powered_by">Powered by <a href="http://www.bdbroadbanddeals.com" target="_blank">BD Broadband Deals</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>