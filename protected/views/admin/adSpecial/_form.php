<?php
/* @var $this AdSpecialController */
/* @var $model AdSpecial */
/* @var $form CActiveForm */

$registered_business_user = Generic::getAllBusinessUserName();
$list = CHtml::listData($registered_business_user, 'id', 'user_name');


?>
<style type="text/css">
	#AdSpecial_media_type input, #AdSpecial_media_type label {
		display: inline !important;
	}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-special-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<input type="hidden" id="update_value" value="">
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php
		// if(!$model->isNewRecord){
		// 	echo Generic::showImageFromS3("ad-dwit-a", $model->banner_image);
		//}
		?>
		<?php echo $form->labelEx($model,'banner_image'); ?>
		<?php echo $form->fileField($model,'banner_image'); ?>
		<?php echo $form->error($model,'banner_image'); ?>
	</div>
	<div class="row">
		<div class="form-group">
			<label for="sel1">Select Page:</label>
			<select id="banner_location" class="form-control">
				<?php
				  $all_page_list = Generic::getAllPageForBannerAds();
				  foreach($all_page_list as $key => $individual_page){?>
				 <option value="<?=$key?>"><?=$individual_page?></option>
				  <?php }
				?>
			</select>
		</div>
	</div>


	<div id ="banner_location_all" class="row">
		<input type="hidden" id="banner_location_value" value="">

	</div>

	<?php echo "<label>Media Type</label>"; ?>
	<?php echo $form->radioButtonList($model, 'media_type', array('1'=>'Image', '2'=>'Local Video', '3' => 'Youtube Video')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'banner_url'); ?>
		<?php echo $form->textField($model,'banner_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'banner_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_link'); ?>
		<?php echo $form->textField($model,'video_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'video_link'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'youtube_link'); ?>
		<?php echo $form->textField($model,'youtube_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'youtube_link'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'banner_order'); ?>
        <?php echo $form->textField($model,'banner_order',array('size'=>60)); ?>
        <?php echo $form->error($model,'banner_order'); ?>
    </div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

    <?php $this->endWidget(); ?>

<?php
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->request->baseUrl;
$cs->registerScriptFile($baseUrl."/js/jquery.min.js", CClientScript::POS_HEAD);
?>

	<script type="text/javascript">
		function baseUrl() {
			var href = window.location.href.split('/');
			return href[0]+'//'+href[2]+'/';
		}

		var SITE_URL=baseUrl();



		$( document ).ready(function() {
			$("#banner_location").change(function() {
				var selected_value = ( $('option:selected', this).val() );
				$.ajax({
					type:"POST",
					dataType:"json",
					url:SITE_URL + "site/LoadAdsValue",
					data:{selected_value:selected_value},
					success: function (data) {
						$("#banner_location_all").html(data.html);
					},
					error:function(){
						console.log('ajax error')}
				});
		   });
			$("#banner_position").change(function() {
				var selected_value = ( $('option:selected', this).val() );

			});




		});

	</script>
</div><!-- form -->