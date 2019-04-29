<?php
/* @var $this HotAdsController */
/* @var $model HotAds */

$this->breadcrumbs=array(
	'Hot Ads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotAds', 'url'=>array('index')),
	array('label'=>'Create HotAds', 'url'=>array('create')),
	array('label'=>'View HotAds', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HotAds', 'url'=>array('admin')),
);
?>

<h1>Update HotAds <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>