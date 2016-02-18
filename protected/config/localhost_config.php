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
    //// preloading 'log' component
    'preload' => array('log'),
    //// autoloading model and component classes
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
// uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths'=>array(
                'application.gii',   // псевдоним пути
            ),
            'password' => 'pass_to_hotel',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
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
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */

// database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/localhost_db.php'),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class'=>'CProfileLogRoute',
                    'report'=>'summary',
                ),
            // uncomment the following to show log messages on web pages
              array(
              'class'=>'CWebLogRoute',
              ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/biz-data.php'),
);
