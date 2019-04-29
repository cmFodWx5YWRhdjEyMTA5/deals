<?php
/* @var $this BlacklistController */
/* @var $model Blacklist */

$this->breadcrumbs=array(
	'Blacklists'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Blacklist', 'url'=>array('index')),
	array('label'=>'Create Blacklist', 'url'=>array('create')),
	array('label'=>'Update Blacklist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Blacklist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Blacklist', 'url'=>array('admin')),
);
?>

<h1>View Blacklist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'nid',
		'phone',
		'address',
		'reason',
		'reported_by',
		'status',
		'create_date',
		'update_date',
	),
)); ?>
