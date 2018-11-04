	<div id="header">
		<div class="header5">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="contact-top">
							<p><span><i class="fa fa-phone-square"></i></span> Call Center Support 24/7: <span><?=$user_details->phone_number?></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<?php if($session == $user_details->user_token){?>
						<span style="color: #fff;margin-left: 293px;">You are logged in as a store owner</span>
						<img class="img-circle" src="<?=$user_details->image?>" alt="User Image" style="width:40px;height:40px; float: right";>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-3 col-xs-12">
						<div class="logo6">
							<a href="<?=$current_url?>"><img alt="" src="<?=ImageHelper::cloudinary($store_details->logo,$opt)?>"></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-9 col-xs-12">
						<div class="smart-search smart-search6">
							<div class="select-category">
								<a class="category-toggle-link" href="#"><span>All Categories</span></a>
								<ul class="list-category-toggle sub-menu-top">
									<?php
									foreach($category_name as $individual_name){
										$name = $individual_name->category_name; 

										?>
										<li><a href="#"><?=$name?></a></li>

									<?php  }?>
								</ul>
							</div>
							<form class="smart-search-form">
								<input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="I am looking for...">
								<input type="submit" value="">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-nav6">
			<div class="container">
				<div class="row">
					<div class="col-md-11 col-sm-12 col-xs-6">
						<nav class="main-nav main-nav6">
							<ul>
								<li><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>">Home</a></li>
                                <li><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/all-products">Packages</a></li>
                                <li><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/contact-us">Contact-us</a></li>
							<!--	<li><a href="<?/*=$current_url*/?>/contact-us">Contact Us</a></li>
								<li><a href="<?/*=$current_url*/?>/about-us">About Us</a></li>-->
							</ul>
							<a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
						</nav>
						<!-- End Main Nav --></div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Header -->
	