<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public function init()
	{
		Generic::checkToken();
	}

	/*public function createHeader(){
		$fashion_featured_ads = Generic::getHeaderFeaturedAds("fashion_n_garments");
		$fashion_new_ads = Generic::getHeaderNewAds("fashion_n_garments");

		$electronic_featured_ads = Generic::getHeaderFeaturedAds("electronics_appliance");
		$electronic_new_ads = Generic::getHeaderNewAds("electronics_appliance");

		$computer_featured_ads = Generic::getHeaderFeaturedAds("computer_n_internet");
		$computer_new_ads = Generic::getHeaderNewAds("computer_n_internet");

		$mobile_featured_ads = Generic::getHeaderFeaturedAds("mobile_n_gadget");
		$mobile_new_ads = Generic::getHeaderNewAds("mobile_n_gadget");

		Yii::app()->controller->renderPartial('../elements/_common_header',array(
			'fashion_featured_ads' => $fashion_featured_ads,
			'fashion_new_ads' => $fashion_new_ads,
			'electronic_featured_ads' => $electronic_featured_ads,
			'electronic_new_ads' => $electronic_new_ads,
			'computer_featured_ads' => $computer_featured_ads,
			'computer_new_ads' => $computer_new_ads,
			'mobile_featured_ads' => $mobile_featured_ads,
			'mobile_new_ads' => $mobile_new_ads,
		));
	}*/
}