<?php

return array(
    // Application data
    'name' => 'ApPHP Survey',
    'version' => '2.1.3',
    
    // Installation settings
    'installationKey' => 'oc3tbnnu5n',

    // Password keys settings (for database passwords only - don't change it)
    // md5, sha1 (not recommended), sha256, whirlpool, etc
	'password' => array(
        'encryption' => true,
        'encryptAlgorithm' => 'sha256',
		'encryptSalt' => true,
		'hashKey' => 'apphp_directy_cmf',    
    ),
    
    // Default email settings
	'email' => array(
        'mailer' => 'smtpMailer', /* phpMail | phpMailer | smtpMailer */
        'from' => 'info@email.me',
        'fromName' => '', /* John Smith */
        'isHtml' => true,
        'smtp' => array(
            'auth' => true, /* true or false */
            'secure' => 'ssl', /* 'ssl', 'tls' or '' */
            'host' => 'smtp.gmail.com',
            'port' => '465',
            'username' => '',
            'password' => '',
        ),
    ),
    
    // Validations
	// Define array of 'excluded' controllers, ex.: array('PaymentProviders', 'Checkout')
    'validation' => array(
        'csrf' => array('enable' => true, 'exclude' => array('PaymentProviders')),
        'bruteforce' => array('enable' => true, 'badLogins' => 5, 'redirectDelay' => 3)
    ),

    // Exception handling
	// Define exceptions exceptions in application
	'exceptionHandling' => array(
		'enable' => true, 
		'level' => 'global'
	),

    // Output compression
	'compression' => array(
		'gzip' => array('enable' => true),
		'html' => array('enable' => false),
	),

    // Session settings
    'session' => array(
        'customStorage' => false,	/* true value means use a custom storage (database), false - standard storage */
        'cacheLimiter' => '',		/* to prevent 'Web Page expired' message for POST request use "private,must-revalidate" */
        'lifetime' => 24,			/* session timeout in minutes, default: 24 min = 1440 sec */
    ),
    
    // Cookies settings
    'cookies' => array(
        'domain' => 'https://www.bdbroadbanddeals.com', 
        'path' => '/survey/' 
    ),

    // Cache settings 
    'cache' => array(
        'enable' => false,
		'type' => 'auto', 			/* 'auto' or 'manual' */
        'lifetime' => 20,  			/* in minutes */
        'path' => 'protected/tmp/cache/'
    ),

    // Logger settings 
    'log' => array(
		'enable' => false, 
        'path' => 'protected/tmp/logs/',
		'fileExtension' => 'php', 	
        'dateFormat' => 'Y-m-d H:i:s',
        'threshold' => 1,
		'filePermissions' => 0644,
		'lifetime' => 30			/* in days */
    ),

    // RSS Feed settings 
    'rss' => array(
        'path' => 'feeds/'
    ),

    // Datetime settings
    'defaultTimeZone' => 'UTC',
    
    // Template default settings  
	'template' => array(
		'default' => 'default'			
	),
	
	// Layout default settings  
	'layouts' => array(
		'enable' => false, 
		'default' => 'default'
	),
	
    // Application default settings
	'defaultErrorController' => 'Error',				/* may be overridden by module settings */
	'defaultController' => 'Index',						/* may be overridden by module settings */
    'defaultAction' => 'index',							/* may be overridden by module settings */
	
	// Application payment complete page (controller/action - may be overridden by module settings)
	'paymentCompletePage' => '',
    
    // Application components
    'components' => array(
        'BackendMenu' => array('enable' => true, 'class' => 'BackendMenu'),
        'Bootstrap' => array('enable' => true, 'class' => 'Bootstrap'),
        'FrontendMenu' => array('enable' => true, 'class' => 'FrontendMenu'),               
        'LocalTime' => array('enable' => true, 'class' => 'LocalTime'),
		'SearchForm' => array('enable' => true, 'class' => 'SearchForm'),
		'SocialLogin' => array('enable' => true, 'class' => 'SocialLogin'),
        'Website' => array('enable' => true, 'class' => 'Website'),
    ),

	// Widget settings
	'widgets' => array(
		'paramKeysSensitive' => true
	),

    // Application helpers
    'helpers' => array(
        //'helper' => array('enable' => true, 'class' => 'Helper'),
    ),

    // Application modules
    'modules' => array(
        'setup' => array('enable' => true, 'removable' => false, 'backendDefaultUrl' => ''),
		'backup' => array('enable' => true, 'removable' => false, 'backendDefaultUrl' => ''),
		'surveys' => array('enable' => true, 'removable' => false, 'backendDefaultUrl' => ''),
    ),

    // Url manager
    'urlManager' => array(
        'urlFormat' => 'shortPath',  /* get | path | shortPath */
        'rules' => array(
			// Required by payments module. If you remove these rules - make sure you define full path URL for pyment providers
			//'paymentProviders/handlePayment/provider/([a-zA-Z0-9\_]+)/handler/([a-zA-Z0-9\_]+)/module/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}/handler/{$1}/module/{$2}',
			'paymentProviders/handlePayment/([a-zA-Z0-9\_]+)/([a-zA-Z0-9\_]+)/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}/handler/{$1}/module/{$2}',
			//'paymentProviders/handlePayment/provider/([a-zA-Z0-9\_]+)/handler/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}/handler/{$1}',
			'paymentProviders/handlePayment/([a-zA-Z0-9\_]+)/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}/handler/{$1}',
			//'paymentProviders/handlePayment/provider/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}',
			'paymentProviders/handlePayment/([a-zA-Z0-9\_]+)[\/]?$' => 'paymentProviders/handlePayment/provider/{$0}',
            // Required by dynamic pages, if you want to use user-friendly URLs
			//'controller/action/value1/value2' => 'controller/action/param1/value1/param2/value2',
			//'sitepages/show/example-page-1' => 'sitepages/show/name/about-us',
			//'value1' => 'controller/action/param1/value1',
			//'about-us' => 'sitepages/show/name/about-us',
        ),
    ),
    
);
