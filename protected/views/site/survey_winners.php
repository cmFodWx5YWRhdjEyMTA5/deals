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

$opt_electronics_first = array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "first-thumb owl-lazy");
$opt_electronics_second = array( "width" => 193, "height" => 230, "crop" => "pad", "gravity" => "center", "radius" => 0,"fetch_format" => "jpg","class" => "second-thumb owl-lazy");

?>


<!-- main -->

<!-- Newsletter and social widget end-->

	<div class="container">
		<div id="content">
					
					<!-- Super Deal section from EStore Products -->
					<div class="super-deal">
						
						<h3 style="text-align: center">Survey Winners</h3>
                        <div>
                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'winners-form',
                                'enableAjaxValidation'=>false
                            )); ?>
                            <?php
                            echo $form->dropDownList($survey_winner_model,'competition_name', $competition_list,array('options' => array($selected_option=>array('selected'=>true))));?>
                            <?php $this->endWidget(); ?>
                        </div>
                        <br>
						<div class="super-deal-content">
						<div class="row">

							<?php
							if(isset($survey_winners) && !empty($survey_winners)){
								$counter = 1;
								foreach($survey_winners as $individual_winner){

									$opt_estore_first = array( "width" => 260, "height" => 260, "crop" => "scale", "gravity" => "center", "radius" => "max","fetch_format" => "jpg","class" => "first-thumb", "border"=>"4px_solid_rgb:348c34");
									?>

							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-deal-product">
									<div class="product-thumb" style="width: 100%; text-align: center;">
                                        <?php
                                            $image_helper->getScaledImageFromCloudinary($individual_winner->winner_photo,$opt_estore_first);
                                        ?>
									</div>
									<div class="product-info" style="text-align: center; width: 100%; padding: 10px;">
										<h3 class="title-product"><?php echo $individual_winner->winner_name ?></h3>
                                        <p><?php echo $individual_winner->winning_position ?></p>
										<p>Competition Name: <?php echo $individual_winner->competition_name ?></p>
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


	$('#SurveyWinners_competition_name').on('change',function(){
	    $('#winners-form').submit();
    });

</script>
