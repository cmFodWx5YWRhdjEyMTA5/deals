<?php
/* @var $this SurveyListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survey Lists',
);

$this->menu=array(
	array('label'=>'Create SurveyList', 'url'=>array('create')),
	array('label'=>'Manage SurveyList', 'url'=>array('admin')),
);
?>

<h1>Survey Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
