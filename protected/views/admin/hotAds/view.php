<?php
/* @var $this HotAdsController */
/* @var $model HotAds */

$this->breadcrumbs=array(
	'Hot Ads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HotAds', 'url'=>array('index')),
	array('label'=>'Create HotAds', 'url'=>array('create')),
	array('label'=>'Update HotAds', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HotAds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotAds', 'url'=>array('admin')),
);
?>

<h1>View HotAds #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ad_id',
		'start_date',
		'end_date',
	),
)); ?>
