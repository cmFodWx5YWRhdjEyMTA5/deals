<?php
/* @var $this SurveyWinnersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survey Winners',
);

$this->menu=array(
	array('label'=>'Create SurveyWinners', 'url'=>array('create')),
	array('label'=>'Manage SurveyWinners', 'url'=>array('admin')),
);
?>

<h1>Survey Winners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
