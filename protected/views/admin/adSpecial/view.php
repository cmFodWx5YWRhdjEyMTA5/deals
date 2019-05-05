<?php
/* @var $this AdSpecialController */
/* @var $model AdSpecial */

$this->breadcrumbs=array(
	'Ad Specials'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AdSpecial', 'url'=>array('index')),
	array('label'=>'Create AdSpecial', 'url'=>array('create')),
	array('label'=>'Update AdSpecial', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdSpecial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdSpecial', 'url'=>array('admin')),
);
?>

<h1>View AdSpecial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'title',
		'description',
		array(
			'name'=>'banner_image',
			'value'=>Generic::showImageFromS3("ad-dwit-a", $model->banner_image),
			'type' => 'raw',
		),
		'banner_position',
		'banner_url',
		'page_alias_ad_special',
		'create_date',
		'update_date',
	),
)); ?>
