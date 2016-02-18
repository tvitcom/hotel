<?php
/**
 *  Template for  "panel"-s controlers
 */

?>
<!DOCTYPE html>
<html lang="<?php echo isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'en'; ?>">
    <head>
        <base href="<?php echo $_SERVER['SERVER_NAME']; ?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!-- Custom CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $_SERVER['SERVER_NAME']; ?>"><?php echo Yii::app()->params['CompanyName']; ?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo $this->createUrl('site/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/index.html"><i class="fa fa-fw fa-dashboard"></i> <?php echo Yii::t('adm', 'Overview'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo Yii::t('adm', 'Charts'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/tables.html"><i class="fa fa-fw fa-table"></i> <?php echo Yii::t('adm', 'Tables'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/forms.html"><i class="fa fa-fw fa-edit"></i> <?php echo Yii::t('adm', 'Persons'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> <?php echo Yii::t('adm', 'Projects'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> -test</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> -test <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">--Dropdown Item</a>
                                </li>
                                <li>
                                    <a href="#">--Dropdown Item</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->theme->baseUrl; ?>/sb/blank-page.html"><i class="fa fa-fw fa-file"></i> -test Blank Page</a>
                        </li>
                        <li>
                            <!--a href="<?php //echo Yii::app()->theme->baseUrl;    ?>/sb/index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> -test RTL Dashboard</a-->
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <?php echo $content; ?>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/sb/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <?php Yii::app()->bootstrap->register(); ?>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/sb/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/sb/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/sb/js/plugins/morris/morris-data.js"></script>

    </body>

</html>
