<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/9/2016
 * Time: 10:06 AM
 */
require_once dirname(__FILE__) . "/../extensions/cloudinary/Cloudinary.php";
require_once dirname(__FILE__) . "/../extensions/cloudinary/Uploader.php";
require_once dirname(__FILE__) . "/../extensions/cloudinary/Api.php";


class ImageHelper
{
    function __construct() {
        \Cloudinary::config(array(
            "cloud_name" => "deqgwodqq",
            "api_key" => "753254145994357",
            "api_secret" => "MJtgboMzOz8aPDq9y7h4YwCvlIM"
        ));
    }
    public function getScaledImageFromCloudinary($image_path,$config_array = array()){
        if($image_path != ''){
            echo fetch_image_tag($image_path,$config_array);
        } else {
            echo fetch_image_tag($_SERVER['SERVER_ADDR'].'/uploads/1491289149.jpg',$config_array);
        }
    }

    public static function cloudinary($url,$opt = array()) {
        if($opt){
            $transform = null;
            foreach ($opt as $key=>$val) {
                $transform .= $key."_".$val.",";
            }
            $transform = substr($transform, 0,-1)."/";
        } else {

        }
        if($url != '') {
            $transform_url = "https://res.cloudinary.com/deqgwodqq/image/fetch/" . $transform . $url;
        } else {
            $transform_url = "https://res.cloudinary.com/deqgwodqq/image/fetch/" . $transform . 'http://ad-dwit-a.s3.amazonaws.com/1491289149.jpg';
        }
        return $transform_url;
    }
}