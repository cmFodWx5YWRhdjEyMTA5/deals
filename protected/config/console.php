<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/DbConfig.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'components'=>array(
		'db'=>DbConfig::dbConnection(),
	)
);
