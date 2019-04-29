<?php
/* @var $this HotAdsController */
/* @var $model HotAds */

$this->breadcrumbs=array(
	'Hot Ads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HotAds', 'url'=>array('index')),
	array('label'=>'Manage HotAds', 'url'=>array('admin')),
);
?>

<h1>Create HotAds</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>