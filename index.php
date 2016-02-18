<?php
// change the following paths if necessary
$yii = dirname(__FILE__) . '/vendor/yiisoft/yii/framework/yii.php';

if ($_SERVER['DOCUMENT_ROOT'] === '/srv/Sites/hotel/webroot') {
    $config = dirname(__FILE__) . '/protected/config/localhost_config.php';
    defined('YII_DEBUG') or define('YII_DEBUG', true);
} else {
    $config = dirname(__FILE__) . '/protected/config/production_config.php';
    define('YII_DEBUG', false);
}

require_once($yii);
Yii::createWebApplication($config)->run();
