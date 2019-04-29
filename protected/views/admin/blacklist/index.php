<?php
/* @var $this BlacklistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blacklists',
);

$this->menu=array(
	array('label'=>'Create Blacklist', 'url'=>array('create')),
	array('label'=>'Manage Blacklist', 'url'=>array('admin')),
);
?>

<h1>Blacklists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
