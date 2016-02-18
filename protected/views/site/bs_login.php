<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'htmlOptions' => array('class' => 'form-signin'),
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));

    ?>
    <h2 class="form-signin-heading"><?php echo Yii::t('site', 'Login'); ?></h2>

    <?php echo $form->labelEx($model, 'username', array('class' => 'sr-only')); ?>
    <?php
    echo $form->textField($model, 'username', array(
        'id' => 'username',
        'class' => 'form-control',
        'placeholder' => Yii::t('site', 'Login'),
        'required' => 'on',
        'autofocus' => 'on',
    ));

    ?>
    <?php
    echo $form->error($model, 'username', array(
        'class' => 'alert alert-danger',
    ));

    ?>


    <?php echo $form->labelEx($model, 'password', array('class' => 'sr-only')); ?>
    <?php
    echo $form->passwordField($model, 'password', array(
        'id' => 'password',
        'class' => 'form-control',
        'placeholder' => Yii::t('site', 'Password'),
        'required' => 'on',
    ));

    ?>
    <?php
    echo $form->error($model, 'password', array(
        'class' => 'alert alert-danger',
    ));

    ?>
    <div class="checkbox">
        <?php echo $form->label($model, 'rememberMe'); ?>
        <label>
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
        </label>
    </div>


    <?php
    echo $form->error($model, 'rememberMe', array(
        'class' => 'alert alert-danger',
    ));

    ?>

    <?php
    echo CHtml::submitButton(Yii::t('site', 'Login'), array(
        'class' => 'btn btn-lg btn-primary btn-block',
    ));

    ?>


    <?php $this->endWidget(); ?>

</div> <!-- /container -->
