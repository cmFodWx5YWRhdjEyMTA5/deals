<?php
/* @var $this SurveyListController */
/* @var $model SurveyList */

$this->breadcrumbs=array(
	'Survey Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SurveyList', 'url'=>array('index')),
	array('label'=>'Create SurveyList', 'url'=>array('create')),
	array('label'=>'Update SurveyList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SurveyList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveyList', 'url'=>array('admin')),
);
?>

<h1>View SurveyList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'survey_name',
		'survey_details',
		'survey_link',
		'status',
		'create_date',
	),
)); ?>
