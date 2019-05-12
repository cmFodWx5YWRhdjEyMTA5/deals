<?php
/* @var $this SurveyWinnersController */
/* @var $model SurveyWinners */

$this->breadcrumbs=array(
	'Survey Winners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveyWinners', 'url'=>array('index')),
	array('label'=>'Manage SurveyWinners', 'url'=>array('admin')),
);
?>

<h1>Create SurveyWinners</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>