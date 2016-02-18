<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	'Visits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Visit', 'url'=>array('index')),
	array('label'=>'Create Visit', 'url'=>array('create')),
	array('label'=>'Update Visit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Visit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visit', 'url'=>array('admin')),
);
?>

<h1>View Visit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'visiter_id',
		'room_id',
		't_ingoing',
		't_outgoing',
		'user_note',
		'user_review',
		'user_rating',
		'promo_code',
		'ammount',
		'to_pay',
		'payment',
		'payment_sign',
		'payment_descr',
		'discount_id',
	),
)); ?>
