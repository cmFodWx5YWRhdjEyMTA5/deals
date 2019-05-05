<?php
/* @var $this EstoreOrderController */
/* @var $model EstoreOrder */
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
		<?php echo $form->label($model,'registered_user_id'); ?>
		<?php echo $form->textField($model,'registered_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_id'); ?>
		<?php echo $form->textField($model,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estore_id'); ?>
		<?php echo $form->textField($model,'estore_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_code'); ?>
		<?php echo $form->textField($model,'item_code',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_price'); ?>
		<?php echo $form->textField($model,'product_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estore_name'); ?>
		<?php echo $form->textField($model,'estore_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyer_name'); ?>
		<?php echo $form->textField($model,'buyer_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyer_email'); ?>
		<?php echo $form->textField($model,'buyer_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyer_phone'); ?>
		<?php echo $form->textField($model,'buyer_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otp'); ?>
		<?php echo $form->textField($model,'otp',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otp_time'); ?>
		<?php echo $form->textField($model,'otp_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_source'); ?>
		<?php echo $form->textField($model,'order_source',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_try'); ?>
		<?php echo $form->textField($model,'no_of_try'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->