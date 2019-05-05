<?php
/* @var $this TblCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Categories',
);

$this->menu=array(
	array('label'=>'Create TblCategory', 'url'=>array('create')),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>Tbl Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
