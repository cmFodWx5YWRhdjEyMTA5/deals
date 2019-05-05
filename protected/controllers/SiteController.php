<?php

require_once dirname(__FILE__) . "/../extensions/Facebook/autoload.php";
require_once dirname(__FILE__) . '/../extensions/Gmail/Google_Client.php';
require_once dirname(__FILE__) . '/../extensions/Gmail/contrib/Google_Oauth2Service.php';

require_once dirname(__FILE__) . "/../extensions/phpexcel/PHPExcel.php";
require_once dirname(__FILE__) . "/../extensions/phpexcel/PHPExcel/Writer/Excel2007.php";

class SiteController extends Controller {

    public $layout = 'frontend';
    public $description = "The Largest deal site in broadband marketplace.";
    public $title = "bdbroadbanddeals.com";

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    // public function actionError() {
    //     if ($error = Yii::app()->errorHandler->error) {
    //         if (Yii::app()->request->isAjaxRequest)
    //             echo $error['message'];
    //         else
    //             $this->render('404', $error);
    //     }
    // }

    public function actionIndex($country_code = 'BD') {

        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }

        $image_helper = new ImageHelper();
        $opt = array("width" => 810, "gravity" => "center", "radius" => 0, "fetch_format" => "jpg");

        $category = Generic::getAllCategory();
        $sliced_array = array_slice($category, 0, 5);

        
        $top_estore = Generic::getEstore($country_code);
        if(!empty($top_estore)){
            shuffle($top_estore);
        }

        $count = count(Generic::getAllHotAds(0, 0));
        $offset = rand(0, $count - 1);
        $hot_ads = Generic::getAllHotAds(1, $offset);

        $count = count(Generic::getHomePageRightSideAds('home_top_right', 0, 0, $country_code));
        $offset = rand(0, $count - 1);
        $header_right_side_ads = Generic::getHomePageRightSideAds('home_top_right', 1, $offset, $country_code);

        $count = count(Generic::getHomePageRightSideAds('mid_right_panel', 0, 0, $country_code));
        $offset = rand(0, $count - 1);
        $mega_sell_ads = Generic::getHomePageRightSideAds('mid_right_panel', 1, $offset, $country_code);

        $count = count(Generic::getHomePageRightSideAds('bottom_right_panel', 0, 0, $country_code));
        $offset = rand(0, $count - 1);
        $bottom_right_ads = Generic::getHomePageRightSideAds('bottom_right_panel', 1, $offset, $country_code);


        $home_page_slider_ads = Generic::getHomePageRightSideAds('home_top_banner', 0, 0, $country_code);
        //Generic::_setTrace($home_page_slider_ads);
        $find_package_bottom_slider_ads = Generic::getHomePageRightSideAds('find_package_bottom_banner', 0, 0, $country_code);
        $estore_left_slider_ads = Generic::getHomePageRightSideAds('estore_left_slider_banner', 0, 0, $country_code);
        $estore_right_slider_ads = Generic::getHomePageRightSideAds('estore_right_slider_banner', 0, 0, $country_code);
        $isp_left_slider_ads = Generic::getHomePageRightSideAds('isp_left_slider_banner', 0, 0, $country_code);
        $isp_right_slider_ads = Generic::getHomePageRightSideAds('isp_right_slider_banner', 0, 0, $country_code);
        //Generic::_setTrace($home_page_slider_ads);
        //if(is_array($home_page_slider_ads) && count($home_page_slider_ads) > 1){shuffle($home_page_slider_ads);}

        $count_promotion_hb = count(Generic::getHomePageRightSideAds('promotion_hb', 0, 0, $country_code));
        $offset_promotion_hb = rand(0, $count_promotion_hb - 1);
        $promotion_hb_ads = Generic::getHomePageRightSideAds('promotion_hb', 1, $offset_promotion_hb, $country_code);


        $discount_ads = Generic::getAllDiscountAds();
        if (is_array($discount_ads) && count($discount_ads) > 1) {
            shuffle($discount_ads);
        }
        $discount_ads = array_slice($discount_ads, 0, 3);

        $all_ads_electronics = Generic::allAdsElectronics('electronics_appliance', $country_code, 6);
        $all_ads_security = Generic::allAdsElectronics('security_n_alarming_system', $country_code, 6);
        $all_ads_mobile = Generic::allAdsElectronics('isp-accessories', $country_code, 6);

        //Generic::_setTrace($all_ads_mobile);

        // Get all EStores for each section

        $mobile_estores = Generic::getAllEStores(9, $country_code);
        

        $electronic_estores = Generic::getAllEStores(3, $country_code);
        $estore_adss = Generic::getEstoreProducts();

        $security_estores = Generic::getAllEStores(4, $country_code);



        $estore_adss = Generic::getEstoreProducts($country_code);

        if (is_array($estore_adss) && count($estore_adss) > 1) {
            shuffle($estore_adss);
        }

        $estore_ads = array_slice($estore_adss, 0, 6);
        
        $divisions = Division::model()->findAll(array('order'=>'division'));
        //Generic::_setTrace($divisions);
        //$districts = District::model()->findAll(array('order'=>'district'));
        //$thanas = Thana::model()->findAll(array('order'=>'thana'));
        $districts = [];
        $thanas = [];
       
        //Generic::_setTrace($estore_ads);
        //$this->createHeader();
        $this->render('index', array(
            'category' => $category,
            'sliced_array' => $sliced_array,
            'hot_ads' => $hot_ads,
            'featured_products' => $featured_products,
            'premium_ads' => $premium_ads,
            'top_ads' => $top_ads,
            'individual_paid_ads' => $individual_paid_ads,
            'top_estore' => $top_estore,
            'store_image_opt' => $opt,
            'header_right_side_ads' => $header_right_side_ads,
            'mega_sell_ads' => $mega_sell_ads,
            'bottom_right_ads' => $bottom_right_ads,
            'home_page_slider_ads' => $home_page_slider_ads,
            'find_package_bottom_slider_ads' =>$find_package_bottom_slider_ads,
            'estore_left_slider_ads' => $estore_left_slider_ads,
            'estore_right_slider_ads' => $estore_right_slider_ads,
            'isp_left_slider_ads' => $isp_left_slider_ads,
            'isp_right_slider_ads' => $isp_right_slider_ads,
            'promotion_hb_ads' => $promotion_hb_ads,
            'discount_ads' => $discount_ads,
            'fashion_featured_ads' => $fashion_featured_ads,
            'fashion_new_ads' => $fashion_new_ads,
            'electronic_featured_ads' => $electronic_featured_ads,
            'electronic_new_ads' => $electronic_new_ads,
            'computer_featured_ads' => $computer_featured_ads,
            'computer_new_ads' => $computer_new_ads,
            'mobile_featured_ads' => $mobile_featured_ads,
            'mobile_new_ads' => $mobile_new_ads,
            'all_ads_electronics' => $all_ads_electronics,
            'all_ads_fashion' => $all_ads_fashion,
            'all_ads_furniture' => $all_ads_furniture,
            'all_ads_food' => $all_ads_food,
            'all_ads_vehicles' => $all_ads_vehicles,
            'all_ads_security' => $all_ads_security,
            'all_ads_mobile' => $all_ads_mobile,
            'estore_ads' => $estore_ads,
            'electronic_estore' => $electronic_estores,
            'fashion_estore' => $fashion_estores,
            'furniture_estore' => $furniture_estores,
            'food_estore' => $food_estores,
            'security_estore' => $security_estores,
            'vehicle_estore' => $vehicle_estores,
            'mobile_estore' => $mobile_estores,
            'service_promotion_category' => $service_promotion_category,
            'country_code' => $country_code,
            'divisions' => $divisions,
            'districts' => $districts,
            'thanas'    => $thanas,
            'image_helper' => $image_helper
        ));
    }

    /**
     * Displays the contact page
     */
    public function actionContact($country_code = '') {
        $model = new ContactForm;
        $to_email = Yii::app()->params['registrationEmail'];
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                $message = 'An user has an enquiry with following details: <br/>';
                $message .= 'Name: '.$model->name.'<br>';
                $message .= 'Email: '.$model->email.'<br>';
                $message .= 'Message: <br><br>'.$model->body.'<br>';
                Generic::sendMail($message,$model->subject,$to_email);
                //mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            } else {
                $message = "There is an error in sending mail";
                Generic::sendMail($message,$model->subject,$to_email);
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the career page
     */
    // public function actionCareer() {
    //     $this->render('career', array());
    // }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm();
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {

            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                if (Yii::app()->user->returnUrl != '/') {
                    $this->redirect(Yii::app()->request->baseUrl . '/user/admin');
                } else {
                    $this->redirect(Yii::app()->request->baseUrl . '/user/admin');
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout($country_code = '') {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegisterNewUser() {
        
        $response = array();
        $token = Generic::generateToken();
        $register_type = Yii::app()->request->getParam('rgroup', '');
        $user_name = Yii::app()->request->getParam('user_name', '');
        $email = Yii::app()->request->getParam('email', '');
        $password = Yii::app()->request->getParam('password', '');
        $nationwide_thanas = Yii::app()->request->getParam('selected_hidden_thana', '');
        $nationwide_thanas = trim($nationwide_thanas,',');

        $zonal_thanas = Yii::app()->request->getParam('selected_hidden_thana_zonal', '');
        $zonal_thanas = trim($zonal_thanas,',');

        $category_thanas = Yii::app()->request->getParam('selected_hidden_thana_category', '');
        $category_thanas = trim($category_thanas,',');

        
        //Generic::_setTrace($_POST);
        $random_number = rand(100000, 999999);
        $text = urlencode('Dear Member, for your online registration. Please use this Secure Code, your One-Time Password is ' . $random_number . ' use within 5 minutes. Thank You! ');

        $contact_number = '';
        $division = '';
        $district = '';
        $address = '';
        $enter_prise_name = '';
        $business_category_id = '';
        $store_logo = '';
        $store_alias = '';
        $user_type = '';
        $designation = '';
        $referral_id = '';
        $license_number = '';
        $district = '';
        $thanas = $isp_category_type = '';
        $all_thanas = [];
        $multiple_divisions = $store_categories  = [];
        if ($register_type == 'individual') {
            $user_type = 'personal';
            $contact_number = Yii::app()->request->getParam('phone_number_personal', '');
            $district = Yii::app()->request->getParam('state_personal', '');
            $thanas = Yii::app()->request->getParam('selected_hidden_individual_thana', '');
            $thanas = trim($thanas,',');
            $address = Yii::app()->request->getParam('address_personal', '');
        } else if ($register_type == 'business') {
            $user_type = 'business';
            $contact_number = Yii::app()->request->getParam('phone_number_business', '');
            $isp_category_type = Yii::app()->request->getParam('business_category_id', '');
           
            if($nationwide_thanas != ''){
                $division = null;
                $district = null;
                $thanas = $nationwide_thanas;
            } else if($zonal_thanas != ''){
                $division = null;
                $district = null;
                $thanas = $zonal_thanas;
            }else {
                $district = Yii::app()->request->getParam('district', '');
                $division = Generic::getDivisionFromDistrict($district);
                $thanas = explode(',', $category_thanas);
            }
            
            //$district = Yii::app()->request->getParam('state_business', '');
            $address = Yii::app()->request->getParam('address_business', '');
            $enter_prise_name = Yii::app()->request->getParam('enterprise_name_business', '');
            $business_category_id = 225; // 225 is the Internet Service Provider
            $designation = Yii::app()->request->getParam('designation_business', '');
            $referral_id = Yii::app()->request->getParam('ref_id', '');
            $license_number = Yii::app()->request->getParam('license_number', '');
            $designation = Yii::app()->request->getParam('designation_isp', '');
            
        } else if ($register_type == 'store') {
            $user_type = 'store';
            $contact_number = Yii::app()->request->getParam('phone_number_estore', '');
            $district = Yii::app()->request->getParam('state_store', '');
            $thanas = Yii::app()->request->getParam('selected_hidden_store_thana', '');
            $enter_prise_name = Yii::app()->request->getParam('estore_name', '');
            $store_logo = Yii::app()->request->getParam('image_file', '');
            $store_logo = trim($store_logo,',');
            $store_alias = str_replace(" ", "-", $enter_prise_name);
            $store_categories = Yii::app()->request->getParam('estore_categories', []);

            $thanas = trim($thanas,',');
            $address = Yii::app()->request->getParam('address_estore', '');
            $designation = Yii::app()->request->getParam('designation_estore', '');
        }

        if(is_array($thanas)){
            $all_thanas = $thanas;
            $thanas = implode(',', $thanas);
        } else {
            $all_thanas = [$thanas];
        }

        $sql = "select * from tbl_register where email='$email'";
        if($license_number != ''){
            $sql .= " or license_number='$license_number'";
        }
        if($register_type == 'business' || $register_type == 'store') {
            $sql .= " or enterprise_name='$enter_prise_name'";
        }
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        if (empty($result)) {
            $register = new Register();
            $register->register_type = $user_type;
            $register->user_name = $user_name;
            $register->email = $email;
            $register->password = base64_encode($password);
            $register->user_token = $token;
            $register->phone_number = $contact_number;
            $register->enterprise_name = $enter_prise_name;
            $register->isp_type = $isp_category_type;
            $register->business_category_id = $business_category_id;
            $register->address = $address;
            $register->country = '18'; // country code of bangladesh
            $register->division = $division;
            $register->district = $district;
            $register->thana = $thanas;
            $register->designation = $designation;
            $register->create_date = date('y-m-d');
            $register->otp = $random_number;
            $register->otp_time = date('y-m-d H:i:s');
            $register->user_status = 1; # should be 0 if otp is used
            $register->license_number = $license_number;
            if ($referral_id) {
                $criteria = new CDbCriteria();
                $criteria->condition = 'referral_id = :referral_id';
                $criteria->params = array(':referral_id' => $referral_id);
                $portal_referral = Portal_referral::model()->find($criteria);
                if ($portal_referral) {
                    $register->referral_id = $referral_id;
                }
            }
            //if (true) {
            if ($register->save()) {

                if($user_type == 'store'){

                    if(!empty($store_categories)){
                        foreach ($store_categories as $single_category) {
                            $registered_estore = new Register_estore();
                            $registered_estore->user_id = $register->id;
                            $registered_estore->category_id = $single_category;
                            $registered_estore->create_date = date('y-m-d');
                            $registered_estore->save();
                        }
                    }

                    if(strpos($store_logo, 'uploads') !== true){
                        $store_logo = Yii::app()->getBaseUrl(true).'/uploads/'.$store_logo;
                    }
                    $register->image = $store_logo;
                    $register->update();

                    $todays_date = new \DateTime();
                    // $store = new Estore();
                    // $store->user_id = $register->id;
                    // $store->slogan = '';
                    // $store->logo = $store_logo;
                    // $store->banner = '';
                    // $store->sub_banner = '';
                   
                    // $store->about_us = '';
                    // $store->contact_us = '';

                    
                    // $store->url_alias = strtolower($store_alias);
                    // $store->create_date = $todays_date->format('Y-m-d');
                    // $store->active = 1;
                    // $store->save();

                    // $service_plan = new Subscription_plan();
                    // $service_plan->user_id = $register->id;
                    // $service_plan->estore_id = $store->id;
                    // $service_plan->plan_type = 1;
                    // $service_plan->additional_service = '';
                    // $service_plan->create_date = $todays_date->format('Y-m-d H:i:s');
                    // $service_plan->status = 1;
                    // $service_plan->save();
                }

                if($nationwide_thanas != '' || $zonal_thanas != ''){
                    $this->insert_into_register_location($register->id,$division,$district,$all_thanas,true);
                } else {
                    $this->insert_into_register_location($register->id,$division,$district,$all_thanas);
                }
                
                Yii::app()->session['user_token'] = $register->user_token;
                $response['status'] = 'success';
                $response['message'] = '<span class="alert-success">Registration Successful.You are Now Redirect to Your profile.</span>';
                //file_get_contents('https://rest.nexmo.com/sms/json?api_key=4326a285&api_secret=d565e75d27450809&from=bdbroadbanddeals.com&to=' . str_replace("+", "", $contact_number) . '&text=' . $text);
                //Generic::sendOTPtoMail($random_number, 'Secure code from bdbroadbanddeals.com', $email);
                //Yii::app()->session['user_token'] = $token;
                Generic::sendRegistrationPaper($register);
            } else {

                $response['status'] = 'error'; // could not register
                $response['message'] = '<span class="alert-danger">Could Not Register, Try Again Later</span>';
            }
        } else {
            $response['status'] = 'duplicate'; // could not register
            if($register_type == 'individual'){
                $response['message'] = '<span class="alert-danger"> An User Already Registered With these details. Please check your email address.</span>';
            } else if($register_type == 'business'){
                $response['message'] = '<span class="alert-danger"> An User Already Registered With these information. Please check your Email Address or ISP Name or License Number.</span>';
            } else {
                $response['message'] = '<span class="alert-danger"> An User Already Registered With these details. Please check your email address or Enterprise Name.</span>';
            }
            
            $response['button_text'] = 'Registration';
        }
        echo json_encode($response);
    }

    public function insert_into_register_location($user_id,$division,$district,$thanas,$is_nationwide = false){
        
        if($is_nationwide){
            $all_thana = explode(',', $thanas[0]);
            $single_division = '';
            foreach ($all_thana as $single_thana) {
                $register_user_location = new Registered_user_location();
                $register_user_location->user_id = $user_id;
                
                $single_district_thana = $this->getDistrictFromThana($single_thana);

                if(isset($single_district_thana['district'])){
                    $single_division = $this->getDivisionFromDistrict($single_district_thana['district']);
                }

                $register_user_location->division_id = $single_division;
                $register_user_location->district_id = $single_district_thana['district'];
                $register_user_location->thana_id = $single_district_thana['thana'];
                $register_user_location->create_date = date('y-m-d');

                if($register_user_location->validate()){
                    $return_result = $register_user_location->save();
                }
            }
        } else {
            if(!empty($thanas)){
                foreach ($thanas as $thana) {
                    $register_user_location = new Registered_user_location();
                    $register_user_location->user_id = $user_id;
                    $register_user_location->division_id = $division;
                    $register_user_location->district_id = $district;
                    $register_user_location->thana_id = $thana;
                    $register_user_location->create_date = date('y-m-d');
                    $register_user_location->save();
                }
            } else {
                $register_user_location = new Registered_user_location();
                $register_user_location->user_id = $user_id;
                $register_user_location->division_id = $division;
                $register_user_location->district_id = $district;
                $register_user_location->create_date = date('y-m-d');
                $register_user_location->save();
            }
        }
    }

    public function getDistrictFromThana($thana_id){
        $thana_details = Thana::model()->findByPk($thana_id);
        $district = '';
        $thana = '';
        if($thana_details) {
            $district = $thana_details->district_id;
            $thana = $thana_details->thana_id;
        }
        return ['district' => $district,'thana' => $thana];
    }

    public function getDivisionFromDistrict($district_id){
        $district_details = District::model()->findAllByAttributes(['district_id' => $district_id]);
        if($district_details){
            return $district_details[0]->division_id;
        } else {
            return '';
        }
    }

    public function actionOtpConfirmation() {
        //$user_token = Yii::app()->session['user_token'];
        //$result = Generic::getUserId($user_token);
        $email = Yii::app()->request->getParam('email', '');
        $criteria = new CDbCriteria();
        $criteria->condition = 'email = :email';
        $criteria->params = array(':email' => $email);
        $user_details = Register::model()->find($criteria);

        $user_name = $user_details->user_name;
        $phone_number = $user_details->phone_number;
        $this->render('otp_confirmation', array(
            'user_name' => $user_name,
            'phone_number' => $phone_number,
            'user_token' => $user_details->user_token
        ));
    }

    public static function actionUserLogin() {
        $response = array();
        $user_email = trim(yii::app()->request->getParam('email'));
        $password = Yii::app()->request->getParam('password');
        $final_password = base64_encode($password);
        $phone_number = Yii::app()->request->getParam('phone_number');
        if ($user_email && $final_password) {
            $sql = "SELECT email, password,user_token FROM tbl_register WHERE email LIKE '$user_email' AND password LIKE '$final_password' AND user_status = 1";
        } elseif ($phone_number && $final_password) {
            $sql = "SELECT email, password,user_token FROM tbl_register WHERE phone_number LIKE '$phone_number' AND password LIKE '$final_password' AND user_status = 1";
        }
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        if ($result['password'] == $final_password) {
            $response['status'] = 'ok';
            $response['user_token'] = $result['user_token'];
            // $_SESSION['user_session'] = $result['user_token'];
            Yii::app()->session['user_token'] = $result['user_token'];
        } else {
            $response['status'] = 'Wrong User Email or Password..!';
        }
        echo json_encode($response);
    }

    public function actionForgetPassword($country_code = '') {

        $this->render('forget-pass');
    }

    public static function actionCheckLoginStatus() {
        $response = array();
        $session = Yii::app()->session['user_token'];
        $profile_data = Generic::getProfileData($session);

        if (empty($session)) {
            $response['status'] = 'not_login';
        } else {
            $response['status'] = 'login';
            $response['register_type'] = $profile_data['register_type'];
        }
        echo json_encode($response);
    }

    public function actionPostYourAdd($country_code = '') {
        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }

        $locale = '';
        if ($country_code) {
            $locale = $country_code . '/';
        }

        $is_logged_in = $session = Yii::app()->session['user_token'];
        if (!$is_logged_in) {
            $this->render($locale . 'sign-in');
        }
        $this->render($locale . 'ad-post');
    }

    public function actionRegister($country_code = '') {
        $return_url = urldecode(base64_decode(Yii::app()->request->getParam('return_url', '')));
        $this->render('register', array(
            'return_url' => $return_url
        ));
    }

    public function actionSignIn($country_code = 'BD') {
        

        Yii::app()->session->open();
        $country_details = Generic::checkForStoredCountry();

        $return_url = urldecode(base64_decode(Yii::app()->request->getParam('return_url', '')));

        /* ---------- Facebook api ----------------- */
        $fb = new Facebook\Facebook([
            'app_id' => '370377096667728',
            'app_secret' => '7517c66527ecd9718497d0bb855435c6',
            'default_graph_version' => 'v2.8',
        ]);

        $callback_url = Yii::app()->getBaseUrl(true) . '/site/FBCallBack';
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email'];
        $fb_login_url = $helper->getLoginUrl($callback_url, $permissions);

        /* ---------- Gmail api -------------------- */

        $clientId = '1058190884854-424b6t2kp41prkn5ku9e8ejvnls110nu.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'cVhrFx19i9E8cN4R-gA0gcr4'; //Google client secret
        $gmail_callback_redirectURL = Yii::app()->getBaseUrl(true) . '/site/GmailCallBack';
        $gClient = new Google_Client();
        $gClient->setApplicationName('bdads web client 1');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($gmail_callback_redirectURL);

        $google_oauthV2 = new Google_Oauth2Service($gClient);
        $google_authUrl = $gClient->createAuthUrl();
        $divisions = Division::model()->findAll();
        $districts = District::model()->findAll(array('order' => 'district ASC'));
        $thanas = Thana::model()->findAll(array('order' => 'thana ASC'));
        $this->render('sign-in', array(
            'return_url' => $return_url,
            'fb_login_url' => $fb_login_url,
            'gmail_login_url' => $google_authUrl,
            'country_details' => $country_details,
            'divisions' => $divisions,
            'districts' => $districts,
            'thanas' => $thanas,
            'country_code' => $country_code
        ));
    }

    public function actionFBCallBack() {
        Yii::app()->session->open();
        $fb = new Facebook\Facebook([
            'app_id' => '370377096667728',
            'app_secret' => '7517c66527ecd9718497d0bb855435c6',
            'default_graph_version' => 'v2.8',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        $oAuth2Client = $fb->getOAuth2Client();

        $tokenMetadata = $oAuth2Client->debugToken($accessToken);

        $tokenMetadata->validateAppId('370377096667728');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;
        $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
        $response = $fb->get('/me?locale=en_US&fields=name,email');

        $userNode = $response->getGraphUser();
        if ($userNode->getField('email') == '') {
            $email = 'anonym@email.com';
        } else {
            $email = $userNode->getField('email');
        }
        if ($userNode->getField('name') == '') {
            $user_name = 'anonymous user';
        } else {
            $user_name = $userNode->getField('name');
        }

        $oauth_id = $userNode->getField('id');

        $base_url = Yii::app()->getBaseUrl(true);
        $criteria = new CDbCriteria();
        $criteria->condition = 'oauth_token = :oauth_token';
        $criteria->params = array(':oauth_token' => $oauth_id);
        $registered_user = Register::model()->find($criteria);
        if (!$registered_user) {

            $user_ip = SiteConfig::GetUserIP();
            //$user_ip = "180.234.143.72";
            $geoinfo = Generic::getGeoInfo($user_ip);
            $city = '';
            $division = '';
            if ($geoinfo['geoplugin_status'] == '200') {
                $city = $geoinfo['geoplugin_city'];
                $division = $geoinfo['geoplugin_region'];
            }
            $token = Generic::generateToken();

            $register = new Register();
            $register->register_type = 'personal';
            $register->user_name = $user_name;
            $register->email = $email;
            $register->password = base64_encode('1234');
            $register->user_token = $token;
            $register->phone_number = '1111';
            $register->address = 'sdfs';
            $register->division = $division;
            $register->district = $city;
            $register->create_date = date('y-m-d');
            $register->oauth_token = $oauth_id;
            if ($register->save()) {
                Yii::app()->session['user_token'] = $token;
                $this->redirect($base_url . '/userProfile');
            }
        } else {
            Yii::app()->session['user_token'] = $registered_user->user_token;
            $this->redirect($base_url . '/userProfile');
        }
    }

    public function actionGmailCallBack() {
        $clientId = '1058190884854-424b6t2kp41prkn5ku9e8ejvnls110nu.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'cVhrFx19i9E8cN4R-gA0gcr4'; //Google client secret
        $gmail_callback_redirectURL = Yii::app()->getBaseUrl(true) . '/site/GmailCallBack';
        $gClient = new Google_Client();
        $gClient->setApplicationName('bdads web client 1');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($gmail_callback_redirectURL);

        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $access_token = $gClient->getAccessToken();
            $gpUserProfile = $google_oauthV2->userinfo->get();
        }

        $oauth_id = $gpUserProfile['id'];
        $user_name = $gpUserProfile['name'];
        $email = $gpUserProfile['email'];

        $base_url = Yii::app()->getBaseUrl(true);
        $criteria = new CDbCriteria();
        $criteria->condition = 'oauth_token = :oauth_token';
        $criteria->params = array(':oauth_token' => $oauth_id);
        $registered_user = Register::model()->find($criteria);
        if (!$registered_user) {

            $user_ip = SiteConfig::GetUserIP();
            //$user_ip = "180.234.143.72";
            $geoinfo = Generic::getGeoInfo($user_ip);
            $city = '';
            $division = '';
            if ($geoinfo['geoplugin_status'] == '200') {
                $city = $geoinfo['geoplugin_city'];
                $division = $geoinfo['geoplugin_region'];
            }
            $token = Generic::generateToken();

            $register = new Register();
            $register->register_type = 'personal';
            $register->user_name = $user_name;
            $register->email = $email;
            $register->password = base64_encode('1234');
            $register->user_token = $token;
            $register->phone_number = '1111';
            $register->address = 'sdfs';
            $register->division = $division;
            $register->district = $city;
            $register->create_date = date('y-m-d');
            $register->oauth_token = $oauth_id;
            if ($register->save()) {
                Yii::app()->session['user_token'] = $token;
                $this->redirect($base_url . '/userProfile');
            }
        } else {
            Yii::app()->session['user_token'] = $registered_user->user_token;
            $this->redirect($base_url . '/userProfile');
        }
    }

    public function actionEstore() {
        $this->render('estore');
    }

    public function actionAd($country_code = '') {
        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }
        $opt = array(
            'w' => '320',
            'h' => '240',
            'g' => 'center',
            'r' => '0'
        );
        $small_image_opt = array(
            'w' => '200',
            'h' => '192',
            'g' => 'center',
            'r' => '0'
        );
        $ad_id = urldecode(base64_decode(Yii::app()->request->getParam('ad_id')));
        $ad_type = urldecode(base64_decode(Yii::app()->request->getParam('ad_type')));
        $baseUrl = Yii::app()->getBaseUrl(true);
        $url = $baseUrl . '/admin/ads/view/id/' . $ad_id . '';
        $current_time = date('Y-m-d H:i:s');

        $criteria = new CDbCriteria();
        $criteria->condition = 'id = :id and active = :active and expire_date > :expire_date';
        $criteria->params = array(':id' => $ad_id, ':active' => 1, ':expire_date' => $current_time);
        
        $active_ad_details = Ads::model()->find($criteria);

        if (!$active_ad_details) {
            if ($_SERVER['HTTP_REFERER'] != $url) {
                throw new CHttpException(404, "Invalid Request!");
            }
        }

        $user_ip = SiteConfig::GetUserIP();
        $ad_view = Generic::getAllFromAdView($ad_id, $user_ip);
        $check_ip = isset($ad_view[0]['ip_address']) ? $ad_view[0]['ip_address'] : '';

        $last_viewed = isset($ad_view[0]['last_viewed']) ? $ad_view[0]['last_viewed'] : '';
        $new_time = date("Y-m-d H:i:s", strtotime('+2 minutes', strtotime($last_viewed)));

        $connection = Yii::app()->db;

        if ($current_time > $new_time) {
            if ($check_ip >= 1) {
                $sql = "UPDATE tbl_ad_view SET last_viewed='$current_time',view_count=view_count+1 WHERE ad_id='$ad_id' AND ip_address='$check_ip'";
            } else {
                $sql = "insert into tbl_ad_view SET ad_id='$ad_id',ip_address='$user_ip',last_viewed='$current_time',view_count= 1";
            }
            $command = $connection->createCommand($sql);
            $result = $command->execute();
        }

        $ad_views = Generic::getTotalAdView($ad_id);
        $view_count = array_sum(array_column($ad_views, 'view_count'));

        $Criteria = new CDbCriteria();
        $Criteria->condition = "user_token = :user_token";
        $Criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $loggedin_user = Register::model()->find($Criteria);

        $this->markAdAsRecentlyViewed($ad_id);

        $count_mega_sell = count(Generic::getHomePageRightSideAds('detail_top_right', 0, 0, $country_code));
        $offset_mega_sell = rand(0, $count_mega_sell - 1);
        $mega_sell_ads = Generic::getHomePageRightSideAds('detail_top_right', 1, $offset_mega_sell, $country_code);

        $count_related_banner = count(Generic::getHomePageRightSideAds('related_product_banner', 0, 0, $country_code));
        $offset_related_banner = rand(0, $count_related_banner - 1);
        $related_product_banner = Generic::getHomePageRightSideAds('related_product_banner', 1, $offset_related_banner, $country_code);

        $count_up_sell_product_banner = count(Generic::getHomePageRightSideAds('up_sell_product_banner', 0, 0, $country_code));
        $offset_up_sell_product_banner = rand(0, $count_up_sell_product_banner - 1);
        $up_sell_product_banner = Generic::getHomePageRightSideAds('up_sell_product_banner', 1, $offset_up_sell_product_banner, $country_code);


        $data = Generic::getAddDetailsFromAddTable($ad_id);
        $related_products = Generic::getRelatedProducts($ad_id, $data['category_id'], $country_code);
        $up_sell_products = Generic::getAllUpSellProducts($ad_id, $data['category_id'], $country_code);


        $latitude = '';
        $longitude = '';


        $favorite_counter = 0;
        $favorites = Favorites::model()->findAll();
        foreach ($favorites as $favorite) {
            $ad_array = explode(',', $favorite->ad_id);
            if (in_array($ad_id, $ad_array)) {
                $favorite_counter++;
            }
        }

            $ad_details = Generic::getAddDetailsFromAddTable($ad_id);
            if ($ad_details['location'] != '') {
                $address = $ad_details['location'];
                
                $latitude = '';//$output->results[0]->geometry->location->lat;
                $longitude = '';//$output->results[0]->geometry->location->lng;
            }
            $title = isset($ad_details['title']) ? $ad_details['title'] : '';
            $image_url = isset($ad_details['image_url']) ? $ad_details['image_url'] : '';
            $description = isset($ad_details['description']) ? $ad_details['description'] : '';
            $price = isset($ad_details['price']) ? $ad_details['price'] : '';
            $price_end = isset($ad_details['price_end']) && $ad_details['price_end'] && $ad_details['price_end'] != $ad_details['price'] ? ' - ' . $ad_details['price_end'] : '';
            $user_id = $ad_details['user_id'];
            $profile_data = Generic::getUserData($user_id);
            $phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
            $images = json_decode($ad_details['image_url']);
            $ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
            $category_id = isset($ad_details['category_id']) ? $ad_details['category_id'] : '';
            $category_details = Category::model()->findByPk($category_id);
            $parent_category_details = Category::model()->findByPk($category_details->parent_id);
            $ad_owner_details = Register::model()->findByPk($ad_details['user_id']);
            $parent_id = $category_details->parent_id;
            $category_name = Generic::getCategoryNameFromParentId($parent_id);
            $sub_category_name = isset($category_details['category_name']) ? $category_details['category_name'] : '';
            $ad_links = $this->determineAdLinks($ad_id);
            $this->render('ad_details', array(
                'title' => $title,
                'image_url' => $image_url,
                'description' => $description,
                'price' => $price,
                'price_end' => $price_end,
                'phone_number' => $phone_number,
                'images' => $images,
                'ad_details_all' => $ad_details_all,
                'category_name' => $category_name,
                'sub_category_name' => $sub_category_name,
                'opt' => $opt,
                'small_image_opt' => $small_image_opt,
                'ad_details' => $ad_details,
                'category_details' => $category_details,
                'parent_category_details' => $parent_category_details,
                'ad_owner_details' => $ad_owner_details,
                'view_count' => $view_count,
                'ip_address' => $user_ip,
                'loggedin_user' => $loggedin_user,
                'favorite_counter' => $favorite_counter,
                'next_link' => $ad_links['next'],
                'prev_link' => $ad_links['prev'],
                'mega_sell_ads_details' => $mega_sell_ads,
                'related_product_banner' => $related_product_banner,
                'up_sell_product_banner' => $up_sell_product_banner,
                'related_products' => $related_products,
                'up_sell_products' => $up_sell_products,
                'latitude' => $latitude,
                'longitude' => $longitude
            ));
    }

    public function actionSuccess() {
        
        $Criteria = new CDbCriteria();
        $Criteria->condition = "user_token = :user_token";
        $Criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $loggedin_user = Register::model()->find($Criteria);
        $post_another_ad_url = '/add-post-details';
        $modal_type = 3;
        if($loggedin_user->register_type == 'business'){
            $post_another_ad_url = '/my-profile/add-package';
            $modal_type = 1;
        } else if($loggedin_user->register_type == 'store'){
            $post_another_ad_url = '/my-profile/add-ads';
            $modal_type = 2;
        }
        $opt = array(
            'w' => '400',
            'h' => '280',
            'g' => 'center',
            'r' => '0'
        );
         
        $short_information = '';
        $this->render('success', array(
            'opt' => $opt,
            'post_another_ad_url' => $post_another_ad_url,
            'modal_type' => $modal_type
        ));
    }

    public function actionUpdateSuccess() {
        $opt = array(
            'w' => '400',
            'h' => '280',
            'g' => 'center',
            'r' => '0'
        );
        $this->render('update-success', array(
            'opt' => $opt,
        ));
    }

    public function actionJobPostSuccess() {
        $job_id = Yii::app()->request->getParam('job_id', '');
        $job_details = Jobs::model()->findByPk($job_id);
        $user_details = Register::model()->findByPk($job_details->user_id);
        $this->render('job-post-success', array(
            'job_details' => $job_details,
            'user_details' => $user_details
        ));
    }

    public function actionHelp($country_code = '') {
        $this->render('help');
    }

    public function actionGetHowItWorksPage($country_code = '') {

        $criteria = new CDbCriteria();
        $criteria->condition = 'alias = :alias';
        $criteria->params = array(':alias' => 'how-it-works');
        $page = Page::model()->find($criteria);
        $this->render('pages/how-it-works', array('page_content' => $page->content));
    }

    public function actionDetailsAdPost($country_code = '') {

        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }

        $locale = '';
        if ($country_code) {
            $locale = $country_code . '/';
        }

        $country_details = Generic::checkForStoredCountry();
        if (!$country_code) {
            if ($country_details) {
                $currency_sign = $country_details->currency_sign;
            }
        } else {
            $currency_sign = $requested_country['currency_sign'];
        }
        $category_slug = Yii::app()->request->getQuery('category', '');
        $sub_category_slug = Yii::app()->request->getQuery('sub-category', '');
        $type = Yii::app()->request->getQuery('type', '');
        $category_name = Generic::getCategoryName($category_slug);
        $sub_category_name = Generic::getSubCategoryName($sub_category_slug);
        $category_id = Generic::getCategoryId("", $sub_category_slug);


        $token = Yii::app()->session['user_token'];
        $profile_data = Generic::getProfileData($token);
        $user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
        $user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
        $email = isset($profile_data['email']) ? $profile_data['email'] : '';
        $phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
        $address = isset($profile_data['address']) ? $profile_data['address'] : '';
        $register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
        $company_name = isset($profile_data['enterprise_name']) ? $profile_data['enterprise_name'] : '';
        $column_configuration_manager = Yii::app()->params['columnsConfig'];

        if (isset($column_configuration_manager[$sub_category_slug])) {
            $category_meta_info = $column_configuration_manager[$sub_category_slug];
        } else {
            $category_meta_info = array();
        }

        if (isset($category_slug) && $category_slug == 'jobs_n_career') {
            $this->render('add-job-post-details', array(
                'category_name' => $category_name,
                'category_slug' => $category_slug,
                'sub_category_name' => $sub_category_name,
                'sub_category_slug' => $sub_category_slug,
                'type' => $type,
                'user_name' => $user_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address,
                'register_type' => $register_type,
                'company_name' => $company_name,
                'custom_columns' => $category_meta_info,
                'custom_column_number' => count($category_meta_info),
                'all_job_list' => Generic::getAllJobTypes(),
                'category_id' => $category_id,
                'all_district' => Generic::getAllDistrict(),
                'job_types' => Generic::getJobType()
            ));
        } else {
            $this->render('add-post-details', array(
                'category_name' => $category_name,
                'category_slug' => $category_slug,
                'sub_category_name' => $sub_category_name,
                'sub_category_slug' => $sub_category_slug,
                'type' => $type,
                'user_name' => $user_name,
                'user_id' => $user_id,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address,
                'register_type' => $register_type,
                'custom_columns' => $category_meta_info,
                'custom_column_number' => count($category_meta_info),
                'category_id' => $category_id,
                'currency_sign' => $currency_sign
            ));
        }
    }

    public function actionSaveAd() {
        $response = array();
        $ad_type = Yii::app()->request->getParam('ad_type');
        $expiration_date = Yii::app()->request->getParam('expire_date');
        $title = Yii::app()->request->getParam('ads_title', '');
        $image_urls = Yii::app()->request->getParam('image_file');
        $image_urls = trim($image_urls,',');
        $image_urls_array = explode(',',$image_urls);
        $image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $image_urls_array);

        $image_url = json_encode($image_urls_array);
        $description = Yii::app()->request->getParam('ads_description', '');
        $condition = Yii::app()->request->getParam('ads_condition', '');
        $price = Yii::app()->request->getParam('ads_price', '');
        $service_charge = Yii::app()->request->getParam('service_charge', 0);
        $migration_charge = Yii::app()->request->getParam('migration_charge', 0);
        $price_end = Yii::app()->request->getParam('ads_price_end', '');
        $show_price_option = Yii::app()->request->getParam('show_price_option', 1);

        $package_type = Yii::app()->request->getParam('connection_type', '');
        $internet_speed = Yii::app()->request->getParam('internet_speed_kbps', '');
        $youtube_speed = Yii::app()->request->getParam('youtube_speed_kbps', '');
        $bdix_speed = Yii::app()->request->getParam('bdix_speed_kbps', '');
        $ftp_link = Yii::app()->request->getParam('ftp_link', '');
        $live_tv = Yii::app()->request->getParam('live_tv', '');
        $facebook_link = Yii::app()->request->getParam('facebook_link', '');
        $website_link = Yii::app()->request->getParam('website', '');
        $public_ip = Yii::app()->request->getParam('public_ip', 0);

        $country_details = Generic::checkForStoredCountry();

        if ($price_end == '') {
            $price_end = $price;
        }
        $price_type = Yii::app()->request->getParam('price_type', '');
        $discount = Yii::app()->request->getParam('discount', '');
        $user_data = Generic::getUserId(Yii::app()->session['user_token']);
        $category_id = Yii::app()->request->getParam('category_id', '');
        $is_featured = Yii::app()->request->getParam('is_featured', 0);
        $is_premium = Yii::app()->request->getParam('is_premium', 0);
        $is_top = Yii::app()->request->getParam('is_top', 0);
        $is_paid = Yii::app()->request->getParam('is_paid', 0);
        $show_in_store = Yii::app()->request->getParam('show_in_estore', 0);
        $special_offer = Yii::app()->request->getParam('special_offer', 0);
        $custom_fields_array = array();
        $custom_field_number = Yii::app()->request->getParam('custom_column_number', 0);
        for ($i = 1; $i <= $custom_field_number; $i++) {
            $field_name = Yii::app()->request->getParam('custom_field_' . $i, '');
            $custom_fields_array[] = array(
                'field_name' => $field_name,
                'field_value' => Yii::app()->request->getParam($field_name, '')
            );
        }

        //$user_ip = SiteConfig::GetUserIP();
        //$user_ip = "180.92.226.51";
        $user_location = $user_data['district'];
        //$lat_lon = Generic::getLatitudeLongitude($user_location);
        if (!$lat_lon) {
            $latitude = '22.845641';
            $longitude = '89.5403279';
        } else {
            $latitude = $lat_lon->results[0]->geometry->location->lat;
            $longitude = $lat_lon->results[0]->geometry->location->lng;
        }
        $creation_date = new \DateTime();
        
        if($user_data['register_type'] == 'business'){
            $isp_criteria = new CDbCriteria();
            $isp_criteria->condition = 'user_id=:user_id';
            $isp_criteria->params = array(':user_id' => $user_data['id']);
            $isp_details = ISP_details::model()->findAll($isp_criteria);
            $expiration_dates = new \DateTime($isp_details[0]->expire_date);
        } else if ($user_data['register_type'] == 'store'){
            $estore_criteria = new CDbCriteria();
            $estore_criteria->condition = 'user_id=:user_id';
            $estore_criteria->params = array(':user_id' => $user_data['id']);
            $estore_plan_details = Subscription_plan::model()->findAll($estore_criteria);
            $expiration_dates = new \DateTime($estore_plan_details[0]->expiration_date);
        } else {
            $expiration_dates = new \DateTime();
            $expiration_dates->modify('10 day');
        }
        
        $ad = new Ads();
        $ad->category_id = $category_id;
        $ad->user_id = $user_data['id'];
        $ad->title = $title;
        $ad->image_url = $image_url;
        $ad->description = $description;
        $ad->ad_condition = $condition;
        $ad->price = $price;
        $ad->price_end = $price_end;
        $ad->price_type = $price_type;
        $ad->discount = $discount;
        $ad->special_offer = $special_offer;
        $ad->create_date = $creation_date->format('Y-m-d H:i:s');
        $ad->update_date = $creation_date->format('Y-m-d H:i:s');
        $ad->active = 0;
        $ad->expire_date = $expiration_dates->format('Y-m-d');
        $ad->is_featured = $is_featured;
        $ad->is_premium = $is_premium;
        $ad->is_top = $is_top;
        $ad->is_paid = $is_paid;
        
        if($user_data['register_type'] == 'store'){
            $ad->show_in_store = $show_in_store;
        } else {
            $ad->show_in_store = 1;
        }
        $ad->location = $user_data['district'];
        $ad->latitude = $latitude;
        $ad->longitude = $longitude;
        $ad->show_price = $show_price_option;
        if ($country_details) {
            $ad->country_code = $country_details->sortname;
        }
        if($package_type){
            $ad->package_type = $package_type;
        }
        if($internet_speed){
            $ad->internet_speed = $internet_speed;
        }
        if($youtube_speed){
            $ad->youtube_speed = $youtube_speed;
        }
        if($bdix_speed){
            $ad->bdix_speed = $bdix_speed;
        }
        if($ftp_link){
            $ad->ftp_link = $ftp_link;
        }
        if($live_tv){
            $ad->live_tv = $live_tv;
        }
        if($facebook_link){
            $ad->facebook_link = $facebook_link;
        }
        if($website_link){
            $ad->website_link = $website_link;
        }
        if($public_ip) {
            $ad->public_ip = $public_ip;
        }
        if($service_charge) {
            $ad->service_charge = $service_charge;
        }
        if($migration_charge) {
            $ad->migration_charge = $migration_charge;
        }

        if ($ad->save()) {
            $ad_id = $ad->id;
            $ad->ad_id = time() . $ad_id;
            $ad->update();
            Generic::saveMetaData($category_id, $ad_id, $custom_fields_array);
            $this->sendApprovalRequestToSupport($user_data['id']);
            $response['status'] = 'success';
            $response['ad_id'] = base64_encode($ad_id);
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Store Data.Please Try again Later';
        }

        echo json_encode($response);
    }


    /**
    * update ISP package
    */
    public function actionUpdateISPPackage() {
        $response = array();
        $ad_type = Yii::app()->request->getParam('ad_type');
        $isp_package_id = Yii::app()->request->getParam('isp_package_id');
        $expiration_date = Yii::app()->request->getParam('expire_date');
        $title = Yii::app()->request->getParam('ads_title', '');
        $image_urls = Yii::app()->request->getParam('image_file');
        $image_urls = trim($image_urls,',');
        $image_urls_array = explode(',',$image_urls);
        $image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $image_urls_array);

        $deleted_image_urls = Yii::app()->request->getParam('delete_image_file');
        $deleted_image_urls = trim($deleted_image_urls,',');
        $deleted_image_urls_array = explode(',',$deleted_image_urls);
        $deleted_image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $deleted_image_urls_array);
        // need to delete images from server
        //unlink from server here

        $image_url = json_encode($image_urls_array);
        $description = Yii::app()->request->getParam('ads_description', '');
        $condition = Yii::app()->request->getParam('ads_condition', '');
        $price = Yii::app()->request->getParam('ads_price', '');
        $service_charge = Yii::app()->request->getParam('service_charge', 0);
        $migration_charge = Yii::app()->request->getParam('migration_charge', 0);
        $price_end = Yii::app()->request->getParam('ads_price_end', '');
        $show_price_option = Yii::app()->request->getParam('show_price_option', 1);

        $package_type = Yii::app()->request->getParam('connection_type', '');
        $internet_speed = Yii::app()->request->getParam('internet_speed_kbps', '');
        $youtube_speed = Yii::app()->request->getParam('youtube_speed_kbps', '');
        $bdix_speed = Yii::app()->request->getParam('bdix_speed_kbps', '');
        $ftp_link = Yii::app()->request->getParam('ftp_link', '');
        $live_tv = Yii::app()->request->getParam('live_tv', '');
        $facebook_link = Yii::app()->request->getParam('facebook_link', '');
        $website_link = Yii::app()->request->getParam('website', '');
        $public_ip = Yii::app()->request->getParam('public_ip', 0);

        $country_details = Generic::checkForStoredCountry();

        if ($price_end == '') {
            $price_end = $price;
        }
        $price_type = Yii::app()->request->getParam('price_type', '');
        $discount = Yii::app()->request->getParam('discount', '');
        $user_data = Generic::getUserId(Yii::app()->session['user_token']);
        $category_id = Yii::app()->request->getParam('category_id', '');
        $is_featured = Yii::app()->request->getParam('is_featured', 0);
        $is_premium = Yii::app()->request->getParam('is_premium', 0);
        $is_top = Yii::app()->request->getParam('is_top', 0);
        $is_paid = Yii::app()->request->getParam('is_paid', 0);
        $show_in_store = Yii::app()->request->getParam('show_in_estore', 0);
        $special_offer = Yii::app()->request->getParam('special_offer', 0);
        $custom_fields_array = array();
        $custom_field_number = Yii::app()->request->getParam('custom_column_number', 0);
        for ($i = 1; $i <= $custom_field_number; $i++) {
            $field_name = Yii::app()->request->getParam('custom_field_' . $i, '');
            $custom_fields_array[] = array(
                'field_name' => $field_name,
                'field_value' => Yii::app()->request->getParam($field_name, '')
            );
        }

        $creation_date = new \DateTime();
        
        $ad = Ads::model()->findByPk($isp_package_id);

        $ad->title = $title;
        $ad->image_url = $image_url;
        $ad->description = $description;
        $ad->ad_condition = $condition;
        $ad->price = $price;
        $ad->price_end = $price_end;
        $ad->price_type = $price_type;
        $ad->discount = $discount;
       
        $ad->update_date = $creation_date->format('Y-m-d H:i:s');
        $ad->active = 0;

        $ad->is_featured = $is_featured;
        $ad->is_premium = $is_premium;
        $ad->is_top = $is_top;
        $ad->is_paid = $is_paid;
        $ad->show_in_store = $show_in_store;

        $ad->show_price = $show_price_option;
        if ($country_details) {
            $ad->country_code = $country_details->sortname;
        }
        if($package_type){
            $ad->package_type = $package_type;
        }
        if($internet_speed){
            $ad->internet_speed = $internet_speed;
        }
        $ad->youtube_speed = $youtube_speed;
        $ad->bdix_speed = $bdix_speed;
        /*if($youtube_speed){
            $ad->youtube_speed = $youtube_speed;
        }
        if($bdix_speed){
            $ad->bdix_speed = $bdix_speed;
        }*/
        if($ftp_link){
            $ad->ftp_link = $ftp_link;
        }
        if($live_tv){
            $ad->live_tv = $live_tv;
        }
        if($facebook_link){
            $ad->facebook_link = $facebook_link;
        }
        if($website_link){
            $ad->website_link = $website_link;
        }
        if($public_ip) {
            $ad->public_ip = $public_ip;
        }
        
        if($service_charge){
            $ad->service_charge = $service_charge;
        }
        if($migration_charge){
            $ad->migration_charge = $migration_charge;
        }
        
        

        if ($ad->update()) {
            Generic::saveMetaData($category_id, $ad_id, $custom_fields_array);
            $this->sendApprovalRequestToSupport($user_data['id']);
            $response['status'] = 'success';
            $response['ad_id'] = base64_encode($ad_id);
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Store Data.Please Try again Later';
        }

        echo json_encode($response);
    }

    public function actionSaveJobFromProfile() {
        
        $job_id = Yii::app()->request->getParam('job_id','');
        $job_title = Yii::app()->request->getParam('job_title');
        $user_id = Yii::app()->request->getParam('user_id');
        $job_vacancy = Yii::app()->request->getParam('job_vacancy');
        $job_category = Yii::app()->request->getParam('job_category', '');
        $job_description = Yii::app()->request->getParam('job_description','');
        $educational_requirement = Yii::app()->request->getParam('educational_requirement');
        $experience_requirement = Yii::app()->request->getParam('experience_requirement', '');
        $job_salary = Yii::app()->request->getParam('job_salary', '');
        $job_deadline = Yii::app()->request->getParam('job_deadline', '');
        $job_type = Yii::app()->request->getParam('job_type', '');
        $job_requirement = Yii::app()->request->getParam('job_requirement', '');
        $job_location = Yii::app()->request->getParam('job_location', '');
        $additional_requirement = Yii::app()->request->getParam('additional_requirement', 1);

        $creation_date = new \DateTime();
        
        if($job_id != ''){
            $job = Jobs::model()->findByPk($job_id);
        } else {
            $job = new Jobs();
        }
        
        $job->title = $job_title;
        $job->user_id = $user_id;
        $job->vacancy = $job_vacancy;
        $job->job_category = $job_category;
        $job->description = $job_description;
        $job->educational_req = $educational_requirement;
        $job->experiment_req = $experience_requirement;
        $job->salary = $job_salary;
        $job->deadline = $job_deadline;
        $job->job_type = $job_type;
        $job->additional = $additional_requirement;
        $job->job_req = $job_requirement;
        $job->job_location = $job_location;
        
        if($job_id != ''){
            $job->active = 0;
            $update_datetime = new \DateTime();
            $job->update_date = $update_datetime->format('Y-m-d');
            $job_save_result = $job->update();
        } else {
            $job->active = 0;
            $job->create_date = $creation_date->format('Y-m-d');
            $job_save_result = $job->save();
        }
        if ($job_save_result) {
            //$this->sendApprovalRequestToSupport($user_data['id']);
            $response['status'] = 'success';
            $response['message'] = 'Successfully saved job details';
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Store Data.Please Try again Later';
        }

        echo json_encode($response);
    }

    public function actionEditAd() {
        $this->render('update-ad');
    }

    public function actionUpdateAd() {

        $response = array();
        $ad_id = Yii::app()->request->getParam('ad_id');
        $title = Yii::app()->request->getParam('ads_title', '');
        $image_urls = Yii::app()->request->getParam('image_file');
        $image_urls = trim($image_urls,',');
        $image_urls_array = explode(',',$image_urls);
        $image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $image_urls_array);

        $image_url = json_encode($image_urls_array);

        $description = Yii::app()->request->getParam('ads_description', '');
        $condition = Yii::app()->request->getParam('ads_condition', '');
        $price = Yii::app()->request->getParam('ads_price', '');
        //$service_charge = Yii::app()->request->getParam('service_charge', 0);
        $price_end = Yii::app()->request->getParam('ads_price_end', '');
        $price_type = Yii::app()->request->getParam('price_type', '');
        $show_price_option = Yii::app()->request->getParam('show_price_option', 1);
        $discount = Yii::app()->request->getParam('discount', '');
        $category_id = Yii::app()->request->getParam('category_id', '');

        $is_featured = Yii::app()->request->getParam('is_featured', 0);
        $is_premium = Yii::app()->request->getParam('is_premium', 0);
        $is_top = Yii::app()->request->getParam('is_top', 0);

        $special_product = Yii::app()->request->getParam('special_product', 0);

        switch ($special_product) {
            case 'featured':
                $is_featured = 1;
                $is_premium = 0;
                $is_top = 0;
                break;
            case 'premium':
                $is_featured = 0;
                $is_premium = 1;
                $is_top = 0;
                break;
            case 'top':
                $is_featured = 0;
                $is_premium = 0;
                $is_top = 1;
                break;
            default:
                $is_featured = 0;
                $is_premium = 0;
                $is_top = 0;
                break;
        }

        $is_paid = Yii::app()->request->getParam('is_paid', 0);
        
        $special_offer = Yii::app()->request->getParam('special_offer', 0);
        $custom_fields_array = array();
        $custom_field_number = Yii::app()->request->getParam('custom_column_number', 0);
        for ($i = 1; $i <= $custom_field_number; $i++) {
            $field_name = Yii::app()->request->getParam('custom_field_' . $i, '');
            $custom_fields_array[] = array(
                'field_name' => $field_name,
                'field_value' => Yii::app()->request->getParam($field_name, '')
            );
        }
        $user_data = Generic::getUserId(Yii::app()->session['user_token']);
        $user_location = $user_data['district'];
        $lat_lon = Generic::getLatitudeLongitude($user_location);
        $latitude = $lat_lon->results[0]->geometry->location->lat;
        $longitude = $lat_lon->results[0]->geometry->location->lng;
        $creation_date = new \DateTime();
        $ad = Ads::model()->findByPk($ad_id);
        $ad->title = $title;
        $ad->image_url = $image_url;
        $ad->description = $description;
        $ad->ad_condition = $condition;
        $ad->price = $price;
        $ad->price_end = $price_end;
        $ad->price_type = $price_type;
        $ad->discount = $discount;
        $ad->update_date = $creation_date->format('Y-m-d H:i:s');
        $ad->is_featured = $is_featured;
        $ad->is_premium = $is_premium;
        $ad->is_top = $is_top;
        $ad->is_paid = $is_paid;
        $ad->special_offer = $special_offer;
        $ad->location = $user_data['district'];
        $ad->latitude = $latitude;
        $ad->longitude = $longitude;
        $ad->show_price = $show_price_option;
        $show_in_store = Yii::app()->request->getParam('show_in_estore', 'off');
        if($user_data['register_type'] == 'store'){
            if($show_in_store == 'on'){
                $ad->show_in_store = 1;
            } else {
                $ad->show_in_store = 0;
            }
        } else {
            $ad->show_in_store = 1;
        }
        
                
        $ad->active = 0;
        if(!empty($category_id)){
            $ad->category_id = $category_id;
        }
        if ($ad->update()) {
            $ad_id = $ad->id;
            $this->deleteMetaData($ad_id);
            Generic::saveMetaData($category_id, $ad_id, $custom_fields_array);
            $response['status'] = 'success';
            $response['ad_id'] = base64_encode($ad_id);
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Update Data.Please Try again Later';
        }

        echo json_encode($response);
    }

    public function actionDeleteAd() {
        $response = array();
        $baseUrl = Yii::app()->getBaseUrl(true);
        $ad_id = Yii::app()->request->getParam('ad_id');
        $user_id = Yii::app()->request->getParam('user_id');
        $image_helper = new ImageHelper();
        $user_details = Register::model()->findByPk($user_id);

        $ad_update_type = '/update-ad';
        if($user_details->register_type == 'business'){
            $ad_update_type = '/my-profile/update-isp-ad';
        } else if($user_details->register_type == 'store'){
            $ad_update_type = '/my-profile/update-estore-ad';
        } 

        //$ad_meta_delete = Generic::deleteAdDetailsFromAdMetaTable($ad_id);
        $ad_details_delete = Generic::deleteAdDetailsFromAdTable($ad_id);


        if ($ad_details_delete) {
            $all_ads = Generic::getAdDetailsFromAddTable($user_id, false, false);
            //$ad_type = 'ads';
            $loaded_html = "";
            foreach ($all_ads as $ad) {
                $ad_date_block = "";
                $ad_without_date_block = "";
                $ad_id = $ad['id'];
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));
                $expire_date = new \DateTime($ad['expire_date']);
                $ad_create_date = new \DateTime($ad['create_date']);

                $images = json_decode($ad['image_url']);
                $opt = array("width" => 130, "height" => 120, "crop" => "fill", "gravity" => "center", "radius" => 0, "fetch_format" => "jpg");

                if ($ad['expire_date'] != NULL) {
                    $ad_date_block = ' <li><i class="fa fa-clock-o"></i>From:'. $ad_create_date->format('d M Y') .' - To: '.$expire_date->format('d M Y').' </li>
                                            <li><i class="fa fa-eye"></i>'.$view_count.'</li>';
                }

                if ($ad['expire_date'] != NULL && $ad['active']) {

                    $ad_without_date_block = ' <div class="verified-tag" style="font-size: 14px; padding-left: 0px;" title="Verified"><i class="fa fa-check" aria-hidden="true"></i> Verified</div>';
                } else {
                    $ad_without_date_block = '<div class="unverified-tag" style="font-size: 14px;" title="Pending"><i class="fa fa-cog" aria-hidden="true"></i> Pending</div>';
                }

                $ad_update_link = $baseUrl.$ad_update_type.'?ad_id='.urlencode(base64_encode($ad['id']));
                $loaded_html .= '<div class="items-list">
                                <article class="item-spot">
                                <a href="javascript:void(0)" class="imgBg tc" data-item="'. $ad['id'].'">
                                    <img src="'.ImageHelper::cloudinary($images[0],$opt).'" alt="dummy data">
                                </a>
                                <div class="item-content">
                                    <header>
                                        <h6><a href="javascript:void(0)" class="tc" data-item="'.$ad['id'].'">'.$ad['title'].'</a></h6>
                                        <ul class="item-info">
                                           '.$ad_date_block.'
                                            <div class="price-tag">BDT '.$ad['price'].'</div>
                                           '.$ad_without_date_block.'
                                        </ul>
                                    </header>

                                    <div class="item-admin-actions text-center">
                                        <ul>
                                            <li><a class="tc" title="View" href="javascript:void(0)" onclick="showAdPreviewModal('.$ad['id'].')" data-item="'.$ad['id'].'"><i class="adicon-eye"></i></a></li>
                                            <li><a class="tc6-hover" title="Edit" href="'.$ad_update_link.'"><i class="adicon-edit"></i></a></li>
                                            <li><a class="tc12-hover" title="Delete" href="javascript:void(0);" onclick="deleteItem(' . $ad['id'] . ',\'' .$ad['user_id'].'\')"><i class="adicon-recyclebin"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </article>
                       </div>';
            }

            $response['status'] = 'success';
            $response['html'] = html_entity_decode($loaded_html);
        }
        echo json_encode($response);
    }

    public function actionDeleteJob() {
        $response = array();
        $baseUrl = Yii::app()->getBaseUrl(true);
        $ad_id = Yii::app()->request->getParam('job_id');
        $user_id = Yii::app()->request->getParam('user_id');
        $image_helper = new ImageHelper();
        $user_details = Register::model()->findByPk($user_id);

        $ad_update_type = '/update-job';
        if($user_details->register_type == 'business'){
            $ad_update_type = '/my-profile/update-job';
        } else if($user_details->register_type == 'store'){
            $ad_update_type = '/my-profile/update-job';
        } 

        //$ad_meta_delete = Generic::deleteAdDetailsFromAdMetaTable($ad_id);
        $ad_details_delete = Generic::deleteJobDetailsFromJobTable($ad_id);

        if ($ad_details_delete) {
            $criteria = new CDbCriteria();
            $criteria->condition = 'user_id = :user_id and active = :active';
            $criteria->params = [':user_id' => $user_id, ':active' => 1];
            $jobs = Jobs::model()->findAll($criteria);

            $baseUrl = Yii::app()->getBaseUrl(true);
            $loaded_html = "";
                foreach($jobs as $job){
                    $deadline_date = new \DateTime($job->deadline);
                    if($job['active']== 1){

                       $ad_without_date_block = ' <div class="verified-tag" style="font-size: 14px; padding-left: 0px;" title="Approved"><i class="fa fa-check" aria-hidden="true"></i> Approved</div>';
                   }else{
                       $ad_without_date_block = '<div class="unverified-tag" style="font-size: 14px;" title="Pending"><i class="fa fa-cog" aria-hidden="true"></i> Pending</div>';

                   }
                    $loaded_html .= '<div class="items-list">
                                <article class="item-spot">
                                <div class="item-content">
                                    <header>
                                        <h6><a href="javascript:void(0)" class="tc" data-item="'.$job->id.'">'.$job->title.'</a></h6>
                                        <ul class="item-info">
                                            <div class="price-tag">BDT '.$job->salary.'</div>
                                        </ul>
                                        <ul class="item-info">
                                            <div class="">Deadline: '.$deadline_date->format('d M Y').'</div>
                                        </ul>
                                        '.$ad_without_date_block.'
                                    </header>

                                    <div class="item-admin-actions text-center">
                                        <ul>
                                            <li><a class="tc" title="View" href="javascript:void(0)" onclick="showAdPreviewModal('.$job->id.')" data-item="'.$job->id.'"><i class="adicon-eye"></i></a></li>
                                            <li><a class="tc6-hover" title="Edit" href="'.$baseUrl."/my-profile/update-job?job_id=".urlencode(base64_encode($job->id)).'"><i class="adicon-edit"></i></a></li>
                                            <li><a class="tc12-hover" title="Delete" href="javascript:void(0);" onclick="deleteItem(' . $job->id . ',\'' .$job->user_id.'\')"><i class="adicon-recyclebin"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </article>
                       </div>';
                              }

            $response['status'] = 'success';
            $response['html'] = html_entity_decode($loaded_html);
        }
        echo json_encode($response);
    }

    /*
     * function saveJob
     * saves job details
     * @return json response
     */

    public function actionSaveJob() {
        $response = array();
        $title = Yii::app()->request->getParam('ads_title', '');
        $job_category = Yii::app()->request->getParam('business_category', '');
        $image_urls = Yii::app()->request->getParam('image_file');
        $image_urls_array = explode(',', substr($image_urls, 1));
        $image_url = json_encode($image_urls_array);
        $description = Yii::app()->request->getParam('ads_description', '');
        $salary_type = Yii::app()->request->getParam('salary_type', '');
        $starting_salary = Yii::app()->request->getParam('salary_start', '');
        $ending_salary = Yii::app()->request->getParam('salary_end', '');
        $salary = 'n/a';
        $deadline = Yii::app()->request->getParam('application_deadline', '');
        $job_type = Yii::app()->request->getParam('job_type', '');
        $additional = Yii::app()->request->getParam('additional', '');
        $job_location = Yii::app()->request->getParam('job_location', '');
        $deadline_date = new \DateTime($deadline);
        if ($salary_type == 1) {
            $salary = $starting_salary;
        } else if ($salary_type == 2) {
            $salary = $starting_salary . " - " . $ending_salary;
        }
        $user_id = Generic::getUserId(Yii::app()->session['user_token']);
        $category_id = Yii::app()->request->getParam('category_id', '');

        $creation_date = new \DateTime();
        $ad = new Jobs();
        $ad->category_id = $category_id;
        $ad->user_id = $user_id;
        $ad->title = $title;
        $ad->image_url = $image_url;
        $ad->description = $description;
        $ad->salary = $salary;
        $ad->salary_type = $salary_type;
        $ad->deadline = $deadline_date->format('Y-m-d');
        $ad->job_type = $job_type;
        $ad->additional = $additional;
        $ad->job_location = $job_location;
        $ad->job_category = $job_category;
        $ad->create_date = $creation_date->format('Y-m-d');
        $ad->update_date = $creation_date->format('Y-m-d');
        if ($ad->save()) {
            $ad_id = $ad->id;
            $response['status'] = 'success';
            $response['ad_id'] = $ad_id;
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Store Data.Please Try again Later';
        }

        echo json_encode($response);
    }

    public static function actionGetProfileData() {
        $response = array();
        $email = trim(yii::app()->request->getParam('email'));
        $result = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_register')
                ->where('email=:email', array(':email' => $email))
                ->queryRow();

        if (!empty($result)) {
            $response['status'] = 'true';
            $response['value'] = $result['user_token'];
        } else {
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }

    public function actionRegisterUserUpdate() {
        $response = array();
        $connection = Yii::app()->db;
        $user_name = Yii::app()->request->getParam('user_name');
        $phone_number = Yii::app()->request->getParam('phone_number');
        $email = Yii::app()->request->getParam('email');
        $address = Yii::app()->request->getParam('address');
        $user_token = Yii::app()->request->getParam('user_token');

        if ($user_name || $address) {
            $sql = "UPDATE tbl_register SET user_name='$user_name', address='$address' WHERE user_token='$user_token'";
        }
        if ($phone_number) {
            $sql = "UPDATE tbl_register SET phone_number='$phone_number' WHERE user_token='$user_token'";
        }
        if ($email) {
            $sql = "UPDATE tbl_register SET email='$email' WHERE user_token='$user_token'";
        }
        $command = $connection->createCommand($sql);
        $result = $command->execute();
        if (($result)) {
            $response['status'] = 'success';
            $response['message'] = '<div class="info" style="width:310px;float:left;">You have Updated successfully !</div><br clear="all"><br clear="all">';
        } else {

            $response['status'] = 'error'; // could not register
            $response['message'] = '<div class="info" style="width:310px;float:left;">Could not update, try again later</div><br clear="all"><br clear="all">';
        }

        echo json_encode($response);
    }

    public function actionUpdateProfileImage() {
        $id = Yii::app()->request->getParam('id');
        $model = Register::model()->findByPk($id);
        $temp_name = $_FILES['image']['tmp_name'];
        $info = getimagesize($temp_name);
        $extension = image_type_to_extension($info[2]);
        $imageName = time() + 1;
        $newName = $imageName . $extension;

        if (!defined('awsAccessKey'))
            define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
        if (!defined('awsSecretKey'))
            define('awsSecretKey', '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');
        $s3 = new S3(awsAccessKey, awsSecretKey);

        if ($imageSaveName = $s3->putObjectFile($temp_name, "ad-dwit-a", $newName, S3::ACL_PUBLIC_READ)) {
            $model->image = "http://ad-dwit-a.s3.amazonaws.com/" . $newName;
        }
        if ($model->save())
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionChangePassword() {
        $response = array();
        $token = Yii::app()->session['user_token'];
        $profile_data = Generic::getProfileData($token);
        $password = isset($profile_data['password']) ? $profile_data['password'] : '';
        $current_password = base64_encode(Yii::app()->request->getParam('current_password'));
        $new_password = base64_encode(Yii::app()->request->getParam('new_password'));
        $user_token = Yii::app()->request->getParam('user_token');

        if ($new_password) {

            if ($current_password == $password) {
                $connection = Yii::app()->db;
                $sql = "UPDATE tbl_register SET password='$new_password' WHERE user_token='$user_token'";
                $command = $connection->createCommand($sql);
                $result = $command->execute();
                if (($result)) {
                    $response['status'] = 'success';
                    $response['message'] = '<div class="info" style="width:310px;float:left;">You have Updated successfully !</div><br clear="all"><br clear="all">';
                } else {

                    $response['status'] = 'error'; // could not register
                    $response['message'] = '<div class="info" style="width:310px;float:left;">Could not update, try again later</div><br clear="all"><br clear="all">';
                }
            } else {

                $response['status'] = 'incorrect'; // could not register
                $response['message'] = '<div class="info" style="width:310px;float:left;">Your Current Password is Incorrect !</div><br clear="all"><br clear="all">';
            }
        }


        echo json_encode($response);
    }

    public static function actionGetSubCategory() {
        $category_id = trim(yii::app()->request->getParam('category_id'));
        $result = Yii::app()->db->createCommand("SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
        $category_html = "";
        if (!empty($result)) {
            $cur = 0;
            $rowNum = 1;
            foreach ($result as $category) {
                $category_name = $category['category_name'];
                $sub_category_slug = $category['sub_category_slug'];
                $sub_category_list = Generic::getAllSubCategory($sub_category_slug);
                $sub_category_slug_value = "'$sub_category_slug'";
                if ($cur == 0) {

                    $category_html .= '<div class="mega-top">';
                    $category_html .= '<div class="mega-item-menu">';
                }
                //$category_html .= '<a style="text-align:justify;color:whitesmoke;background-color:#b3ecff;box-sizing: content-box" class="title"><span style="text-align:justify;">'.$category_name.'</span></a>';
                $category_html .= '<a href="javascript:void(0)" style="text-align:justify" onmouseover="set_mouseover_subcat(' . $sub_category_slug_value . ')"onclick="redirectUrl()"><span>' . $category_name . '</span></a>';
                /* foreach($sub_category_list as  $key=>$value) {
                  foreach($value as $keys => $brands){
                  $sub_category_type_value = "'$brands'";
                  $category_html .= '<a href="javascript:void(0)" style="text-align:justify" title="'.$brands.'" onmouseover="set_mouseover_subcat('.$sub_category_slug_value.');set_mouseover_type('.$sub_category_type_value.')" onclick="redirectUrl()"><span>'.$brands.'</span></a>';
                  }
                  } */

                if ($cur >= 0) {
                    $category_html .='</div>';
                    $category_html .='</div>';
                    $cur = 0;
                    $rowNum++;
                } else {
                    $rowNum++;
                    $cur++;
                }
            }
            $response['status'] = 'true';
            $response['html'] = html_entity_decode($category_html);
        } else {
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }

    public static function actionGetSubCategoryHome() {
        $category_id = trim(yii::app()->request->getParam('category_id'));
        $result = Yii::app()->db->createCommand("SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
        $category_html = "";
        if (!empty($result)) {
            $cur = 0;
            $rowNum = 1;
            foreach ($result as $category) {
                $category_name = $category['category_name'];
                $sub_category_slug = $category['sub_category_slug'];

                $sub_category_slug_value = "'$sub_category_slug'";
                if ($cur == 0) {
                    $category_html .= '<li>';
                }
                //$category_html .= '<a style="text-align:justify;color:whitesmoke;background-color:#b3ecff;box-sizing: content-box" class="title"><span style="text-align:justify;">'.$category_name.'</span></a>';
                $category_html .= '<a href="javascript:void(0)" style="text-align:justify; content:"";" onmouseover="set_mouseover_subcat(' . $sub_category_slug_value . ')"onclick="redirectUrl()"><span>' . $category_name . '</span></a>';
                /* foreach($sub_category_list as  $key=>$value) {
                  foreach($value as $keys => $brands){
                  $sub_category_type_value = "'$brands'";
                  $category_html .= '<a href="javascript:void(0)" style="text-align:justify" title="'.$brands.'" onmouseover="set_mouseover_subcat('.$sub_category_slug_value.');set_mouseover_type('.$sub_category_type_value.')" onclick="redirectUrl()"><span>'.$brands.'</span></a>';
                  }
                  } */

                if ($cur >= 0) {

                    $category_html .='</li>';
                    //$category_html .='</ul>';
                    $cur = 0;
                    $rowNum++;
                } else {
                    $rowNum++;
                    $cur++;
                }
            }
            $response['status'] = 'true';
            $response['html'] = html_entity_decode($category_html);
        } else {
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }

    public function deleteMetaData($ad_id) {
        Generic::deleteAdDetailsFromAdMetaTable($ad_id);

        return true;
    }

    /*
     * saving job meta
     */

    public function saveJobMetaData($category_id, $ad_id, $custom_fields) {
        foreach ($custom_fields as $field) {
            $meta_data = new Job_meta();
            $meta_data->category_id = $category_id;
            $meta_data->job_id = $ad_id;
            $meta_data->field_name = $field['field_name'];
            $meta_data->field_value = $field['field_value'];
            $meta_data->save();
        }
        return true;
    }

    /**
     * Insert Image To Amazon S3
     */
    public static function actionAjaxImageUpload() {
        $water_mark = Yii::app()->request->getParam('watermark', 1);
        $uploader = new Uploader();
        $data = $uploader->upload($_FILES['files'], array(
            'limit' => 10, //Maximum Limit of files. {null, Number}
            'watermark' => $water_mark,
            'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
            'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
            'required' => false, //Minimum one file is required for upload {Boolean}
            'uploadDir' => 'uploads/', //Upload directory {String}
            'title' => array('{{timestamp}}'), //New file name {null, String, Array} *please read documentation in README.md
            'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
            'replace' => false, //Replace the file if it already exists  {Boolean}
            'perms' => null, //Uploaded file permisions {null, Number}
            'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
            'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
            'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
            'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
            'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
            'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
        ));

        if ($data['isComplete']) {
            $files = $data['data'];
            echo json_encode($files['metas'][0]['name']);
        }

        if ($data['hasErrors']) {
            $errors = $data['errors'];
            echo json_encode($errors);
        }
        exit;
    }

    /**
     * Delete Image From Amazon s3
     */
    public static function actionDeleteImageFromS3() {
        if (!defined('awsAccessKey'))
            define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
        if (!defined('awsSecretKey'))
            define('awsSecretKey', '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');
        $s3 = new S3(awsAccessKey, awsSecretKey);
        if (isset($_POST['file'])) {
            $bucket = "ad-dwit-a";
            $s3->deleteObject($bucket, $_POST['file']);
        }
    }

    /*
     * deleting multiple images from Amazon s3
     */
    public function actionDeleteMultiImageFromS3() {
        if (isset($_POST['file']) && !empty($_POST['file'])) {
            $images = trim($_POST['file'],',');
            $image_array = explode(',', $images);
            foreach ($image_array as $image) {
                unlink($image);
            }
        }
    }

    /*
     * Add offer price
     */

    public function actionAddOfferPrice() {
        $ad_id = Yii::app()->request->getParam('ad_id', '');
        $ip_address = Yii::app()->request->getParam('ip_address', '');
        $offered_price = Yii::app()->request->getParam('offer_price', '');
        $sender_id = Yii::app()->request->getParam('offered_by', '');

        $Criteria = new CDbCriteria();
        $Criteria->condition = "ad_id = :ad_id and ip_address = :ip_address";
        $Criteria->params = array(':ad_id' => $ad_id, ':ip_address' => $ip_address);
        $existing_offer = Ad_offer::model()->find($Criteria);
        $current_date = new \DateTime();

        $ad_details = Ads::model()->findByPk($ad_id);
        $sender_details = Register::model()->findByPk($sender_id);
        if (!$existing_offer) {
            $ad_offer = new Ad_offer();
            $ad_offer->ad_id = $ad_id;
            $ad_offer->offered_price = $offered_price;
            $ad_offer->ip_address = $ip_address;
            $ad_offer->offered_by = $sender_id;
            $ad_offer->create_date = $current_date->format('Y-m-d H:i:s');
            if ($ad_offer->save()) {

                /* ---------------- Send message to Ad Owner ------------------ */
                $message_details = 'My estimated offer price is BDT ' . $offered_price;
                $message = new Message();
                $message->registered_sender = $sender_id;
                $message->sender_name = $sender_details->user_name;
                $message->sender_email = $sender_details->email;
                $message->sender_phone = $sender_details->phone_number;
                $message->receiver = $ad_details->user_id;
                $message->ad_id = $ad_id;
                $message->details = $message_details;
                $message->create_date = $current_date->format('Y-m-d H:i:s');
                $message->is_starred = 0;
                $message->read_status = 0;
                $message->reply_of = NULL;
                $message->save();

                /* ------------------- Add a notification --------------------- */
                $message_notification = new Notification_message();
                $message_notification->receiver_id = $ad_details->user_id;
                $message_notification->sender_id = $sender_id;
                $message_notification->create_date = $current_date->format('Y-m-d H:i:s');
                $message_notification->save();

                /* ---------------- Save a message copy as sent -------------- */
                $message_own = new Message_sent();
                $message_own->registered_sender = $sender_id;
                $message_own->sender_name = $sender_details->user_name;
                $message_own->sender_email = $sender_details->email;
                $message_own->sender_phone = $sender_details->phone_number;
                $message_own->receiver = $ad_details->user_id;
                $message_own->ad_id = $ad_id;
                $message_own->details = $message_details;
                $message_own->create_date = $current_date->format('Y-m-d H:i:s');
                $message_own->is_starred = 0;
                $message_own->read_status = 0;
                $message_own->reply_of = NULL;
                $message_own->save();

                $response['status'] = 'success';
            } else {
                $response['error'] = 'error';
            }
            echo json_encode($response);
        } else {
            $existing_offer->offered_price = $offered_price;
            $existing_offer->update_date = $current_date->format('Y-m-d H:i:s');
            if ($existing_offer->save()) {

                $message_details = 'My re-estimated offer price is BDT ' . $offered_price;
                $message = new Message();
                $message->registered_sender = $sender_id;
                $message->sender_name = $sender_details->user_name;
                $message->sender_email = $sender_details->email;
                $message->sender_phone = $sender_details->phone_number;
                $message->receiver = $ad_details->user_id;
                $message->ad_id = $ad_id;
                $message->details = $message_details;
                $message->create_date = $current_date->format('Y-m-d H:i:s');
                $message->is_starred = 0;
                $message->read_status = 0;
                $message->reply_of = NULL;
                $message->save();

                /* ------------------- Add a notification --------------------- */
                $message_notification = new Notification_message();
                $message_notification->receiver_id = $ad_details->user_id;
                $message_notification->sender_id = $sender_id;
                $message_notification->create_date = $current_date->format('Y-m-d H:i:s');
                $message_notification->save();

                /* ---------------- Save a message copy as sent -------------- */
                $message_own = new Message_sent();
                $message_own->registered_sender = $sender_id;
                $message_own->sender_name = $sender_details->user_name;
                $message_own->sender_email = $sender_details->email;
                $message_own->sender_phone = $sender_details->phone_number;
                $message_own->receiver = $ad_details->user_id;
                $message_own->ad_id = $ad_id;
                $message_own->details = $message_details;
                $message_own->create_date = $current_date->format('Y-m-d H:i:s');
                $message_own->is_starred = 0;
                $message_own->read_status = 0;
                $message_own->reply_of = NULL;
                $message_own->save();

                $response['status'] = 'success';
            } else {
                $response['error'] = 'error';
            }
            echo json_encode($response);
        }
    }

    /**
     * Show Hide Input Field for Meta.
     */
    public function actionShowHideInputField() {
        $response = array();
        $category_id = Yii::app()->request->getParam('category_id');
        $sub_category_object = Category::model()->findByPk($category_id);
        $sub_category_slug = $sub_category_object->sub_category_slug;
        $column_configuration_manager = Yii::app()->params['columnsConfig'];
        $custom_columns = $column_configuration_manager[$sub_category_slug];
        $custom_column_number = count($column_configuration_manager[$sub_category_slug]);
        $counter = 1;
        $html = "";

        foreach ($custom_columns as $column) {
            $required_field_value = '';
            if (array_key_exists('required', $column)) {
                $required_field_value = 'required="required"';
            }
            $html .= '<div class="row form-group">
					<label class="col-sm-3 label-title"> ' . $column['field_name'] . '</label>
                           <div class="col-sm-9">
	                             <div class="">
		             <input type="hidden" name="custom_field_' . $counter . '" value="' . str_replace(" ", "_", strtolower($column['field_name'])) . '" />
		             <input type="text" name="' . str_replace(" ", "_", strtolower($column['field_name'])) . '" class="form-control" id="' . str_replace(" ", "_", strtolower($column['field_name'])) . '" placeholder="' . $column['value'] . '" ' . $required_field_value . '>
	               </div>
                   </div>
                   </div>';

            $counter++;
        }
        $html .= '<input type="hidden" name="custom_column_number" value="' . $custom_column_number . '" />';
        $response['status'] = 'success';
        $response['html'] = html_entity_decode($html);
        echo json_encode($response);
    }

    public static function actionChangeFavoriteStatus() {
        $ad_id_new = $_REQUEST['ad_id'];
        $ad_details = Ads::model()->findByPk($ad_id_new);
        $criteria = new CDbCriteria();
        $criteria->condition = "user_token = :user_token";
        $criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $logged_user = Register::model()->find($criteria);

        $response = array();
        $now = date('Y-m-d H:i:s');


        if (isset(Yii::app()->request->cookies['user_token']) && $ad_id_new) {
            $user_token = Yii::app()->request->cookies['user_token'];

            if ($ad_id_new) {
                $Criteria = new CDbCriteria();
                $Criteria->select = '*';
                $Criteria->condition = "user_token = :user_token";
                $Criteria->params = array(':user_token' => $user_token);
                $result = Favorites::model()->find($Criteria);
                if ($result) {
                    $array = array();
                    $ad_id = $result->ad_id;
                    if ($ad_id) {
                        $array = explode(',', $ad_id);
                    }
                    if (!in_array($ad_id_new, $array)) {
                        array_push($array, $ad_id_new);
                        $new_array = implode(',', $array);
                        $obj = Favorites::model()->findByPk($result->id);
                        $obj->ad_id = $new_array;
                        $obj->users_last_visit = $now;
                        $obj->save();




                        /* --------------- Add notification for favorite ------------------------ */
                        $favorite_notification = new Notification_favorite();
                        $favorite_notification->receiver_id = $ad_details->user_id;
                        if ($logged_user) {
                            $favorite_notification->sender_id = $logged_user->id;
                        }
                        $favorite_notification->ad_id = $ad_id_new;
                        $favorite_notification->create_date = $now;
                        $favorite_notification->save();


                        $favorite_counter = 0;
                        $favorites = Favorites::model()->findAll();
                        foreach ($favorites as $favorite) {
                            $ad_array = explode(',', $favorite->ad_id);
                            if (in_array($ad_id_new, $ad_array)) {
                                $favorite_counter++;
                            }
                        }






                        $response['status'] = 'favorite';
                        $response['favourite'] = $favorite_counter;
                    } else {
                        $result_array = (explode(',', $ad_id));
                        $array_index = array_search($ad_id_new, $result_array);
                        unset($result_array[$array_index]);
                        $ad_id = implode(',', $result_array);
                        $obj = Favorites::model()->findByPk($result->id);
                        $obj->ad_id = $ad_id;
                        $obj->users_last_visit = $now;
                        $obj->save();

                        $favorite_counter = 0;
                        $favorites = Favorites::model()->findAll();
                        foreach ($favorites as $favorite) {
                            $ad_array = explode(',', $favorite->ad_id);
                            if (in_array($ad_id_new, $ad_array)) {
                                $favorite_counter++;
                            }
                        }





                        $response['status'] = 'un_favorite';
                        $response['favourite'] = $favorite_counter;
                    }
                } else {

                    $favorites = new Favorites();
                    $favorites->user_token = $user_token;
                    $favorites->ad_id = $ad_id_new;
                    $favorites->users_last_visit = $now;
                    if ($logged_user) {
                        $favorites->user_id = $logged_user->id;
                    }
                    $favorites->save();

                    /* --------------- Add notification for favorite ------------------------ */
                    $favorite_notification = new Notification_favorite();
                    $favorite_notification->receiver_id = $ad_details->user_id;
                    if ($logged_user) {
                        $favorite_notification->sender_id = $logged_user->id;
                    }
                    $favorite_notification->ad_id = $ad_id_new;
                    $favorite_notification->create_date = $now;
                    $favorite_notification->save();


                    $favorite_counter = 0;
                    $favorites = Favorites::model()->findAll();
                    foreach ($favorites as $favorite) {
                        $ad_array = explode(',', $favorite->ad_id);
                        if (in_array($ad_id_new, $ad_array)) {
                            $favorite_counter++;
                        }
                    }





                    $response['status'] = 'favorite';
                    $response['favourite'] = $favorite_counter;
                }
            }
            echo json_encode($response);
        } else {
            return false;
        }
        return false;
    }

    /*
     *  @param interger ad id
     *  @return mixed next and prev links
     */

    private function determineAdLinks($ad_id) {
        $all_ads = Generic::getActiveAds();
        $result = array();
        $ads = array();
        foreach ($all_ads as $ad) {
            $ads[] = $ad['id'];
        }
        $current_ad_position = array_search($ad_id, $ads);
        if (!$current_ad_position) {
            $result['prev'] = '';
        } else {
            $result['prev'] = $ads[$current_ad_position - 1];
        }
        if ((count($ads) - 1) == $current_ad_position) {
            $result['next'] = '';
        } else {
            $result['next'] = $ads[$current_ad_position + 1];
        }

        return $result;
    }

    /*
     *  @param interger ad id
     *  @return mixed next and prev links
     */

    private function determineJobLinks($ad_id, $table = '') {
        $criteria = new CDbCriteria();
        $criteria->condition = 'active = :active';
        $criteria->params = array(':active' => 1);
        $all_ads = Jobs::model()->findAll($criteria);

        $data['next'] = '';
        $data['prev'] = '';
        return $data;
    }

    public function actionHotAdsRequest() {
        $response = array();
        $ad_id = Yii::app()->request->getParam('ad_id', '');
        $start_date = Yii::app()->request->getParam('start_date', '');
        $end_Date = Yii::app()->request->getParam('end_date' . '');

        $hot_start_date = new \DateTime($start_date);
        $hot_end_date = new \DateTime($end_Date);
        $ad = new HotAds();
        $ad->ad_id = $ad_id;
        $ad->start_date = $hot_start_date->format('Y-m-d');
        $ad->end_date = $hot_end_date->format('Y-m-d');


        if ($ad->save()) {
            $ad_id = $ad->id;
            $response['status'] = 'success';
            $response['ad_id'] = $ad_id;
        } else {
            $response['status'] = 'false';
            $response['message'] = 'Unable To Send request, Please try later';
        }

        echo json_encode($response);
    }

    /**
     * mark the product as recently viewed by this user token
     * @param integer ad_id
     */
    private function markAdAsRecentlyViewed($ad_id) {
        $criteria = new CDbCriteria();
        $criteria->condition = "user_token = :user_token";
        $criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $logged_user = Register::model()->find($criteria);

        if (isset(Yii::app()->request->cookies['user_token'])) {
            $user_token = Yii::app()->request->cookies['user_token'];
            $criteria = new CDbCriteria();
            $criteria->condition = 'user_token = :user_token';
            $criteria->params = array(':user_token' => $user_token->value);
            $token_details = Favorites::model()->find($criteria);
            if ($token_details) {
                $recently_viewed_ads = $token_details->recently_view_ad_ids;
                $recent_ads_array = array();
                if ($recently_viewed_ads) {
                    $recent_ads_array = explode(',', $recently_viewed_ads);
                }
                if (!in_array($ad_id, $recent_ads_array)) {
                    array_push($recent_ads_array, $ad_id);
                }
                $updated_recently_viewed_ads = implode(',', $recent_ads_array);
                $token_details->recently_view_ad_ids = $updated_recently_viewed_ads;
                $token_details->save();
            } else {
                $current_time = new \DateTime();
                $new_token = new Favorites();
                $new_token->user_token = $user_token;
                $new_token->recently_view_ad_ids = $ad_id;
                $new_token->users_last_visit = $current_time->format('Y-m-d H:i:s');
                if ($logged_user) {
                    $new_token->user_id = $logged_user->id;
                }
                $new_token->save();
            }
        }
    }

    /**
     * delete recent view for user
     */
    public function actionDeleteRecentView() {
        $ad_id = Yii::app()->request->getParam('ad_id', '');
        $response = array();
        $now = date('Y-m-d H:i:s');
        if (isset(Yii::app()->request->cookies['user_token']) && $ad_id) {
            $user_token = Yii::app()->request->cookies['user_token'];

            $Criteria = new CDbCriteria();
            $Criteria->select = '*';
            $Criteria->condition = "user_token = :user_token";
            $Criteria->params = array(':user_token' => $user_token);
            $result = Favorites::model()->find($Criteria);

            if ($result) {
                $ad_array = array();
                $ads = $result->recently_view_ad_ids;
                if ($ads) {
                    $ad_array = explode(',', $ads);
                }
                if (in_array($ad_id, $ad_array)) {
                    $array_index = array_search($ad_id, $ad_array);
                    unset($ad_array[$array_index]);
                    $new_ads = implode(',', $ad_array);
                    $obj = Favorites::model()->findByPk($result->id);
                    $obj->recently_view_ad_ids = $new_ads;
                    $obj->users_last_visit = $now;
                    $obj->save();
                    $response['status'] = 'success';
                }
            }
            echo json_encode($response);
        }
        return false;
    }

    public function actionSendFavoriteToEmail() {
        $this->layout = 'empty';
        $response = array();
        $name = $email_to = Yii::app()->request->getPost('name', null);
        $email_to = Yii::app()->request->getPost('email_to', null);
        $message = Yii::app()->request->getPost('massage', null);

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = "To: $name <$email_to>";
        $headers[] = 'From: bdbroadbanddeals.com <admin@bdbroadbanddeals.com>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        //$headers[] = 'Bcc: birthdaycheck@example.com';

        $returnData = '';
        if ($email_to) {
            $result = Generic::getAllFavoritesAds(1);
            if (count($result)) {
                $x = 0;
                foreach ($result as $data) {
                    $individual_ads = Ads::model()->findByPk($data);
                    $returnData .= Generic::Email_listing($individual_ads);
                    $x++;
                }

                $user_name = 'Visitor';
                if ($name) {
                    $user_name = $name;
                }

                $user_msg = '';
                if ($message) {
                    $user_msg = "<p>*********** Message **************<br/><br/>" . $message . "</p>";
                }

                $subject = "Your Favorite Ads on " . SiteConfig::SITE_TITLE;
                $common_msg = "<p>Dear $user_name,</p><br/><br/><p>As requested, here are the Packages that were marked as
        \"FAVORITES\" on www.bdbroadbanddeals.com.<br><br>To book or to learn more about any of these
        Packages, please click on any of the links.</p>";

                $common_msg_footer = "<p>*************************<br/><br/>
        We now feature more than  packages, and
        more are being added every day. And, every day, we are striving to make it easier for you search, compare, and Buy Ads.
        If you have a suggestion for us, please send us an email. We look forward to hearing from you.</p><br/><br/>
        <p>. Visit <a href='http://bdbroadbanddeals.com'>http://bdbroadbanddeals.com</a> to see more than 1000000 packages!</b></p>";

                $bodymsg = $common_msg . $user_msg . $returnData . $common_msg_footer;
                if (@mail($email_to, $subject, $bodymsg,implode("\r\n", $headers))) {
                    $response['status'] = 'success';
                }
            } else {
                $response['status'] = 'false';
            }
        } else {
            echo "<p class='alert-success'>&nbsp;Please enter a valid email address.</p>";
            die;
        }

        echo json_encode($response);
    }

    public static function actionLoadAdsValue() {
        $response = array();
        $selected_value = Yii::app()->request->getParam('selected_value');
        $from_support = Yii::app()->request->getParam('from_support', '');
        $all_value_of_selected_location = Generic::getAllValueOfSelectedAdsLocation($selected_value);
        if ($from_support) {
            $data_html = '<label for="sel1">Banner Position:</label>';
            $data_html .= '<select id="banner_positions" name="banner_position" class="form-control">';
        } else {
            $data_html = '<label for="sel1">Banner Position:</label>';
            $data_html .= '<select id="banner_positions" name="AdSpecial[banner_position]" class="form-control">';
        }

        foreach ($all_value_of_selected_location as $single_value) {
            foreach ($single_value as $key => $value) {

                $data_html .= '<option  value="' . $key . '">' . $value . '</option>';
                $response['data'] = $key;
            }
        }
        $data_html .= '</select>';

        $response['html'] = $data_html;


        echo json_encode($response);
    }

    /**
     * save message value from a sender
     * @param string $layout
     */
    public function actionSaveMessage() {
        $name = Yii::app()->request->getParam('sender_name', '');
        $email = Yii::app()->request->getParam('sender_email', '');
        $phone = Yii::app()->request->getParam('sender_phone', '');
        $details = Yii::app()->request->getParam('message-details', '');
        $sender_id = Yii::app()->request->getParam('sender', NULL);
        $receiver_id = Yii::app()->request->getParam('receiver', '');
        $ad_id = base64_decode(urldecode(Yii::app()->request->getParam('ad_id', '')));
        $receiver_details = Register::model()->findByPk($receiver_id);

        $current_time = new \DateTime();

        $message = new Message();
        $message->registered_sender = $sender_id;
        $message->sender_name = $name;
        $message->sender_email = $email;
        $message->sender_phone = $phone;
        $message->receiver = $receiver_id;
        $message->ad_id = $ad_id;
        $message->details = $details;
        $message->create_date = $current_time->format('Y-m-d H:i:s');
        $message->is_starred = 0;
        $message->read_status = 0;
        $message->reply_of = NULL;

        if ($message->save()) {

            /* ------------------- Add a notification --------------------- */
            $message_notification = new Notification_message();
            $message_notification->receiver_id = $receiver_id;
            $message_notification->sender_id = $sender_id;
            $message_notification->create_date = $current_time->format('Y-m-d H:i:s');
            $message_notification->save();

            $message_own = new Message_sent();
            $message_own->registered_sender = $sender_id;
            $message_own->sender_name = $name;
            $message_own->sender_email = $email;
            $message_own->sender_phone = $phone;
            $message_own->receiver = $receiver_id;
            $message_own->ad_id = $ad_id;
            $message_own->details = $details;
            $message_own->create_date = $current_time->format('Y-m-d H:i:s');
            $message_own->is_starred = 0;
            $message_own->read_status = 0;
            $message_own->reply_of = NULL;
            $message_own->save();
            $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        $to_email = $receiver_details->email;
        $subject = 'Ad enquiry from bdbroadbanddeals.com';
        $message = '<h3>A message has been sent with following details:</h3>';
        $message .= $message_line_spacing_double . '<p><strong>Sender Name</strong>: ' . $name . '</p>';
        $message .= $message_line_spacing_double . '<p><strong>Sender Email</strong>: ' . $email . '</p>';
        $message .= $message_line_spacing_single . '<p><strong>Sender Phone</strong>: ' . $phone . '</p>';
        $message .= $message_line_spacing_single . '<p><strong>Message</strong>: ' . $details . '</p>';

        Generic::sendMail($message, $subject,$to_email);
        
            $response['status'] = 'success';
        } else {
            $response['status'] = 'failure';
        }
        echo json_encode($response);
    }

    public function actionGetSuggestionForHomePage() {
        $response = array();
        $location_name = Yii::app()->request->getParam('location_name', '');
        $input_string = Yii::app()->request->getParam('input_string', '');

        $str_length = strlen($input_string);
        $formatted_input_string = array();
        for ($i = 0; $i <= $str_length - 3; $i++) {
            $formatted_input_string[] = substr($input_string, $i, 3);
        }

        $results = array();
        if (is_array($formatted_input_string) && !empty($formatted_input_string)) {
            foreach ($formatted_input_string as $string) {

                $Criteria = new CDbCriteria;
                $Criteria->select = 'category_id';
                $Criteria->addCondition('title LIKE :title');
                $Criteria->addCondition('active = :active');
                $Criteria->params = array(
                    ':title' => '%' . $string . '%',
                    ':active' => 1,
                );
                if ($location_name && $location_name != 'Select Location') {
                    $Criteria->addCondition('location = :location');
                    $Criteria->params[":location"] = $location_name;
                }


                $result = Ads::model()->findAll($Criteria);

                foreach ($result as $value) {
                    if (!in_array($value, $results)) {
                        array_push($results, $value);
                    }
                }
            }
        }

        if ($results) {
            $data_html = "";
            $data_html .='<div id="header-search-results" class="results visible"><ul class="list">
                      <li class="suggester-categories">
                           <div class="header">
                           <i class="suggester-icon osh-font-table"></i>
                   <span class="title"><i class="fa fa-search-plus" aria-hidden="true"></i> Categories</span>
                   </div>
            <ul class="list">';

            foreach ($results as $data) {
                $category_id = $data['category_id'];
                $category_name = Generic::getCategoryNameFromCategoryId($category_id);
                foreach ($category_name as $name) {
                    $sub_category_slug = $name['sub_category_slug'];
                    $sub_category_slug_value = "'$sub_category_slug'";
                    $location_names = "'$location_name'";
                    $data_html .= '<li class="item" data-tracking="sams" data-tracking-trigger="searchSuggestionCategories">
                    <a onclick="redirectUrlCategory(' . $sub_category_slug_value . ',' . $location_names . ');" href="javascript:void(0);"><span class="searchTerm">' . $input_string . '</span> in <span>' . $name['category_name'] . '</span></a>
                </li>';
                }
            }
            $data_html .= '
            </ul>
          </li>
       </ul>
      </div>';
            $response['status'] = 'success';
            $response['html'] = $data_html;
        } else {
            $response['status'] = 'false';
        };

        echo json_encode($response);
    }

    public function actionSearch() {
        $category_ids = Yii::app()->request->getParam('selected_category', '');
        $search_keyword = Yii::app()->request->getParam('q', '');


        $condition_array = array(
            'active' => array(1)
        );

        $location_name = isset(Yii::app()->session['user_location']) ? Yii::app()->session['user_location'] : "";

        if ($location_name != '') {
            $condition_array['location'] = array($location_name);
        }

        $all_sub_category_id = Generic::getAllSubCategoriesId($category_ids);
        $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);

        $minimum_price = Generic::getMinimumPriceForSearch($location_name, $search_keyword, $condition_array, $sub_categories_id);
        $maximum_price = Generic::getMaximumPriceForSearch($location_name, $search_keyword, $condition_array, $sub_categories_id);
        //Generic::_setTrace($minimum_price,false);
        //Generic::_setTrace($maximum_price);
        $this->render('result', array(
            'maximum_price' => $maximum_price[0]['max_price'],
            'minimum_price' => $minimum_price[0]['min_price'],
            'location_name' => $location_name,
            'search_keyword' => $search_keyword,
            'category_ids' => $category_ids,
        ));
    }

    public function actionFindTheRightPackage(){
        $division = Yii::app()->request->getParam('division', '');
        $district = Yii::app()->request->getParam('district', '');
        $thana = Yii::app()->request->getParam('thana', '');
        $condition_array = array(
            'active'=> array(1)
        );
        $package_result_left_banner = Generic::getHomePageRightSideAds('package_result_left_banner', 0, 0, $country_code);
        $minimum_price = 1;
        $maximum_price = 1;
        $ad_details = Generic::getAllAdsForHomePageSearch('1',"tbl_ads",0,0,false,false,false,false,[$condition_array],false,false,false,false,[],false,$division,$district,$thana);
        foreach ($ad_details as $key => $value) {
            if($value['price'] > $maximum_price) {
                $maximum_price = $value['price'];
            } else if ($value['price'] < $minimum_price){
                $minimum_price = $value['price'];
            }
        }
        $this->render('find-package-result', array(
            'division' => $division,
            'district' => $district,
            'thana' => $thana,
            'package_result_left_banner' => $package_result_left_banner,
            'maximum_price' => $maximum_price,
            'minimum_price' => $minimum_price
        ));
    }

    public function actionShowAll() {
        $ads = Yii::app()->request->getParam('ads', '');
        $location_name = Yii::app()->request->getParam('selected_location', '');
        $search_keyword = Yii::app()->request->getParam('q', '');

        $this->render('show-all', array(
            'location_name' => $location_name,
            'search_keyword' => $search_keyword,
            'ads' => $ads,
        ));
    }

    public function actionPromotion($page_alias) {
        $Criteria = new CDbCriteria();
        $Criteria->select = 'page_content';
        $Criteria->condition = "page_alias = :page_alias";
        $Criteria->params = array(':page_alias' => $page_alias);
        $result = Discount::model()->find($Criteria);
        echo $result->page_content;
    }

    public function actionPromotions($page_alias_ad_special) {
        $Criteria = new CDbCriteria();
        $Criteria->select = 'page_content';
        $Criteria->condition = "page_alias_ad_special = :page_alias_ad_special";
        $Criteria->params = array(':page_alias_ad_special' => $page_alias_ad_special);
        $result = AdSpecial::model()->find($Criteria);
        echo $result->page_content;
    }

    public function actionPricePlan($country_code = '') {
        $Criteria = new CDbCriteria();
        $Criteria->condition = "user_token = :user_token";
        $Criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $loggedin_user = Register::model()->find($Criteria);

        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }
        $country_details = Generic::checkForStoredCountry();

        $currency = '';
        $currency_sign = '';
        if (!$country_code) {
            if ($country_details) {
                $currency = Generic::currency_convert(100, 'BDT', $country_details->currency);
                $currency_sign = $country_details->currency_sign;

                $web_promotion = Generic::currency_convert(1800, 'BDT', $country_details->currency);

                $banner_promote_hometop = Generic::currency_convert(3000, 'BDT', $country_details->currency);
                $banner_promote_category = Generic::currency_convert(2100, 'BDT', $country_details->currency);
                $banner_promote_menu = Generic::currency_convert(1800, 'BDT', $country_details->currency);
                $banner_promote_promo = Generic::currency_convert(1500, 'BDT', $country_details->currency);
                $banner_promote_upsell = Generic::currency_convert(1200, 'BDT', $country_details->currency);

                $landing_page = Generic::currency_convert(4700, 'BDT', $country_details->currency);

                $individual_plan = Generic::currency_convert(300, 'BDT', $country_details->currency);
            }
        } else {
            $currency = Generic::currency_convert(100, 'BDT', $requested_country['currency']);
            $currency_sign = $requested_country['currency_sign'];

            $web_promotion = Generic::currency_convert(1800, 'BDT', $requested_country['currency']);

            $banner_promote_hometop = Generic::currency_convert(3000, 'BDT', $requested_country['currency']);
            $banner_promote_category = Generic::currency_convert(2100, 'BDT', $requested_country['currency']);
            $banner_promote_menu = Generic::currency_convert(1800, 'BDT', $requested_country['currency']);
            $banner_promote_promo = Generic::currency_convert(1500, 'BDT', $requested_country['currency']);
            $banner_promote_upsell = Generic::currency_convert(1200, 'BDT', $requested_country['currency']);

            $landing_page = Generic::currency_convert(4700, 'BDT', $requested_country['currency']);

            $individual_plan = Generic::currency_convert(300, 'BDT', $requested_country['currency']);
        }
        $currency_rate = Generic::Getfloat($currency);

        $this->render('price-plan', array(
            'loggedin_user' => $loggedin_user,
            'currency_rate' => $currency_rate,
            'currency_sign' => $currency_sign,
            'country_code' => $country_code,
            'web_promotion' => $web_promotion,
            'banner_hometop' => $banner_promote_hometop,
            'banner_category' => $banner_promote_category,
            'banner_menu' => $banner_promote_menu,
            'banner_promo' => $banner_promote_promo,
            'banner_upsell' => $banner_promote_upsell,
            'landing_page' => $landing_page,
            'individual' => $individual_plan
        ));
    }

    public function actionPricePlanDetails() {
        $this->render('price-plan-details');
    }

    public function actionTermsConditions($country_code = '') {
        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }
        $this->render('terms_conditions', array(
            'country_code' => $requested_country->sortname
        ));
    }

    public function actionActivateEStore() {
        $activation_key = Yii::app()->request->getParam('token', '');
        $current_date = new \DateTime();
        if (!$activation_key) {
            return;
        }

        $plan_settings = Yii::app()->params['planSettings'];
        $store_link = '';
        $criteria = new CDbCriteria();
        $criteria->condition = 'md5(url_alias) = :url_alias';
        $criteria->params = array(':url_alias' => $activation_key);
        $store_details = Estore::model()->find($criteria);
        if ($store_details) {
            $store_details->active = 1;
            $store_details->update();

            $criteria = new CDbCriteria();
            $criteria->condition = 'estore_id = :estore_id';
            $criteria->params = array(':estore_id' => $store_details->id);
            $subscription_plan = Subscription_plan::model()->find($criteria);

            if ($subscription_plan) {
                $subscription_plan->status = 1;
                $subscription_plan->activation_date = $current_date->format('Y-m-d H:i:s');
                $current_date->modify('1 month');
                $subscription_plan->expiration_date = $current_date->format('Y-m-d H:i:s');
                $subscription_plan->update();

                $plan_details = array();
                switch ($subscription_plan->plan_type) {
                    case 1:
                        $plan_details = $plan_settings['standard'];
                        break;
                    case 2:
                        $plan_details = $plan_settings['silver'];
                        break;
                    case 3:
                        $plan_details = $plan_settings['platinum'];
                        break;
                }
                if ($plan_details) {
                    $subscription_details = new Subscription_details();
                    $subscription_details->plan_id = $subscription_plan->id;
                    $subscription_details->ad_count = $plan_details['ad_count'];
                    $subscription_details->featured_ad_count = $plan_details['featured_ad_count'];
                    $subscription_details->premium_ad_count = $plan_details['premium_ad_count'];
                    $subscription_details->top_ad_count = $plan_details['top_ad_count'];
                    $subscription_details->hot_ad_count = $plan_details['hot_ad_count'];
                    $subscription_details->live_chat_support = $plan_details['live_chat_support'];
                    $subscription_details->smm_support = $plan_details['smm_support'];
                    $subscription_details->email_marketing_support = $plan_details['email_marketing_support'];
                    $subscription_details->recommend_ad_support = $plan_details['recommend_ad_support'];
                    $subscription_details->promotional_banner_service = $plan_details['promotional_banner_service'];

                    if ($subscription_details->save()) {

                        $store_link = Yii::app()->getBaseUrl(true) . '/estore/' . $store_details->url_alias;

                        $notification_alert = new Notification_alert();
                        $notification_alert->receiver_id = $store_details->user_id;
                        $notification_alert->short_desc = 'Congratulations. Your EStore has been approved!!';
                        $notification_alert->details = 'Congratulations. Your EStore has been approved. You can see it online <a href="' . $store_link . '" target="_blank"></a>';
                        $notification_alert->seen = 0;
                        $notification_alert->create_date = $current_date->format('Y-m-d H:i:s');
                    }
                }
            }
        }
        $this->render('estore-activation-success', array(
            'store_link' => $store_link
        ));
    }

    public function actionCreateEStoreFromSupport() {
        $activation_key = Yii::app()->request->getParam('token', '');
        $current_date = new \DateTime();
        if (!$activation_key) {
            return;
        }
        $decoded_token = json_decode(base64_decode(urldecode($activation_key)));

        $criteria = new CDbCriteria();
        $criteria->condition = 'md5(id) = :id';
        $criteria->params = array(':id' => $decoded_token->user_id);
        $profile_data = Register::model()->find($criteria);
        $this->render('estore-creation-from-support', array(
            'store_id' => $decoded_token->store_id,
            'user_id' => $decoded_token->user_id,
            'profile_data' => $profile_data,
            'service_plan' => $decoded_token->plan_id
        ));
    }

    public function actionSendAdsRequestForPricePlan() {
        $response = array();
        #$to = "support@bdbroadbanddeals.com";
        $to = Yii::app()->params['adminEmail'];
        $from = $_POST['sender_email'];
        $name = $_POST['sender_name'];
        $phone_number = $_POST['sender_phone'];
        $my_request = $_POST['my_request'];
        $subject = "Sent Request for " . $my_request . " plan";
        $subject2 = "You have requested for " . $my_request . " in bdbroadbanddeals.com";
        $message = "<p>Name :$name</p><br><p>Email : $from</p><br><p>Phone Number :$phone_number</p><br><p>Requested plan : $my_request</p>";
        $message2 = "<p>Mr/Mrs $name,</p><br><p>Thank you for your request. You have requested for $my_request.
				We are very much complimented that you choose bdbroadbanddeals.com for your ads.</p><p>For further process of your request we will contact you shortly.
				Please, do not hesitate to call if you have any questions.</p><p><h4>Helpline: +88 01996 304 100<h4></p><br><p>Kind regards</P>";

        $headers = "From:" . $from;
        $headers2 = "bdbroadbanddeals.com";
        Generic::sendMail($message, $subject, $to, $headers);
        Generic::sendMail($message2, $subject2, $from, $headers2); // sends a copy of the message to the sender
        //echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
        $response['status'] = 'success';
        echo json_encode($response);
    }

    public function actionPlaceLocationValue() {
        $response = array();
        $location = Yii::app()->request->getParam('location', '');


        if ($location) {
            $response['status'] = 'success';
            $response['location'] = trim($location);
            Yii::app()->session['user_location'] = trim($location);
        } else {
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }

    public function actionGetCategory() {
        $category_type = Yii::app()->request->getParam('category_type', 1);
        $criteria = new CDbCriteria();
        $criteria->condition = 'category_type = :category_type and parent_id = :parent';
        $criteria->params = array(':category_type' => $category_type, ':parent' => 0);
        $category_objects = Category::model()->findAll($criteria);
        $category_list = '<option value="Choose Your Business Category">Select Business Category</option>';
        foreach ($category_objects as $category) {
            $category_list .= '<option value="' . $category->category_id . '">' . $category->category_name . '</option>';
        }
        $response['status'] = 'success';
        $response['result'] = $category_list;
        echo json_encode($response);
    }

    public function actiongetCategoryIdFromSelect() {
        $category_id = Yii::app()->request->getParam('category_id', '');

        $html = "";
        $response = array();
        $html .='<label class="col-sm-3 label-title">Select Sub Category<span class="required">*</span></label>
										<div class="col-sm-9" >
											<select onchange="showHideInputField()" class="form-control"  id="sub_category_id" name="category_id">
												<option  value="Select Category">Select Sub Category</option>';
        $sub_categories_list = Generic::getSubCategoryFromCategoryId($category_id);
        foreach ($sub_categories_list as $sub_category) {
            $sub_category_name = $sub_category['category_name'];
            $sub_category_id = $sub_category['category_id'];
            $html .='<option  value="' . $sub_category_id . '">' . $sub_category_name . '</option>';
        }
        $html .='</select></div>';

        $response['status'] = 'success';
        $response['html'] = html_entity_decode($html);
        echo json_encode($response);
    }

    public function actiongetStatesFromSelect() {
        $country_id = Yii::app()->request->getParam('country_id', '');
        $register_type = Yii::app()->request->getParam('rgroup', '');

        $html = "";
        $response = array();
        if ($register_type == 'individual') {
            $html .= '<div class="form-group" >
						<select onchange="" class="form-control"  id="stateSelect" name="state_personal" style="width: 92%;margin-left:15px;">
					<option  value="">Select City</option>';
        } else if ($register_type == 'business') {
            $html .= '<div class="form-group" >
						<select onchange="" class="form-control"  id="stateBusiness" name="state_business" style="width: 92%;margin-left:15px;">
					<option  value="">Select City</option>';
        } else if ($register_type == 'promotion') {
            $html .= '<div class="form-group" >
						<select onchange="getThanafromDistrict()" class="form-control"  id="statePromotion" name="state_promotion" style="width: 92%;margin-left:15px;">
					<option  value="">Select City</option>';
        }
        $states = Generic::getStates($country_id);
        foreach ($states as $state) {
            $html .='<option  value="' . $state['district_id'] . '">' . $state['district'] . '</option>';
        }
        $html .='</select></div>';

        $response['status'] = 'success';
        $response['html'] = html_entity_decode($html);
        echo json_encode($response);
    }

    public function actionGetStatesFromYourLocationSelect() {
        $country_id = Yii::app()->request->getParam('country_id', '');

        $html = "";
        $response = array();
        $html .= '<div id="district" class="form-group citySelectPersonal">
						<select onchange="placeValue(this.value)" class="form-control"  id="citySelect" name="district" size="1" multiple style="height: 110px;">
					<option  value="">Select City</option>';

        $states = Generic::getStates($country_id);
        foreach ($states as $state) {
            $html .='<option  value="' . $state['name'] . '">' . $state['name'] . '</option>';
        }
        $html .='</select></div>';

        $response['status'] = 'success';
        $response['html'] = html_entity_decode($html);
        echo json_encode($response);
    }

    /*
     * Banner service creation from support
     */

    public function actionCreateBannerFromSupport() {
        $token = Yii::app()->request->getParam('token', '');
        if (!$token) {
            return 404;
        }

        $token = json_decode(base64_decode(urldecode($token)));
        if (!isset($token->user_id)) {
            return 404;
        }
        $criteria = new CDbCriteria();
        $criteria->condition = 'md5(id) = :user_id';
        $criteria->params = array(':user_id' => $token->user_id);
        $user_details = Register::model()->find($criteria);
        if (!$user_details) {
            return 404;
        }

        $this->render('banner-creation-from-support', array(
            'user_details' => $user_details,
        ));
    }

    /*
     * upload banner from support for service promotion
     */

    public function actionUploadBanner() {
        $banner_image_url = Yii::app()->request->getParam('banner_image', '');
        $banner_position = Yii::app()->request->getParam('banner_position', '');
        $user_id = Yii::app()->request->getParam('user_id', '');
        $current_time = new \DateTime();

        $banner = new AdSpecial();
        $banner->user_id = $user_id;
        $banner->banner_image = $banner_image_url;
        $banner->banner_position = $banner_position;
        $banner->create_date = $current_time->format('Y-m-d H:i:s');
        $banner->save();

        $this->redirect(Yii::app()->getBaseUrl(true));
    }

    public function actionCareer() {
        $all_job_details = Generic::getJobsDetails();

        $Criteria = new CDbCriteria();
        $Criteria->condition = "user_token = :user_token";
        $Criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $loggedin_user = Register::model()->find($Criteria);

        $this->render('career', array(
            'all_job_details' => $all_job_details,
            'loggedin_user' => $loggedin_user,
        ));
    }

    public function actionjobDetails() {
        $job_id = base64_decode(urldecode(Yii::app()->request->getParam('job_id')));
        $job_details = Generic::getJobsDetailsfromId($job_id);
        $employer_details = $company_details = [];
        if(isset($job_details[0]['user_id'])){
            $employer_id = $job_details[0]['user_id'];
            $employer_details = Register::model()->findByPk($employer_id);

            $store_criteria = new CDbCriteria();
            $store_criteria->condition = "user_id = :user_id and active = :active";
            $store_criteria->params = array(':user_id' => $employer_id,':active' => 1);
            $company_details = Estore::model()->find($store_criteria);
            if($employer_details->register_type == 'business'){
                $company_link = Yii::app()->getBaseUrl(true).'/isp/'.$company_details->url_alias;
            } else {
                $company_link = Yii::app()->getBaseUrl(true).'/e-store/'.$company_details->url_alias;
            }
        }
        $Criteria = new CDbCriteria();
        $Criteria->condition = "user_token = :user_token";
        $Criteria->params = array(':user_token' => Yii::app()->session['user_token']);
        $loggedin_user = Register::model()->find($Criteria);

        $this->render('job_description', array(
            'job_details' => $job_details,
            'loggedin_user' => $loggedin_user,
            'employer_details' => $employer_details,
            'company_details' => $company_details,
            'company_link' => $company_link
        ));
    }

    public function actionSendApplicationForJob() {
        $job_id = Yii::app()->request->getParam('job_id');
        $job_details = Generic::getJobsDetailsfromId($job_id);
        $name = Yii::app()->request->getParam('applicant_name');
        $email = Yii::app()->request->getParam('applicant_email');
        $phone = Yii::app()->request->getParam('applicant_phone');
        $address = Yii::app()->request->getParam('applicant_address');
        $token = Yii::app()->session['user_token'];
        $profile_data = Generic::getProfileData($token);
        $user_id = $profile_data['id'];
        $current_time = new \DateTime();

        $job_details = Jobs::model()->findByPk($job_id);
        $user_details = Register::model()->findByPk($job_details->user_id);

        $file_name = $_FILES['userfile']['name'];

        $job = new JobApplication();
        $job->job_id = $job_id;
        $job->user_id = $user_id;
        $job->name = $name;
        $job->email = $email;
        $job->phone = $phone;
        $job->address = $address;
        $job->resume_details = $file_name;
        $job->create_date = $current_time->format('Y-m-d');
        
        $thanks_message = '';
        if ($job->save()) {
            $file = $_FILES['userfile']['tmp_name'];
            $content = file_get_contents($file);
            $content = chunk_split(base64_encode($content));
            $uid = md5(uniqid(time()));

            #$to = "support@bdbroadbanddeals.com";
            $to = $user_details->email;
            $jobs_mail = Yii::app()->params['jobsEmail'];;
            $from = $email;
            $subject = "Sent Application for " . $job_details->title;


            $message = "Name : $name \nEmail : $from \nPhone Number :$phone \nAddress : $address \nApplied for post : " . $job_details->title . "\nApplicant Resume : \n\n";


            // main header (multipart mandatory)
            $headers = "From: " . $name . " <" . $from . ">\r\n";
            $headers .= "Reply-To: " . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

            // message
            $nmessage = "--" . $uid . "\r\n";
            $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
            $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $nmessage .= $message . "\r\n\r\n";
            $nmessage .= "--" . $uid . "\r\n";
            $nmessage .= "Content-Type: application/octet-stream; name=\"" . $file_name . "\"\r\n";
            $nmessage .= "Content-Transfer-Encoding: base64\r\n";
            $nmessage .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n";
            $nmessage .= $content . "\r\n\r\n";
            $nmessage .= "--" . $uid . "--";

            @mail($to, $subject, $nmessage, $headers);
            @mail($jobs_mail, $subject, $nmessage, $headers);
            //Generic::sendMail($message,$subject,$to,$headers);
            $this->redirect(Yii::app()->request->urlReferrer);
        } else {
            $this->redirect(Yii::app()->request->urlReferrer);
            echo "Your application is not successful.";
        }
    }

    /*
     * Checking Duplicate email for registered user
     * @return status success
     */

    public function actionCheckDuplicateEmail() {
        $email = Yii::app()->request->getParam('email');
        $result = Generic::getRegisterUser($email);

        $response = array();
        if ($result[0]['email'] == $email) {
            $response['status'] = "duplicate";
            $response['message'] = "An User Already Registered With " . $email;
        }
        echo json_encode($response);
    }

    public function actionCheckCountry() {
        $response = array();
        $response['status'] = 'authorized';
        $result = Generic::validateCountry(Yii::app()->request->getParam('data'));
        if (!$result) {
            $response['status'] = 'not_authorized';
        }
        echo json_encode($response);
    }

    /*
     * check validity of an email for registered user
     */

    public function actionCheckEmailValidity() {
        $email = Yii::app()->request->getParam('email');
        $api_key = 'f81319c2c5bfc51ac3a95015ec9ebf7703f246ad871f8c91ebd99a3dce4ea3b1';

        $validation_result = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($validation_result) {
            /* $request = 'https://api.kickbox.io/v2/verify?email='.$email.'&apikey='.$api_key;
              $kickbox_response = file_get_contents($request);
              $decoded_response = json_decode($kickbox_response);

              if(trim($decoded_response->result) != 'undeliverable'){ */
            list($user, $domain) = explode('@', $email);

            if ($domain != 'yopmail.com') {
                $response['status'] = 'success';
                $response['msg'] = 'Valid Email';
                echo json_encode($response);
                return;
            }

            //}
        }

        $response['status'] = 'failure';
        $response['msg'] = 'Invalid Email';


        echo json_encode($response);
    }

    /*
     * Check OTP which i submit on the register-confirmation page with my received mobile number OTP.
     * @return status success
     */

    public function actionCheckOtp() {
        $base_url = Yii::app()->request->getBaseUrl(true);
        $otp = Yii::app()->request->getParam('otp');
        $user_token = Yii::app()->request->getParam('user_token', '');
        $criteria = new CDbCriteria();
        $criteria->condition = 'md5(user_token) = :user_token';
        $criteria->params = array(':user_token' => $user_token);
        $registered_user = Register::model()->find($criteria);
        if (!$registered_user) {
            $this->redirect($base_url . '/sign-in');
        }

        $response = array();
        if ($registered_user->otp == $otp) {
            $register = Register::model()->findByPk($registered_user->id);
            $response['status'] = "Confirm Successfully";
            $register->user_status = 1;
            $register->otp = null;
            $register->update();
            Yii::app()->session['user_token'] = $register->user_token;
            Generic::sendRegistrationPaper($register);
        }

        echo json_encode($response);
    }

    /*
     * show payment history
     */

    public function actionShowPaymentPortal() {
        if (!isset(Yii::app()->session['portal_token'])) {
            $this->redirect(Yii::app()->createUrl('portal-login'));
        }
        $portal_tokens = explode(':', Yii::app()->session['portal_token']);
        $transaction_id = Yii::app()->request->getParam('transaction_id');
        $referral_ids = Yii::app()->request->getParam('referral_ids');
        $selected_user_ids = Yii::app()->request->getParam('selected_user');
        $payment_status = Yii::app()->request->getParam('payment_status');
        //Generic::_setTrace($referral_ids);
        //Generic::_setTrace($selected_user_ids);

        $portal_user = Portal_settings::model()->findByPk($portal_tokens[1]);
        $portal_user_referral = Portal_referral::model()->findAllByAttributes(array('portal_user_id' => $portal_user->id));

        if ($portal_user->email == 'info@dewyitbd.com') {
            $admins = Portal_settings::model()->findAllByAttributes(array('group_id' => 2)); // group_id 2 is admin user group
            $guests = Portal_settings::model()->findAllByAttributes(array('group_id' => 3));
            ; // group_id 3 is guest user group
        } else {
            $admins = Generic::getPortalAdmins(2, $portal_user); // group_id 2 is admin user group
            $guests = Generic::getPortalGuests(3, $portal_user); // group_id 3 is guest user group
        }


        $all_referral_ids = Generic::returnReferralIdFromObject($admins, $guests);
        foreach ($portal_user_referral as $referral_id) {
            array_push($all_referral_ids, $referral_id->referral_id);
        }

        $group_id = $portal_user->group_id;

        $criteria = new CDbCriteria();
        if (isset($payment_status)) {
            $criteria->condition = 'payment_status = :payment_status';
            $criteria->params = array(':payment_status' => $payment_status);
        }

        $selected_reference = array();

        if (isset($selected_user_ids) && !empty($selected_user_ids)) {
            if (Generic::AdminOrGuest($selected_user_ids)) {
                $referral_ids = Generic::returnReferralIdForAdmin($selected_user_ids);
            } else {
                $referral_ids = Generic::returnReferralIdFromUserIds($selected_user_ids);
            }
            $criteria->addInCondition('referral_id', $referral_ids);
        } else {
            if (isset($referral_ids) && !empty($referral_ids)) {
                $criteria->addInCondition('referral_id', $referral_ids);
                $selected_reference = $referral_ids;
            } else {
                if ($portal_user->email != 'info@dewyitbd.com') {
                    $criteria->addInCondition('referral_id', $all_referral_ids);
                }
            }
        }

        if (isset($transaction_id) && $transaction_id != '') {
            if (isset($payment_status) || isset($referral_ids)) {
                $criteria->condition .= ' and invoice_id = :transaction_id';
            } else {
                $criteria->condition .= 'invoice_id = :transaction_id';
            }
            $criteria->params[':transaction_id'] = $transaction_id;
        }

        $criteria->order = 'id desc';
        $payment_history_details = PaymentHistory::model()->findAll($criteria);
        $this->render('payment-portal', array(
            'payment_history_details' => $payment_history_details,
            'portal_referral_ids' => $all_referral_ids,
            'transaction_id_excel' => $transaction_id,
            'portal_user' => $portal_user,
            'selected_reference' => $selected_reference,
            'selected_users' => $selected_user_ids,
            'admins' => $admins,
            'guests' => $guests,
            'group_id' => $group_id
        ));
    }

    /*
     * show payment history
     */

    public function actionShowPaymentPortalForDeclinedTransaction() {
        if (!isset(Yii::app()->session['portal_token'])) {
            $this->redirect(Yii::app()->createUrl('portal-login'));
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'payment_status = :payment_status';
        $criteria->params = array(':payment_status' => 2);


        $criteria->order = 'id desc';
        $payment_history_details = PaymentHistory::model()->findAll($criteria);
        $this->render('payment-portal-declined', array(
            'payment_history_details' => $payment_history_details,
        ));
    }

    /*
     * Import portal records in excel
     */

    public function actionExcel() {
        if (!isset(Yii::app()->session['portal_token'])) {
            $this->redirect(Yii::app()->createUrl('portal-login'));
        }
        $portal_tokens = explode(':', Yii::app()->session['portal_token']);
        $transaction_id = Yii::app()->request->getParam('transaction_id');
        $referral_ids = Yii::app()->request->getParam('referral_ids');
        $selected_user_ids = Yii::app()->request->getParam('selected_user');

        $portal_user = Portal_settings::model()->findByPk($portal_tokens[1]);
        $portal_user_referral = Portal_referral::model()->findAllByAttributes(array('portal_user_id' => $portal_user->id));

        if ($portal_user->email == 'info@dewyitbd.com') {
            $admins = Portal_settings::model()->findAllByAttributes(array('group_id' => 2)); // group_id 2 is admin user group
            $guests = Portal_settings::model()->findAllByAttributes(array('group_id' => 3));
            ; // group_id 3 is guest user group
        } else {
            $admins = Generic::getPortalAdmins(2, $portal_user); // group_id 2 is admin user group
            $guests = Generic::getPortalGuests(3, $portal_user); // group_id 3 is guest user group
        }


        $all_referral_ids = Generic::returnReferralIdFromObject($admins, $guests);
        foreach ($portal_user_referral as $referral_id) {
            array_push($all_referral_ids, $referral_id->referral_id);
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'payment_status = :payment_status';
        $criteria->params = array(':payment_status' => 1);


        if (isset($selected_user_ids) && !empty($selected_user_ids)) {
            $referral_ids = Generic::returnReferralIdFromUserIds($selected_user_ids);
            $criteria->addInCondition('referral_id', $referral_ids);
        } else {
            if (isset($referral_ids) && !empty($referral_ids)) {
                $criteria->addInCondition('referral_id', $referral_ids);
            } else {
                if ($portal_user->email != 'info@dewyitbd.com') {
                    $criteria->addInCondition('referral_id', $all_referral_ids);
                }
            }
        }

        if (isset($transaction_id) && $transaction_id != '') {
            $criteria->condition .= ' and invoice_id = :transaction_id';
            $criteria->params[':transaction_id'] = $transaction_id;
        }

        $criteria->order = 'id desc';
        $payment_history_details = PaymentHistory::model()->findAll($criteria);

        /* The End */

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("bdbroadbanddeals")
                ->setLastModifiedBy("DewyIT")
                ->setTitle("Payment_Portal")
                ->setSubject("Payment_Records");

        $activeSheet = $objPHPExcel->setActiveSheetIndex(0);

        /* Setting values for heading cell */
        $activeSheet->setCellValue("A1", 'Serial');
        $activeSheet->setCellValue("B1", 'Date');
        $activeSheet->setCellValue("C1", 'Name');
        $activeSheet->setCellValue("D1", 'Country');
        $activeSheet->setCellValue("E1", 'Transaction Id');
        $activeSheet->setCellValue("F1", 'Payment Method');
        $activeSheet->setCellValue("G1", 'Amount');
        $activeSheet->setCellValue("H1", 'Reference');

        $row = 2;
        foreach ($payment_history_details as $payment_history) {

            /* Configuring values */
            $transaction_date = new \DateTime($payment_history->transaction_date);
            $date = $transaction_date->format('d F, Y');

            $user_details = Register::model()->findByPk($payment_history->user_id);
            $name = $user_details->user_name;

            $country_details = Countries::model()->findByPk($user_details->country);
            $country = $country_details->name;

            switch ($payment_history->payment_method) {
                case 1:
                    $method = "Visa/MasterCard";
                    break;
                case 2:
                    $method = "Bank Deposit";
                    break;
                case 3:
                    $method = "Direct Payment";
                    break;
            }

            $amount_to_deduct = $payment_history->payment_amount * 3 / 100;
            $amount = number_format($payment_history->payment_amount - $amount_to_deduct, 2);

            /* Setting values */

            $activeSheet->setCellValue("A" . $row, $row - 1);
            $activeSheet->setCellValue("B" . $row, $date);
            $activeSheet->setCellValue("C" . $row, $name);
            $activeSheet->setCellValue("D" . $row, $country);
            $activeSheet->setCellValue("E" . $row, $payment_history->invoice_id);
            $activeSheet->setCellValue("F" . $row, $method);
            $activeSheet->setCellValue("G" . $row, $amount);
            $activeSheet->setCellValue("H" . $row, is_null($payment_history->referral_id) ? 'N/A' : $payment_history->referral_id);

            $row++;
        }

        //$filename = "payment-portal-on-".date("Y.m.d-H.i.s").".xlsx";

        $filename = "payment-portal-record.xlsx";

        //header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-type: application/vnd.ms-excel');
        //header("Content-Disposition: attachment;filename=".$filename);
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header("Cache-Control: max-age=0");

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');
    }

    /*
     * show portal login form
     */

    public function actionDoPortalLogin() {
        $email = Yii::app()->request->getParam('user_email');
        $password = Yii::app()->request->getParam('password');
        $form_submission = Yii::app()->request->getParam('btn-submit');
        $msg = '';

        if (isset($form_submission)) {
            if ($portal_user_id = Generic::checkPortalLogin($email, $password)) {
                $current_time = new \DateTime();
                $ip = Generic::getUserIP();
                Yii::app()->session['portal_token'] = $current_time->getTimestamp() . $ip . ':' . $portal_user_id;
                $this->redirect(Yii::app()->createUrl('/portal'));
            } else {
                $msg = "Email or Password did't match";
            }
        }

        $this->render('portal-login', array(
            'msg' => $msg
        ));
    }

    /*
     * do portal logout and redirect to portal page
     */

    public function actionDoPortalLogout() {
        unset(Yii::app()->session['portal_token']);
        $this->redirect(Yii::app()->createUrl('/portal'));
    }

    /*
     * show global links
     */

    public function actionShowGlobalLinks() {
        $this->render('global-links', array(
        ));
    }

    /*
     * Receives feedback
     */

    public function actionReceiveFeedback() {
        $to = Yii::app()->params['adminEmail'];
        $subject = "Feedback";
        $from = Yii::app()->request->getParam('email');
        $name = Yii::app()->request->getParam('name');
        $phone = Yii::app()->request->getParam('phone');
        $msg = Yii::app()->request->getParam('msg');
        $header = "From: " . $name . " <" . $from . ">\r\n";
        $header .= "Reply-To: " . $from . "\r\n";
        $message = "Name : $name \nEmail : $from \nPhone : $phone \n\n";
        $message .= "<p align='justify'>" . $msg . "</p>";

        if (!empty($from) || !empty($name) || !empty($phone) || !empty($msg)) {
            $mailed = @mail($to, $subject, $message, $header);
            if ($mailed) {
                #setting response
                $response['status'] = 'success';
                $response['message'] = 'Thank you for your feedback!';
            } else {
                #setting response
                $response['status'] = 'failure';
                $response['message'] = 'Something went wrong!';
            }
        } else {
            #setting response
            $response['status'] = 'empty';
            $response['message'] = 'Please Fill The Necessary Fields!';
        }
        echo json_encode($response);
    }

    public function actionSpecialOffer($country_code = '') {
        $requested_country = Generic::checkValidCountryRequest($country_code);

        if ($country_code && !$requested_country) {
            return;
        }


        $special_offer_ads = Generic::getSpecialOfferAds($country_code);

        if (is_array($special_offer_ads) && count($special_offer_ads) > 1) {
            shuffle($special_offer_ads);
        }


        $this->render('special_offer', array(
            'special_offer_ads' => $special_offer_ads,
            'country_code' => $country_code,
        ));
    }

    public function actionExpireSoonAds() {
        $expire_soon_ads = Generic::getExpireSoonAds();
        $this->render('expire-soon-ads', array(
            'expire_soon_ads' => $expire_soon_ads
        ));
    }

    public function actionPortalCreate() {
        $portal_tokens = explode(':', Yii::app()->session['portal_token']);

        $portal_user = Portal_settings::model()->findByPk($portal_tokens[1]);
        $group_id = $portal_user->group_id;
        $this->render('portal-create', array(
            'group_id' => $group_id,
            'portal_user' => $portal_user
        ));
    }

    public function actionCreatePortalUsergroup() {
        $name = Yii::app()->request->getParam('name');
        $email = Yii::app()->request->getParam('email');
        $password = Yii::app()->request->getParam('password');
        $ref_id = Yii::app()->request->getParam('ref_id');
        $group_id = Yii::app()->request->getParam('group_id');
        $current_user = Yii::app()->request->getParam('user_id');

        $response = array();
        $creation_date = new \DateTime();
        $portal = new Portal_settings();
        $portal->name = $name;
        $portal->email = $email;
        $portal->password = md5($password);
        $portal->create_date = $creation_date->format('Y-m-d H:i:s');
        $portal->group_id = $group_id;
        $portal->created_by = $current_user;
        if ($portal->save()) {
            if ($ref_id) {
                $portalRefferal = new Portal_referral();
                $portalRefferal->portal_user_id = $portal->id;
                $portalRefferal->referral_id = $ref_id;
                $portalRefferal->create_date = $creation_date->format('Y-m-d H:i:s');
                $portalRefferal->save();
            }
            $response['status'] = "success";
        } else {
            $response['status'] = "false";
        }

        echo json_encode($response);
    }
    
    /**
     * get all districts from division _id
     */
    public function actionGetDistricts() {
        $division_id = Yii::app()->request->getParam('division_id');
        $no_select = Yii::app()->request->getParam('no_select','');
        
        $district_objects = District::model()->findAllByAttributes(['division_id' => $division_id,'status' => 1]);
        $option_string = '';
        if($no_select != '1'){
            $option_string .= '<option value="0">Select District</option>';
        }
        
        foreach($district_objects as $district){
            $option_string.= '<option value="'.$district->district_id.'">'.$district->district.'</option>';
        }
        echo $option_string;
    }
    
    /**
     * get all thanas from district_id
     */
    public function actionGetThanas() {
        $district_id = Yii::app()->request->getParam('district_id');
        $show_header = Yii::app()->request->getParam('show_header',1);

        $thanas_object = Thana::model()->findAllByAttributes(['district_id' => $district_id,'status' => 1]);
        if($show_header) {
           $option_string = '<option value="0">Select Thana</option>'; 
        }
        
        foreach ($thanas_object as $thana) {
            $option_string.= '<option value="'.$thana->thana_id.'">'.$thana->thana.'</option>';
        }
        echo $option_string;
    }

    /**
     * get all thanas from district_id for nationwide
     */
    public function actionGetThanasForNationWide() {
        $district_id = Yii::app()->request->getParam('district_id');
        $zone_id = Yii::app()->request->getParam('zone_id',0);
        $central_zone_skip_list = [218,219,220,221,276,277,278,280];

        $thanas_object = Thana::model()->findAllByAttributes(['district_id' => $district_id,'status' => 1]);
        $option_string = '';
        foreach ($thanas_object as $thana) {
            if($zone_id == 2 && in_array($thana->id, $central_zone_skip_list)){
                continue;
            }
            $option_string.= '<option value="'.$thana->id.'">'.$thana->thana.'</option>';
        }
        echo $option_string;
    }
    
    /**
     * get all thanas and districts according to isp category
     */
    public function actionGetDistrictAndThanas(){
        $isp_mapping['2']['district'] = ['501' => 'Dhaka City',
            '502' => 'Zinzira H/Q','503' => 'Savar H/Q','504'=>'Narayanganj District H/Q',
            '505'=>'Gazipur District H/Q','506'=>'Tongi H/Q'];
        $isp_mapping['3']['district'] = [12,19,68,13,51,75,30,15,22,46,3,84];
        $isp_mapping['4']['district'] = [90,91,36,58,89,39,72,61,48,93,59,56,67,33];
        $isp_mapping['5']['district'] = [65,47,87,1,6,9,42,79,4,78,82,29,35,54,86];
        $isp_mapping['6']['district'] = [27,77,73,94,52,49,85,32,10,38,81,69,64,76,88,70];
        $isp_mapping['7']['district'] = [26];
        $isp_mapping['8']['district'] = [6,47,15,81,85,91];
        $isp_mapping['9']['district'] = [1,3,4,9,13,10,12,70,18,19,22,27,29,30,32,33,35,36,39,41,42,
            44,38,46,48,49,50,51,54,52,55,56,57,58,59,61,64,65,67,68,69,72,73,75,76,77,78,79,82,84,
            85,86,87,88,89,90,93,94,6,47,15,81,85,91,26];
        $districts_info = "";
        $thanas_info = "";
        $isp_category_id = Yii::app()->request->getParam('isp_category_id');
        if($isp_category_id == 2) {
            $districts_info = '<option value="26">Dhaka</option>';
            foreach ($isp_mapping[$isp_category_id]['district'] as $thana_key => $thana_value){
                $thanas_info .= '<option value="'.$thana_key.'">'.$thana_value.'</option>';
            }
        } else if ($isp_category_id == 3 || $isp_category_id == 4 || $isp_category_id == 5 || $isp_category_id == 6){
            $districts = District::model()->findAllByAttributes(array("district_id" => $isp_mapping[$isp_category_id]['district']));
            $thanas = Thana::model()->findAllByAttributes(array("district_id" => $isp_mapping[$isp_category_id]['district']));
            foreach($districts as $district){
                $districts_info .= '<option value="'.$district->district_id.'">'.$district->district.'</option>';
            }
            foreach($thanas as $thana){
                $thanas_info .= '<option value="'.$thana->thana_id.'">'.$thana->thana.'</option>';
            }
        } else {
            $districts_info = '<option value="0">Select District</option>';
            $district_criteria = new CDbCriteria(array('order'=>'district ASC'));
            $districts = District::model()->findAllByAttributes(array("district_id" => $isp_mapping[$isp_category_id]['district']),$district_criteria);
                        
            $thana_criteria = new CDbCriteria(array('order'=>'thana ASC'));
            $thanas = Thana::model()->findAllByAttributes(array("district_id" => $isp_mapping[$isp_category_id]['district']),$thana_criteria);
            foreach($districts as $district){
                $districts_info .= '<option value="'.$district->district_id.'">'.$district->district.'</option>';
            }
        }
        $result['districts'] = $districts_info;
        $result['thanas'] = $thanas_info;
        echo json_encode($result);
    }

    public function actionGetZonalDistricts(){
        $districts_info = "";
        $zone_id = Yii::app()->request->getParam('zone_id');
        if($zone_id == ''){
            echo '';
        }
        $isp_mapping[2]['district'] = [26,33,67];
        $isp_mapping[3]['district'] = [12,19,68,13,51,75,30,15,22,46,3,84];
        $isp_mapping[4]['district'] = [90,91,36,58,89,39,72,61,48,93,59,56,67,33];
        $isp_mapping[5]['district'] = [65,47,87,1,6,9,42,79,4,78,82,29,35,54,86];
        $isp_mapping[6]['district'] = [27,77,73,94,52,49,85,32,10,38,81,69,64,76,88,70];
        $district_criteria = new CDbCriteria(array('order' => 'district ASC'));
        $district_details = District::model()->findAllByAttributes(['district_id' => $isp_mapping[$zone_id]['district']],$district_criteria);
        //Generic::_setTrace($district_details);
        foreach ($district_details as $single_district) {
            
            $districts_info .= '<option value="'.$single_district->district_id.'">'.$single_district->district.'</option>';
        }

        //Generic::_setTrace($districts_info);
        echo $districts_info;
    }

    public function actionTest(){
        $division = Generic::getDivisionFromDistrict(26);
        $activation_link = Yii::app()->getBaseUrl(true).'/admin/ads/admin/status/0';
        Generic::_setTrace($activation_link);
    }

    /**
    * send mail to admin for ad post
    */
    private function sendApprovalRequestToSupport($user_id){
        $user_details = Register::model()->findByPk($user_id);
        
        $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        $to_email = Yii::app()->params['adminEmail'];
        $business_email = Yii::app()->params['businessEmail'];
        $subject = '';
        if($user_details->register_type == 'personal'){
            $subject = 'Ad approval request';
        } else if($user_details->register_type == 'business'){
            $subject = 'ISP Package approval request';
        } else if($user_details->register_type == 'store'){
             $subject = 'Estore product approval request';
        }

        $activation_link = Yii::app()->getBaseUrl(true).'/admin/ads/admin/status/0';

        $message = '<h3>An user sent an approval request. You can see the details from below link:</h3>';
        $message .= $message_line_spacing_double.'<p>You can activate the Ad/ISP/Product from the link below:</p>';
        $message .= $message_line_spacing_single.'<a href="'.$activation_link.'" target="_blank">'.$activation_link.'</a>';

        Generic::sendMail($message,$subject,$to_email);
        Generic::sendMail($message,$subject,$business_email);
    }

    public function actionGetAdDetailsForModal(){
        $ad_id = Yii::app()->request->getParam('ad_id');
        $user_type = Yii::app()->request->getParam('user_type');

        $ad_details = Generic::getAddDetailsFromAddTable($ad_id);
        $message = '';
        if($user_type == 'business'){
            
            $message .= '<p><strong>Service Charge/OTC: </strong> <span>'.Generic::renderServiceCharge($ad_details['service_charge']).'</span></p>';

            if(!empty($ad_details['migration_charge']) && $ad_details['migration_charge'] != 0){
                $message .= '<p>
                                <strong>Migration Charge: </strong> <span>&#2547; '.$ad_details['migration_charge'].'</span>
                            </p>';
            } else {
                $message .= '<p>
                                <strong>Migration Charge: </strong> <span>Free</span>
                            </p>';
            }
            
            $message .= '<p>
                                            <strong>Package Type: </strong> <span>'.ucwords($ad_details['package_type']).'</span>
                                        </p>';
                $message .= '<p>
                                            <strong>Internet Speed: </strong> <span>'.$ad_details['internet_speed'].'</span>
                                        </p>';
                if($ad_details['public_ip']) {
                    $message .= '<p>
                                            <strong>Public IP: </strong> <span>Yes</span>
                                        </p>';
                } else {
                    $message .= '<p>
                                            <strong>Public IP: </strong> <span>No</span>
                                        </p>';
                }
                
                
                if($ad_details['youtube_speed'] != ''){
                    $message .= '<p>
                                            <strong>GGC/Youtube Speed: </strong> <span>'.$ad_details['youtube_speed'].'</span>
                                        </p>';
                }
                if($ad_details['bdix_speed'] != '') {
                    $message .= '<p>
                                            <strong>BDIX Speed: </strong> <span>'.$ad_details['bdix_speed'].'</span>
                                        </p>';
                }
                                        
                
                if($ad_details['ftp_link'] != ''){
                    $message .= '<p>
                                            <strong>FTP: </strong> <span>Yes</span>
                                        </p>';
                }
                                
                if($ad_details['live_tv'] != ''){
                    $message .= '<p>
                                            <strong>Live TV: </strong> <span>Yes</span>
                                        </p>';
                }                      
                if($ad_details['facebook_link'] != ''){
                $message .= '<p>
                                            <strong>Facebook Page: </strong> <span>'.$ad_details['facebook_link'].'</span>
                                        </p>';
                }
                if($ad_details['website_link'] != '') {
                $message .= '<p>
                                            <strong>Website: </strong> <span>'.$ad_details['website_link'].'</span>
                                        </p>';
                }
        } else {
            if($ad_details['ad_condition']){
                $message .= '<p><strong>Condition</strong> New</p>';
            } else {
                $message .= '<p><strong>Condition</strong> Used</p>';
            }
            if($ad_details['ad_condition']){
                $message .= '<p><strong>Price Type</strong> Fixed</p>';
            } else {
                $message .= '<p><strong>Price Type</strong> Negotiable</p>';
            }            
        }

        echo json_encode([
            'status' => 'success',
            'html' => $message
        ]);
    }

    public function actionChangeUserStatus(){
        $user_id = Yii::app()->request->getParam('id');
        $user_status = Yii::app()->request->getParam('active');

        $user_details = Register::model()->findByPk($user_id);
        $user_details->user_status = $user_status;
        try {
            if(!$user_status){
                $ad_criteria = new CDbCriteria();
                $ad_criteria->condition = 'user_id = :user_id';
                $ad_criteria->params = array(':user_id' => $user_id);
                $ads_details = Ads::model()->findAll($ad_criteria);
                $company_details = Estore::model()->findAll($ad_criteria);
                foreach ($ads_details as $ad) {
                    $ad->active = 0;
                    $ad->update();
                }
                if($company_details){
                    $company_details->active = 0;
                    $company_details->update();
                }
            }
            $user_details->update();
        } catch (Exception $e) {
            Generic::_setTrace('User update failed, Please contact site admin');
        }
        

        $this->redirect($base_url . '/admin/register/admin');
        //Generic::_setTrace($user_details);
    }

    public function actionCustomizedRegisterDelete(){

        $register_id = Yii::app()->request->getParam('id');
        $user_details = Register::model()->findByPk($register_id);
            if($user_details){
                $ad_criteria = new CDbCriteria();
                $ad_criteria->condition = 'user_id = :user_id';
                $ad_criteria->params = array(':user_id' => $register_id);
                $ads_details = Ads::model()->findAll($ad_criteria);
                $registered_user_location_details = Registered_user_location::model()->findAll($ad_criteria);
                
                if($registered_user_location_details){
                    foreach ($registered_user_location_details as $user_location) {
                        $user_location->delete();
                    }
                }
                
                $company_details = Estore::model()->findAll($ad_criteria);
                if(!empty($ads_details)){
                    foreach ($ads_details as $ad) {
                        $ad->delete();
                    }
                }
                if($company_details){
                    $company_details[0]->delete();
                }

                $user_details->delete();
            }
            
        $this->redirect(Yii::app()->getBaseUrl(true) . '/admin/register/admin');
    }

    public function actionCustomizedCompanyDelete(){

        $company_id = Yii::app()->request->getParam('id');
        $store_details = Estore::model()->findByPk($company_id);
        $registered_user_id = $store_details->user_id;
        //Generic::_setTrace($registered_user_id);
        if($store_details){
            $ad_criteria = new CDbCriteria();
            $ad_criteria->condition = 'user_id = :user_id';
            $ad_criteria->params = array(':user_id' => $registered_user_id);
            Ads::model()->deleteAll($ad_criteria);

            $store_details->delete();
        }
        if(empty($store_details->isp_company_id)){
            $this->redirect(Yii::app()->getBaseUrl(true) . '/admin/business_estore/admin/store/1');
        } else {
            $this->redirect(Yii::app()->getBaseUrl(true) . '/admin/business_estore/admin/store/0');
        }


    }

    public function actionchangeBlacklistStatus(){
        $blacklist_id = Yii::app()->request->getParam('id','');
        if($blacklist_id){
            $blacklist_details = Blacklist::model()->findByPk($blacklist_id);
            $blacklist_details->status = !$blacklist_details->status;
            $blacklist_details->update();
            Yii::app()->user->setFlash('success', "Successfully changed blacklist status");
        }
        $this->redirect(Yii::app()->getBaseUrl(true) . '/my-profile/my-black-list');
    }

    public function actionAddBlackList(){
        $customer_name = Yii::app()->request->getParam('customer_name','');
        $national_id = Yii::app()->request->getParam('national_id','');
        $phone = Yii::app()->request->getParam('phone','');
        $address = Yii::app()->request->getParam('address','');
        $reason = Yii::app()->request->getParam('reason','');
        $reported_by = Yii::app()->request->getParam('reported_by','');
        $todays_date = new \DateTime();
        $blacklist_customer = new Blacklist();
        $blacklist_customer->name = $customer_name;
        $blacklist_customer->nid = $national_id;
        $blacklist_customer->phone = $phone;
        $blacklist_customer->address = $address;
        $blacklist_customer->reason = $reason;
        $blacklist_customer->reported_by = $reported_by;
        $blacklist_customer->create_date = $todays_date->format('Y-m-d');
        if($blacklist_customer->save()){
            Yii::app()->user->setFlash('success', "Successfully added blacklist customer");
            $this->redirect(Yii::app()->getBaseUrl(true) . '/my-profile/my-black-list'); 
        } else {
            Yii::app()->user->setFlash('error', "Error in adding blacklist customer");
            $this->redirect(Yii::app()->getBaseUrl(true) . '/my-profile/add-black-list');
        }
        
    }

    public function actionListAllISP(){
        $image_helper = new ImageHelper();

        $isp_user_ids = [];
        if(isset($_GET['submit']) && $_GET['submit'] == 'Search' ){
            $isp_name = $_GET['isp_name'];
            $isp_criteria = new CDbCriteria();
            $isp_criteria->condition = 'register_type = :register_type AND user_status = :user_status AND enterprise_name LIKE :enterprise_name';
            $isp_criteria->params = [':register_type' => 'business', ':user_status' => 1, ':enterprise_name' => '%'.$isp_name.'%'];
            $isp_user_list = Register::model()->findAll($isp_criteria);
            foreach ($isp_user_list as $user) {
                $isp_user_ids[] = $user->id;
            }
            if(empty($isp_user_list)){
                Yii::app()->user->setFlash('error', "No ISP found with given search keyword. Please find other available ISP below:");
            }
        }
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(['active'=>1]);
        $criteria->addCondition('isp_company_id IS NOT NULL');
        if(!empty($isp_user_ids)){
            $criteria->addInCondition('user_id',$isp_user_ids);
        }
        $isp_list = Estore::model()->findAll($criteria);
        if(!empty($isp_list)){
            shuffle($isp_list);
        }
        
        $this->render('list_all_isp', array(
            'image_helper' => $image_helper,
            'isp_list' => $isp_list
        ));
    }

    public function actionListAllPackages(){
        $image_helper = new ImageHelper();

        $isp_user_ids = [];
        
        $package_list = Generic::getEstoreProducts();

        if (is_array($package_list) && count($package_list) > 1) {
            shuffle($package_list);
        }
        
        $this->render('list_all_isp_package', array(
            'image_helper' => $image_helper,
            'package_list' => $package_list
        ));
    }

}
