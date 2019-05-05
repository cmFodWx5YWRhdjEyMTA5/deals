<?php
/* @var $this AdsController */
/* @var $data Ads */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_condition')); ?>:</b>
	<?php echo CHtml::encode($data->ad_condition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('price_type')); ?>:</b>
	<?php echo CHtml::encode($data->price_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expire_date')); ?>:</b>
	<?php echo CHtml::encode($data->expire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_in_store')); ?>:</b>
	<?php echo CHtml::encode($data->show_in_store); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_featured')); ?>:</b>
	<?php echo CHtml::encode($data->is_featured); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_premium')); ?>:</b>
	<?php echo CHtml::encode($data->is_premium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_top')); ?>:</b>
	<?php echo CHtml::encode($data->is_top); ?>
	<br />

	*/ ?>

</div>