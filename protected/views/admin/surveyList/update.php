<?php
/* @var $this SurveyListController */
/* @var $model SurveyList */

$this->breadcrumbs=array(
	'Survey Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveyList', 'url'=>array('index')),
	array('label'=>'Create SurveyList', 'url'=>array('create')),
	array('label'=>'View SurveyList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SurveyList', 'url'=>array('admin')),
);
?>

<h1>Update SurveyList <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>