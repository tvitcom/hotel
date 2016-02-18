<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'visiter_id'); ?>
		<?php echo $form->textField($model,'visiter_id',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'visiter_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_ingoing'); ?>
		<?php echo $form->textField($model,'t_ingoing'); ?>
		<?php echo $form->error($model,'t_ingoing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_outgoing'); ?>
		<?php echo $form->textField($model,'t_outgoing'); ?>
		<?php echo $form->error($model,'t_outgoing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_note'); ?>
		<?php echo $form->textField($model,'user_note',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'user_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_review'); ?>
		<?php echo $form->textField($model,'user_review',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'user_review'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_rating'); ?>
		<?php echo $form->textField($model,'user_rating'); ?>
		<?php echo $form->error($model,'user_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promo_code'); ?>
		<?php echo $form->textField($model,'promo_code',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'promo_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ammount'); ?>
		<?php echo $form->textField($model,'ammount'); ?>
		<?php echo $form->error($model,'ammount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_pay'); ?>
		<?php echo $form->textField($model,'to_pay'); ?>
		<?php echo $form->error($model,'to_pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->textField($model,'payment'); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_sign'); ?>
		<?php echo $form->textArea($model,'payment_sign',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'payment_sign'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_descr'); ?>
		<?php echo $form->textField($model,'payment_descr',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'payment_descr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount_id'); ?>
		<?php echo $form->textField($model,'discount_id',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'discount_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->