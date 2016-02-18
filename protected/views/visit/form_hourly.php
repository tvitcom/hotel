<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">
                    <?php echo Yii::t('site', 'Booking a room'); ?>
                </h2>
                <h3 class="section-subheading text-muted">
                    <?php echo Yii::t('site', 'Let\'s go book a room in our hotel'); ?>
                </h3>
            </div><!-- .col-lg-12 text-center --> 
        </div><!-- .row -->
        <div class="row">
            <div class="col-lg-12">
       <?php if (Yii::app()->user->hasFlash('contact')): ?>
            <?php echo Yii::app()->user->getFlash('contact'); ?>
            <?php else: ?>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'visit-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'clientOptions'=> array(
                    'validateOnSubmit'=>true,
                ),
                'enableAjaxValidation' => true,
            ));?>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <blockquote>
                            <address>
                                <strong>
                                    <?php echo Yii::t('site', Yii::app()->params['CompanyName']); ?>
                                </strong>
                            <br>
                                <?php echo Yii::t('site', Yii::app()->params['LocationAddress']); ?><br>
                                <?php echo Yii::t('site', Yii::app()->params['LocationStreet']); ?><br>
                                <abbr title="Phone"><?php echo Yii::t('site', 'Phone:'); ?></abbr>
                                    <?php echo Yii::t('site', Yii::app()->params['CompanyPhone']); ?>
                            </address>

                            <address>
                                <strong><?php echo Yii::t('site', 'Location:'); ?></strong><br>
                                <a href="<?php echo $this->createUrl(''); ?>#map"><?php echo Yii::t('site', 'Click to see google map'); ?></a>
                            </address>
                        </blockquote>
                    </div><!-- .col-md-4 .col-md-offset-2 -->

                    <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-append date form_datetime">
                                <?php echo $form->textField($model, 'visit_datetm', array(
                                    'maxlength' => 21,
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('site','When your arrival').' *',
                                    'id' => 'datetime',
                                    'required' => 'on',
                                    'data-validation-required-message' => 'Please, your arrival time *',
                                    'ajax'=>array(
                                        'type'=>'POST',
                                        'url'=>$this->createUrl('availrooms'),
                                        'update'=>'#hours'
                                    )));
                                ?>
                                  <span class="add-on"><i class="icon-th"></i></span>
                                </div><!-- .input-append date form_datetime -->
                                <p class="help-block text-danger">
                                    <?php echo $form->error($model, 'visit_datetm'); ?>
                                </p>
                            </div><!-- .form-group -->
                            <div class="form-group">
                               <!--name="visit_duration" class="form-control" id="hours" required="on">
                                   <option></option>
                                   <option>1</option></select-->
                               <?php echo CHtml::dropDownList('FormBookingHourly[visit_duration]', 
                                       Yii::t('site', 'How many hours'),
                                       array(
                                       'empty'=>Yii::t('site','Select available rooms')
                                       ), 
                                       array(
                                           'class'=>'form-control',
                                           'required'=>'on',
                                           'type'=>'text',
                                           'id'=>'hours'
                                ));?>
                               <p class="help-block text-danger">
                                   <?php echo $form->error($model, 'visit_duration');?>
                               </p>
                            </div><!-- .form-group -->
                            <div class="form-group">
                               <select class="form-control" name="available_rooms">
                                   <option value="0">Select available room *</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                </select>
                                <p class="help-block text-danger">
                                <?php echo $form->error($model, 'available_rooms');?>
                                </p>
                            </div>
                           <div class="form-group">
                           <?php echo $form->textField($model, 'visiter_name', array(
                                    'maxlength' => 21,
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('site', 'Your Name') . ' *',
                                    'id' => 'name',
                                    'required' => 'on',
                                    'data-validation-required-message' => 'Please enter your name.',
                                ));
                            ?>
                                <p class="help-block text-danger">
                                    <?php echo $form->error($model, 'visiter_name');?>
                                </p>
                            </div><!-- .form-group -->
                            
                           <div class="form-group">
                            <?php echo $form->textField($model,'visiter_phone',array(
                                'class'=>'form-control',
                                'placeholder'=>Yii::t('site', 'Your Phone'),
                                'type'=>'tel',
                            ));?>
                                <p class="help-block text-danger">
                                    <?php echo $form->error($model, 'visiter_phone');?>
                                </p>
                           </div><!-- .form-group -->
                        </div><!-- .col-md-4 -->
                        <div class="clearfix"></div>
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <?php echo $form->errorSummary($model,'','',array(
                                'class'=>'alert alert-danger',
                                'role'=>'alert',
                                )); ?>
                            
                                <?php echo CHtml::submitButton(
                                                Yii::t('site', 'Order'),
                                                array('class'=>'btn btn-xl')
                                );?>
                        </div><!-- .col-md-8 col-md-offset-2 text-center -->
                </div><!-- .col-md-4 -->
            </div><!-- .row -->
                        <?php $this->endWidget();?>
                        <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- End Contact Section -->