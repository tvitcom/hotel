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
 <?php if(Yii::app()->user->hasFlash('booked_success')): ?>
<p class="bg-success">
                <?php echo Yii::app()->user->getFlash('booked_success'); ?>
</p>
<?php else: ?>
                   <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <blockquote>
                                <address>
                                    <strong>
                                        <?php echo Yii::t('site', 'Hotel "Barabashka"'); ?>
                                    </strong>
                                    <br>
                                        <?php echo Yii::t('site', 'Ukraine, Kharkiv'); ?>
                                    <br>
                                        <?php echo Yii::t('site', 'Akademika Pavlova st. 1111'); ?>
                                    <br>
                                    <abbr title="Phone">
                                        <?php echo Yii::t('site', 'Phone:'); ?>
                                        <?php echo Yii::t('site', Yii::app()->params['CompanyPhone']); ?>
                                    </abbr>
                                </address>
                                <address>
                                    <strong>
                                        <?php echo Yii::t('site', 'Location:'); ?>
                                    </strong>
                                    <br>
                                    <a href="<?php echo $this->createUrl(''); ?>#map">
                                        <?php echo Yii::t('site', 'Click to see google map'); ?>
                                    </a>
                                </address>
                            </blockquote>
                        </div><!-- .col-md-4 col-md-offset-2 -->
                        <div class="col-md-4">
                    <?php $form = $this->beginWidget('CActiveForm',array(
                        'id'=>'visit-form',
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'enableAjaxValidation'=>true,
                    ));?>
                            <div class="form-group">
                                <div class="input-daterange input-group">
                            <?php echo $form->textField($model,'t_incoming',array(
                                    'class'=>'input-sm form-control',
                                    'placeholder'=>Yii::t('site', 'Arrival'),
                                    'id'=>'datepicker',
                                ));?>
                                    <span class="input-group-addon">
                                        <?php echo Yii::t('site','to');?>
                                    </span>
                                <?php echo $form->textField($model,'t_outgoing',array(
                                    'class'=>'input-sm form-control',
                                    'placeholder'=>Yii::t('site', 'Departure'),
                                    'id'=>'datepicker',
                                    'ajax'=>array(
                                        'type'=>'POST',
                                        'url'=>$this->createUrl('availrooms'),
                                        'update'=>'#select_room'
                                    )));
                                ?>
                                </div><!-- .input-datarange input-group -->
                                    <p class="help-block text-danger">
                                <?php echo $form->error($model, 't_incoming');?>
                                <?php echo $form->error($model, 't_outgoing');?>
                                    </p>
                            </div><!-- .form-group -->
                             <div class="form-group">
                            <?php echo $form->textField($model, 'visiter_name', array(
                                'class'=>'form-control',
                                'placeholder'=>Yii::t('site', 'Your Name'),
                            ));?>
                                <p class="help-block text-danger">
                                    <?php echo $form->error($model, 'visiter_name');?>                            
                                </p>
                            </div><!-- .form -group -->
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
                           <div class="form-group">
                           <?php echo CHtml::dropDownList('FormBookingPeriod[room_id]',
                                   Yii::t('site', 'Your room'), 
                                   array(
                                       'empty'=>Yii::t('site','Select available rooms')
                                       ),
                                   array(
                                       'class'=>'form-control',
                                       'type'=>'text',
                                       'id'=>'select_room',
                           ));?>
                                <p class="help-block text-danger">
                                    <?php echo $form->error($model, 'room_id');?>
                                </p>
                           </div><!-- .form-group -->
                        </div><!-- .col-md-4 -->
                        <div class="clearfix">
                        </div><!-- .clearfix -->
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <?php 
                                echo $form->error($model,'room_id','',array(
                                'class'=>'alert alert-danger',
                                'role'=>'alert',
                                ));
                                echo CHtml::submitButton(
                                    Yii::t('site', 'Order'),
                                    array(
                                        'class'=>'btn btn-xl',
                                        ));
                            ?>
                        </div><!-- .col-md-8 col-md-offset-2 text-center -->
                    </div><!-- .col-md-4 -->
                <?php $this->endWidget();?>
<?php endif; ?><!-- Flash message -->
            </div><!-- .col-lg-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</section>
