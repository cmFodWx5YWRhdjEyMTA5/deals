<?php
/* @var $this SurveyListController */
/* @var $model SurveyList */

$this->breadcrumbs=array(
	'Survey Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveyList', 'url'=>array('index')),
	array('label'=>'Manage SurveyList', 'url'=>array('admin')),
);
?>

<h1>Create SurveyList</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>