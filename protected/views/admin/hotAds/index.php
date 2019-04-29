<?php
/* @var $this HotAdsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hot Ads',
);

$this->menu=array(
	array('label'=>'Create HotAds', 'url'=>array('create')),
	array('label'=>'Manage HotAds', 'url'=>array('admin')),
);
?>

<h1>Hot Ads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
