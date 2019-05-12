<?php
/* @var $this SurveyWinnersController */
/* @var $model SurveyWinners */

$this->breadcrumbs=array(
	'Survey Winners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveyWinners', 'url'=>array('index')),
	array('label'=>'Create SurveyWinners', 'url'=>array('create')),
	array('label'=>'View SurveyWinners', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SurveyWinners', 'url'=>array('admin')),
);
?>

<h1>Update SurveyWinners <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>