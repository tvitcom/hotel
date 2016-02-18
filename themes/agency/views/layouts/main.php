<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>">
    <head>
        <base href="<?php echo Yii::app()->request->hostInfo; ?>/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo Yii::t('meta', 'Hotel and suits near Barabashovo in Kharkiv'); ?>" />
        <meta name="keywords" content="<?php echo Yii::t('meta', 'discount, hotel, room, near, Barabashova'); ?>" />
        <meta name="author" content="<?php echo Yii::app()->params['SiteAuthor']; ?>">
        <meta name='yandex-verification' content='' />
        <meta name="google-site-verification" content="" />

        <title><?php echo Yii::app()->params['CompanyName']; ?></title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Google Maps Part: -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
        <!-- Custom Theme CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/agency.css" rel="stylesheet">

        <!-- Theme Fonts -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/Montserrat_400_700.css" rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/Kaushan_Script.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/Droid_Serif_400_700_400_italic.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/Roboto_Slab_400_100_300_700.css' rel='stylesheet' type='text/css'>

    </head>
    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><?php echo Yii::t('site', Yii::app()->params['CompanyName']); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <?php echo CHtml::link(Yii::t('site', 'Main'),Yii::app()->request->baseUrl.'/#page-top',array('class'=>'page-scroll')); ?>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services"><?php echo Yii::t('site', 'Rooms'); ?></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio"><?php echo Yii::t('site', 'Services'); ?></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about"><?php echo Yii::t('site', 'Testimonials'); ?></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo $this->createUrl('site/reconstruction'); ?>"><?php echo Yii::t('site', 'Tickets'); ?></a>
                        </li>
                        <li>
                            <?php if (!Yii::app()->user->isGuest): ?>
                                <a href="<?php echo $this->createUrl('/panel/visit/index'); ?>"><?php echo Yii::t('site', 'Panel'); ?></a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if (Yii::app()->user->isGuest): ?>
                                <a class="page-scroll" href="<?php echo $this->createUrl('site/login'); ?>"><?php echo Yii::t('site', 'Login'); ?></a>
                            <?php else: ?>
                                <a class="page-scroll" href="<?php echo $this->createUrl('site/logout'); ?>"><?php echo Yii::t('site', 'Logout'); ?></a>
                            <?php endif; ?>

                        </li>
                    </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

        <?php echo $content; ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright"><?php echo Yii::t('meta', 'Produced for'); ?> <a href="<?php echo Yii::app()->params['CompanyGooglePlus']; ?>"><?php echo Yii::t('site', 'Hotel "Barabashka"'); ?></a> <?php echo Yii::t('site','by');?> <a href="http://eu5.org/common/contacts" target="_blank">author</a> <?php echo date('Y'); ?></span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="https://tvitter.com/barabashka_hotel"><i class="fa fa-hand-pointer-o"></i></a>
                            </li>
                            <li><a href="https://fasebook.com/barabashka_hotel"><i class="fa fa-child"></i></a>
                            </li>
                            <li><a href="https://linkedln.com/brabashka_hotel"><i class="fa fa-comment"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li>
                                <?php echo CHtml::link(Yii::t('meta', 'Policy'),array('site/reconstruction')); ?>                           </li>
                            <li>
                                <?php echo CHtml::link(Yii::t('meta', 'Terms'),array('site/reconstruction'));?>
                            </li>
                            <li>
                                <?php
                                
                                if (defined(YII_DEBUG)) {
                                    echo 'YII_DEBUG:' . YII_DEBUG . ' ';
                                    echo 'User ID: ' . Yii::app()->user->id;
                                }

                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap Core CSS -->
        <?php Yii::app()->bootstrap->register(); ?>

        <!-- Google Analitics -->

        <!-- Google Maps on page -->
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/gm-script.js"></script>

        <!-- jQuery is loaded! -->

        <!-- Plugin JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/classie.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jqBootstrapValidation.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/agency.js"></script>

    </body>
</html>
