<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $content; ?>

<!-- Map Section -->
<style type="text/css">
#map {
    width: 100%;
    height: 400px;
    margin-top: auto;
}

@media(min-width:767px) {
    .content-section {
        padding-top: 50px;
    }

    .download-section {
        padding: 100px 0;
    }

    #map {
        height: 400px;
        margin-top: auto;
    }
}
</style>
<div id="map"></div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/form-<?php echo Yii::app()->controller->action->id;?>.js"></script>
<style type="text/css">
input, optgroup, select, textarea {
    margin: 0px;
    font: inherit;
    color: #CD37D1;
}
</style>

<?php $this->endContent(); ?>
