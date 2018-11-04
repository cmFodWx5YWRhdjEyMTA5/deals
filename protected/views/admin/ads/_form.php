<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textArea($model,'image_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_condition'); ?>
		<?php echo $form->textField($model,'ad_condition'); ?>
		<?php echo $form->error($model,'ad_condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_type'); ?>
		<?php echo $form->textField($model,'price_type'); ?>
		<?php echo $form->error($model,'price_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expire_date'); ?>
		<?php echo $form->textField($model,'expire_date'); ?>
		<?php echo $form->error($model,'expire_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->dropDownList($model, 'active', array('1'=>'Active', '0'=>'Deactive')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_in_store'); ?>
		<?php echo $form->textField($model,'show_in_store'); ?>
		<?php echo $form->error($model,'show_in_store'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_id'); ?>
		<?php echo $form->textField($model,'ad_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_featured'); ?>
		<?php echo $form->textField($model,'is_featured'); ?>
		<?php echo $form->error($model,'is_featured'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_premium'); ?>
		<?php echo $form->textField($model,'is_premium'); ?>
		<?php echo $form->error($model,'is_premium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_top'); ?>
		<?php echo $form->textField($model,'is_top'); ?>
		<?php echo $form->error($model,'is_top'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hot_ads'); ?>
		<?php echo $form->textField($model,'hot_ads'); ?>
		<?php echo $form->error($model,'hot_ads'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hot_ads_start_date'); ?>
		<?php echo $form->textField($model,'hot_ads_start_date'); ?>
		<?php echo $form->error($model,'hot_ads_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hot_ads_end_date'); ?>
		<?php echo $form->textField($model,'hot_ads_end_date'); ?>
		<?php echo $form->error($model,'hot_ads_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount'); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->