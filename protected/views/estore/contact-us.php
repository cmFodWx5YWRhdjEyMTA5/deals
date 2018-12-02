<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$session =  Yii::app()->session['user_token'];
$current_url = $base_url.$uri;
$category_id = $store_details->categories;
$individual_category_id = explode(',',$category_id);
foreach($individual_category_id as $id){
	$category_name[] = Category::model()->findByPk($id);
}

$facebook_link = (isset($store_details->facebook_link) && !empty($store_details->facebook_link)) ? $store_details->facebook_link : "#" ;
$twitter_link = (isset($store_details->twitter_link) && !empty($store_details->twitter_link)) ? $store_details->twitter_link : "#" ;
$linkedin_link = (isset($store_details->linkedin_link) && !empty($store_details->linkedin_link)) ? $store_details->linkedin_link : "#" ;
$google_plus_link = (isset($store_details->google_plus_link) && !empty($store_details->google_plus_link)) ? $store_details->google_plus_link : "#" ;

?>

<div class="wrap">
	<?php
		echo $this->renderPartial('common_header',array(
			'user_details' => $user_details,
			'current_url' => $current_url,
			'store_details' => $store_details,
			'opt' => $opt,
			'category_name' => $category_name
			));
	?>
	<!-- End Header -->
	<div id="content">
		<div class="content-page">
			<div class="container">
				<div class="contact-map">
					<div id="map" style="height: 300px; width: 100%;"></div>
					<script>
						lat = <?=$latitude?>;
						lon = <?=$longitude?>;
						function initMap() {
							var uluru = {lat: lat, lng: lon};
							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 12,
								center: uluru
							});
							var marker = new google.maps.Marker({
								position: uluru,
								map: map
							});
						}
					</script>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChulrZC9AgEryAjjE00obcM_2sZCgEqAg&callback=initMap">
                    </script>
				</div>
				<!-- End Map -->
				<div class="contact-info-page">
					<div class="list-contact-info">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info">
									<a class="contact-icon icon-mobile" href="#"><i class="fa fa-mobile"></i></a>
									<h2>Hotline: <a href="#"><?=$user_details->phone_number?></a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info">
									<a class="contact-icon icon-phone" href="#"><i class="fa fa-phone"></i></a>
									<h2>Call: <a href="#"><?=$user_details->phone_number?></a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info last-item">
									<a class="contact-icon icon-email" href="mailto:7uptheme@gmail.com"><i class="fa fa-envelope"></i></a>
									<h2><a href="mailto:7uptheme@gmail.com"><?=$user_details->email?></a></h2>
								</div>
							</div>
						</div>
					</div>
					<p class="desc"><?=$store_details->about_us?></p>
				</div>
				<div class="contact-form-page">
					<h2>contact form</h2>
					<div class="form-contact">
						<?php
						$form=$this->beginWidget('CActiveForm', array(
							'id'=>'estore-contact-form',
							'enableAjaxValidation'=>false,
							'enableClientValidation'=>false,

						));
						?>
							<div class="row">
								<div class="col-md-3 col-sm-4 col-xs-12">
									<input type="text" name="name" id="name" placeholder="Name *" required>
								</div>
								<div class="col-md-3 col-sm-4 col-xs-12">
									<input type="email" name="email" id="email" placeholder="Email *" required>
								</div>
								<div class="col-md-6 col-sm-4 col-xs-12">
									<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number *" required>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<textarea name="message" id="message" cols="30" rows="8" placeholder="Your Message"></textarea>
									<input type="submit" name="submit" value="Send" />
									<?php if(isset($_POST['submit'])) { ?>
									<div class="thanks_message"><?=$thanks_message?></div>
									<?php } ?>
								</div>
								<p>&nbsp;</p>
							</div>
						<?php $this->endWidget();?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	<?php
		echo $this->renderPartial('common_footer',array(
			'user_details' => $user_details,
			'store_details' => $store_details,
			'base_url' => $base_url,
			'facebook_link' => $facebook_link,
			'twitter_link' => $twitter_link,
			'linkedin_link' => $linkedin_link,
			'google_plus_link' => $google_plus_link
			));
	?>
	<!-- End Footer -->
</div>
