<?php
/* @var $this EstoreController */
/* @var $model Estore */

$this->breadcrumbs=array(
	'Estores'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Estore', 'url'=>array('index')),
	//array('label'=>'Create Estore', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estore-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php if($store) { ?>
<h1>Manage EStore</h1>
<?php } else { ?>
<h1>Manage ISP Company</h1>
<?php } ?>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estore-grid',
	'dataProvider'=>$model->search($store),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'slogan',
		'logo',
		'url_alias',
		array(
            'header'=>'Status',
            'class'=>'CButtonColumn',
            'template'=>'{deactivate}  {activate}',
            'buttons'=>array(
                'deactivate'=>array(
                    'label'=>'Deactivate',
                    'visible'=>'$data->active==1',
                    'url'=>'Yii::app()->createUrl("estore/changestatus?id=$data->id&active=0")',
                    'options'=>array('confirm'=>'Are you sure want to Deactivate this company?'),
                ),
                'activate' =>array(
                    'label' =>'Activate',
                    'visible'=>'$data->active==0',
                    'url'=>'Yii::app()->createUrl("estore/changestatus?id=$data->id&active=1")',
                    'options'=>array('confirm'=>'Are you sure want to Approve this company?'),
                ),
            ),
        ),
		/*'banner',
		'sub_banner',
		'categories',
		'about_us',
		'contact_us',
		'keyword',
		'meta_description',
		'url_alias',
		'active',
		'create_date',
		'update_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
        array(
            'header'=>'Force Delete',
            'class'=>'CButtonColumn',
            'template'=>'{forcedelete}',
            'buttons'=>array(
                'forcedelete'=>array(
                    'label'=>'Delete this Company',
                    'url'=>'Yii::app()->createUrl("site/CustomizedCompanyDelete?id=$data->id")',
                    'options'=>array('confirm'=>'Are you sure want to Force Delete this company?'),
                )
            ),
        ),
	),
)); ?>
