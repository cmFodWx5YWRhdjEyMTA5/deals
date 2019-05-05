<?php
/* @var $this EstoreOrderController */
/* @var $model EstoreOrder */

$this->breadcrumbs=array(
	'Estore Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EstoreOrder', 'url'=>array('index')),
	array('label'=>'Create EstoreOrder', 'url'=>array('create')),
	array('label'=>'Update EstoreOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EstoreOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstoreOrder', 'url'=>array('admin')),
);
?>

<h1>View EstoreOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'registered_user_id',
		'invoice_id',
		'estore_id',
		'product_name',
		'item_code',
		'product_price',
		'estore_name',
		'buyer_name',
		'buyer_email',
		'buyer_phone',
		'status',
		'create_date',
		'otp',
		'otp_time',
		'order_source',
		'no_of_try',
	),
)); ?>
