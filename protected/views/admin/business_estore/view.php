<?php
/* @var $this EstoreController */
/* @var $model Estore */

$this->breadcrumbs=array(
	'Estores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Estore', 'url'=>array('index')),
	//array('label'=>'Create Estore', 'url'=>array('create')),
	array('label'=>'Update Estore', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Estore', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Estore', 'url'=>array('admin')),
);
?>

<h1>View Estore #<?php echo $model->id; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'user_id',
			'value'=>Generic::getUserName($model->user_id),
			'type' => 'text',
		),
		'slogan',
		array(
			'name'=>'logo',
			'value'=>Generic::showSingleImage("ad-dwit-a", $model->logo),
			'type' => 'raw',
		),
		array(
			'name'=>'banner',
			'value'=>Generic::showImage("ad-dwit-a", $model->banner),
			'type' => 'raw',
		),
		array(
			'name'=>'sub_banner',
			'value'=>Generic::showImage("ad-dwit-a", $model->sub_banner),
			'type' => 'raw',
		),
		array(
			'name'=>'categories',
			'value'=>Generic::getCategoriesName($model->categories),
			'type' => 'text',
		),
		'about_us',
		'contact_us',
		'keyword',
		'meta_description',
		array(
			'name'=>'url_alias',
			'value'=>'<a href="'.Yii::app()->getBaseUrl(true).'/e-store/'.$model->url_alias.'" target="_blank">'.$model->url_alias.'</a>',
			'type' => 'raw',
		),
		'active',
		'create_date',
		'update_date',
		array(
			'name'=>'plan_name',
			'value'=>Generic::getPlanName($model->id),
			'type' => 'raw',
		),
		array(
			'name'=>'plan_status',
			'value'=>Generic::getPlanStatus($model->id),
			'type' => 'raw',
		),
		array(
			'name'=>'plan_expire_date',
			'value'=>Generic::getPlanExpireDate($model->id),
			'type' => 'raw',
		),
		array(
			'name'=>'post_service_status',
			'value'=>Generic::getAdPostServiceStatus($model->id),
			'type' => 'raw',
		),

	),
)); ?>
