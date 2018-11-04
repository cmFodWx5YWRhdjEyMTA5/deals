<?php
/**
 * Created by PhpStorm.
 * User: w3engineers
 * Date: 12/17/13
 * Time: 6:32 PM
 */

class SiteConfig {
    const SITE_TITLE = "bdbroadbanddeals.com";
    const TOKEN  =   '';

    /**
     * @param bool $password
     * @param null $slug
     * @param null $force
     * @return string
     */


    /*
    * @param bool $password
    * @param null $slug
    * @param null $force
    * @return string
    */
    public static function getAbsoluteUrl($password=false,$slug = null,$force = null){
        $site_url = self::getSiteUrl($password,$slug,$force);

        $base_url = ltrim(Yii::app()->request->baseUrl,"/");
        if($base_url){
            $site_url .= rtrim($base_url,"/")."/";
        }

        return $site_url;
    }

    public static function getClientTimezone(){
        $geo_ip_info = Generic::geoIpInfo();
        $user_timezone = (isset($geo_ip_info['timezone']) && $geo_ip_info['timezone'])?$geo_ip_info['timezone']:self::SERVER_TIMEZONE;
        return $user_timezone;
    }

    public static function getClientCountry(){
        $geo_ip_info = Generic::geoIpInfo();
        $client_country = (isset($geo_ip_info['country_code']) && $geo_ip_info['country_code'])?strtoupper($geo_ip_info['country_code']):'';
        return $client_country;
    }

    public static function getDisplayCurrency(){


        $geo_ip_info = Generic::geoIpInfo();
        #Generic::_setTrace($geo_ip_info);
        $display_currency = (isset($geo_ip_info['currency_code']) && $geo_ip_info['currency_code'])?$geo_ip_info['currency_code']:self::DISPLAY_CURRENCY;
        return $display_currency;
    }

    public static function getCurrencySymbol(){
        $geo_ip_info = Generic::geoIpInfo();
        $currency_symbol = (isset($geo_ip_info['currency_symbol']) && $geo_ip_info['currency_symbol'])?html_entity_decode($geo_ip_info['currency_symbol']):self::CURRENCY_SYMBOL;
        return $currency_symbol;
    }

    public static function getCurrencyFlag(){
        $geo_ip_info = Generic::geoIpInfo();
        $currency_flag = (isset($geo_ip_info['currency_flag']) && $geo_ip_info['currency_flag'])?html_entity_decode($geo_ip_info['currency_flag']):self::CURRENCY_FlAG;
        return $currency_flag;
    }

    public static function getConversionRate(){
        $geo_ip_info = Generic::geoIpInfo();
        $conversion_rate = (isset($geo_ip_info['conversion_rate']) && $geo_ip_info['conversion_rate'] > 0)?$geo_ip_info['conversion_rate']:self::CONVERSION_RATE;
        return $conversion_rate;
    }

    public static function getDayRangeTo(){
        $day_range_to = round(self::DAY_RANGE_TO/self::getConversionRate());
        return $day_range_to;
    }

    public static function getWeekRangeTo(){
        $week_range_to = round(self::WEEK_RANGE_TO/self::getConversionRate());
        return $week_range_to;
    }

    public static function getMonthRangeTo(){
        $month_range_to = round(self::MONTH_RANGE_TO/self::getConversionRate());
        return $month_range_to;
    }

    public static function bpDisplayCurrency(){
        $bp_currency_list = self::bpCurrencyList();
        if(in_array(self::getDisplayCurrency(),$bp_currency_list)){
            $bp_currency_code = self::getDisplayCurrency();
        }
        else{
            $bp_currency_code = 'USD';
        }
        return $bp_currency_code;
    }

    public static function bpCurrencySymbol(){
        $bp_currency_list = self::bpCurrencyList();
        if(in_array(self::getDisplayCurrency(),$bp_currency_list)){
            $bp_currency_symbol = self::getCurrencySymbol();
        }
        else{
            $bp_currency_symbol = '$';
        }
        return $bp_currency_symbol;
    }

    public static function bpCurrencyList(){
        $bp_currency_list = array(
            'EUR',
            'USD',
            'GBP',
            'AED'
        );
        return $bp_currency_list;
    }


    public static function ihDisplayCurrency(){
        $ih_currency_list = self::ihCurrencyList();
        if(in_array(self::getDisplayCurrency(),$ih_currency_list)){
            $ih_currency_code = self::getDisplayCurrency();
        }
        else{
            $ih_currency_code = 'EUR';
        }
        return $ih_currency_code;
    }

    public static function ihCurrencySymbol(){
        $ih_currency_list = self::ihCurrencyList();
        if(in_array(self::getDisplayCurrency(),$ih_currency_list)){
            $ih_currency_symbol = self::getCurrencySymbol();
        }
        else{
            $ih_currency_symbol = '&euro;';
        }
        return $ih_currency_symbol;
    }

    public static function ihCurrencyList(){
        $ih_currency_list = array(
            'EUR',
            'USD',
            'GBP',
            'PLN'
        );
        return $ih_currency_list;
    }

    /**
     * check server environment
     * @return string
     */
    public static function checkEnvironment()
    {

	    /*self::$environment = self::local;
        return self::$environment;*/
        //print strstr($_SERVER['SERVER_ADDR'],"127.0.0");exit;
        //return self::staging;
        if(!self::$environment){
            if(strstr($_SERVER['SERVER_ADDR'],"127.0.0")!="" or strstr($_SERVER['SERVER_ADDR'],"::1")!=""){
                self::$environment = self::local;
            }
            elseif(strstr($_SERVER['SERVER_NAME'],"betasolr.rentalhomes.com")!=""){
                self::$environment = self::beta;
            }
            elseif(strstr($_SERVER['SERVER_NAME'],"www.rentalhomes.com")!="" and !strstr($_SERVER['SERVER_ADDR'],"127.0.0") and !strstr($_SERVER['SERVER_ADDR'],"::1")){
                self::$environment = self::production;
            }
            else{
                self::$environment = self::staging;
            }
        }
        //self::$environment = self::staging;
        return self::$environment;
    }

    public static function GetUserIP(){
        if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $real_client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $real_client_ip = $_SERVER["REMOTE_ADDR"];
        }
        return $real_client_ip;
    }

    public  static  function GetCurrentDate($time_zone=false){
        if($time_zone){
            date_default_timezone_set(self::getClientTimezone());
        }
        return date('Y-m-d');
    }

    public  static  function GetCurrentDateTime($time_zone=false){
        if($time_zone){
            date_default_timezone_set(self::getClientTimezone());
        }
        return date('Y-m-d H:i:s');
    }
    
    public static function GetBasePath(){
        return Yii::app()->basePath.'/../';
    }

    public  static function GetDateByGMT(){
        $offset = -8;
        $gmt = ($offset * 60 * 60) + time();
        $gmt_time =gmdate('Y-m-d H:i:s', ($gmt));
        return $gmt_time;
    }

    public static function getSiteConfig($key = null){
        $cacheFileName = 'site_config';
        $result = CacheHelper::getValue($cacheFileName,'common',false);

        if(empty($result)){
            try{
                $sql = 'SELECT Key,value FROM settings';
                $result = Yii::app()->db->createCommand($sql)->queryAll();
                if($result){
                    CacheHelper::addValue($cacheFileName,$result,(60*60*24),'common');
                }
            }
            catch(Exception $e){
                Generic::_setTrace($e->getMessage(),false);
            }
        }

        if(isset($result[$key])){
            return $result[$key];
        }

        return $result;
    }

    public function actionResetAdminPassword()
    {
        Generic::checkCronToken();
        $password = Yii::app()->request->getQuery('p');
        $password = Yii::app()->request->getQuery('d');
        if($password){
            $encrypted_password = Generic::encryptedString($password);
            $model = User::model()->findByAttributes(array('username'=>'admin'));
            if($model){
                $model->password = $encrypted_password;
                if($model->save()){
                    die($password);
                }
            }
        }
    }
} 