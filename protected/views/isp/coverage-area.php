<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$category_id = $store_details->categories;
$individual_category_id = explode(',',$category_id);
foreach($individual_category_id as $id){
$category_name[] = Category::model()->findByPk($id);
}


?>
<style type="text/css">
	.row.header {
		background: #355686;
		font-weight: bold;
		padding: 5px 0;
		color: #fff;
	}
	.row.white {
		background: #fff;
		padding: 5px 0;
	}
	.row.gray {
		background: #EFEFEF;
		padding: 5px 0;
	}

</style>
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
                <h2 class="title-shop-page">Coverage Area</h2>
            	<div class="content_inner" style="width: 60%; margin:0 auto;">
	            	<h5><b>Type of ISP:</b> <?php echo $isp_type_category; ?></h5>
	            	<h5><b>Coverage Details:</b></h5>
	            	<div class="row header">
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Division
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			District
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Thana
	            		</div>
	            	</div>
	            	<?php
	            		$counter = 1;
	            		$type = 'white';
	            		
	            		foreach ($coverage_area as $area) {
	            			if($counter %2 == 0){
	            				$type = 'gray';
	            			}
	            	?>
	            		<div class="row <?php echo $type ?>">
		            		<div class="col-md-4 col-lg-4 text-center">
		            			<?php echo $area['division'] ?>
		            		</div>
		            		<div class="col-md-4 col-lg-4 text-center">
		            			<?php echo $area['district'] ?>
		            		</div>
		            		<div class="col-md-4 col-lg-4 text-center">
		            			<?php echo $area['thana'] ?>
		            		</div>
	            		</div>
	            	<?php
	            			$counter++;		
	            		}
	            	?>
	            	<!-- <div class="row white">
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Khulna
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Khulna
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Khalishpur
	            		</div>
	            	</div>
	            	<div class="row gray">
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Khulna
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Bagerhat
	            		</div>
	            		<div class="col-md-4 col-lg-4 text-center">
	            			Rampal
	            		</div>
	            	</div> -->
	            	<br><br><br>
            	</div>
            </div>
        </div>
        <!-- End Main Content Home -->
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
