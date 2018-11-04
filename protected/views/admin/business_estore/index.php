<?php
/* @var $this EstoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estores',
);

$this->menu=array(
	//array('label'=>'Create Estore', 'url'=>array('create')),
	array('label'=>'Manage Estore', 'url'=>array('admin')),
);
?>

<h1>Estores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
