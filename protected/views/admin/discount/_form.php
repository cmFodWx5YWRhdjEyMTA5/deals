<?php
/* @var $this DiscountController */
/* @var $model Discount */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'discount-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php
		if(!$model->isNewRecord){
			echo Generic::showImageFromS3("ad-dwit-a", $model->images);
		}
		?>
		<?php echo $form->labelEx($model,'main_banner_images'); ?>
		<?php echo $form->fileField($model,'images'); ?>
		<?php echo $form->error($model,'images'); ?>
	</div>

	<div class="row">
		<?php
		if(!$model->isNewRecord){
			echo Generic::showImageFromS3("ad-dwit-a", $model->secondary_images);
		}
		?>
		<?php echo $form->labelEx($model,'secondary_images'); ?>
		<?php
		$this->widget('CMultiFileUpload', array(
			'name' => 'secondary_images',
			'model'=> $model,
			'id'=>'imagepath',
			'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
			'duplicate' => 'Duplicate file!', // useful, i think
			'denied' => 'Invalid file type', // useful, i think
		));
		?>

		<?php echo $form->error($model,'secondary_images'); ?>
	</div>
	<div class="row">

		<?php echo $form->labelEx($model,'optional_images'); ?>
		<?php
		$this->widget('CMultiFileUpload', array(
			'name' => 'optional_images',
			'model'=> $model,
			'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
			'duplicate' => 'Duplicate file!', // useful, i think
			'denied' => 'Invalid file type', // useful, i think
		));
		?>

		<?php echo $form->error($model,'optional_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'create_date'); */?>
		<?php /*echo $form->textField($model,'create_date'); */?>
		<?php /*echo $form->error($model,'create_date'); */?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'expire_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'expire_date',
			'options'=>array(
				'dateFormat' => 'yy-mm-dd',
			),
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
				'readOnly'=>true,
				'class'=>'js_expire_date'
			),
		));
		?>
		<?php echo $form->error($model,'expire_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estore_link'); ?>
		<?php echo $form->textField($model,'estore_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estore_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'external_link'); ?>
		<?php echo $form->textField($model,'external_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'external_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>
<!--	<div class="row">
		<label for="sel1">Select Page:</label>
		<select name="Discount[page_alias]" id="page_alias" class="form-control">
			<?php
/*			foreach($file_list as $key => $individual_value){*/?>
				<option value="<?/*=$individual_value*/?>"><?/*=$individual_value*/?></option>
			<?php /*}
			*/?>
		</select>
	</div>-->
	<div class="row">
		<?php echo $form->labelEx($model,'Select Page'); ?>
		<?php echo $form->fileField($model,'page_alias'); ?>
		<?php echo $form->error($model,'page_alias'); ?>
	</div>






	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->