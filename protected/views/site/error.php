<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = 'Error - ' . Yii::app()->name;

?>
<section id="about">
    <div class="container">
<div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Error <?php echo $code; ?></h2>
                <h3 class="section-subheading text-muted"><?php echo CHtml::encode($message); ?></h3>
            <p>
                <?php echo CHtml::link(Yii::t('site', 'Go back'), array('/site/index'),array()); ?>
                <?php echo CHtml::link(Yii::t('site', '| or support inform'), array('/support/default/index'), array());?>
            </p>
            </div>
        </div>
    </div>
</section>






                    
