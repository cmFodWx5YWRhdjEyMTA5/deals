<?php

$baseUrl = Yii::app()->getBaseUrl(true);

$category_list = Generic::getAllCategory();
$all_category_list = Generic::getAllCategoryData();

//$token = Yii::app()->request->getParam('uid');
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$register_type = isset($profile_data) && !empty($profile_data)? $profile_data['register_type']:'';

$session =  Yii::app()->session['user_token'];
$user_selected_location =  Yii::app()->session['user_location'];

$style = "";
if($register_type=="business"){
	$style = "display:none";
}

$select_location = (isset($_REQUEST['selected_location']) && $_REQUEST['selected_location'] != '') ? $_REQUEST['selected_location'] : "Select Location" ;
$search_keyword= (isset($_REQUEST['q'])) ? $_REQUEST['q'] : "" ;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$image = $baseUrl."/images/img/default.jpg";
if($profile_data['image']) {
	$image = isset($profile_data['image']) ? $profile_data['image'] : '';
}

$opt_estore_logo = array( "height" => 65, "gravity" => "center", "radius" => 0,"fetch_format" => "jpg");


$url_change_for_country_code = '';
if($country_code){
	$url_change_for_country_code = $country_code.'/';
}

$opt_electronics_first = array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "first-thumb owl-lazy");
$opt_electronics_second = array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "second-thumb owl-lazy");

?>

<?php /*echo $this->renderPartial('../elements/_search_form'); */?>


<!-- main -->

<!-- Newsletter and social widget end-->


	<div id="content">

		<!-- slider starts -->

		<div id="wrapper" class="slider_wrapper">
			<div class="container">
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">
						
							<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;">
								<!-- slider here -->
								<ul class="rslides" id="slider4">
									<?php
									if(isset($home_page_slider_ads) && !empty($home_page_slider_ads)){
										$opt_home_page_slider = array( "height" => 415, "gravity" => "center", "radius" => 0,"fetch_format" => "jpg");
										$counter = 1;
										foreach($home_page_slider_ads as $individual_ads){
											$image_name = $individual_ads['banner_image'];
											?>
											<li>
												<?php if(isset($individual_ads['banner_url']) && !empty($individual_ads['banner_url']) && $individual_ads['banner_url'] != '#') { ?>
													<a href="<?php echo $individual_ads['banner_url'] ?>" target="_blank">
												<?php }
													$image_helper->getScaledImageFromCloudinary($image_name,$opt_home_page_slider);
												?>
												<?php if(isset($individual_ads['banner_url']) && !empty($individual_ads['banner_url'])) { ?>
													</a>
												<?php } ?>
											</li>
											<?php $counter++; }}?>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<!-- Slider ends -->

		
		<div class="clear"></div>

		
		<div class="list-service-box">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12">
				  		<h3 style="text-align: center;">Find The Right Internet Package </h3>
				        <form class="form-my-account _search_form" action="site/FindTheRightPackage" method="GET">
				            <div class="row">
					            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
					            	<select name="division" class="form-control" id="division">
					            		<?php
                                                echo '<option value="0">Select Division</option>';
                                                foreach ($divisions as $division) {
                                                    echo '<option value="' . $division->division_id . '">' . $division->division . '</option>';
                                                }
                                        ?>
					            	</select>
					        	</div>

					        	<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
						            <select name="district" class="form-control" id="district">
						            	<?php
                                                echo '<option value="0">Select District</option>';
                                                foreach ($districts as $district) {
                                                    echo '<option value="' . $district->district_id . '">' . $district->district . '</option>';
                                                }
                                         ?>
						            </select>
					        	</div>
					        	<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
						            <select name="thana" id="thana" class="form-control">
						            	<?php
						            	echo '<option value="0">Select Thana</option>';
										foreach ($thanas as $thana) {
										    echo '<option value="' . $thana->thana_id . '">' . $thana->thana . '</option>';
										}
										?>
						            </select>
					        	</div>
					            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
						            <input type="submit" class="js-submit-button"  value="Find Package" />
					            </div>
				        	</div>
				        </form>
				</div>
			</div>
		</div>
        <div class="home-brand-slider banner-ad-slider">
			<div class="wrap-item">
				<?php foreach ($find_package_bottom_slider_ads as $slider_banner) { ?>
					<div class="item">
						<img src="<?php if(isset($slider_banner['banner_image'])){ echo $slider_banner['banner_image']; } else { echo ""; } ?>" alt="<?php if(isset($slider_banner['title'])) { echo $slider_banner['title']; }else { echo "";} ?>">
					</div>				
				<?php } ?>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End List Service -->
		<div class="list-tab-product">
			<div class="container">

				<!-- Brand Showcase -->
				<section id="displayKSBrand-main" class="main-content">
					<div class="">
						<div id="displayKSBrand">
							<div class="megacategory brand_tabs">
								<div class="brand-showcase  mc_brand_tabs">
									<h2 class="brand-showcase-title first_border_bottom_ff3366">ISP Corner</h2>
								</div>
								<div class="brand-showcase-box">
									<ul class="brand-list brand-list-owl">

										<?php
										if($top_estore != null) {
											$counter = 1;
										foreach ($top_estore as $store) {
										$store = (object) $store;
										$store_banners = json_decode($store->banner);
											$active = '';
											if($counter == 1){
												$active= "active";
											}
										?>
											<li class="second_border_bottom_hover_ <?=$active?>">
											<a data-toggle="tab" href="#brand_tabs_tab_<?=$counter?>"
											   class="text-center tab-link first_color_333333 second_color_hover_"
											   title="<?php echo $store->enterprise_name; ?>">
												<?php echo $store->enterprise_name; ?>
											</a>
										</li>
										<?php
											$counter++;
										} } ?>
									</ul>
									<div class="tab-content">
										<?php
										if($top_estore != null) {
										$counter = 1;
										foreach ($top_estore as $store) {
										$store = (object) $store;
										$store_banners = json_decode($store->banner);
										$active = '';
										if($counter == 1){
											$active= "active";
										}
											$products = Generic::getEstoreProductsFromUserId($store->user_id);
											$opt_logo = array( "width" => 320, "height" => 90, "gravity" => "center", "radius" => 0,"fetch_format" => "jpg");

										?>


										<div id="brand_tabs_tab_<?=$counter?>" class="tab-pane fade in <?=$active?>">
											<div class="row">
												<div class="col-xs-12 col-sm-4 trademark-info">
													<div class="trademark-logo">
														<a title="<?=$store->enterprise_name?>" target="_blank" href="isp/<?php echo $store->url_alias ?>">
															<?php
															$image_helper->getScaledImageFromCloudinary($store->logo,$opt_logo);
															?>
														</a>
													</div>
													<div class="trademark-desc"><p><?=$store->slogan?></p></div>
													<a target="_blank" href="isp/<?php echo $store->url_alias ?>" class="trademark-link" title="<?php echo $store->url_alias ?>">Company View Details</a>

													<div class="clearfix"></div>
												</div>


												<?php

												if(isset($products) && !empty($products)){?>
												<div class="col-xs-12 col-sm-8 trademark-product">

													<div class="row">

														<?php

															foreach($products as $individual_product){
																$images = json_decode($individual_product['image_url']);
																$ad_url = Generic::getAdUrlFromAdId($individual_product['id'],'');

																$ad_views = Generic::getTotalAdView($individual_product['id']);
																$view_count = array_sum(array_column($ad_views, 'view_count'));

																/*$favorite_counter = 0;
																
																$favorite_counter = Generic::getTotalFavoriteCount($individual_product['id']);*/

																$discount = round($individual_product['discount']);
																$total_price = (int)$individual_product['price'];
																$discounted_total = $total_price - ($total_price * ((int)$discount/100));



																$opts = array( "width" => 125, "height" => 130, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "replace-2x img-responsive","itemprop" => "image");

															?>

                                                             	<div class="product-list-brand item-animation col-lg-6 col-md-6 col-sm-6 col-xs-12 col-ts-12">
															<div class="product-container product product-item" itemscope itemtype="">
																<div class="image-product">
																	<a class="product_img_link" target="_blank" href="<?=$ad_url?>" title="<?=$individual_product['title']?>" itemprop="url">
																		<?php
																		$image_helper->getScaledImageFromCloudinary($images[0],$opts);
																		?>
																	</a>
																</div>
																<div class="info-product">
																	<h5 itemprop="name">
																		<a class="product-name"  target="_blank" href="<?=$ad_url?>" title="<?=$individual_product['title']?>" itemprop="url"><?=$individual_product['title']?></a>
																	</h5>

																	<?php if($individual_product['show_price']){
																		if($individual_product['discount']){?>
																			<div class="content_price">
																				<span class="product-price">&#2547; <?=$discounted_total?></span>
																				<del>&#2547; <?=(int)$individual_product['price']?></del>
																				<div class="clearfix"></div>
																			</div>
																			<?php } else {?>
																	<div class="content_price">
																		<span class="product-price">&#2547; <?=(int)$individual_product['price']?></span>

																		<div class="clearfix"></div>
																	</div>
																	<?php }} ?>
																	<div class="product-star">
																		<div class="comments_note" itemprop="aggregateRating" itemscope itemtype="">
																			<div class="star_content clearfix">

																				<i class="fa fa-eye" style="color: #0083c9"> </i> <span><?=$view_count?></span>

																				<!-- <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite"> <?=$favorite_counter?></span> -->


																				<meta itemprop="worstRating" content="0"/>
																				<meta itemprop="ratingValue" content="4"/>
																				<meta itemprop="bestRating" content="5"/>
																			</div>
                                                                    <span class="nb-comments hidden"><span
																			itemprop="reviewCount">1</span> (s)</span>
																		</div>

																	</div>
																	<a class="btn-view-more" title="View More" target="_blank"
																	   href="<?=$ad_url?>">View More</a>
																</div>
																<div class="clearfix"></div>
															</div>
														</div>

														<?php }?>


													</div>
												</div>
												<?php }?>

											</div>
										</div>

											<?php $counter++; } }?>

									</div>
								</div>
							</div>


						</div>
					</div>
					<div class="md-margin"></div>
					<div class="clearfix"></div>
				</section>


			</div>
		</div>

<a name="isp_accessories" class="estore_pointer"></a>

		<!-- Top Sections   -->
		<div class="main-content-home">
			<div class="container">

				<div class="box-adv-col2">
					<div class="row">
						<div class="home-brand-slider col-md-6 col-sm-12 col-xs-12">
							<div class="wrap-item">
								<?php foreach ($estore_left_slider_ads as $slider_banner) { ?>
									<div class="item-adv-simple">
										<a href="#"><img src="<?php if(isset($slider_banner['banner_image'])){ echo $slider_banner['banner_image']; } else { echo ""; } ?>" alt="<?php if(isset($slider_banner['title'])) { echo $slider_banner['title']; }else { echo "";} ?>"></a>
									</div>				
								<?php } ?>
							</div>
						</div>
						<div class="home-brand-slider col-md-6 col-sm-12 col-xs-12">
							<div class="wrap-item">
								<?php foreach ($estore_right_slider_ads as $slider_banner) { ?>
									<div class="item-adv-simple">
										<a href="#"><img src="<?php if(isset($slider_banner['banner_image'])){ echo $slider_banner['banner_image']; } else { echo ""; } ?>" alt="<?php if(isset($slider_banner['title'])) { echo $slider_banner['title']; }else { echo "";} ?>"></a>
									</div>				
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
<!-- ISP Accessories Section Starts   -->
				<div class="clearfix category-product-featured blue-box">
					<div class="category-home-total">
						<div class="category-home-label">
							<a href="<?=$baseUrl?>/ad-list?category_slug=isp-accessories">
								<div class="category-icon-sprite mobile-icon"></div>
								<span class="category-icon-text">ISP Accessories</span>
							</a>
						</div>

						<!-- End Filter -->
						<div class="list-child-category">
							<ul>
								<?php

								$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id = 9 LIMIT 6")->queryAll();
								$category_html = "";
								if(!empty($result)){
									foreach($result as $category){
										$category_name = $category['category_name'];
										$sub_category_slug = $category['sub_category_slug']; ?>
										<li><a target="_blank" href="<?=$baseUrl?>/ad-list?sub_category_slug=<?=$sub_category_slug?>" style="text-align:justify; content:"><span><?=$category_name?></span></a></li>
									<?php }}?>
							</ul>
						</div>
						<!-- End List Tab Category -->
						<div class="category-brand-slider">
							<div class="wrap-item">
								<?php foreach($mobile_estore as $estore){ ?>
									<div class="item">
										<div class="item-category-brand">
											<a href="<?php echo $baseUrl.'/e-store/'.$estore->url_alias ?>" target="_blank">
												<?php
												$image_helper->getScaledImageFromCloudinary($estore->logo,$opt_estore_logo);
												?>
											</a>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<!-- End Category Brand Slider -->
					</div>
					<div class="banner-home-category mobile">
						<div class="item-adv-simple">
							<a href="<?=$baseUrl?>/ad-list?category_slug=isp-accessories"><img src="<?=$baseUrl?>/images/home1/isp_accessories_thumb.png" alt="" width="234" style="padding: 65px 0 65px 0" /></a>
						</div>
					</div>
					<div class="featured-product-category">
						<div class="wrap-item">
							<?php
							$counter = 1;
							$favorite_ads = Generic::getAllFavoritesAds();
							foreach($all_ads_mobile as $single_product){
								$ad_url = Generic::getAdUrlFromAdId($single_product['id']);

								$current_date = date('Y-m-d');
								$expire_date = isset($single_product['expire_date']) ? $single_product['expire_date'] : '';
								if ($expire_date >= $current_date) {
									$images = json_decode($single_product['image_url']);
									$fav_params = "this,'".$single_product['id']."'";

									$favorites_class = "";
									$favorites_title = "Ad as favorite";
									if(in_array($single_product['id'],$favorite_ads)){
										$favorites_class = "favorite-active";
										$favorites_title = "Remove From favorite";

									}

									$discount = isset($single_product['discount']) ? round((int)$single_product['discount']) : 0;
									$total_price = isset($single_product['price']) ? (int)$single_product['price'] : 0;
									
									$discounted_total = $total_price - ($total_price * ($discount/100));

									?>
									<div class="item">
										<div class="item-category-featured-product">
											<div class="product-thumb">
												<a target="_blank" href="<?=$ad_url?>" class="product-thumb-link">
													<?php
													$image_helper->getScaledImageFromCloudinary($images[0],$opt_electronics_first);
													$image_helper->getScaledImageFromCloudinary($images[0],$opt_electronics_second);
													?>
												</a>
												<div class="product-info-cart">
													<div class="product-extra-link">
														<a href="javascript:void(0);" class="wishlist-link favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params?>)"><i class="fa fa-heart-o"></i></a>
														<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
														<a href="javascript:void(0);" data-item="<?php echo $single_product['id'] ?>" class="quickview-link"><i class="fa fa-search"></i></a>
													</div>
													<a target="_blank" href="<?=$ad_url?>" class="addcart-link"><i class="fa fa-shopping-basket"></i> View Details</a>
												</div>
											</div>
											<div class="product-info">
												<h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$single_product['title']?></a></h3>
												<?php if($single_product['show_price']){ ?>
												<div class="info-price">
													<?php if($single_product['discount']){?>

														<span>&#2547; <?=(int)$discounted_total?></span>
														<del>&#2547; <?=(int)$single_product['price']?></del>
													<?php } else { ?>
														<span>&#2547; <?=(int)$single_product['price']?></span>
													<?php } ?>
												</div>
												<?php } ?>
											</div>
											<?php if($single_product['discount']){?>
												<div class="percent-saleoff">
													<span style="color: white;"><label><?=round($single_product['discount'])?>%</label> OFF</span>
												</div>
											<?php }?>

										</div>
									</div>

									<?php
									$counter++;
								}}?>


							<!-- End Item -->
						</div>
					</div>
				</div>
				<!-- ISP Accessories Category Section End -->				

<!-- Electronics Category Section Starts   -->
				<div class="clearfix category-product-featured blue-box">
					<div class="category-home-total">
						<div class="category-home-label">
							<a href="<?=$baseUrl?>/ad-list?category_slug=electronics_appliance">
								<div class="category-icon-sprite electronics-icon"></div>
								<span class="category-icon-text">Electronics</span>
							</a>
						</div>

						<!-- End Filter -->
						<div class="list-child-category">
							<ul>
								<?php

								$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id = 3 LIMIT 6")->queryAll();
								$category_html = "";
								if(!empty($result)){
								foreach($result as $category){
								$category_name = $category['category_name'];
								$sub_category_slug = $category['sub_category_slug']; ?>
									<li><a target="_blank" href="<?=$baseUrl?>/ad-list?sub_category_slug=<?=$sub_category_slug?>" style="text-align:justify; content:"><span><?=$category_name?></span></a></li>
								<?php }}?>
							</ul>
						</div>
						<!-- End List Tab Category -->
						<div class="category-brand-slider">
							<div class="wrap-item">
								<?php foreach($electronic_estore as $estore){ ?>
								<div class="item">
									<div class="item-category-brand">
										<a href="<?php echo $baseUrl.'/e-store/'.$estore->url_alias ?>" target="_blank">
											<?php
											$image_helper->getScaledImageFromCloudinary($estore->logo,$opt_estore_logo);
											?>
										</a>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- End Category Brand Slider -->
					</div>
					<div class="banner-home-category electronics">
						<div class="item-adv-simple">
							<a href="<?=$baseUrl?>/ad-list?category_slug=electronics_appliance">
								<img src="<?=$baseUrl?>/images/home1/router_thumb.png" alt="" width="234" height="360" />
							</a>
						</div>
					</div>
					<div class="featured-product-category">
						<div class="wrap-item">
							<?php
							$counter = 1;
							$favorite_ads = Generic::getAllFavoritesAds();
							foreach($all_ads_electronics as $single_product){
							$ad_url = Generic::getAdUrlFromAdId($single_product['id']);

							$current_date = date('Y-m-d');
							$expire_date = isset($single_product['expire_date']) ? $single_product['expire_date'] : '';
							if ($expire_date >= $current_date) {
							$images = json_decode($single_product['image_url']);
							$fav_params = "this,'".$single_product['id']."'";

							$favorites_class = "";
							$favorites_title = "Ad as favorite";
							if(in_array($single_product['id'],$favorite_ads)){
								$favorites_class = "favorite-active";
								$favorites_title = "Remove From favorite";

							}

							$discount = isset($single_product['discount']) ? (int)round($single_product['discount']) : 0;
							$total_price = isset($single_product['price']) ? (int)$single_product['price'] : 0;
								
							$discounted_total = $total_price - ($total_price * ($discount/100));
							?>
							<div class="item">
								<div class="item-category-featured-product">
									<div class="product-thumb">
										<a target="_blank" href="<?=$ad_url?>" class="product-thumb-link">
											<?php
												$image_helper->getScaledImageFromCloudinary($images[0],array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "first-thumb owl-lazy","data-src" =>$images[0],"data-src-retina" => $images[0]));
												$image_helper->getScaledImageFromCloudinary($images[0],array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "second-thumb owl-lazy","data-src" =>$images[0],"data-src-retina" => $images[0]));
											?>
										</a>
										<div class="product-info-cart">
											<div class="product-extra-link">
												<a href="javascript:void(0);" class="wishlist-link favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params?>)"><i class="fa fa-heart-o"></i></a>
												<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
												<a href="javascript:void(0);" data-item="<?php echo $single_product['id'] ?>" class="quickview-link"><i class="fa fa-search"></i></a>
											</div>
											<a target="_blank" href="<?=$ad_url?>" class="addcart-link"><i class="fa fa-shopping-basket"></i> View Details</a>
										</div>
									</div>
									<div class="product-info">
										<h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$single_product['title']?></a></h3>
										<?php if($single_product['show_price']){ ?>
										<div class="info-price">
								<?php if($single_product['discount']){?>

											<span>&#2547; <?=$discounted_total?></span>
											<del>&#2547; <?=$single_product['price']?></del>
								<?php } else { ?>
									<span>&#2547; <?=$single_product['price'].$price_end?></span>
								<?php } ?>
										</div>
										<?php } ?>
									</div>
								<?php if($single_product['discount']){?>
									<div class="percent-saleoff">
										<span style="color: white;"><label><?=round($single_product['discount'])?>%</label> OFF</span>
									</div>
								<?php }?>

								</div>
							</div>

								<?php
								$counter++;
							}}?>


							<!-- End Item -->
						</div>
					</div>
				</div>
				<!-- Electronics Category Section End -->

				<!-- Security Category Section Starts   -->
				<div class="clearfix category-product-featured blue-box">
					<div class="category-home-total">
						<div class="category-home-label">
							<a href="<?=$baseUrl?>/ad-list?category_slug=security_n_alarming_system">
								<div class="category-icon-sprite security-icon"></div>
								<span class="category-icon-text">Security</span>
							</a>
						</div>

						<!-- End Filter -->
						<div class="list-child-category">
							<ul>
								<?php

								$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id = 4 LIMIT 6")->queryAll();
								$category_html = "";
								if(!empty($result)){
									foreach($result as $category){
										$category_name = $category['category_name'];
										$sub_category_slug = $category['sub_category_slug']; ?>
										<li><a target="_blank" href="<?=$baseUrl?>/ad-list?sub_category_slug=<?=$sub_category_slug?>" style="text-align:justify; content:"><span><?=$category_name?></span></a></li>
									<?php }}?>
							</ul>
						</div>
						<!-- End List Tab Category -->
						<div class="category-brand-slider">
							<div class="wrap-item">
								<?php foreach($security_estore as $estore){ ?>
									<div class="item">
										<div class="item-category-brand">
											<a href="<?php echo $baseUrl.'/e-store/'.$estore->url_alias ?>" target="_blank">
												<?php
												$image_helper->getScaledImageFromCloudinary($estore->logo,$opt_estore_logo);
												?>
											</a>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<!-- End Category Brand Slider -->
					</div>

					<div class="banner-home-category security">
						<div class="item-adv-simple">
							<a href="<?=$baseUrl?>/ad-list?category_slug=security_n_alarming_system">
								<h2 style="color: #fff; padding: 32px 9px 0px 18px; font-size: 26px;">Security Camera</h2>
								<img src="<?=$baseUrl?>/images/home1/security_thumb.png" alt="" width="234" style="padding: 5px 0 60px 0" /></a>
						</div>
					</div>
					<div class="featured-product-category">
						<div class="wrap-item">
							<?php
							$counter = 1;
							$favorite_ads = Generic::getAllFavoritesAds();
							foreach($all_ads_security as $single_product){
								$ad_url = Generic::getAdUrlFromAdId($single_product['id']);

								$current_date = date('Y-m-d');
								$expire_date = isset($single_product['expire_date']) ? $single_product['expire_date'] : '';
								if ($expire_date >= $current_date) {
									$images = json_decode($single_product['image_url']);
									$fav_params = "this,'".$single_product['id']."'";

									$favorites_class = "";
									$favorites_title = "Ad as favorite";
									if(in_array($single_product['id'],$favorite_ads)){
										$favorites_class = "favorite-active";
										$favorites_title = "Remove From favorite";

									}

									$discount = isset($single_product['discount']) ? round($single_product['discount']) : '';
									$total_price = isset($single_product['price']) ? $single_product['price'] : '';
									$price_end = is_null($single_product['price_end']) || $single_product['price_end'] == 0 || $single_product['price_end'] == $single_product['price'] ? '' : ' - '.$single_product['price_end'];
									$discounted_total = $total_price - ($total_price * ($discount/100));

									?>
									<div class="item">
										<div class="item-category-featured-product">
											<div class="product-thumb">
												<a target="_blank" href="<?=$ad_url?>" class="product-thumb-link">
													<?php
													$image_helper->getScaledImageFromCloudinary($images[0],$opt_electronics_first);
													$image_helper->getScaledImageFromCloudinary($images[0],$opt_electronics_second);
													?>
												</a>
												<div class="product-info-cart">
													<div class="product-extra-link">
														<a href="javascript:void(0);" class="wishlist-link favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params?>)"><i class="fa fa-heart-o"></i></a>
														<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
														<a href="javascript:void(0);" data-item="<?php echo $single_product['id'] ?>" class="quickview-link"><i class="fa fa-search"></i></a>
													</div>
													<a target="_blank" href="<?=$ad_url?>" class="addcart-link"><i class="fa fa-shopping-basket"></i> View Details</a>
												</div>
											</div>
											<div class="product-info">
												<h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$single_product['title']?></a></h3>
												<?php if($single_product['show_price']){ ?>
												<div class="info-price">
													<?php if($single_product['discount']){?>

														<span>&#2547; <?=$discounted_total?></span>
														<del>&#2547; <?=$single_product['price']?></del>
													<?php } else { ?>
														<span>&#2547; <?=$single_product['price'].$price_end?></span>
													<?php } ?>
												</div>
												<?php } ?>
											</div>
											<?php if($single_product['discount']){?>
												<div class="percent-saleoff">
													<span style="color: white;"><label><?=round($single_product['discount'])?>%</label> OFF</span>
												</div>
											<?php }?>

										</div>
									</div>

									<?php
									$counter++;
								}}?>


							<!-- End Item -->
						</div>
					</div>
				</div>
				<!-- Security Category Section End -->
<a name="super-deals" class="latest_package_pointer"></a>
				<!-- banner section Starts   -->
				<div class="box-adv-col2">
					<div class="row">
						<div class="home-brand-slider col-md-6 col-sm-6 col-xs-12">
							<div class="wrap-item">
								<?php foreach ($isp_left_slider_ads as $slider_banner) { ?>
									<div class="item-adv-simple">
										<a href="#"><img src="<?php if(isset($slider_banner['banner_image'])){ echo $slider_banner['banner_image']; } else { echo ""; } ?>" alt="<?php if(isset($slider_banner['title'])) { echo $slider_banner['title']; }else { echo "";} ?>"></a>
									</div>				
								<?php } ?>
							</div>
						</div>
						<div class="home-brand-slider col-md-6 col-sm-6 col-xs-12">
							<div class="wrap-item">
								<?php foreach ($isp_right_slider_ads as $slider_banner) { ?>
									<div class="item-adv-simple">
										<a href="#"><img src="<?php if(isset($slider_banner['banner_image'])){ echo $slider_banner['banner_image']; } else { echo ""; } ?>" alt="<?php if(isset($slider_banner['title'])) { echo $slider_banner['title']; }else { echo "";} ?>"></a>
									</div>				
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<!-- banner section End -->

				
				
				<!-- Super Deal section from EStore Products -->
				<div class="super-deal">
					<div class="super-deal-header">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="supper-deal-title">
									<h2>super deals</h2>
								
								</div>
							</div>
							
						</div>
					</div>
					<div class="super-deal-content">
						<div class="row">

							<?php
							if(isset($estore_ads) && !empty($estore_ads)){
								$counter = 1;
								$favorite_ads = Generic::getAllFavoritesAds();
								foreach($estore_ads as $individual_ads){

									$ad_url = Generic::getAdUrlFromAdId($individual_ads['id']);

									$current_date = date('Y-m-d');
									$expire_date = isset($single_product['expire_date']) ? $individual_ads['expire_date'] : '';

										$images = json_decode($individual_ads['image_url']);
										$fav_params = "this,'".$individual_ads['id']."'";

										$favorites_class = "";
										$favorites_title = "Ad as favorite";
										if(in_array($single_product['id'],$favorite_ads)){
											$favorites_class = "favorite-active";
											$favorites_title = "Remove From favorite";

										}

										$word_count = 8;
										$string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($individual_ads['description']));
										$string = str_replace("\n", " ", $string);
										$array = explode(" ", $string);
									   if (count($array)<= $word_count)
										{

											$retval =  $string;
										}
										else
										{
											array_splice($array, $word_count);
											$retval = implode(" ", $array);
										}


										$discount = isset($individual_ads['discount']) ? (int)round($individual_ads['discount']) : 0;
										$total_price = isset($individual_ads['price']) ? (int)$individual_ads['price'] : 0;
										
										$discounted_total = $total_price - ($total_price * ($discount/100));

									$opt_estore_first = array( "width" => 230, "height" => 260, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "first-thumb");
									$opt_estore_second = array( "width" => 230, "height" => 260, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "second-thumb");
									?>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="item-deal-product">
									<div class="product-thumb">
										<a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
											<?php
											$image_helper->getScaledImageFromCloudinary($images[0],$opt_estore_first);
											$image_helper->getScaledImageFromCloudinary($images[0],$opt_estore_second);
											?>
										</a>
										<div class="product-info-cart">
											<div class="product-extra-link">
												<a href="javascript:void(0);" class="wishlist-link favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params?>)"><i class="fa fa-heart-o"></i></a>
												<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
												<a href="javascript:void(0);" data-item="<?php echo $individual_ads['id'] ?>" class="quickview-link"><i class="fa fa-search"></i></a>
											</div>
											<a class="addcart-link" target="_blank" href="<?=$ad_url?>"><i class="fa fa-shopping-basket"></i>View Details</a>
										</div>
									</div>
									<div class="product-info">
										<h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$individual_ads['title']?></a></h3>
										<p class="desc"><?=$retval?></p>
										<div class="info-price-deal">
										<?php if($individual_ads['show_price']){ ?>
											<div class="info-price">
												<?php if($individual_ads['discount']){?>

													<span>&#2547; <?=$discounted_total?></span>
													<del>&#2547; <?=$individual_ads['price']?></del>
												<?php } else { ?>
													<span>&#2547; <?=$individual_ads['price'].$price_end?></span>
												<?php } ?>
											</div>
										<?php } ?>
										</div>
										<div class="deal-shop-social">
											<a href="<?=$ad_url?>" target="_blank" class="deal-shop-link">View Details</a>

										</div>
									</div>
								</div>
							</div>

								<?php	}}?>





						</div>

					</div>
				</div>
				<!-- Super Deal section End -->

			</div>
		</div>
		<!-- End Main Content Home -->
	</div>
	<!-- End Content -->

<?php
$this->renderPartial("/elements/ad_preview_modal");
?>



<style>


	.electronics{
		background: rgba(14, 89, 62, 1);


	}
	.fashion{
		background: rgba(250, 97, 101, 1);

	}
	.furniture{
		background: rgba(250, 187, 41, 1);

	}
	.food{
		background: rgba(199, 83, 71, 1);

	}
	.security{
		background: rgba(14, 89, 62, 1);

	}
	.vehicles{
		background: rgba(21, 193, 215, 1);

	}
	.mobile{
		background: rgba(14, 89, 62, 1);
	 }

	.favorite-active {
		color: red !important;
	}

	.favorite {
		color: white;
	}

	.inner-list-services:hover {
		opacity: 0.7;
	}

	.banner-ad-slider {
		border:none !important;
	}

</style>

<!--<script type="text/javascript">-->
<!--	$(window).load(function() {-->
<!--		$('#slider').nivoSlider();-->
<!--	});-->
<!--</script>-->

<script type="text/javascript">

	function baseUrl(){var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';}
	var SITE_URL=baseUrl();


	function ChangeFavoriteStatus(obj,ad_id){
		var search_class,find,status;
		search_class='favorite-active';
		if($(obj).hasClass("favorite")){
			find = $(obj);
		}
		else{
			if($(obj).find('.favorite')){
				find = $(obj).find('.favorite');
			}
		}

		if(find) {
			$.ajax({
				dataType: "json"
				, type: "POST"
				, url: SITE_URL + "site/ChangeFavoriteStatus"
				, data: {ad_id: ad_id}
				, success: function (data) {
					if (data.status == 'favorite') {
						find.addClass(search_class);
						find.attr('title', "Remove from favorite");
						status = 'Like';


					} else if((data.status == 'un_favorite')) {
						find.removeClass(search_class);
						find.attr('title', "Add as favorite");

					}

				},
				error: function (e) {
					if (window.console && window.console.log) {
						console.log('ajax error');
					}
				}
			});
		}
	}

	$('#division').on('change', function () {
        division_id = $('#division').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetDistricts",
                data: {division_id: division_id},
                cache: false,
                success: function (result) {
                   
                        $('#district').html(result);
   
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
    });
    
    $('#district').on('change',function(){
        district_id = $('#district').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanas",
                data: {district_id: district_id},
                cache: false,
                success: function (result) {
                    $('#thana').html(result);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
    });

</script>
