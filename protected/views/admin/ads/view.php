<?php
/* @var $this AdsController */
/* @var $model Ads */
$ad_id = $model->id;
$hot_ads = Generic::getHotAdsRequest($ad_id);
$ad_url = Generic::getAdUrlFromAdId($ad_id);

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
	/*array('label'=>'Update Ads', 'url'=>array('update', 'id'=>$model->id)),*/
	array('label'=>'Delete Ads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);?>
<div class="user_area" style=" right: -234px; top: 150px;position: absolute;">

	<span style="text-align: justify">Product Owner Details</span><br><br>
	<hr>
	<span style="color: #000020">Name : <?=Generic::getUserName($model->user_id)?> </span><br>
	<?php

	$result = Generic::getUserDetails($model->user_id);
	$image_url = $result['image'];
	$baseUrl = Yii::app()->request->getBaseUrl(true);
	$static_image_url = $baseUrl.'/images/user.jpg';
	$image = (isset($image_url) && !empty($image_url)) ? $image_url: $static_image_url;
	?>
	<span style="color: #000020"> Email :<?=$result['email']?> </span><br>
	<span style="color: #000020"> Phone Number :<?=$result['phone_number']?> </span><br>
	<span style="color: #000020"> Profile Image : </span><br>
	<img width="80" height="80" title="User Image" src="<?=$image?>" alt="User Image" />

</div>

<div>

<h1><a target="_blank" href="<?=$ad_url?>" class="btn btn-theme">View Details</a> of Ad Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'user_id',
			'value'=>Generic::getUserName($model->user_id),
			'type' => 'raw',
		),
		'title',
		array(
			'name'=>'image',
			'value'=>Generic::showImage("ad-dwit-a", $model->image_url),
			'type' => 'raw',
		),
		'description',
		'ad_condition',
		'price',
		'price_type',
		'category_id',
		'create_date',
		'update_date',
		'expire_date',
		'active',
		'show_in_store',
		'ad_id',
		'is_featured',
		'is_premium',
		'is_top',
		'is_paid',
		'hot_ads',
		'hot_ads_start_date',
		'hot_ads_end_date',
		'discount',
		'location',
		'latitude',
		'longitude',
	),
)); ?>
	</div>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row" style="font-size: 15px;font-weight: bold;color: green">
		<?php echo $form->labelEx($model,'ads_active'); ?>
		<?php echo $form->dropDownList($model, 'active', array('1'=>'Active', '0'=>'Deactive')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons" style="float: right;margin: 12px">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<!--<br>
<div class="col-sm-6">
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'hot-ads-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */?>
<div class="row">
	<?php /*echo $form->hiddenField($model,'hot_ads_start_date',array('value'=>date("Y-m-d H:i:s", strtotime($hot_ads['start_date'])))); */?>
	<?php /*echo $form->error($model,'hot_ads_start_date'); */?>
</div>

<div class="row">
	<?php /*echo $form->hiddenField($model,'hot_ads_end_date',array('value'=>date("Y-m-d H:i:s", strtotime($hot_ads['end_date'])))); */?>
	<?php /*echo $form->error($model,'hot_ads_end_date'); */?>
</div>

<div class="row">
	<?php /*echo $form->labelEx($model,'hot_ads_active'); */?>
	<?php /*echo $form->dropDownList($model, 'hot_ads', array('1'=>'Active', '0'=>'Deactive')); */?>
	<?php /*echo $form->error($model,'hot_ads'); */?>
</div>

<div class="row buttons">
	<?php /*echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); */?>
</div>

<?php /*$this->endWidget(); */?>
	</div>-->

<style>
	#ads-form{
		position: absolute;
		right: -186px;
		top: 392px;
	}
</style>







