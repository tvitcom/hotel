<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visiter_id'); ?>
		<?php echo $form->textField($model,'visiter_id',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_ingoing'); ?>
		<?php echo $form->textField($model,'t_ingoing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_outgoing'); ?>
		<?php echo $form->textField($model,'t_outgoing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_note'); ?>
		<?php echo $form->textField($model,'user_note',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_review'); ?>
		<?php echo $form->textField($model,'user_review',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_rating'); ?>
		<?php echo $form->textField($model,'user_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promo_code'); ?>
		<?php echo $form->textField($model,'promo_code',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ammount'); ?>
		<?php echo $form->textField($model,'ammount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to_pay'); ?>
		<?php echo $form->textField($model,'to_pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment'); ?>
		<?php echo $form->textField($model,'payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_sign'); ?>
		<?php echo $form->textArea($model,'payment_sign',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_descr'); ?>
		<?php echo $form->textField($model,'payment_descr',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_id'); ?>
		<?php echo $form->textField($model,'discount_id',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->