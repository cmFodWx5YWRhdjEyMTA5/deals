<?php
/* @var $this TblCategoryController */
/* @var $data TblCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id), array('view', 'id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_slug')); ?>:</b>
	<?php echo CHtml::encode($data->category_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_slug')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_icon')); ?>:</b>
	<?php echo CHtml::encode($data->category_icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_banner_image')); ?>:</b>
	<?php echo CHtml::encode($data->category_banner_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
	<?php echo CHtml::encode($data->meta_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />


</div>