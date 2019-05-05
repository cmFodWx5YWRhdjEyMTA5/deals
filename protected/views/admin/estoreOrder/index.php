<?php
/* @var $this EstoreOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estore Orders',
);

$this->menu=array(
	array('label'=>'Create EstoreOrder', 'url'=>array('create')),
	array('label'=>'Manage EstoreOrder', 'url'=>array('admin')),
);
?>

<h1>Estore Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
