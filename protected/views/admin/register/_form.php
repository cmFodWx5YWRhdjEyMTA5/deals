<?php
/* @var $this RegisterController */
/* @var $model Register */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'register_type'); ?>
		<?php echo $form->textField($model,'register_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'register_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_token'); ?>
		<?php echo $form->textField($model,'user_token',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enterprise_name'); ?>
		<?php echo $form->textField($model,'enterprise_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'enterprise_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'division'); ?>
		<?php echo $form->textField($model,'division',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'division'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referral_id'); ?>
		<?php echo $form->textField($model,'referral_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'referral_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->