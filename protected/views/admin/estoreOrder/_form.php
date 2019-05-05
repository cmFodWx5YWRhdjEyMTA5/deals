<?php
/* @var $this EstoreOrderController */
/* @var $model EstoreOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estore-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'registered_user_id'); ?>
		<?php echo $form->textField($model,'registered_user_id'); ?>
		<?php echo $form->error($model,'registered_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_id'); ?>
		<?php echo $form->textField($model,'invoice_id'); ?>
		<?php echo $form->error($model,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estore_id'); ?>
		<?php echo $form->textField($model,'estore_id'); ?>
		<?php echo $form->error($model,'estore_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_code'); ?>
		<?php echo $form->textField($model,'item_code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'item_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_price'); ?>
		<?php echo $form->textField($model,'product_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'product_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estore_name'); ?>
		<?php echo $form->textField($model,'estore_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estore_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer_name'); ?>
		<?php echo $form->textField($model,'buyer_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'buyer_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer_email'); ?>
		<?php echo $form->textField($model,'buyer_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'buyer_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer_phone'); ?>
		<?php echo $form->textField($model,'buyer_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'buyer_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'otp'); ?>
		<?php echo $form->textField($model,'otp',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'otp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'otp_time'); ?>
		<?php echo $form->textField($model,'otp_time'); ?>
		<?php echo $form->error($model,'otp_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_source'); ?>
		<?php echo $form->textField($model,'order_source',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'order_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_try'); ?>
		<?php echo $form->textField($model,'no_of_try'); ?>
		<?php echo $form->error($model,'no_of_try'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->