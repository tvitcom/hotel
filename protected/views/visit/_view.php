<?php
/* @var $this VisitController */
/* @var $data Visit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visiter_id')); ?>:</b>
	<?php echo CHtml::encode($data->visiter_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_ingoing')); ?>:</b>
	<?php echo CHtml::encode($data->t_ingoing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_outgoing')); ?>:</b>
	<?php echo CHtml::encode($data->t_outgoing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_note')); ?>:</b>
	<?php echo CHtml::encode($data->user_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_review')); ?>:</b>
	<?php echo CHtml::encode($data->user_review); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_rating')); ?>:</b>
	<?php echo CHtml::encode($data->user_rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promo_code')); ?>:</b>
	<?php echo CHtml::encode($data->promo_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ammount')); ?>:</b>
	<?php echo CHtml::encode($data->ammount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_pay')); ?>:</b>
	<?php echo CHtml::encode($data->to_pay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment')); ?>:</b>
	<?php echo CHtml::encode($data->payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_sign')); ?>:</b>
	<?php echo CHtml::encode($data->payment_sign); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_descr')); ?>:</b>
	<?php echo CHtml::encode($data->payment_descr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_id')); ?>:</b>
	<?php echo CHtml::encode($data->discount_id); ?>
	<br />

	*/ ?>

</div>