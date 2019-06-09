<?php
// Loads column configuration manager
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/ColumnsConfig.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/PriceSettings.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/ServiceSettings.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/PortalSettings.php');
// this contains the application parameters that can be maintained via GUI
return array(
	// this is displayed in the header section
	'title'=>'BD Broadband Deals',
	// this is used in error pages
	'adminEmail'=>'admin@bdbroadbanddeals.com',
	'registrationEmail' => 'support@bdbroadbanddeals.com',
	'marketingEmail' => 'business@bdbroadbanddeals.com',
	'transactionEmail' => 'admin@bdbroadbanddeals.com',
	'businessEmail' => 'sales@bdbroadbanddeals.com',
	'jobsEmail' => 'jobs@bdbroadbanddeals.com',
	// number of posts displayed per page
	'postsPerPage'=>10,
	// maximum number of comments that can be displayed in recent comments portlet
	'recentCommentCount'=>10,
	// maximum number of tags that can be displayed in tag cloud portlet
	'tagCloudCount'=>20,
	// whether post comments need to be approved before published
	'commentNeedApproval'=>true,
	// the copyright information displayed in the footer section
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
	'portalConfig' => PortalSettings::$portal_config,
    // this is for columns of Ads
    'columnsConfig' => ColumnsConfig::$column_manager,
	// this is for columns of Price
    'priceSettings' => PriceSettings::$price_config,
	// subscription plan configuration
	'planSettings' => PriceSettings::$plan_config,
	// services settings
	'serviceSettings' => '',
	//Individual paid ad
	'individual_paid_ad_price' => 300
);
