<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/UrlRules.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/DbConfig.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Admin Panel',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.config.*'
	),
	'timeZone' => 'Asia/Dhaka',
	'defaultController'=>'site',
	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>false,
		),

	),
	// application components
	'components'=>array(
	    'clientScript' => array(
            'scriptMap' => array(
                //'jquery.js'     => false
            )
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'db'=>DbConfig::dbConnection(),
		// uncomment the following to use a MySQL database

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*	'urlManager'=>array(
                'urlFormat'=>'path',
                'rules'=>array(
                    'gii'=>'gii',
                    'gii/<controller:\w+>'=>'gii/<controller>',
                    'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                    'post/<id:\d+>/<title:.*?>'=>'post/view',
                    'posts/<tag:.*?>'=>'post/index',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),*/
		'urlManager'=>UrlRules::$urlManager,
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
    'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
    'onEndRequest'=>create_function('$event', 'return ob_end_flush();')
);