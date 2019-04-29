<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// change the following paths if necessary
$yii=dirname(__FILE__).'/./framework/yii.php';
$cron_config=dirname(__FILE__).'/protected/config/cron_config.php';

// including Yii
require_once($yii);

// creating and running console application
Yii::createConsoleApplication($cron_config)->run();