<?php
/* @var $this AdSpecialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ad Specials',
);

$this->menu=array(
	array('label'=>'Create AdSpecial', 'url'=>array('create')),
	array('label'=>'Manage AdSpecial', 'url'=>array('admin')),
);
?>

<h1>Ad Specials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
