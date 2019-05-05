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
						
						<form method="GET">
							<div class="row">
								<div class="col-sm-12 col-md-4 col-lg-4">
									<h2>ISP List</h2>
								</div>
								<div class="col-sm-12 col-md-4 col-lg-4">
									<input type="text" name="isp_name" value="" placeholder="Search...">
								</div>
								<div class="col-sm-12 col-md-4 col-lg-4">
									<input type="submit" name="submit" value="Search" id="submit_btn" />
								</div>
							</div>							
						</form>
						<div class="super-deal-content">
							<?php
			                 foreach(Yii::app()->user->getFlashes() as $key => $message) {
			                      echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
			                  }
			                ?> 
							<div class="row">

								<?php
								if(isset($isp_list) && !empty($isp_list)){
									$counter = 1;

									foreach($isp_list as $individual_isp){

										$isp_url = $baseUrl.'/isp/'.$individual_isp->url_alias;

										$current_date = date('Y-m-d');
										
										$isp_logo = $individual_isp->logo;

										$opt_estore_first = array( "width" => 230, "height" => 120, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "first-thumb");
										$opt_estore_second = array( "width" => 230, "height" => 120, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "second-thumb");
										?>

								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="item-deal-product">
										<div class="product-thumb" style="width: 100%;">
											<a class="product-thumb-link" target="_blank" href="<?=$isp_url?>">
												<?php

												$image_helper->getScaledImageFromCloudinary($isp_logo,$opt_estore_first);
												$image_helper->getScaledImageFromCloudinary($isp_logo,$opt_estore_second);
												?>
											</a>
											<div class="product-info-cart">
												<a class="addcart-link" target="_blank" href="<?=$isp_url?>"><i class="fa fa-shopping-basket"></i>View Details</a>
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
