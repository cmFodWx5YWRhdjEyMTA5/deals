<?php
/* @var $this DiscountController */
/* @var $data Discount */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('images')); ?>:</b>
	<?php echo CHtml::encode($data->images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secondary_images')); ?>:</b>
	<?php echo CHtml::encode($data->secondary_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expire_date')); ?>:</b>
	<?php echo CHtml::encode($data->expire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estore_link')); ?>:</b>
	<?php echo CHtml::encode($data->estore_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('external_link')); ?>:</b>
	<?php echo CHtml::encode($data->external_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	*/ ?>

</div>