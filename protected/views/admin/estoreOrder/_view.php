<?php
/* @var $this EstoreOrderController */
/* @var $data EstoreOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->registered_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_id')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estore_id')); ?>:</b>
	<?php echo CHtml::encode($data->estore_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_code')); ?>:</b>
	<?php echo CHtml::encode($data->item_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_price')); ?>:</b>
	<?php echo CHtml::encode($data->product_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estore_name')); ?>:</b>
	<?php echo CHtml::encode($data->estore_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer_name')); ?>:</b>
	<?php echo CHtml::encode($data->buyer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer_email')); ?>:</b>
	<?php echo CHtml::encode($data->buyer_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer_phone')); ?>:</b>
	<?php echo CHtml::encode($data->buyer_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otp')); ?>:</b>
	<?php echo CHtml::encode($data->otp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otp_time')); ?>:</b>
	<?php echo CHtml::encode($data->otp_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_source')); ?>:</b>
	<?php echo CHtml::encode($data->order_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_try')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_try); ?>
	<br />

	*/ ?>

</div>