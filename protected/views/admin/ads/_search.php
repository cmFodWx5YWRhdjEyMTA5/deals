<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_url'); ?>
		<?php echo $form->textArea($model,'image_url',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_condition'); ?>
		<?php echo $form->textField($model,'ad_condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_type'); ?>
		<?php echo $form->textField($model,'price_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expire_date'); ?>
		<?php echo $form->textField($model,'expire_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_in_store'); ?>
		<?php echo $form->textField($model,'show_in_store'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_id'); ?>
		<?php echo $form->textField($model,'ad_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_featured'); ?>
		<?php echo $form->textField($model,'is_featured'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_premium'); ?>
		<?php echo $form->textField($model,'is_premium'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_top'); ?>
		<?php echo $form->textField($model,'is_top'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->