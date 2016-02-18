<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'hotel',
    'theme' => 'agency',
    'defaultController' => 'site',
    'language' => substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2),
    'sourceLanguage' => 'en-US',
    'charset'=>'UTF-8',
    'aliases' => array(
        'twbs' => realpath(__DIR__) . '/../../vendor/twbs/bootstrap/dist',
        'bootstrap' => realpath(__DIR__ . '/../../vendor/crisu83/yiistrap'),
        'vendor' => realpath(__DIR__ . '/../../vendor'),
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.*',
        'bootstrap.behaviors.*',
        'bootstrap.components.*',
        'bootstrap.form.*',
        'bootstrap.widgets.*',
    ),
    'modules' => array(
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        'user' => array(
// enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
// database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/production_db.php'),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/biz-data.php'),
);
