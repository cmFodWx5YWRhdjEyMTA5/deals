<style type="text/css">
	.item-deal-product { min-height: 150px; }
	.product-thumb-link img, .item-product-bestseller .product-thumb img { width: 100%; }
	#submit_btn { background: #ef0303; color: #fff; border: none; text-align: center; display: block; padding: 10px 30px; }
	.super-deal { padding: 30px 0 15px; }
	.super-deal h2{ float: left; margin-top: 0px; }
</style>
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


<!-- main -->

<!-- Newsletter and social widget end-->

	<div class="container">
		<div id="content">
					
					<!-- Super Deal section from EStore Products -->
					<div class="super-deal">
						
						<h3>Latest Packages</h3>
						<div class="super-deal-content">
						<div class="row">

							<?php
							if(isset($package_list) && !empty($package_list)){
								$counter = 1;
								$favorite_ads = Generic::getAllFavoritesAds();
								foreach($package_list as $individual_ads){

									$ad_url = Generic::getAdUrlFromAdId($individual_ads['id']);
									$ad_owner_details = Register::model()->findByPk($individual_ads['user_id']);
									$isp_url = Generic::getISPUrlFromAdId($individual_ads['id']);

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
										<h6><b>ISP Name:</b> <a href="<?php echo $isp_url ?>" target="_blank"><?php echo $ad_owner_details->enterprise_name ?></a></h6>
										<p class="desc"><?php echo "Package Type: ".ucwords($individual_ads['package_type']) ?></p>
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

							<?php	
									}
								}
							?>





						</div>

					</div>
					</div>
					<!-- Super Deal section End -->

		</div>
		<!-- End Content -->
	</div>

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
		overflow: hidden;
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
