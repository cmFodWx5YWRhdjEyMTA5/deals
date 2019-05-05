<?php
/**
 * Created by PhpStorm.
 * User: Khashrul
 * Date: 7/24/15
 * Time: 10:31 AM
 */
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config/SiteConfig.php');
require_once dirname(__FILE__) . "/../extensions/mailer/class.phpmailer.php";
require_once dirname(__FILE__) . "/../extensions/maxmind/Reader.php";
require_once dirname(__FILE__) . "/../extensions/mpdf/mpdf.php";

class Generic
{
    public static function getResponse()
    {
        $param = array();
        $search = Yii::app()->request->getParam('search');
        $page = Yii::app()->request->getParam('page');
        $param['search'] = $search;
        $param['page'] = $page;
        return $param;
    }

    public static function _setTrace($param, $debug = true)
    {
        if (is_string($param)) {
            print "$param";
        } else {
            print "<pre>";
            print_r($param);
            print "<pre>";
        }
        print"<hr/>";
        if ($debug) {
            exit();
        }
    }

    public static function send_mail($email, $message, $subject)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                   // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                            // Enable SMTP authentication
        $mail->Username = 'khashrul.cse@gmail.com';          // SMTP username
        $mail->Password = 'ALAM090116'; // SMTP password
        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                 // TCP port to connect to
        $mail->setFrom('khashrul.cse@gmail.com', 'DewyIT BD');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
        return true;
    }

    public static function sendMail($content, $subject, $to, $from="bdbroadbanddeals.com <support@bdbroadbanddeals.com>", $debug = false,$cc=false, $bcc = false ,$style='')
    {

        if (isset($content) && gettype($content) == 'array') {
            $content = json_encode($content);
        }

        $body = "<!DOCTYPE html>
                <html>
                <head>
                    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0' />
                    <title>$subject</title>
                    <!-- Facebook sharing information tags -->
                    <meta property='og:title' content='' />
                    <style type='text/css'>
                        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}

                         table {border-spacing:0;}
                        table td {border-collapse:collapse;}
                        p {margin:0; padding:0; margin-bottom:0;}
                        body, #body_style {width:100% !important; min-height:1000px;  background-color:#f0f0f0; }
                        /* Target mobile devices. */
                        /* @media only screen and (max-device-width: 639px) { */
                        @media only screen and (max-width: 639px) {
                            body[yahoo] .hide {display:none !important;}
                            body[yahoo] .table {width:320px !important;}
                            body[yahoo] .innertable {width:280px !important;}
                            /* Resize hero image at smaller screen sizes. */
                            body[yahoo] .heroimage {width:280px !important; height:100px !important;}
                            /* Resize page shadow at smaller screen sizes. */
                            body[yahoo] .shadow {width:280px !important; height:4px !important;}
                            /* Collapse cells at smaller screen sizes. */
                            body[yahoo] .collapse-cell {width:320px !important;}
                            /* Range social icons left at smaller screen sizes. */
                            body[yahoo] .social-media img {float:left !important; margin:0 1em 0 0 !important;}
                        }
                        /* Target tablet devices. */
                        /* @media only screen and (min-device-width: 640px) and (max-device-width: 1024px) { */
                        @media only screen and (min-width: 640px) and (max-width: 1024px) {
                        }
                        img {display:block; border:none; outline:none; text-decoration:none;}
                        /* Remove spacing around Outlook 07, 10 tables */
                        table {border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
                    </style>
                    $style
                </head>
                <body style='width:650px !important; margin:0 auto; height:600px; padding:25px 15px !important; color: #222; line-height:27px;'  yahoo='fix'>
                    <div id='body_style'>
                         $content
                    </div>
                </body>
                </html>";


        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        if ($cc) {
            $headers .= 'Cc: ' . $cc . " \r\n";
        }
        if ($bcc) {
            $headers .= 'Bcc: ' . $bcc . " \r\n";
        }


        // sending mail
        if (@mail($to, $subject, $body, $headers, '-f support@bdbroadbanddeals.com')) {

            return true;
        }

    }


    /*
     * sends otp to email
     */
    public static function sendOTPtoMail($otp, $subject, $to, $from="bdbroadbanddeals.com <support@bdbroadbanddeals.com>", $debug = false,$cc=false, $bcc = false ,$style='')
    {
        $current_time = new \DateTime();
        $remote_ip = Generic::getUserIP();
        $body = "<p>Dear Member, for your online registration. Please use this Secure Code, your One-Time Password is ".$otp." use within 5 minutes. Thank You! </p>";
        $body .= "<br><br><p>originated at ".$current_time->format('d M Y H:i:s')."</p>";
        $body .= "<p>originated from ".$remote_ip."</p>";


        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        if ($cc) {
            $headers .= 'Cc: ' . $cc . " \r\n";
        }
        if ($bcc) {
            $headers .= 'Bcc: ' . $bcc . " \r\n";
        }

        // sending mail
        if (@mail($to, $subject, $body, $headers, '-f support@bdbroadbanddeals.com')) {
            return true;
        }
        return false;

    }

    public static function sendOTPMessage($otp,$phone){
        $phone = trim($phone,'+');
        // set 88 as prefix if not mentioned
        /*if(substr($phone, 0, 2) !== '88'){
            $phone = '88'.$phone;
        }*/
        $esms_endpoint = 'https://portal.adnsms.com/api/v1/secure/send-sms';
        $api_key = 'KEY-d13n84aob42hzfxmtkmwfr3dt031osbp';
        $api_secret = 'u@IDtjt40qynSwED';
        $message = $otp." is your order verification code";
        
        $post_fields = json_encode([
            'api_key' => $api_key,
            'api_secret' => $api_secret,
            'request_type' => 'OTP',
            'message_type' => 'TEXT',
            'mobile' => $phone,
            'message_body' => $message,
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $esms_endpoint,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $post_fields,
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));

        $result = curl_exec($curl);
    }

    public static function validateUploadImage($model, $attribute)
    {

        $imageInstance = CUploadedFile::getInstance($model, $attribute);
        return $imageInstance;
    }

    public static function uploadImage($imageInstance, $image_name, $image_path, $width = 0, $height = 0)
    {
        if ($imageInstance and ($imageInstance->getExtensionName())) {

            $allowed_image_type = self::getAllowedImage();
            $image_type = $imageInstance->getExtensionName();
            if (!in_array($image_type, $allowed_image_type)) {

                return 'Invalid image type';
            }
            $base_path = Yii::app()->basePath . "/../uploaded/";
            $image_name = $image_name . "." . $image_type;

            $image_thumb = 'thumb-' . $image_name;

            $image_base = $base_path . $image_path . "/";
            self::createDirectory($image_base);
            if ($imageInstance->saveAs($image_base . $image_name)) {
                //Create thumb for grid view
                /*     try{
                         self::thumbGenerator($image_base.$image_name, $image_base.$image_thumb, 85, 75);
                     }
                     catch (Exception $ex){
                     }
                     if($width > 0){
                         try{
                             self::thumbGenerator($image_base.$image_name, $image_base.$image_name, $width, $height);
                         }
                         catch(Exception $ex){
                             @unlink($image_base.$image_name);
                             Yii::app()->user->setFlash("error", "Image Upload failed! <br />".$ex->getMessage());
                             return false;
                         }
                     }*/
                return $image_name;
            }
        }
        return false;
    }

    public static function getAllowedImage()
    {
        $image_extensions = array('jpg', 'jpeg', 'png', 'gif');
        return $image_extensions;
    }

    public static function thumbGenerator($source, $destination, $width, $height)
    {
        $thumbnail_width = $width;
        $thumbnail_height = $height;
        $thumb_beforeword = "thumb";
        $arr_image_details = getimagesize($source); // pass id to thumb name
        $original_width = $arr_image_details[0];
        $original_height = $arr_image_details[1];
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);
        if ($arr_image_details[2] == 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        } elseif ($arr_image_details[2] == 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } elseif ($arr_image_details[2] == 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        }
        if (isset($imgt)) {
            $old_image = $imgcreatefrom($source);
            $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
            imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
            return $imgt($new_image, $destination);
        }
    }

    public static function createDirectory($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    public static function showImage($folder, $image, $title = '', $thumb = true, $width = 80, $height = 80)
    {
        $image = '<a href="'.self::getImagePath($image).'" target="_blank"><img width="' . $width . '" height="' . $height . '" title="' . $title . '" src="' . self::getImagePath($image) . '" alt="' . $title . '" /></a>';
        return $image;
    }

    public static function showSingleImage($folder, $image, $title = '', $thumb = true, $width = 80, $height = 80)
    {
        $image = '<a href="'.$image.'" target="_blank"><img width="' . $width . '" height="' . $height . '" title="' . $title . '" src="' . $image . '" alt="' . $title . '" /></a>';
        return $image;
    }

    public static function getImagePath($image)
    {


        $file = json_decode($image, true);
        $file = $file[0];

        return $file;

    }

    public static function getCategoriesName($categories){
        $category_ids = explode(',',$categories);
        $category_name = array();
        foreach($category_ids as $category_id){
            $category = Category::model()->findByPk($category_id);
            if($category) {
                array_push($category_name,$category->category_name);
            }
        }
        return implode(',',$category_name);
    }

    public static function getPlanName($store_id){
        $store_details = Estore::model()->findByPk($store_id);
        $isp_company_id = $store_details->isp_company_id;
        if(!empty($isp_company_id)){
            $isp_details = ISP_details::model()->findByPk($store_details->isp_company_id);
            if($isp_details->no_of_thana <= 3 && $isp_details->no_of_thana >=1){
                return "Basic";
            } elseif ($isp_details->no_of_thana <= 10 && $isp_details->no_of_thana >=4) {
                return "Silver";
            } elseif ($isp_details->no_of_thana <= 30 && $isp_details->no_of_thana >=11) {
                return "Gold";
            } else {
                return "Diamond";
            }
        } else {
            $plan_name = '';
        
            $criteria = new CDbCriteria();
            $criteria->condition = 'estore_id = :estore_id';
            $criteria->params = array(':estore_id' => $store_id);
            $plan_details = Subscription_plan::model()->find($criteria);
            switch ($plan_details->plan_type){
                case 1:
                    $plan_name = 'standard';
                    break;
                case 2:
                    $plan_name = 'silver';
                    break;
                case 3:
                    $plan_name = 'platinum';
                    break;

            }
        
            return $plan_name;
        }
    }

    public static function getPlanStatus($store_id){

        $store_details = Estore::model()->findByPk($store_id);
        $isp_company_id = $store_details->isp_company_id;
        if(!empty($isp_company_id)){
            $isp_details = ISP_details::model()->findByPk($store_details->isp_company_id);
            return $isp_details == 1 ? 'Active' : 'Inactive';
        } else {
            $plan_status = 'Inactive';
            $criteria = new CDbCriteria();
            $criteria->condition = 'estore_id = :estore_id';
            $criteria->params = array(':estore_id' => $store_id);
            $plan_details = Subscription_plan::model()->find($criteria);
            switch ($plan_details->plan_type){
                case 0:
                    $plan_status = 'Inactive';
                    break;
                case 2:
                    $plan_status = 'Active';
                    break;
            }
            return $plan_status;
        }
    }

    public static function getPlanExpireDate($store_id){
        $store_details = Estore::model()->findByPk($store_id);
        $isp_company_id = $store_details->isp_company_id;

        if(!empty($isp_company_id)){
            $isp_details = ISP_details::model()->findByPk($store_details->isp_company_id);
            $plan_expire_date_object = new \DateTime($isp_details->expire_date);
            $plan_expire_date = $plan_expire_date_object->format('d M,Y');
            return $plan_expire_date;
        } else {
            $plan_expire_date = '';
            $criteria = new CDbCriteria();
            $criteria->condition = 'estore_id = :estore_id';
            $criteria->params = array(':estore_id' => $store_id);
            $plan_details = Subscription_plan::model()->find($criteria);
            $plan_expire_date_object = new \DateTime($plan_details->expiration_date);
            $plan_expire_date = $plan_expire_date_object->format('d M,Y');
            return $plan_expire_date;
        } 
    }

    public static function getAdPostServiceStatus($store_id){
        $post_service = 'Not Taken';
        if($store_id){
            $criteria = new CDbCriteria();
            $criteria->condition = 'estore_id = :estore_id';
            $criteria->params = array(':estore_id' => $store_id);
            $plan_details = Subscription_plan::model()->find($criteria);
            if($plan_details->additional_service) {
                $post_service = 'Taken';
            }
        }
        return $post_service;
    }

    public static function deleteThumb($thumb, $folder = '')
    {
        if ($folder) $folder = $folder . '/';
        $base_path = Yii::app()->basePath . "/../uploaded/";
        $image_base = $base_path . $folder . '/' . $thumb;
        $image_thumb = $base_path . $folder . '/thumb-' . $thumb;
        @unlink(trim($image_base));
        @unlink(trim($image_thumb));
    }

    public static function slugToUrl($slug)
    {
        $replacement = array(',', ' ', '\'', '"', '`', '$', '~', '!', '@', '#', '%', '^', '(', ')', '{', '}', '[', ']', '<', '>', '.', '\\', ';', '?', '*', '=', '|', ':', '/');
        $url = strtolower(str_replace($replacement, '-', $slug));
        $url = str_replace('&', '-and-', $url);
        $url = preg_replace('/[\-]+/', '-', $url);
        $url = trim($url, ' -');
        return $url;
    }


    public static function getAllowedFile()
    {
        $file_extensions = array('jpg', 'jpeg', 'png', 'gif', 'zip', 'pdf', 'msword');
        return $file_extensions;
    }

    public static function uploadFile($fileInstance, $file_name, $file_path, $width = 0, $height = 0)
    {

        if ($fileInstance and ($fileInstance->getExtensionName())) {

            $allowed_image_type = self::getAllowedFile();
            $file_type = $fileInstance->getExtensionName();
            if (!in_array($file_type, $allowed_image_type)) {

                return 'Invalid File type';
            }
            $base_path = Yii::app()->basePath . "/../uploaded/";
            $image_base = $base_path . $file_path . "/";
            Generic::createDirectory($image_base);
            if ($fileInstance->saveAs($image_base . $file_name)) {
                move_uploaded_file($file_name, $image_base);
                return $file_name;


            }


        }
        return false;
    }

    public static function generateToken($unique = true)
    {

        $token = time() . SiteConfig::GetUserIP();
        return $token;
        if (isset(Yii::app()->request->cookies['user_token']) && Yii::app()->request->cookies['user_token']) {
            $user_token = Yii::app()->request->cookies['user_token'];
            if ($unique) {
                /* Generate token when user is not logged in */
                if (Yii::app()->user->isGuest) {
                    $user = TblRegister::model()->findByAttributes(array(
                        'user_token' => $user_token
                    ));

                    if ($user) {
                        $user_token = $token;
                    }
                }
            }
        } else {
            $user_token = $token;
            if ($unique) {
                /* Generate token when user is not logged in */
                if (!Yii::app()->user->isGuest) {
                    $user = TblRegister::model()->findByPk(Yii::app()->user->id);
                    if ($user && $user->oz_u_token) {
                        $user_token = $user->oz_u_token;
                    }
                }
            }

        }

        return $user_token;
    }

    public static function checkToken()
    {
        if (!Yii::app()->request->cookies->contains('user_token')) {
            $token = self::generateToken();
            $set_user_token = new CHttpCookie("user_token", $token);
            $set_user_token->path = "/";
            $set_user_token->expire = time() + (60 * 60 * 24 * 365);
            Yii::app()->request->cookies['user_token'] = $set_user_token;
        }

        return Yii::app()->request->cookies['user_token'];
    }

    public static function executeSql($sql)
    {
        try {
            return Yii::app()->db->createCommand($sql)->execute();
        } catch (Exception $ex) {
            Generic::_setTrace($ex->getMessage());
        }

        return false;
    }

    public static function getProfileData($token)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_register')
            ->where('user_token=:user_token', array(':user_token' => $token))
            ->andwhere('user_status = :status',array(':status' => 1))
            ->queryRow();

        return $result;
    }

    public static function getUserData($user_id)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_register')
            ->where('id=:id', array(':id' => $user_id))
            ->queryRow();

        return $result;
    }

    public static function getAllCategory()
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->addCondition('parent_id = :parent_id');
        $criteria->addCondition('category_type = :category_type');
        $criteria->params = array(
            ':parent_id' => 0,
            ':category_type' => 1,
        );
        $result = Yii::app()->db->commandBuilder->createFindCommand(Category::model()->tableName(), $criteria)->queryAll();
        return $result;
    }

    public static function getAllCategoryPromotion()
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->addCondition('parent_id = :parent_id');
        $criteria->addCondition('category_type = :category_type');
        $criteria->params = array(
            ':parent_id' => 0,
            ':category_type' => 2,
        );
        $result = Yii::app()->db->commandBuilder->createFindCommand(Category::model()->tableName(), $criteria)->queryAll();
        return $result;
    }



    public static function getSubcategories($category_id){
        $criteria = new CDbCriteria();
        $criteria->addCondition('parent_id = :parent_id');
        $criteria->params = array(
            ':parent_id' => $category_id,
        );
        $result = Yii::app()->db->commandBuilder->createFindCommand(Category::model()->tableName(), $criteria)->queryAll();
        return $result;
    }

    public static function getAllCategoryData()
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $result = Yii::app()->db->commandBuilder->createFindCommand(Category::model()->tableName(), $criteria)->queryAll();
        return $result;
    }


    public static function getAllSubCategory($subcategory_slug)
    {

        $subcategory_list = array(
            'tv_n_entertainment' => array(
                '3D TV',
                'LED TV',
                'Smart Phones',
                'Home Theater',
            ),

            'home_appliances' => array(
                'Refrigerator',
                'Air Conditioner',
                'Microwave Oven',
                'Washing Machine',
                'Deep Freezer',
                'Home Improvement',
                'Air Cooler',
                'Dish Washer',
            ),
            'kitchen_appliances' => array(
                'Mixer Grinder',
                'Blander & Juicer',
                'Electric Kettle',
                'Gas Burner',
                'Rice Cooker',
                'Pressure Cooker',
                'Curry Cooker',
                'Induction cooker',
                'Toaster & Sandwich maker',
                'Coffee cooker',
                'Ruti & Snack Maker',
            ),
            'small_appliances' => array(
                'Baby Care',
                'Iron',
                'Vacuum Cleaner',
                'Beauty & Health',
                'Sewing Machine',
                'Thermopot',
                'Curry Cooker',
                'Water Purifiers',
            ),

            'electrical_n_power' => array(
                'Ceiling Fan',
                'Stand Fan',
                'Emergency Fan',
                'Emergency Light',
                'Rechargeable Light',
                'Generator',

            ),
            'motorcycles' => array(
                'Bajaj',
                'Yamaha',
                'TVS',
                'Honda',
                'Hero',
                'Suzuki',
                'Keeway',
                'Walton',
                'Dayun',
                'Lifan',
                'Haojue',
                'Znen',
                'Mahindra',
                'Pegasus',
                'Victor-R',
                'Regal Raptor',
                'Atlas Zongshen',
                'SYM',
                'Zongshen',
                'Motrac',
            ),
            'auto_rickshaw' => array(
                'CNG',
                'MAXIMA',
                'Esybike',

            ),
            'passenger_car' => array(
                'Toyota',
                'Honda',
                'Nissan',
                'Mitsubishi',
                'SEAT',
                'Hyundai',
                'BMW',
                'Mercedes',
                'Kia',
                'Suzuki',
                'Mazda',
                'Lexus',
                'Ford',
                'Maruti Suzuki',
                'Jeep',
                'Land Rover',
                'Proton',
                'Volvo',
            ),
            'sport_utility_vehicle' => array(),

            'microbus_ambulance' => array(),
            'pickup_van' => array(),
            'bus' => array(),
            'truck' => array(),
            'android_phones' => array(
                'Samsung',
                'Symphony',
                'Walton',
                'Huawei',
                'HTC',
                'Sony',
                'Nokia',
            ),
            'agro_products' => array(
                'Rice /Wheat',
                'Dairy Firm',
                'Fish Feed',
                'Shrimp feed',
                'Cattle feed',

            ),
        );
        $brands = array();
        foreach ($subcategory_list as $key => $value) {
            if ($key === $subcategory_slug) {
                $brands[] = $value;
            }
        }

        return $brands;
    }

    public static function getAllDistrict()
    {
        return array(
            'Dhaka', 'khulna', 'Rajshahi', 'Chittagong'
        );
    }

    public static function getJobType()
    {
        return array('Permanent', 'Part-time', 'Contractual');
    }

    public static function getAllBrandName($subcategory_slug)
    {

        $subcategory_list = array(
            'tv_n_entertainment' => array(
                'LG',
                'Samsung',
                'Sony',
                'Conion',
                'Sharp',
                'Toshiba',

            ),

            'home_appliances' => array(
                'Refrigerator',
                'Air Conditioner',
                'Microwave Oven',
                'Washing Machine',
                'Deep Freezer',
                'Home Improvement',
                'Air Cooler',
                'Dish Washer',
            ),
            'kitchen_appliances' => array(
                'Mixer Grinder',
                'Blander & Juicer',
                'Electric Kettle',
                'Gas Burner',
                'Rice Cooker',
                'Pressure Cooker',
                'Curry Cooker',
                'Induction cooker',
                'Toaster & Sandwich maker',
                'Coffee cooker',
                'Ruti & Snack Maker',
            ),
            'small_appliances' => array(
                'Baby Care',
                'Iron',
                'Vacuum Cleaner',
                'Beauty & Health',
                'Sewing Machine',
                'Thermopot',
                'Curry Cooker',
                'Water Purifiers',
            ),

            'electrical_n_power' => array(
                'Ceiling Fan',
                'Stand Fan',
                'Emergency Fan',
                'Emergency Light',
                'Rechargeable Light',
                'Generator',

            ),
            'motorcycles' => array(
                'Bajaj',
                'Yamaha',
                'TVS',
                'Honda',
                'Hero',
                'Suzuki',
                'Keeway',
                'Walton',
                'Dayun',
                'Lifan',
                'Haojue',
                'Znen',
                'Mahindra',
                'Pegasus',
                'Victor-R',
                'Regal Raptor',
                'Atlas Zongshen',
                'SYM',
                'Zongshen',
                'Motrac',
            ),
            'auto_rickshaw' => array(
                'CNG',
                'MAXIMA',
                'Esybike',
                'Emergency Light',
                'Rechargeable Light',
                'Generator',
            ),
            'passenger_car' => array(
                'Toyota',
                'Honda',
                'Nissan',
                'Mitsubishi',
                'SEAT',
                'Hyundai',
                'BMW',
                'Mercedes',
                'Kia',
                'Suzuki',
                'Mazda',
                'Lexus',
                'Ford',
                'Maruti Suzuki',
                'Jeep',
                'Land Rover',
                'Proton',
                'Volvo',
            ),
            'sport_utility_vehicle' => array(),

            'microbus_ambulance' => array(),
            'pickup_van' => array(),
            'bus' => array(),
            'truck' => array(),
            'android_phones' => array(
                'Samsung',
                'Symphony',
                'Walton',
                'Huawei',
                'HTC',
                'Sony',
                'Nokia',
            ),
        );
        $brands = array();
        foreach ($subcategory_list as $key => $value) {
            if ($key === $subcategory_slug) {
                $brands[] = $value;
            }
        }

        return $brands;
    }

    public static function getCategoryName($category_slug)
    {

        $result = Yii::app()->db->createCommand()
            ->select('category_name')
            ->from('tbl_category')
            ->where('category_slug=:category_slug', array(':category_slug' => $category_slug))
            ->queryRow();

        return $result;
    }

    public static function getSubCategoryName($sub_category_slug)
    {

        $result = Yii::app()->db->createCommand()
            ->select('category_name')
            ->from('tbl_category')
            ->where('sub_category_slug=:sub_category_slug', array(':sub_category_slug' => $sub_category_slug))
            ->queryRow();

        return $result;

    }

    public static function getCategoryId($category_slug = "", $sub_category_slug = "")
    {
        $command = Yii::app()->db->createCommand()
            ->select('category_id')
            ->from('tbl_category');
        if ($sub_category_slug) {
            $command->where('sub_category_slug = :sub_category_slug', array(':sub_category_slug' => $sub_category_slug));
        } else {
            $command->where('category_slug = :category_slug', array(':category_slug' => $category_slug));
        }

        $result = $command->queryRow();
        return $result['category_id'];
    }

    /*
     * function getCategoryDetails
     * @param int category_id
     * return array category_details
     */
    public static function getCategoryDetails($category_id)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_category')
            ->where('category_id = :category_id', array(':category_id' => $category_id))
            ->queryRow();
        return $result;
    }

    public static function getUserId($token)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_register')
            ->where('user_token = :user_token', array(':user_token' => $token))
            ->queryRow();
        return $result;
    }

    public static function getAllJobTypes()
    {

        $all_job_Type = array(
            'Accounting & Finance',
            'Administrative & Office',
            'Advertisement & Event Management',
            'Airline & Travel',
            'Architecture & Engineering',
            'Bank, Insurance & Leasing',
            'Commercial & Supply Chain',
            'Consultancy',
            'Customer Support & Call Centre',
            'Data Entry, Operator, BPO',
            'Design & Creative',
            'Education & Training',
            'Fashion Designing & Merchandising',
            'Food & Hospitality',
            'Garments & Textile',
            'Graphic & Web design',
            'Human resource',
            'IT & Software Development',
            'Legal',
            'Marketing & PR',
            'Medical & Pharmaceuticals',
            'Non Profit N.G.O',
            'Overseas Jobs',
            'Part Time & Temps',
            'Real Estate & Construction',
            'Sales & Biz development',
            'Secretary & Receptionist',
            'Telecom',
            'TV & Film',
            'Other Jobs',


        );
        return $all_job_Type;
    }


    /*
     * function getAdDetailsFromAdTable
     * $param int ad_id
     * @return result
     */
    public static function getAddDetailsFromAddTable($ad_id)
    {
        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads ')
            ->where('id=:ad_id', array(':ad_id' => $ad_id))
            ->queryRow();
        return $data_result;
    }

    /*
     * function getAdDetailsFromAdTable
     * $param int user_id
     * @return result
     */

    public static function getAdDetailsFromAddTable($user_id,$limit = 0,$offset = 0)
    {
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads ')
            ->where('user_id=:user_id', array(':user_id' => $user_id));
        if ($limit) {
            $command->limit($limit);
        }
        if ($offset) {
            $command->offset($offset);
        }
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;
    }

    /*
     * function getAdDetailsFromCategory
     * @param int category_id
     * @param int active
     * @return mixed result
     */
    public static function getAdDetailsFromCategory($category_ids, $condition_array, $table = "tbl_ads", $country_code ="",$show = false, $offset = false, $maximum_price = false, $minimum_price = false, $is_featured = false, $is_premium = false, $is_hot = false, $is_top = false, $location = false, $order = "id desc",$business_type=false)
    {

        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;
        $user_ip = SiteConfig::GetUserIP();

        // check if region name is set
        $country_details = Generic::checkForStoredCountry();

        // --------------------- :Todo Geo location search is disabled. Need to work on this section
        //$user_ip = "180.234.143.72";
//        $geoinfo = Generic::getGeoInfo($user_ip);
//        $latitude = $geoinfo['geoplugin_latitude'];
//        $longitude = $geoinfo['geoplugin_longitude'];
        $select_string = "*";
        if($business_type){
            $select_string = "*,tr.id as users_id,tas.id as ads_id,tas.create_date as ad_create_date";
        }
        $command = $connection->createCommand()
            ->select($select_string)
//            ->from('( SELECT *, (((acos(sin(('.$latitude.'*pi()/180)) *
//                sin((`latitude`*pi()/180))+cos(('.$latitude.'*pi()/180)) *
//                cos((`latitude`*pi()/180)) * cos((('.$longitude.'-
//                `longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344)
//                as distance
//                FROM '.$table.') temp_table')
            ->from('tbl_ads tas')
            ->where(array('in', 'category_id', $category_ids))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));

        if(!$country_code) {
            if ($country_details) {
                $command->andWhere('country_code =:country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code =:country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($business_type) {
            $command ->join('tbl_register tr', 'tr.id=tas.user_id');
            $command ->andWhere('register_type=:register_type', array(':register_type' => $business_type));
        }


        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }

        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }
        if ($location) {
            $command->andWhere('location =:location', array(':location' => $location));

        }
        foreach ($condition_array as $key => $value) {
            $counter = 1;
            foreach ($value as $val) {
                $command->andWhere($key . ' = :' . $key . $counter, array(':' . $key . $counter => $val));
                $counter++;
            }

        }

        /* if ($table == "tbl_jobs") {
            $command->andWhere('deadline > :current_date', array(':current_date' => $current_date->format('Y-m-d')));
        }*/

        if ($show) {
            $command->limit($show);
        }
        if ($offset) {
            $command->offset($offset);
        }



        $command->order($order);
        $data_result = $command->queryAll();
        return $data_result;
    }


    /*
     * function getAdDetailsFromCategory
     * @param int category_id
     * @param int active
     * @return mixed result
     */
    public static function getFavoriteAdsWith($active = 0, $table = "tbl_ads", $show = 0, $offset = 0)
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->andWhere('active = :active', array(':active' => $active));

        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        if ($show) {
            $command->limit($show);
        }
        if ($offset) {
            $command->offset($offset);
        }
        $data_result = $command->queryAll();
        return $data_result;
    }


    public static function getAddDetailsFromAddMetaTable($ad_id)
    {
        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_ad_meta ')
            ->where('ad_id=:ad_id', array(':ad_id' => $ad_id))
            ->queryAll();
        return $data_result;
    }

    public static function deleteAdDetailsFromAdMetaTable($ad_id)
    {
        $connection = Yii::app()->db;
        $model = $connection->createCommand('DELETE FROM tbl_ad_meta WHERE ad_id=:ad_id');
        $model->bindParam(':ad_id', $ad_id);
        $model->execute();
        return true;
    }

    public static function deleteAdDetailsFromAdTable($ad_id)
    {
        $connection = Yii::app()->db;
        $model = $connection->createCommand('DELETE FROM tbl_ads WHERE id=:ad_id');
        $model->bindParam(':ad_id', $ad_id);
        $model->execute();
        return true;
    }

    public static function deleteJobDetailsFromJobTable($ad_id)
    {
        $connection = Yii::app()->db;
        $model = $connection->createCommand('DELETE FROM tbl_jobs WHERE id=:ad_id');
        $model->bindParam(':ad_id', $ad_id);
        $model->execute();
        return true;
    }

    /*
     * get all meta from job id
     */
    public static function getJobDetailsFromAddMetaTable($job_id)
    {
        $connection = Yii::app()->db;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_job_meta ')
            ->where('job_id=:job_id', array(':job_id' => $job_id))
            ->queryAll();
        return $data_result;
    }

    public static function getParentId($category_slug, $sub_category_slug)
    {

        $connection = Yii::app()->db->createCommand()
            ->select("parent_id")
            ->from('tbl_category');

        if ($sub_category_slug) {
            $connection->where('sub_category_slug = :sub_category_slug', array(':sub_category_slug' => $sub_category_slug));
        } else {
            $connection->where('category_slug = :category_slug', array(':category_slug' => $category_slug));
        }
        $data_result = $connection->queryRow();
        return $data_result['parent_id'];

    }

    public static function getAllSubcategoryData($category_id)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name")
            ->from('tbl_category')
            ->where('parent_id=:category_id', array(':category_id' => $category_id))
            ->queryAll();
        return $data_result;
    }

    /*
     * function getAllSubCategoriesId
     * @param int category_id
     * @return mixed result
     */
    public static function getAllSubCategoriesId($category_id)
    {
        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_id")
            ->from('tbl_category')
            ->where('parent_id=:category_id', array(':category_id' => $category_id))
            ->queryAll();
        return $data_result;
    }

    public static function getSubcategoryId($subCategories = array())
    {
        $subCategoriesId = array();
        foreach ($subCategories as $subCategory) {
            array_push($subCategoriesId, $subCategory['category_id']);
        }
        return $subCategoriesId;
    }

    public static function getCategoryNameFromParentId($parent_id)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name")
            ->from('tbl_category')
            ->where('category_id=:parent_id', array(':parent_id' => $parent_id))
            ->queryAll();

        return $data_result;

    }


    public static function getSubCategoryFromCategoryId($category_id)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name,sub_category_slug,category_id")
            ->from('tbl_category')
            ->where('parent_id=:category_id', array(':category_id' => $category_id))
            ->order(array('category_name asc'))
            ->queryAll();
        return $data_result;

    }


    public static function getCategoryNameFromCategorySlug($category_slug)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name,category_id")
            ->from('tbl_category')
            ->where('category_slug=:category_slug', array(':category_slug' => $category_slug))
            ->queryAll();
        return $data_result;

    }

    public static function getCategoryFromParentId($sub_category_parent_id)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name,sub_category_slug")
            ->from('tbl_category')
            ->where('category_id=:parent_id', array(':parent_id' => $sub_category_parent_id))
            ->queryAll();
        return $data_result;

    }


    public static function getParentIdFromSubcategorySlug($sub_category_slug)
    {

        $connection = Yii::app()->db->createCommand()
            ->select("parent_id")
            ->from('tbl_category')
            ->where('sub_category_slug = :sub_category_slug', array(':sub_category_slug' => $sub_category_slug));

        $data_result = $connection->queryRow();
        return $data_result['parent_id'];

    }

    public static function getSubCategoryFromParentId($parentId)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("category_name,sub_category_slug")
            ->from('tbl_category')
            ->where('parent_id=:parent_id', array(':parent_id' => $parentId))
            ->queryAll();
        return $data_result;

    }


    public static function getProfileDataFromUserID($user_id)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_register')
            ->where('id=:id', array(':id' => $user_id))
            ->queryRow();

        return $result;
    }

    public static function getAllFromAdView($ad_id, $user_ip)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_ad_view')
            ->where('ad_id=:ad_id', array(':ad_id' => $ad_id))
            ->andWhere('ip_address=:ip_address', array(':ip_address' => $user_ip))
            ->queryAll();
        return $data_result;

    }

    public static function getTotalAdView($ad_id)
    {

        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_ad_view')
            ->where('ad_id=:ad_id', array(':ad_id' => $ad_id))
            ->queryAll();
        return $data_result;

    }

    public static function getAllFeaturedProducts($country_code = '',$table = "tbl_ads", $limit = 0)
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('is_featured=:is_featured', array(':is_featured' => 1))
            ->andWhere('active = :active', array(':active' => 1))
            ->order('id DESC');
        if (!$country_code) {
            if ($country_details) {
                $data_command->andWhere('country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($limit){
            $data_command->limit($limit);
        }

        $data_result = $data_command->queryAll();
        return $data_result;
    }

    public static function getAllPremiumProducts($country_code = '',$table = "tbl_ads", $limit = 0)
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('is_premium=:is_premium', array(':is_premium' => 1))
            ->andWhere('active = :active', array(':active' => 1))
            ->order('id DESC');
        if(!$country_code) {
            if ($country_details) {
                $data_command->andWhere('country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($limit){
            $data_command->limit($limit);
        }
        $data_result = $data_command->queryAll();
        return $data_result;
    }

    public static function getAllTopAds($country_code = '',$table = "tbl_ads", $limit = 0)
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('is_top=:is_top', array(':is_top' => 1))
            ->andWhere('active = :active', array(':active' => 1))
            ->order('id DESC');
        if(!$country_code) {
            if ($country_details) {
                $data_command->andWhere('country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($limit){
            $data_command->limit($limit);
        }
        $data_result = $data_command->queryAll();
        return $data_result;
    }

    public static function getAllIndividualAds($country_code = '',$table = "tbl_ads", $limit = 0)
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('is_paid=:is_featured', array(':is_featured' => 1))
            ->andWhere('active = :active', array(':active' => 1))
            ->order('id DESC');
        if(!$country_code){
            if ($country_details) {
                $data_command->andWhere('country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($limit){
            $data_command->limit($limit);
        }
        $data_result = $data_command->queryAll();
        return $data_result;
    }


    public static function getAllFavoritesAds($filter_value = 1, $show = 0, $offset = 0)
    {
        $result_array = array();
        if (isset(Yii::app()->request->cookies['user_token'])) {
            $user_token = Yii::app()->request->cookies['user_token'];
            $Criteria = new CDbCriteria();
            $Criteria->select = '*';
            $Criteria->condition = "user_token = :user_token";

            if ($offset) {
                $Criteria->offset = $offset;
            }
            if ($show) {
                $Criteria->limit = $show;
            }
            $Criteria->params = array(':user_token' => $user_token,);
            $result = Favorites::model()->find($Criteria);

            if ($result) {
                $favorite_ad_id = '';
                $recently_view = '';
                $total_ad_id = '';
                if ($filter_value == 1) {
                    $favorite_ad_id = $result->ad_id;
                    $total_ad_id = $favorite_ad_id;
                } else if ($filter_value == 2) {
                    $recently_view = $result->recently_view_ad_ids;
                    $total_ad_id = $recently_view;
                } else if ($filter_value == 3) {
                    $favorite_ad_id = trim($result->ad_id);
                    $recently_view = trim($result->recently_view_ad_ids);
                    $total_ad_id = $favorite_ad_id;
                    if ($recently_view != '') {
                        if ($favorite_ad_id != '') {
                            $total_ad_id = $favorite_ad_id . ',' . $recently_view;
                        } else {
                            $total_ad_id = $recently_view;
                        }
                    }
                }
                if ($total_ad_id != '') {
                    $result_array = (explode(',', $total_ad_id));
                    $result_array = array_unique($result_array);
                }
            }

        }
        return $result_array;
    }

    public static function getAllFavoritesAdsFromDB()
    {
        $result_array = array();
        $result = Favorites::model()->findAll();
        $favorite_ad_string = "";
        if ($result) {
            foreach ($result as $item) {
                $favorite_ad_string .= ',' . $item->ad_id;
            }

            $result_array = (explode(',', substr($favorite_ad_string, 1)));
            $result_array = array_unique($result_array);
        }

        return $result_array;
    }

    public static function getAds($ad_ids)
    {
        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads')
            ->where(array('in', 'id', $ad_ids))
            ->andWhere('active = :active', array(':active' => 1))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getEstore($country_code ="",$active_status = 1, $limit = 0)
    {
        $country_details =  Generic::checkForStoredCountry();

        $data_command = Yii::app()->db->createCommand()
            ->from('tbl_estore tes')
            ->join('tbl_register tr', 'tr.id=tes.user_id')
            //->join('tbl_ads tad', 'tad.user_id=tes.user_id')
            ->where('tes.active=:active', array(':active' => $active_status))
            ->andWhere('tr.register_type=:register_type',array(':register_type' => 'business'))
            ->order('tes.id DESC');
        if(!$country_code) {
            if ($country_details) {
                $data_command->andWhere('tes.country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('tes.country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }
        if($limit){
            $data_command->limit($limit);
        }
        $data_result = $data_command->queryAll();
        return $data_result;
    }

    public static function getAllBusinessUserName()
    {
        $register_type = "business";
        $Criteria = new CDbCriteria();
        $Criteria->select = '*';
        $Criteria->condition = "register_type = :register_type";
        $Criteria->params = array(':register_type' => $register_type);
        $result = Register::model()->findAll($Criteria);

        return $result;


    }

    public static function showImageFromSiteDirectory($folder, $image, $title = '', $thumb = true, $width = 80, $height = 80)
    {
        $image = '<img width="' . $width . '" height="' . $height . '" title="' . $title . '" src="' . self::getImagePathFromSiteDirectory($folder, $image, $thumb) . '" alt="' . $title . '" />';
        return $image;
    }

    public static function getImagePathFromSiteDirectory($folder, $image, $thumb = false)
    {
        if ($folder) $folder = $folder . '/';

        $file = $image;

        $base_path = Yii::app()->request->getBaseUrl(true) . "/uploaded/";
        $path = $base_path . $folder . $file;

        return $path;

    }

    public static function getBannerPosition()
    {
        return array(
            'top_right' => 'Top Right',
            'mega_sell' => 'Mega Sell',
            'bottom_right' => 'Bottom right',
            'related_product_banner' => 'Related Product Banner',
            'up_sell_product_banner' => 'Up Sell Product Banner',
            'home_page_slider' => 'Home Page Slider',
        );

    }

    public static function getUserNameFromUserId($user_id)
    {
        $Criteria = new CDbCriteria();
        $Criteria->select = 'user_name';
        $Criteria->condition = "id = :user_id";
        $Criteria->params = array(':user_id' => $user_id);
        $result = Register::model()->find($Criteria);
        return $result->user_name;
    }


    public static function getActiveAds($table = 'tbl_ads', $active = 1)
    {
        $country_details = Generic::checkForStoredCountry();
        $data_command = Yii::app()->db->createCommand()
            ->from($table)
            ->where('active=:active', array(':active' => $active))
            ->order('id ASC');
        if($country_details){
            $data_command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        $data_result = $data_command->queryAll();
        return $data_result;
    }


    public static function getHomePageRightSideAds($banner_position, $limit=0, $offset=0,$country_code,$tbl='tbl_ad_special')
    {
        $connection = Yii::app()->db;

        $country_details =  Generic::checkForStoredCountry();

        $command = $connection->createCommand()
            ->select('*')
            ->from($tbl)
            ->Where('banner_position = :banner_position', array(':banner_position' => $banner_position))
            ->order('banner_order asc');

        if ($limit) {
            $command->limit($limit);
        }
        if ($offset) {
            $command->offset($offset);
        }


        $data_result = $command->queryAll();
        return $data_result;

    }

    /*public static function getHomePageRightSideAds($banner_position, $limit, $offset)
    {
        $Criteria = new CDbCriteria();
        $Criteria->select = '*';
        $Criteria->condition = "banner_position = :banner_position";
        if ($limit) {
            $Criteria->limit = $limit;
        }
        if ($offset) {
            $Criteria->offset = $offset;
        }
        $Criteria->params = array(':banner_position' => $banner_position);
        $result = Yii::app()->db->commandBuilder->createFindCommand(AdSpecial::model()->tableName(), $Criteria)->queryAll();
        return $result;

    }*/

    public static function getHotAdsRequest($ad_id)
    {
        $connection = Yii::app()->db;;
        $data_result = $connection->createCommand()
            ->select("*")
            ->from('tbl_hot_ads')
            ->where('ad_id=:ad_id', array(':ad_id' => $ad_id))
            ->queryRow();
        return $data_result;
    }


    public static function getAllHotAds($limit, $offset)
    {
        $current_date = date('Y-m-d');
        $Criteria = new CDbCriteria();
        $Criteria->select = '*';
        $Criteria->condition = "hot_ads = :hot_ads and hot_ads_end_date > :hot_ads_end_date";
        if ($limit) {
            $Criteria->limit = $limit;
        }
        if ($offset) {
            $Criteria->offset = $offset;
        }
        $Criteria->params = array(':hot_ads' => 1, ':hot_ads_end_date' => $current_date);
        $result = Yii::app()->db->commandBuilder->createFindCommand(Ads::model()->tableName(), $Criteria)->queryAll();
        return $result;


    }


    public static function getRelatedProducts($ad_id, $category_id,$country_code = '')
    {
        $store_owner = self::getAllStoreOwner();
        $store_owner_array = array_map(function ($val) {
            return $val['user_id'];
        }, $store_owner);
        $table = "tbl_ads";
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('category_id=:category_id', array(':category_id' => $category_id))
            ->andwhere('active=:active', array(':active' => 1))
            ->limit(6)
            ->andwhere('id <>:ad_id', array(':ad_id' => $ad_id))
            ->andwhere(array('not in', 'user_id', $store_owner_array));
        if(!$country_code){
            if($country_details){
                $data_command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code',array(':country_code' => strtoupper($country_code)));
        }

        $data_result = $data_command->queryAll();
        return $data_result;
    }


    public static function getAllStoreOwner()
    {
        $Criteria = new CDbCriteria();
        $Criteria->select = 'user_id';
        $result = Yii::app()->db->commandBuilder->createFindCommand(Estore::model()->tableName(), $Criteria)->queryAll();
        return $result;

    }

    public static function getAllStoreCategoryId()
    {
        $Criteria = new CDbCriteria();
        $Criteria->select = 'categories,user_id';
        $result = Yii::app()->db->commandBuilder->createFindCommand(Estore::model()->tableName(), $Criteria)->queryAll();
        return $result;
    }

    public static function getAllUpSellProducts($ad_id, $category_id,$country_code)
    {
        $store_category_id = self::getAllStoreCategoryId();
        $store_array = array();
        foreach ($store_category_id as $individual_categories) {
            $array = explode(',', $individual_categories['categories']);
            if (in_array($category_id, $array)) {
                $store_array[] = $individual_categories['user_id'];
            }
        }
        $table = "tbl_ads";
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $data_command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where('category_id=:category_id', array(':category_id' => $category_id))
            ->andwhere('active=:active', array(':active' => 1))
            ->andwhere('id <> :ad_id', array(':ad_id' => $ad_id))
            ->andwhere(array('in', 'user_id', $store_array));

        if(!$country_code){
            if($country_details){
                $data_command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
            }
        } else {
            $data_command->andWhere('country_code = :country_code',array(':country_code' => strtoupper($country_code)));
        }

        $data_result = $data_command->queryAll();
        return $data_result;

    }


    public static function getAllAds($active = 0, $table = "tbl_ads", $show = 0, $offset = 0, $minimum_price = false, $maximum_price = false, $condition_array = false, $is_featured = false, $is_premium = false, $is_hot = false, $is_top = false,$order = "id desc")
    {
        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;
        // $user_ip = SiteConfig::GetUserIP();
        //$user_ip = "180.234.143.72";
        //$geoinfo = Generic::getGeoInfo($user_ip);
        // $latitude = $geoinfo['geoplugin_latitude'];
        // $longitude = $geoinfo['geoplugin_longitude'];

        $command = $connection->createCommand()
            ->select('*')
            /*   ->from('( SELECT *, (((acos(sin(('.$latitude.'*pi()/180)) *
                   sin((`latitude`*pi()/180))+cos(('.$latitude.'*pi()/180)) *
                   cos((`latitude`*pi()/180)) * cos((('.$longitude.'-
                   `longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344)
                   as distance
                   FROM '.$table.') temp_table')
               ->Where('active = :active', array(':active' => $active))
               ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));*/

            ->from($table)
            ->Where('active = :active', array(':active' => $active))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));

        if ($show) {
            $command->limit($show);
        }
        if ($offset) {
            $command->offset($offset);
        }


        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }

        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }

        foreach ($condition_array as $key => $value) {
            $counter = 1;
            foreach ($value as $val) {
                $command->andWhere($key . ' = :' . $key . $counter, array(':' . $key . $counter => $val));
                $counter++;
            }

        }
        $command->order($order);

        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getMinMaxPriceForAllAds($active = 0, $table = "tbl_ads", $show = 0, $offset = 0, $minimum_price = false, $maximum_price = false, $condition_array = false, $is_featured = false, $is_premium = false, $is_hot = false, $is_top = false)
    {

        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $command = $connection->createCommand()
            ->select("min(price) as min_price,max(price) as max_price")
            ->from($table)
            ->Where('active = :active', array(':active' => $active));
        if ($show) {
            $command->limit($show);
        }
        if ($offset) {
            $command->offset($offset);
        }
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }


        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }

        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }

        foreach ($condition_array as $key => $value) {
            $counter = 1;
            foreach ($value as $val) {
                $command->andWhere($key . ' = :' . $key . $counter, array(':' . $key . $counter => $val));
                $counter++;
            }

        }


        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getAllAdsForHomePageSearch($active = 0, $table = "tbl_ads", $show = 0, $offset = 0, $location = false, $search_string = false, $minimum_price = false, $maximum_price = false, $condition_array = false, $is_featured = false, $is_premium = false, $is_hot = false, $is_top = false,$sub_categories_id = array(),$business_type=false,$division='',$district="",$thana='')
    {
        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;

        $country_details = Generic::checkForStoredCountry();

        if($division != '' && $division != 0){
            $register_condition_array['division_id'] = $division;
        }
        if($district != '' && $district != 0){
            $register_condition_array['district_id'] = [$district,'*'];
        }
        if($thana != '' && $thana != 0){
            $register_condition_array['thana_id'] = [$thana,'*'];
        }
        
        $member_list = [];
        if(!empty($register_condition_array)){
            $member_list = Registered_user_location::model()->findAllByAttributes($register_condition_array);
        }
        $members = [];
        foreach ($member_list as $member) {
            $members[] = $member->user_id;
        }
        $member_nos = implode(array_unique($members));
        //$user_ip = SiteConfig::GetUserIP();
        //$user_ip = "180.234.143.72";
//        $geoinfo = Generic::getGeoInfo($user_ip);
//        $latitude = $geoinfo['geoplugin_latitude'];
//        $longitude = $geoinfo['geoplugin_longitude'];
        $select_string = "*";
        if($business_type){
            $select_string = "*,tr.id as users_id,tas.id as ads_id,tas.create_date as ad_create_date";
        }
        $command = $connection->createCommand()
            ->select($select_string)
            ->from('tbl_ads tas')
            ->Where( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
            $command->andWhere(array('in', 'user_id', $members));
            // $command ->join('tbl_register tr', 'tr.id=tas.user_id');
            // $command ->andWhere('register_type=:register_type', array(':register_type' => $business_type));
            //$command ->andWhere('register_type=:register_type', array(':register_type' => $business_type));

        if($country_details){
            $command->andWhere('tas.country_code = :country_code',array(':country_code' => $country_details->sortname));
        }

        
        $result = array();

//        $str_length = strlen($search_string);
//        $formatted_input_string = array();
//        for ($i = 0; $i <= $str_length - 3; $i++) {
//            $formatted_input_string[] = substr($search_string, $i, 3);
//        }

        if(!empty($sub_categories_id)){

            $command->andWhere(array('in', 'category_id', $sub_categories_id));
        }

    


        /*  $search_string_counter = 0;
          if (is_array($formatted_input_string) && !empty($formatted_input_string)) {
              foreach ($formatted_input_string as $string) {
                  if(!$search_string_counter) {
                      $command->andWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                  } else {
                      $command->orWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                  }
                  $search_string_counter++;
              }
          }*/


        if(!empty($search_string)){

            $command->andWhere('title LIKE :title', array(':title' => "%$search_string%"));
        }





        foreach($condition_array as $key=> $value){
            $counter= 1;
            foreach($value as $val){
                $command ->andWhere($key.' = :'.$key.$counter,array(':'.$key.$counter => $val));
                $counter++;
            }

        }

        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }
        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }
        if ($show) {
            $command->limit($show);
        }
        if ($offset) {
            $command->offset($offset);
        }
        //Generic::_setTrace($command);
        $data_result = $command->queryAll();

        foreach($data_result as $value){
            if(!in_array($value,$result)){
                array_push($result,$value);
            }
        }
        return $result;

    }

    public static function Email_listing($list_rows)
    {
        $returnData = '';
        if (isset($list_rows->id)) {

            if ($list_rows->title == "") {
                $name = "Sample Products";
            } else {
                $name = $list_rows->title;
            }
            $name = Generic::formatStringAsDisplay($name);
            $ad_id = $list_rows->id;
            $ad_type = "ads";
            $baseUrl = Yii::app()->request->getBaseUrl(true);
            $images = json_decode($list_rows->image_url);

            $returnData .= '<div style="width: 450px; clear: both; padding: 10px 0 20px;">
                                   <div style="float: left; with:300px; font-family: verdana; font-size: 12px; ">
                                        <h4 style="margin: 0; max-width: 300px;"><a href="' . $baseUrl . "ad?ad_id=" . urlencode(base64_encode($ad_id)) . "&ad_type=" . urlencode(base64_encode($ad_type)) . '">' . $name . '</a></h4>

                                        <p style="margin: 0;">' . $list_rows->description . '</p>
                                        <p style="margin: 0;">Product Price:' . $list_rows->price . ' BDT</p>

                                   </div>
                                    <div style="float: right; with:140px;">
                                        <a href="' . $baseUrl . "/ad?ad_id=" . urlencode(base64_encode($ad_id)) . "&ad_type=" . urlencode(base64_encode($ad_type)) . '"><img src="' . $images[0] . '"  width=140 /></a>
                                    </div>
                                     <div style="clear: both;"></div>
                               </div>';
        }

        return $returnData;

    }

    /**
     * @param $string
     * @return mixed|string
     */
    public static function formatStringAsDisplay($string)
    {
        $string = htmlspecialchars_decode($string);
        $string = strip_tags($string);
        $string = str_replace('.com', '', $string);
        $string = preg_replace('/\n+|\t+|\s+|\*+|\^+|\-+/', ' ', $string);
        $string = html_entity_decode($string);
        return $string;
    }

    public static function getAllMessageOfUser($receiver_id, $message_type)
    {
        $connection = Yii::app()->db;
        $table = 'tbl_message tm';
        $condition = 'tm.receiver = :receiver_id';
        $condition_param = array(':receiver_id' => $receiver_id);
        $select = 'tm.id as id,tr.image as image, tm.sender_email as email, tm.sender_phone as phone, tm.sender_name as sender_name, tm.details as details, tm.create_date as create_date, tm.is_starred as is_starred,tm.ad_id as ad_id';
        if ($message_type != '' && $message_type == 'sent') {
            $table = 'tbl_message_sent tm';
            $select = 'tm.id as id,tr.image as image, tr.user_name as sender_name, tm.details as details, tm.create_date as create_date, tm.is_starred as is_starred, tm.ad_id as ad_id';
            $condition = 'tm.registered_sender = :sender_id';
            $condition_param = array(':sender_id' => $receiver_id);
        }
        $command = $connection->createCommand()
            ->select($select)
            ->from($table)
            //->join('tbl_register tr1', 'tr1.id = tm.registered_sender')
            ->join('tbl_register tr', 'tr.id=tm.receiver')
            //->join('tbl_ads ta', 'ta.id=tm.ad_id')
            ->where($condition, $condition_param)
            ->order('tm.id DESC');

        if ($message_type != '' and $message_type == 'read') {
            $command->andwhere('tm.read_status = :read_status', array(':read_status' => 1));
        } else if ($message_type != '' and $message_type == 'unread') {
            $command->andwhere('tm.read_status = :read_status', array(':read_status' => 0));
        } else if ($message_type != '' and $message_type == 'starred') {
            $command->andwhere('tm.is_starred = :is_starred', array(':is_starred' => 1));
        }
        $data_result = $command->queryAll();
        
        return $data_result;
    }

    public static function showImageFromS3($folder, $image, $title = '', $thumb = true, $width = 80, $height = 80)
    {
        $image = '<img width="' . $width . '" height="' . $height . '" title="' . $title . '" src="' . $image . '" alt="' . $title . '" />';
        return $image;
    }

    public static function getAllPageForBannerAds()
    {
        return array(
            'select_page' => 'Select page',
            'home_page_ads' => 'Home Page Ads',
            'search_result_page' => 'Search / Result Page',
            'details_page' => 'Details Page',
            'data_ads_page_public' => 'Data Ads Page (Public)',
            'star_exclusive' => 'Star  Exclusive',
            'find_package_result_page' => 'Find Package Result Page',
            'find_package_bottom_banner' => 'Find Package Bottom Banner',
        );
    }

    public static function getAllValueOfSelectedAdsLocation($selected_value)
    {
        $ad_location_list = array(
            'home_page_ads' => array(
                'home_top_banner' => 'Home Top Banner',
                'home_top_right' => 'Home Top Right',
                'promotion_hb' => 'Promotion HB',
                'promotion_hm' => 'Promotion HM',
                'mid_right_panel' => 'Mid Right Panel',
                'bottom_right_panel' => 'Bottom Right Panel',
                'find_package_bottom_banner' => 'Find Package Bottom',
                'estore_left_slider_banner' => 'Estore Left Slider',
                'estore_right_slider_banner' => 'Estore Right Slider',
                'isp_left_slider_banner' => 'ISP Left Slider',
                'isp_right_slider_banner' => 'ISP Right Slider',
            ),
            'find_package_result_page' => array(
                'package_result_left_banner' => 'Left Side Slider',
            ),
            'search_result_page' => array(
                'left_panel_rb' => 'Left Panel RB',
                'left_panel_rx' => 'Left panel RX',
                'left_panel_rc' => 'Left Panel RC',
                'left_panel_rd' => 'Left panel RD',
                'bottom_side_topper' => 'Bottom Side Topper',

            ),
            'details_page' => array(
                'detail_top_right' => 'Detail Top Right',
                'related_product_banner' => 'Related Product Banner',
                'up_sell_product_banner' => 'Up Sell Product Banner',

            ),
            'data_ads_page_public' => array(
                'classic_top_banner' => 'Classic Top Banner',
                'left_panel_pb' => 'Left Panel-PB',
                'left_panel_px' => 'Left panel-PX',
                'promotion_dp' => 'Promotion-DP',
                'promotion_pm' => 'Promotion-PM',
            ),


            'star_exclusive' => array(
                'visitor_topper' => 'Visitor Topper',
                'login_panel' => 'Login panel',
                'registration_panel' => 'Registration Panel',

            ),

        );
        $ads_location = array();
        foreach ($ad_location_list as $key => $value) {
            if ($key === $selected_value) {
                $ads_location[] = $value;
            }
        }

        return $ads_location;

    }





    public static function getMaximumPrice($category_id,$country_code = '')
    {
        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = "tbl_ads";
        $active = 1;
        $command = $connection->createCommand()
            ->select("max(price) AS price")
            ->from($table)
            ->where(array('in', 'category_id', $category_id))
            ->andWhere('active = :active', array(':active' => $active))
            ->andWhere('show_price = :show_price',array(':show_price' => 1))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
        if(!$country_code) {
            if($country_details){
                $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code = :country_code',array(':country_code' => strtoupper($country_code)));
        }

        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getMinimunPrice($category_id,$country_code = '')
    {
        $current_date = new \DateTime('1 day ago');
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = "tbl_ads";
        $active = 1;
        $command = $connection->createCommand()
            ->select("min(price) AS price")
            ->from($table)
            ->where(array('in', 'category_id', $category_id))
            ->andWhere('active = :active', array(':active' => $active))
            ->andWhere('show_price = :show_price',array(':show_price' => 1))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
        if(!$country_code){
            if($country_details){
                $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code = :country_code',array(':country_code' => strtoupper($country_code)));
        }

        $data_result = $command->queryAll();
        return $data_result;
    }


    public static function getCategoryImageFromSlug($category_slug)
    {
        $table = "tbl_category";
        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("category_banner_image")
            ->from($table)
            ->Where('category_slug = :category_slug', array(':category_slug' => $category_slug));

        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getCategorySlagFromParentId($parent_id)
    {
        $table = "tbl_category";
        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("category_slug")
            ->from($table)
            ->Where('parent_id = :parent_id', array(':parent_id' => $parent_id));

        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getCategoryNameFromCategoryId($category_id)
    {
        $table = "tbl_category";
        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("category_name,sub_category_slug")
            ->from($table)
            ->Where('category_id = :category_id', array(':category_id' => $category_id));
        $data_result = $command->queryAll();
        return $data_result;
    }

    /*
	 * send notification to users
	 */
    public static function sendNotificationToUsers($ad)
    {
        $ad_id = $ad->id;
        $category_id = $ad->category_id;
        $current_time = new \DateTime();
        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id = :category_id and active = :active and expire_date > :expire_date';
        $criteria->params = array(':category_id' => $category_id, ':active' => 1, ':expire_date' => $current_time->format('Y-m-d H:i:s'));
        $related_ads = Ads::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id <> :user_id';
        $criteria->params = array(':user_id' => '');
        $favorite_objects = Favorites::model()->findAll($criteria);
        foreach ($related_ads as $ad) {
            foreach ($favorite_objects as $favorite_object) {
                $recent_viewed_ads = explode(',', $favorite_object->recently_view_ad_ids);
                $favorite_ads = explode(',', $favorite_object->ad_id);
                if (in_array($ad->id, $recent_viewed_ads) || in_array($ad->id, $favorite_ads)) {

                    /* ---------------------- Search Notification Added ------------------------ */
                    $search_notification = new Notification_search();
                    $search_notification->receiver_id = $favorite_object->user_id;
                    $search_notification->ad_id = $ad_id;
                    $search_notification->create_date = $current_time->format('Y-m-d H:i:s');
                    $search_notification->save();

                }
            }
        }
    }

    /*
     * Send notification to Ad owner
     */
    public static function sendNotificationToAdOwner($ad,$message)
    {

        $ad_id = $ad->id;
        $current_time = new \DateTime();
        $message_details = $message;

        /* ---------------------- Ad approval Notification Alert sent ------------------------ */
        $alert_notification = new Notification_alert();
        $alert_notification->receiver_id = $ad->user_id;
        $alert_notification->short_desc = $message_details;
        $alert_notification->details = $message_details;
        $alert_notification->ad_id = $ad_id;
        $alert_notification->create_date = $current_time->format('Y-m-d H:i:s');
        $alert_notification->save();

    }

    public static function sendMailToAdOwner($model,$message){
        $user_details = Register::model()->findByPk($model->user_id);
        
        $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        $to_email = $user_details->email;
        
        $subject = '';
        if($user_details->register_type == 'personal'){
            $subject = 'Your Ad request has been approved';
        } else if($user_details->register_type == 'business'){
            $subject = 'Your ISP Package request has been approved';
        } else if($user_details->register_type == 'store'){
             $subject = 'Your Product Ad request has been approved';
        }

    
        Generic::sendMail($message,$subject,$to_email);
    }

    public static function sendMailToBusiness($model,$message){
        $user_details = Register::model()->findByPk($model->user_id);
        
        $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        
        $business_email = Yii::app()->params['businessEmail'];
        
        $subject = '';
        if($user_details->register_type == 'personal'){
            $subject = 'Ad request has been approved';
        } else if($user_details->register_type == 'business'){
            $subject = 'ISP Package request has been approved';
        } else if($user_details->register_type == 'store'){
             $subject = 'Product Ad request has been approved';
        }
        Generic::sendMail($message,$subject,$business_email);
    }

    public static function sendMailApprovalToAdmin($model,$message){
        $user_details = Register::model()->findByPk($model->user_id);
        
        $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        
        $business_email = Yii::app()->params['businessEmail'];
        $admin_email = Yii::app()->params['transactionEmail'];
        
        $subject = '';
        if($user_details->register_type == 'business'){
            $subject = 'An ISP Panel has been approved';
        } else if($user_details->register_type == 'store'){
             $subject = 'An Estore Panel has been approved';
        }
        Generic::sendMail($message,$subject,$business_email);
        Generic::sendMail($message,$subject,$admin_email);
    }


    public static function sendMailApprovalToBusiness($model,$message){

        $user_details = Register::model()->findByPk($model->user_id);
        
        $message_line_spacing_single = '<br>';
        $message_line_spacing_double = '<br><br>';
        
        $business_email = $user_details->email;
        
        $subject = '';
        if($user_details->register_type == 'business'){
            $subject = 'Your bdbroadbanddeals ISP Panel has been approved';
        } else if($user_details->register_type == 'store'){
             $subject = 'Your bdbroadbanddeals Estore Panel has been approved';
        }
        Generic::sendMail($message,$subject,$business_email);
    }


    public static function getAdDetailsForHomePage($location, $search_string)
    {
        $Criteria = new CDbCriteria;
        $Criteria->select = '*';
        $Criteria->addCondition('title LIKE :title');
        $Criteria->addCondition('location = :location');
        $Criteria->addCondition('active = :active');
        $Criteria->params = array(
            ':title' => '%' . $search_string . '%',
            ':location' => $location,
            ':active' => 1,
        );

        $result = Yii::app()->db->commandBuilder->createFindCommand(Ads::model()->tableName(), $Criteria)->queryAll();
        return $result;
    }

    public static function getMinimumPriceForSearch($location, $search_string,$condition_array,$sub_categories_id=array())
    {

        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = 'tbl_ads';
        $command = $connection->createCommand()
            ->select("min(price) AS min_price")
            ->from($table);


        /*  $str_length = strlen($search_string);
          $formatted_input_string = array();
          for ($i = 0; $i <= $str_length - 3; $i++) {
              $formatted_input_string[] = substr($search_string, $i, 3);
          }*/

        if(!empty($sub_categories_id)){

            $command->andWhere(array('in', 'category_id', $sub_categories_id));
        }



        /*   $search_string_counter = 0;
           if (is_array($formatted_input_string) && !empty($formatted_input_string)) {
               foreach ($formatted_input_string as $string) {
                   if(!$search_string_counter) {
                       $command->andWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   } else {
                       $command->orWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   }
                   $search_string_counter++;
               }
           }*/

        if(!empty($search_string)){

            $command->andWhere('title LIKE :title', array(':title' => "%$search_string%"));
        }

        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }


        foreach($condition_array as $key=> $value){
            $counter= 1;
            foreach($value as $val){
                $command ->andWhere($key.' = :'.$key.$counter,array(':'.$key.$counter => $val));
                $counter++;
            }

        }

        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getMaximumPriceForSearch($location, $search_string,$condition_array,$sub_categories_id=array())
    {
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = 'tbl_ads';
        $command = $connection->createCommand()
            ->select("max(price) AS max_price")
            ->from($table);


        /*   $str_length = strlen($search_string);
           $formatted_input_string = array();
           for ($i = 0; $i <= $str_length - 3; $i++) {
               $formatted_input_string[] = substr($search_string, $i, 3);
           }*/

        if(!empty($sub_categories_id)){
            $command->andWhere(array('in', 'category_id', $sub_categories_id));
        }
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }

        /*   $search_string_counter = 0;
           if (is_array($formatted_input_string) && !empty($formatted_input_string)) {
               foreach ($formatted_input_string as $string) {
                   if(!$search_string_counter) {
                       $command->andWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   } else {
                       $command->orWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   }
                   $search_string_counter++;
               }
           }*/

        /*   $search_string_counter = 0;
           if (is_array($formatted_input_string) && !empty($formatted_input_string)) {
               foreach ($formatted_input_string as $string) {
                   if(!$search_string_counter) {
                       $command->andWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   } else {
                       $command->orWhere('title LIKE :title' . $search_string_counter, array(':title' . $search_string_counter => "%$string%"));
                   }
                   $search_string_counter++;
               }
           }*/

        if(!empty($search_string)){

            $command->andWhere('title LIKE :title', array(':title' => "%$search_string%"));
        }



        foreach($condition_array as $key=> $value){
            $counter= 1;
            foreach($value as $val){
                $command ->andWhere($key.' = :'.$key.$counter,array(':'.$key.$counter => $val));
                $counter++;
            }

        }

        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getMinimumPriceForProfile()
    {

        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = 'tbl_ads';
        $command = $connection->createCommand()
            ->select("min(price) AS min_price")
            ->from($table)
            ->Where('active = :active', array(':active' => 1));
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getMaximumPriceForProfile()
    {

        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $table = 'tbl_ads';
        $command = $connection->createCommand()
            ->select("max(price_end) AS max_price")
            ->from($table)
            ->Where('active = :active', array(':active' => 1));
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        $data_result = $command->queryAll();
        return $data_result;

    }
    public static function IpToLocation($client_ip){
        $city = "";
        $geo_info = @json_decode(@file_get_contents("http://ip-api.com/json/$client_ip"));
        if($geo_info){
            $city = isset($geo_info->city) ? $geo_info->city : '';

        }

        return $city;
    }

    public static function getLatitudeLongitude($user_location){
        $output = '';
        //$prepAddr = str_replace(' ','+',$user_location);
        if(strpos($user_location, 'Bangladesh') === false){
            $user_location = $user_location.", Bangladesh";
        }

        $prepAddr = urlencode($user_location);
        if(empty($prepAddr)){
            return '';
        }
        try{
            $address = 'https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyChulrZC9AgEryAjjE00obcM_2sZCgEqAg';
            $geocode=file_get_contents($address);
            if(empty($geocode)) {
                return '';
            }
            $output= json_decode($geocode);

            return $output;
        } catch(Exception $ex){
            return '';
        }
        return $output;
    }

    public static function getGeoInfo($user_ip){
        $user_ip = '';
        $geoinfo= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$user_ip));
        if(!$geoinfo){
            return '';
        }
        return $geoinfo;
    }

    public static function getUserName($user_id){
        $result = Yii::app()->db->createCommand()
            ->select('user_name')
            ->from('tbl_register r')
            ->join('tbl_ads a', 'r.id=a.user_id')
            ->where('user_id=:user_id', array(':user_id'=>$user_id))
            ->queryRow();

        return $result['user_name'];
    }

    public static function getUserDetails($user_id){
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_register r')
            ->join('tbl_ads a', 'r.id=a.user_id')
            ->where('user_id=:user_id', array(':user_id'=>$user_id))
            ->queryRow();

        return $result;
    }

    public static function getAllDiscountAds(){

        $Criteria = new CDbCriteria();
        $result = Yii::app()->db->commandBuilder->createFindCommand(Discount::model()->tableName(), $Criteria)->queryAll();
        return $result;

    }

    public  static function ScanDirectoryContent($dir){
        $ffs = scandir($dir);
        $data=array();
        foreach($ffs as $ff){
            if($ff != '.' && $ff != '..'){
                $data[]=$ff;
            }
        }
        return $data;
    }

    public static function getSuggestedAds($location){
        $connection = Yii::app()->db;
        $table = 'tbl_ads';
        $command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->limit(10)
            ->Where('location=:location', array(':location' => $location))
            ->andWhere('active=:active', array(':active' => 1));

        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getFeaturedProductsForEstore($user_id){
        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and is_featured = :is_featured and show_in_store=:show_in_store';
        $criteria->params = array(':user_id' => $user_id, ':is_featured' => 1, ':show_in_store' => 1);
        $related_ads = Ads::model()->findAll($criteria);
        return $related_ads;
    }
    public static function getPremiumProductsForEstore($user_id){
        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and is_premium = :is_featured and show_in_store=:show_in_store';
        $criteria->params = array(':user_id' => $user_id, ':is_featured' => 1, ':show_in_store' => 1);
        $related_ads = Ads::model()->findAll($criteria);
        return $related_ads;
    }
    public static function getTopProductsForEstore($user_id){
        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and is_top = :is_featured and show_in_store=:show_in_store';
        $criteria->params = array(':user_id' => $user_id, ':is_featured' => 1, ':show_in_store' => 1);
        $related_ads = Ads::model()->findAll($criteria);
        return $related_ads;
    }

    public static function getProductsFromCategoryId($category_id,$user_id){
        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id = :category_id and user_id = :user_id and show_in_store=:show_in_store and active=:active';
        $criteria->params = array(':category_id' => $category_id,':user_id' => $user_id , ':show_in_store' => 1,':active' => 1);
        $related_ads = Ads::model()->findAll($criteria);
        return $related_ads;

    }
    public static function getAllProductsOfStore($user_id,$offset,$limit){
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads ')
            ->where('user_id=:user_id', array(':user_id' => $user_id))
            ->andWhere('show_in_store=:show_in_store', array(':show_in_store' => 1))
            ->andWhere('active = :active', array(':active' => 1));
        if ($limit) {
            $command->limit($limit);
        }
        if ($offset) {
            $command->offset($offset);
        }
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getCategoryIdFromProductId($product_id){
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("category_id")
            ->from('tbl_ads ')
            ->where('id=:id', array(':id' => $product_id));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result[0]['category_id'];

    }

    public static function getRelatedProductsForEstore($category_id,$user_id,$product_id,$country_code = ''){

        $country_details = Generic::checkForStoredCountry();
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads ')
            ->where('user_id=:user_id', array(':user_id' => $user_id))
            ->andWhere('category_id=:category_id', array(':category_id' => $category_id))
            ->andwhere('id <>:ad_id', array(':ad_id' => $product_id))
            ->limit(8);
        if(!$country_code){
            if ($country_details) {
                $command->andWhere('country_code =:country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code =:country_code', array(':country_code' => strtoupper($country_code)));
        }
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;
    }
    public static function getUpSellProductsForEstore($category_id,$product_id, $country_code = ''){
        $current_date = new \DateTime();
        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads ')
            ->Where('category_id=:category_id', array(':category_id' => $category_id))
            ->andwhere('id <>:ad_id', array(':ad_id' => $product_id))
            ->andwhere('active=:active', array(':active' => 1))
            ->andWhere('expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
        if(!$country_code){
            if($country_details){
                $command->andWhere('country_code = :country_code',array(':country_code'=>$country_details->sortname));
            }
        } else {
            $command->andWhere('country_code = :country_code',array(':country_code'=> strtoupper($country_code)));
        }

        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getAdUrlFromAdId($product_id,$country_code = ''){

        //$user_id = self::getUserIdFromAdId($product_id);
        $ad_details = Ads::model()->findByPk($product_id);
        $ad_type = self::getAdCategoryFromUserId($ad_details->user_id);

        $baseUrl = Yii::app()->getBaseUrl(true);
        $ad_url = "#";
        $url_alias = self::getStoreDetailsFromUserId($ad_details->user_id);
        if(isset($ad_type) && !empty($ad_type)){
            if($ad_type == 'personal'){
                if($country_code){
                    $ad_url = $baseUrl.'/'.$country_code.'/ad?ad_id='.urlencode(base64_encode($product_id)).'&ad_type='.urlencode(base64_encode('ads'));
                } else {
                    $ad_url = $baseUrl.'/ad?ad_id='.urlencode(base64_encode($product_id)).'&ad_type='.urlencode(base64_encode('ads'));
                }
            } else if($ad_type == 'business') {
                $ad_url = $baseUrl.'/isp/'.$url_alias.'/package-details/'.$product_id;
            }else{
                if($country_code){
                    $ad_url = $baseUrl.'/'.$country_code.'/e-store/'.$url_alias.'/product-details/'.$product_id;
                } else {
                    $ad_url = $baseUrl.'/e-store/'.$url_alias.'/product-details/'.$product_id;
                }
            }
        }
        return $ad_url;
    }


    public static function getISPUrlFromAdId($product_id){
        $ad_details = Ads::model()->findByPk($product_id);
        $baseUrl = Yii::app()->getBaseUrl(true);
        $url_alias = self::getStoreDetailsFromUserId($ad_details->user_id);
        $store_url = $baseUrl.'/isp/'.$url_alias;
        return $store_url;
    }

    public static function getUserIdFromAdId($product_id){

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("user_id")
            ->from('tbl_ads ')
            ->where('id=:id', array(':id' => $product_id));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result[0]['user_id'];

    }

    public static function getAdCategoryFromUserId($user_id){

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("register_type")
            ->from('tbl_register')
            ->where('id=:id', array(':id' => $user_id));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result[0]['register_type'];

    }
    public static function getStoreDetailsFromUserId($user_id){

        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("url_alias")
            ->from('tbl_estore')
            ->where('user_id=:user_id', array(':user_id' => $user_id));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result[0]['url_alias'];

    }

    public static function getPlanDetailsArray($id){


        $criteria = new CDbCriteria();
        $criteria->condition = 'plan_id = :plan_id';
        $criteria->params = array(':plan_id' => $id);
        $plan_details = Subscription_details::model()->find($criteria);
        $plan_details_array = array(

            'id'=> $plan_details->id,
            'plan_id'=> $plan_details->plan_id,
            'ad_count'=> $plan_details->ad_count,
            'featured_ad_count'=> $plan_details->featured_ad_count,
            'premium_ad_count'=> $plan_details->premium_ad_count,
            'top_ad_count'=> $plan_details->top_ad_count,
            'hot_ad_count'=> $plan_details->hot_ad_count,
            'live_chat_support'=> $plan_details->live_chat_support,
            'smm_support'=> $plan_details->smm_support,
            'email_marketing_support'=> $plan_details->email_marketing_support,
            'recommend_ad_support'=> $plan_details->recommend_ad_support,
            'promotional_banner_service'=> $plan_details->promotional_banner_service,

        );
        return $plan_details_array;
    }


    public static function getUserAdsArray($user_id){


        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and active = :active';
        $criteria->params = array(':user_id' => $user_id,':active' => 1);
        $user_all_ads = Ads::model()->findAll($criteria);
        $user_ads_array = '';
        if($user_all_ads){
            $criteria = new CDbCriteria();
            $criteria->condition = 'user_id = :user_id and  is_featured=:is_featured';
            $criteria->params = array(':user_id' => $user_id,':is_featured'=>1);
            $user_all_featured_ads = Ads::model()->findAll($criteria);

            $criteria = new CDbCriteria();
            $criteria->condition = 'user_id = :user_id  and is_premium=:is_premium';
            $criteria->params = array(':user_id' => $user_id,':is_premium'=>1);
            $user_all_premium_ads = Ads::model()->findAll($criteria);

            $criteria = new CDbCriteria();
            $criteria->condition = 'user_id = :user_id  and is_top=:is_top';
            $criteria->params = array(':user_id' => $user_id,':is_top'=>1);
            $user_all_top_ads = Ads::model()->findAll($criteria);
            $user_ads_array = array(
                'user_total_ad_count' => count($user_all_ads) ? count($user_all_ads) : 0,
                'user_total_featured_ad_count' => count($user_all_featured_ads) ? count($user_all_featured_ads) : 0,
                'user_total_premium_ad_count' => count($user_all_premium_ads) ? count($user_all_premium_ads) : 0,
                'user_total_top_ad_count' => count($user_all_top_ads) ? count($user_all_top_ads) : 0,

            );
        }
        return $user_ads_array;
    }


    /*Method To get Business Users Subscription Details From User ID */

    public static function getSubscriptionDetailsFromUserID($user_id){

        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and status = :status';
        $criteria->params = array(':user_id' => $user_id,':status' => 1);
        $subscription_details = Subscription_plan::model()->find($criteria);
        return $subscription_details;
    }

    /*Method To get Whether a Store Owner is Active or Not */

    public static function checkStoreOwnerStatus($user_id){

        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id' ;
        $criteria->params = array(':user_id' => $user_id);
        $storer_details = Estore::model()->find($criteria);
        return $storer_details;

    }

    public static function checkStoreOwnerServiceStatus($user_id){

        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id' ;
        $criteria->params = array(':user_id' => $user_id);
        $subscription_details = Subscription_plan::model()->find($criteria);
        return $subscription_details;

    }

    public static function doCurlRequest($url, $displayHeader=true) {

        //$user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(
            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            //CURLOPT_USERAGENT      => $user_agent, //set user agent
            //CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            //CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,

        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        if($displayHeader){
            $header = curl_getinfo( $ch );
            curl_close( $ch );
            if($header['http_code'] != 200){
                return false;
            }
        }
        else{
            curl_close($ch);
            if($err){
                return false;
            }
            else{
                return $content;
            }
        }

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;

        return $header;
    }

    public static function getHeaderFeaturedAds($category_slug,$country_code = '',$limit = 0){
        $table = 'tbl_ads';
        $category_id = Generic::getCategoryId($category_slug, false);
        $category_details = Category::model()->findByPk($category_id);
        $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
        $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);
        $condition_array = array(
            'active'=> array(1),
            'is_featured'=> array(1),
        );

        $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table, $country_code, $limit, false);

        return $ad_details;
    }

    public static function getHeaderNewAds($category_slug,$country_code = '',$limit = 0){
        $table = 'tbl_ads';
        $category_id = Generic::getCategoryId($category_slug, false);
        $category_details = Category::model()->findByPk($category_id);
        $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
        $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);
        $condition_array = array(
            'active'=> array(1),
            'ad_condition'=> array(1),
        );

        $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table, $country_code, $limit, false);

        return $ad_details;
    }

    public static function allAdsElectronics($category_slug,$country_code="",$limit = 0){
        $table = 'tbl_ads';
        $category_id = Generic::getCategoryId($category_slug, false);
        $category_details = Category::model()->findByPk($category_id);
        $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
        $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);
        $condition_array = array(
            'active'=> array(1),
            'show_in_store' => array(1)
        );

        $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table,$country_code, $limit, false);

        return $ad_details;
    }


    public static function getEstoreProducts($country_code = ''){

        $business_user_id = self::getAllBusinessUserName();
        $user_id_array = array();
        foreach($business_user_id as $user_id){
            $user_id_array[] = $user_id->id;
        }
        $table = 'tbl_ads';

        $country_details =  Generic::checkForStoredCountry();

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from($table)
            ->where(array('in', 'user_id', $user_id_array))
            ->andWhere("active=:active",array(':active' =>1));
        if(!$country_code) {
            if ($country_details) {
                $command->andWhere('country_code = :country_code', array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code = :country_code', array(':country_code' => strtoupper($country_code)));
        }

        $data_result = $command->queryAll();

        return $data_result;

    }

    public static function getEstoreProductsFromUserId($user_id){

        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id and show_in_store = :show_in_store and active = :active' ;
        $criteria->params = array(':user_id' => $user_id,':show_in_store' => 1, ':active' => 1);
        $criteria->limit = 4;
        $estore_ads = Ads::model()->findAll($criteria);
        return $estore_ads;


    }

    public static function getBusinessType($sub_categories_id,$register_type,$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code = ''){


        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $current_date = new \DateTime('1 day ago');
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads tas')
            ->join('tbl_register tr', 'tr.id=tas.user_id')
            ->where('register_type=:register_type', array(':register_type' => $register_type))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));

        if(!empty($sub_categories_id)){

            $command->andWhere(array('in', 'category_id', $sub_categories_id));
        }
        if(!$country_code){
            if($country_details){
                $command->andWhere('country_code =:country_code',array(':country_code' => $country_details->sortname));
            }
        } else {
            $command->andWhere('country_code =:country_code',array(':country_code' => strtoupper($country_code)));
        }

        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }

        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }


        foreach($condition_array as $key=> $value){
            $counter= 1;
            foreach($value as $val){
                $command ->andWhere($key.' = :'.$key.$counter,array(':'.$key.$counter => $val));
                $counter++;
            }

        }
        $data_result = $command->queryAll();
        return count($data_result);

    }

    public static function getBusinessTypeForAllAds($register_type){


        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $current_date = new \DateTime('1 day ago');
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads tas')
            ->join('tbl_register tr', 'tr.id=tas.user_id')
            ->where('register_type=:register_type', array(':register_type' => $register_type))
            ->andwhere('active=:active', array(':active' => 1))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));
        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }
        $data_result = $command->queryAll();
        return count($data_result);


    }

    public static function getBusinessTypeForSearch($condition_array,$sub_categories_id=array(),$register_type,$search_string=false,$minimum_price=false,$maximum_price=false,$is_featured=false,$is_premium=false,$is_hot=false,$is_top=false,$show = 0, $offset = 0){


        $connection = Yii::app()->db;
        $country_details = Generic::checkForStoredCountry();
        $current_date = new \DateTime('1 day ago');
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads tas')
            ->join('tbl_register tr', 'tr.id=tas.user_id')
            ->where('register_type=:register_type', array(':register_type' => $register_type))
            ->andWhere( 'expire_date > :expire_date',array(':expire_date' => $current_date->format('Y-m-d H:i:s')));

        if(!empty($sub_categories_id)){

            $command->andWhere(array('in', 'category_id', $sub_categories_id));
        }

        if($country_details){
            $command->andWhere('country_code = :country_code',array(':country_code' => $country_details->sortname));
        }

        if(!empty($search_string)){

            $command->andWhere('title LIKE :title', array(':title' => "%$search_string%"));
        }

        foreach($condition_array as $key=> $value){
            $counter= 1;
            foreach($value as $val){
                $command ->andWhere($key.' = :'.$key.$counter,array(':'.$key.$counter => $val));
                $counter++;
            }

        }

        if ($maximum_price && $minimum_price) {
            $command->andWhere('price>=:minimum_price', array(':minimum_price' => $minimum_price));
            $command->andWhere('price<=:maximum_price', array(':maximum_price' => $maximum_price));
        }

        if ($is_featured) {
            $command->andWhere('is_featured =:is_featured', array(':is_featured' => $is_featured));

        }
        if ($is_premium) {
            $command->andWhere('is_premium =:is_premium', array(':is_premium' => $is_premium));

        }
        if ($is_hot) {
            $command->andWhere('hot_ads =:hot_ads', array(':hot_ads' => $is_hot));

        }
        if ($is_top) {
            $command->andWhere('is_top =:is_top', array(':is_top' => $is_top));

        }





        $data_result = $command->queryAll();
        return count($data_result);


    }

    public static function  getCountries(){
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('countries');
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getCountryCodeByShortName($short_name){
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('countries')
            ->where('sortname=:name', array(':name' => $short_name));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;
    }

    public static function getServicePromotionCategory()
    {
        $result = Yii::app()->db->createCommand("SELECT * FROM tbl_category  WHERE category_type = 2 ")->queryAll();
        return $result;
    }

    public static function getStates($country_id){

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_district');
        
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getRegisterUser($email)
    {

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_register')
            ->where('email =:email', array(':email' => $email));
        $command->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function validateCountry($country_id){
        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('countries')
            ->where('id =:id', array(':id' => $country_id));

        $result = $command->queryAll();
        if($result[0]['status']){return 1;}
        else{return 0;}
    }

    public static function getJobsDetails()
    {

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_jobs')
            ->where('active = :active',array(':active' => 1));
        $command->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getJobsDetailsfromId($job_id)
    {

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_jobs')
            ->where('id=:id', array(':id' => $job_id));
        $command->queryRow();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function checkLabel($ad){
        $current_time = date('Y-m-d H:i:s');
        if(isset($ad['ad_create_date'])) {
            $new_time = date("Y-m-d H:i:s", strtotime('+1 day', strtotime($ad['ad_create_date'])));
        } else {
            $new_time = date("Y-m-d H:i:s", strtotime('+1 day', strtotime($ad['create_date'])));
        }
        $color = "";
        $label = "";
        if($ad['is_featured'] == 1){
            $color = '#29c2f5';
            $label = 'Featured';
        }
        elseif($ad['is_premium'] == 1){
            $color = '#ff8d5a';
            $label = 'Premium';
        }
        elseif($ad['is_top'] == 1){
            $color = '#6e68ff';
            $label = 'Top';
        }
        elseif($new_time > $current_time){
            $color = "#00BE00";
            $label = "New";
        }

        $show_label = "";
        if($color && $label) {
            $show_label = '<div class="label-tag" style="background:' . $color . '">
							<label>' . $label . '</label>
						</div>';
        }


        return $show_label;
    }


    /*
     * Get All EStores from Category id
     * @param category_id int
     * @return estores mixed
     */
    public static function getAllEStores($category_id,$country_code = ''){
        $registered_estore_users = [];
        $registered_estore = Register_estore::model()->findAllByAttributes(["category_id" => $category_id]);
        foreach ($registered_estore as $single_register_user) {
            $registered_estore_users[] = $single_register_user->user_id;
        }
        $registered_estore_users = array_unique($registered_estore_users);
        

        $condition_string = 't.active = :active';
        $param_array = array(':active' => 1);
        
        $criteria = new CDbCriteria;
        $criteria->select = 't.*';
        $criteria->join = 'JOIN `tbl_register` AS `tr` ON t.user_id = tr.id';
        //$criteria->condition = $condition_string;
        $criteria->addColumnCondition(array('t.active'=>1));
        $criteria->addInCondition('tr.id',$registered_estore_users);
        //$criteria->params = $param_array;
        $resultSet = Estore::model()->findAll($criteria);
        return $resultSet;
    }

    /*
	 * Determine user country from ip address
	 */
    public static function determineCountry(){
        $remote_ip = '';
        if(!isset(Yii::app()->session['region_token'])) {
            //$remote_ip = file_get_contents('http://api.kickfire.com/ip?ipkey=0d74556ee5979d08');
            //Generic::_setTrace($remote_ip);
            $remote_ip = '180.92.226.51';
            //$remote_ip = '8.8.8.8';
            //$remote_ip = '115.117.19.26';
            $indian_ip = '219.65.75.130';
            $indian_ip2 = '43.231.243.103';
            $indian_ip3 = '182.66.80.67';
            $indian_ip4 = '47.15.11.36';

//           $remote_ip = Generic::getUserIP();
//            if($remote_ip == $indian_ip){
//                $remote_ip = '8.8.8.8';
//            }
            $databaseFile = dirname(__FILE__) . '/../extensions/maxmind/GeoLite2-Country.mmdb';
            $reader = new Reader($databaseFile);

            $record = $reader->get($remote_ip);

            $reader->close();
            //Generic::_setTrace($record);
            $region_token = md5($record['country']['iso_code']);
            if($record['country']['iso_code'] == 'IN'  && $remote_ip != $indian_ip) {
                echo '<h1>Bad Request !!</h1>';
                exit;
            } else {
                Yii::app()->session['region_token'] = $region_token;
            }

        }
    }

    /*
     * get visitor ip address
     * @return string $ip
     */
    public static function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }


    /*
     * check where country code is stored at session and return country code
     * @return object $country_details
     */
    public static function checkForStoredCountry(){
//        if(!isset(Yii::app()->session['region_token'])){
//            Generic::determineCountry();
//        }
//        $region_token = Yii::app()->session['region_token'];
        $criteria = new CDbCriteria();
        $criteria->condition = 'sortname =:iso_code and status = :status';
        $criteria->params = array(':iso_code' => 'BD',':status' => 1);
        $country_details =  Countries::model()->find($criteria);
        if($country_details)
            return $country_details;
        return "";
    }

    /*
     * check if the requested country actively exists
     * @return object $country
     */
    public static function checkValidCountryRequest($country_code){
        $criteria = new CDbCriteria();
        $criteria->condition = 'sortname =:country_code and status = :status';
        $criteria->params = array(':country_code' => strtoupper($country_code),':status' => 1);
        $country = Countries::model()->find($criteria);
        return $country;
    }

    public static function getBusinessPlanDetails($id, $table_name = 'tbl_business_plan_config')
    {

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from($table_name)
            ->where('id=:id', array(':id' => $id));
        $command->queryRow();
        $data_result = $command->queryRow();
        return $data_result;

    }

    public static function getStorePlanDetails($table_name = 'tbl_business_plan_config')
    {

        $connection = Yii::app()->db;;
        $command = $connection->createCommand()
            ->select("*")
            ->from($table_name);
        
        $data_result = $command->queryAll();
        return $data_result;

    }


    /*
     * send Invoice to user
     */
    public static function sendInvoice($user_id,$payment_details,$pricing_details,$service_plan)
    {
        $user_details = Register::model()->findByPk($user_id);
        $user_country_details = Generic::getCountryFromCountryId($user_details->country);
        $ad_details = Ads::model()->findByPk($payment_details->ad_id);
        $transaction_date = new \DateTime($payment_details->transaction_date);
        $total_amount = intval($pricing_details["price"]);
        $additional_block = '';
        $second_page = '';
        $service_creation_date = new \DateTime();
        $service_expire_date = new \DateTime();
        $service_expire_date->modify('1 month');
        if($service_plan != '') {
            if($payment_details->service_promotion_id){
                $service_creation_date = new \DateTime();
                $service_expire_date = new \DateTime();
                $service_expire_date->modify($pricing_details['duration']);
                $second_page = '';
            } else {
                $service_creation_date = new \DateTime($service_plan->activation_date);
                $service_expire_date = new \DateTime($service_plan->expiration_date);

                if($service_plan->additional_service){
                    $total_amount += 1000;
                    $additional_block = '<tr>
		<td>Ad Post Service</td>
		<td align="center">2000.00</td>
	    </tr>';
                }

                $second_page = '
<div style="width:800px; height:90px; background:url(/images/pad_top.jpg) no-repeat; background-size:100%;"></div>
<div style="width:1000px; padding-top:70px; height:728px;">
<p>Package includes:</p>
'.$pricing_details['details'].'
</div>
<div style="width:800px; height:95px; background:url(/images/pad_bottom.png) no-repeat; background-size:100%;"></div>
';
            }
        }

        $country_details = Generic::checkForStoredCountry();
        $remote_ip = Generic::getUserIP();

        $total_amount_in_word = Generic::convertNumber($total_amount);

        $vat_amount = ceil($total_amount * 4.5/100);
        $deducted_total = $total_amount - $vat_amount;
        $payment_method = '';
        if($payment_details->payment_method == 1){
            $payment_method = 'Visa / MasterCard';
        } else if($payment_details->payment_method == 2){
            $payment_method = 'Bank Deposit';
        } else if($payment_details->payment_method == 3){
            $payment_method = 'Direct Payment';
        }
        $block = '';
        $description_block = '';
        $subject_block = '';
        if(Generic :: currency_convert($total_amount, 'BDT', $country_details->currency)){
            $block = '<p>'.$total_amount.' BDT = '.Generic :: currency_convert($total_amount, 'BDT', $country_details->currency).' '.$country_details->currency.'</p>';
        }
        if($service_plan != '') {
            if($payment_details->service_promotion_id){
                $description_block = '<tr>
					<td>Payment for "Service Promotion(' . ucwords($pricing_details["name"]) . ' /' . $pricing_details["duration"] . ')"<br>Duration: ' . $service_creation_date->format("d M, Y") . ' to ' . $service_expire_date->format("d M, Y") . '</td>
					<td align="center">' . number_format($deducted_total, 2) . '</td>
				</tr>';
                $subject_block = 'Thank you for subscribing our services. We really appreciate your business. For more details, please contact with us.';
            } else {
                $description_block = '<tr>
					<td>Payment for "Business E-store(' . ucwords($pricing_details["name"]) . ' /' . $pricing_details["duration"] . ')"<br>Duration: ' . $service_creation_date->format("d M, Y") . ' to ' . $service_expire_date->format("d M, Y") . '</td>
					<td align="center">' . number_format($deducted_total, 2) . '</td>
				</tr>';
                $subject_block = 'Thank you for subscribing our services. We really appreciate your business. For more details, please contact with us.';
            }

        } else {
            $description_block = '<tr>
					<td>Payment for "Individual Ad ('.$ad_details->title.')"<br>Duration: ' . $service_creation_date->format("d M, Y") . ' to ' . $service_expire_date->format("d M, Y") . '</td>
					<td align="center">' . number_format($deducted_total, 2) . '</td>
				</tr>';
            $subject_block = 'Thank you for posting a paid Ad. We really appreciate your proceeding with us. For more details, please contact with us.';
        }
        $html_content = '
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style>
.options li span{color:green;}
</style>
	</head>
	<body>
		<div style="width:800px; height:90px; background:url(/images/pad_top.jpg) no-repeat; background-size:100%;"></div>
		<div style="width:1000px; padding-top:70px; height:728px;">
			<div style="float: left; width:45%; ">
				<p>INVOICE TO</p>
				<p>
                    '.strtoupper('Registration id: '.$user_details->id).'<br/>
					'.strtoupper($user_details->enterprise_name).'<br/>
					'.strtoupper($user_details->user_name).'<br/>
					'.$user_details->designation.'<br/>
					'.$user_details->address.'<br/>
					'.$user_country_details["name"].'
				</p>
				<p>
					'.$user_details->email.'<br/>
					'.$user_details->phone_number.'
				</p>
			</div>
			<div style="float:right; width:55%;">
				<p style="text-align:center; letter-spacing:16px;">INVOICE DETAILS</p>
				<div style="border-right: solid 1px #000; padding: 0 3px; float: left; width:100px; ">
					<span>Total Amount</span><br>
					<span>BDT '.$payment_details->payment_amount.'</span>
				</div>
				<div style="border-right: solid 1px #000; padding: 0 3px; float: left; width:120px;">
					<span>Transaction Date</span><br>
					<span>'.$transaction_date->format("d M Y").'</span>
				</div>
				<div style="padding: 0 3px;float: left; width:120px;">
					<span>Invoice ID</span><br>
					<span>'.$payment_details->invoice_id.'</span>
				</div>
				<div style="clear:both"></div>
				<p style="margin-left:3px;">Payment by: '.$payment_method.'</p>
				<p style="margin-left:3px;">Card Number: '.$payment_details->card_info.'</p>
			</div>
			<div style="clear:both"></div>
			<p>Dear Sir/Madam</p>
			<p>'.$subject_block.'</p>
			<table align="center" width="800" border="1">
				<tr>
					<th>Description of the Services</th>
					<th align="center">Amount (BDT)</th>
				</tr>
				'.$description_block.$additional_block.'
				<tr>
					<td>Add: Vat@4.5% under Service</td>
					<td align="center">'.number_format($vat_amount,2).'</td>
				</tr>
				<tr>
					<td>Total Payment</td>
					<td align="center">'.number_format($total_amount,2).'</td>
				</tr>
			</table>
			<br>
			<br>
			<p>Amount In Word: '.ucwords($total_amount_in_word).' only</p>
			'.$block.'

			<br>
			<div style="float: left; width:250px; border:solid 1px #000; text-align:center;">
				<p>24X7 Support</p>
				<p>support@bdbroadbanddeals.com</p>
			</div>
			
			<div style="clear:both"></div>
			<span>Originated IP:'.$remote_ip.'</span>
			</div>
            <div style="width:800px; height:95px; background:url(/images/pad_bottom.png) no-repeat; background-size:100%;"></div>
'.$second_page.'
	</body>
</html>';

        $temp_file = tempnam(sys_get_temp_dir(), 'Inv');
        //$create_date = new \DateTime();
        //$temp_file ='d://invoice_'.$create_date->getTimestamp().'.pdf';

        $mpdf = new mPDF();

        $mpdf->WriteHTML($html_content);
        $mpdf->Output($temp_file,'F');


        $create_date = new \DateTime();
        $file_name = 'Invoice_'.$create_date->getTimestamp().'.pdf';
        $content = file_get_contents($temp_file);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));

        $to = $user_details->email;
        $from = Yii::app()->params['transactionEmail'];
        $subject = "Invoice from bdbroadbanddeals.com";


        $message = "Dear Sir/Madam,\n\nThank you for subscribing for our services. We really appreciate your business with us. Need more help, please contact with us." ;


        // main header (multipart mandatory)
        $headers = "From: bdbroadbanddeals.com <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

        // message
        $nmessage = "--".$uid."\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message."\r\n\r\n";
        $nmessage .= "--".$uid."\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
        $nmessage .= $content."\r\n\r\n";
        $nmessage .= "--".$uid."--";

        @mail($to, $subject, $nmessage, $headers);

        $to = Yii::app()->params['transactionEmail'];
        $from = $user_details->email;
        $headers = "From: ".$user_details->user_name." <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";


        @mail($to, $subject, $nmessage, $headers);

    }

    /**
    * invoice sending for ISP
    */
    public static function sendISPInvoice($user_id,$payment_details,$isp_details,$isp_package_type,$isp_duration)
    {
        $user_details = Register::model()->findByPk($user_id);
        $user_country_details = Generic::getCountryFromCountryId($user_details->country);
        $ad_details = Ads::model()->findByPk($payment_details->ad_id);
        $transaction_date = new \DateTime($payment_details->transaction_date);
        $total_amount = intval($isp_details->amount);
        $additional_block = '';
        $second_page = '';
        $service_creation_date = new \DateTime();
        $service_expire_date = new \DateTime($isp_details->expire_date);

        $country_details = Generic::checkForStoredCountry();
        $remote_ip = Generic::getUserIP();

        $total_amount_in_word = Generic::convertNumber($total_amount);

        $vat_amount = ceil($total_amount * 5/100);
        $deducted_total = intval($total_amount - $vat_amount);
        $total_due = intval($total_amount) - intval($payment_details->payment_amount);
        
        if($isp_details->ad_post_service){
            $additional_block = '<tr>
                <td>ISP Panel Mgt. Service</td>
                <td align="center">1000.00</td>
                </tr>';
            $deducted_total -= 1000;
            if($deducted_total < 0){
                $deducted_total = 0;
            }
        }

        $payment_method = '';
        if($payment_details->payment_method == 1){
            $payment_method = 'Visa / MasterCard';
        } else if($payment_details->payment_method == 2){
            $payment_method = 'Bank Deposit';
        } else if($payment_details->payment_method == 3){
            $payment_method = 'Direct Payment';
        }
        $block = '';
        $description_block = '';
        $subject_block = '';
        if(Generic :: currency_convert($total_amount, 'BDT', $country_details->currency)){
            $block = '<p>'.$total_amount.' BDT = '.Generic :: currency_convert($total_amount, 'BDT', $country_details->currency).' '.$country_details->currency.'</p>';
        }
        if($user_details->register_type == 'business'){
            $description_block = '<tr>
                <td>Payment for "ISP(' . ucwords($user_details->enterprise_name) . ' /' . $isp_duration . ')"<br>Duration: ' . $service_creation_date->format("d M, Y") . ' to ' . $service_expire_date->format("d M, Y") . '</td>
                <td align="center">' . number_format($deducted_total, 2) . '</td>
            </tr>';
            $subject_block = 'Thank you for subscribing our services. We really appreciate your business. For more details, please contact with us.';
        }

        $card_info_block = '';
        if($payment_details->card_info) {
            $card_info_block = '<p style="margin-left:3px;">Card Number: '.$payment_details->card_info.'</p>';
        }

        $html_content = '
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
.options li span{color:green;}
</style>
    </head>
    <body>
        <div style="width:800px; height:90px; background:url(/images/pad_top.jpg) left top no-repeat; background-size:100%;"></div>
        <div style="width:1000px; padding-top:55px; height:723px;">
            <div style="float: left; width:45%; ">
                <p>INVOICE TO</p>
                <p>
                    '.strtoupper('Registration id: '.$user_details->id).'<br/>
                    '.strtoupper($user_details->enterprise_name).'<br/>
                    '.strtoupper($user_details->user_name).'<br/>
                    '.$user_details->designation.'<br/>
                    '.$user_details->address.'<br/>
                    '.$user_country_details["name"].'
                </p>
                <p>
                    '.$user_details->email.'<br/>
                    '.$user_details->phone_number.'
                </p>
            </div>
            <div style="float:right; width:55%;">
                <p style="text-align:center; letter-spacing:16px;">INVOICE DETAILS</p>
                <div style="border-right: solid 1px #000; padding: 0 3px; float: left; width:100px; ">
                    <span>Paid Amount</span><br>
                    <span>BDT '.$payment_details->payment_amount.'</span>
                </div>
                <div style="border-right: solid 1px #000; padding: 0 3px; float: left; width:120px;">
                    <span>Transaction Date</span><br>
                    <span>'.$transaction_date->format("d M Y").'</span>
                </div>
                <div style="padding: 0 3px;float: left; width:120px;">
                    <span>Invoice ID</span><br>
                    <span>'.$payment_details->invoice_id.'</span>
                </div>
                <div style="clear:both"></div>
                <p style="margin-left:3px;">Payment by: '.$payment_method.'</p>
                '.$card_info_block.'
            </div>
            <div style="clear:both"></div>
            <p>Dear Sir/Madam</p>
            <p>'.$subject_block.'</p>
            <table align="center" width="800" border="1">
                <tr>
                    <th>Description of the Services</th>
                    <th align="center">Amount (BDT)</th>
                </tr>
                '.$description_block.$additional_block.'
                <tr>
                    <td>Add: Vat@5% under Service</td>
                    <td align="center">'.number_format($vat_amount,2).'</td>
                </tr>
                <tr>
                    <td>Total Payment (including VAT)</td>
                    <td align="center">'.number_format($total_amount,2).'</td>
                </tr>
                <tr>
                    <td>Paid Amount</td>
                    <td align="center">'.number_format($payment_details->payment_amount,2).'</td>
                </tr>
                <tr>
                    <td>Due Amount</td>
                    <td align="center">'.number_format($total_due,2).'</td>
                </tr>
            </table>
            <br>
            <br>
            <p>Total Amount In Word: '.ucwords($total_amount_in_word).' only</p>

            <br>
            <div style="float: left; width:250px; border:solid 1px #000; text-align:center;">
                <p>24X7 Support</p>
                <p>support@bdbroadbanddeals.com</p>
            </div>
            
            <div style="clear:both"></div>
            <span>Originated IP:'.$remote_ip.'</span>
            </div>
            <div style="width:800px; height:95px; background:url(/images/pad_bottom.png) no-repeat; background-size:100%;"></div>
'.$second_page.'
    </body>
</html>';

        $temp_file = tempnam(sys_get_temp_dir(), 'Inv');
        //$create_date = new \DateTime();
        //$temp_file ='d://invoice_'.$create_date->getTimestamp().'.pdf';

        $mpdf = new mPDF();

        $mpdf->WriteHTML($html_content);
        $mpdf->Output($temp_file,'F');


        $create_date = new \DateTime();
        $file_name = 'Invoice_'.$create_date->getTimestamp().'.pdf';
        $content = file_get_contents($temp_file);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));

        $to = $user_details->email;
        $from = Yii::app()->params['transactionEmail'];
        $subject = "Invoice from bdbroadbanddeals.com";


        $message = "Dear Sir/Madam,\n\nThank you for subscribing for our services. We really appreciate your business with us. Need more help, please contact with us." ;


        // main header (multipart mandatory)
        $headers = "From: bdbroadbanddeals.com <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

        // message
        $nmessage = "--".$uid."\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message."\r\n\r\n";
        $nmessage .= "--".$uid."\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
        $nmessage .= $content."\r\n\r\n";
        $nmessage .= "--".$uid."--";

        @mail($to, $subject, $nmessage, $headers);

        $to = Yii::app()->params['transactionEmail'];
        $from = $user_details->email;
        $headers = "From: ".$user_details->user_name." <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";


        @mail($to, $subject, $nmessage, $headers);

    }

    /*
     * Generic function to send email with attachment
     */
    public static function sendMailWithAttachment($subject,$from,$to,$message,$html_content,$from_name = 'bdbroadbanddeals.com'){

        $create_date = new \DateTime();
        $temp_file = tempnam(sys_get_temp_dir(), 'Registration');
        //$temp_file = 'd://Registration_'.$create_date->getTimestamp().'.pdf';;
        $mpdf = new mPDF();

        $mpdf->WriteHTML($html_content);
        $mpdf->Output($temp_file,'F');



        $file_name = 'Registration_'.$create_date->getTimestamp().'.pdf';
        $content = file_get_contents($temp_file);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));

        // main header (multipart mandatory)
        $headers = "From: ".str_replace(":", "", $from_name)." <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

        // message
        $nmessage = "--".$uid."\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message."\r\n\r\n";
        $nmessage .= "--".$uid."\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
        $nmessage .= $content."\r\n\r\n";
        $nmessage .= "--".$uid."--";

        @mail($to, $subject, $nmessage, $headers);
    }

    /*
     * send registration paper as attachment in mail
     */
    public static function sendRegistrationPaper($registered_user){

        $current_date = new \DateTime();
        $current_date->setTimezone(new DateTimeZone('Asia/Dhaka'));
        $remote_ip = Generic::getUserIP();
        $enterprise_name_block = '';
        $type_of_business_block = '';
        $country_block = '';
        $country_details = '';
        $designation = 'N/A';
        $license_block = '';
        if($registered_user->license_number != '') {
            $license_block = '<tr>
                                <td colspan="2" style="border:none">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>License Number:</td>
                                <td>'.$registered_user->license_number.'</td>
                            </tr>';
        }

        $company_type = $registered_user->register_type;
        $isp_category_name = '';
        if($company_type == "business"){
            $company_type = "Internet Service Provider";
            $isp_category_name = '<tr>
                                <td width="200">ISP Type</td>
                                <td align="left" class="shade_text">'.self::getISPCategoryName($registered_user->isp_type).'</td>
                            </tr><tr>
                            <td colspan="2" style="border:none">&nbsp;</td>
                            </tr>';
        }
        
        if($registered_user->business_category_id != ''){
            $enterprise_name_block = '<tr>
		<td width="200">Enterprise Name</td>
		<td align="left" class="shade_text">'.$registered_user->enterprise_name.'</td>
	</tr><tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>';
            $category_details = Category::model()->findByPk($registered_user->business_category_id);
            $type_of_business_block = '<tr>
		<td width="200">Type of Business</td>
		<td align="left" class="shade_text">'.$category_details->category_name.'</td>
	</tr><tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>';
        }
        if($registered_user->country){
            $country_details = Countries::model()->findByPk($registered_user->country);
            $country_block = '<tr>
		<td width="200">Country</td>
		<td align="left" class="shade_text">'.$country_details->name.'</td>
	</tr><tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>';
        }
        if($registered_user->designation){
            $designation = $registered_user->designation;
        }
        $html_content = '<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.shade_text{ color: gray}
		td{border-bottom:dotted 1px black; padding:0px 10px; }
        h2{ text-align: center;}
	</style>
</head>
<body>
<div style="width:800px; height:90px; background:url(/images/pad_top_reg.jpg); background-size:100%;"></div>
<div style="width:1000px; height:810px;">
<h2>Registration Paper</h2>
<div style="float:right; width:50%;">
<table width="95" align="right">
<tr>
	<td>Date:</td>
	<td>'.$current_date->format("d-m-Y H:i:s").'</td>
</tr>
</table>
</div>
<div style="clear:both"></div>
<p>Dear Sir/Madam</p>
<p>Thank you for your registration. For more details, please contact with us.</p>
<div style="border:solid 0.5px black; border-radius:5px; padding:5px;">
<table align="center" width="800" border="0">
	<tr>
		<th align="center" colspan="2">User Information</th>
	</tr>
    <tr>
        <td width="200">Registration Number</td>
        <td align="left" class="shade_text">'.$registered_user->id.'</td>
    </tr>
    <tr>
    <td colspan="2" style="border:none">&nbsp;</td>
    </tr>
	<tr>
		<td width="200">Full Name</td>
		<td align="left" class="shade_text">'.$registered_user->user_name.'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Designation</td>
		<td align="left" class="shade_text">'.$designation.'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Registration Type</td>
		<td align="left" class="shade_text">'.ucwords($company_type).'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	'.$enterprise_name_block.'
	'.$type_of_business_block.'
    '.$isp_category_name.'
	<tr>
		<td width="200">Address</td>
		<td align="left" class="shade_text">'.$registered_user->address.', '.$registered_user->division.', '.$country_details->name.'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Email</td>
		<td align="left" class="shade_text">'.$registered_user->email.'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Contact Number</td>
		<td align="left" class="shade_text">'.$registered_user->phone_number.'</td>
	</tr>
	<tr>
	<td colspan="2" style="border:none">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Status</td>
		<td align="left" class="shade_text">Active</td>
	</tr>
    '.$license_block.'
</table>
</div>
<br>
<br>

<span>Originated IP:'.$remote_ip.'</span>
</div>
<div style="width:800px; height:95px; background:url(/images/pad_bottom.png) no-repeat; background-size:100%;"></div>
</body>
</html>';
        $from = $registered_user->email;
        $to = Yii::app()->params['registrationEmail'];
        $subject = 'Registration successful';
        $message = 'An user has successfully completed registration process. Please find details in attachment.';
        Generic::sendMailWithAttachment($subject,$from,$to,$message,$html_content,$registered_user->user_name);

        $from = Yii::app()->params['registrationEmail'];
        $to = $registered_user->email;
        $subject = 'User registration successful';
        $message = 'You have successfully completed registration process. Please find details in attachment.';
        Generic::sendMailWithAttachment($subject,$from,$to,$message,$html_content);
    }




    public static function convertNumber($number)
    {
        list($integer, $fraction) = explode(".", (string) $number);

        $output = "";

        if ($integer{0} == "-")
        {
            $output = "negative ";
            $integer    = ltrim($integer, "-");
        }
        else if ($integer{0} == "+")
        {
            $output = "positive ";
            $integer    = ltrim($integer, "+");
        }

        if ($integer{0} == "0")
        {
            $output .= "zero";
        }
        else
        {
            $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
            $group   = rtrim(chunk_split($integer, 3, " "), " ");
            $groups  = explode(" ", $group);

            $groups2 = array();
            foreach ($groups as $g)
            {
                $groups2[] = Generic::convertThreeDigit($g{0}, $g{1}, $g{2});
            }

            for ($z = 0; $z < count($groups2); $z++)
            {
                if ($groups2[$z] != "")
                {
                    $output .= $groups2[$z] . Generic::convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                        );
                }
            }

            $output = rtrim($output, ", ");
        }

        if ($fraction > 0)
        {
            $output .= " point";
            for ($i = 0; $i < strlen($fraction); $i++)
            {
                $output .= " " . Generic::convertDigit($fraction{$i});
            }
        }

        return $output;
    }

    public static function convertGroup($index)
    {
        switch ($index)
        {
            case 11:
                return " decillion";
            case 10:
                return " nonillion";
            case 9:
                return " octillion";
            case 8:
                return " septillion";
            case 7:
                return " sextillion";
            case 6:
                return " quintrillion";
            case 5:
                return " quadrillion";
            case 4:
                return " trillion";
            case 3:
                return " billion";
            case 2:
                return " million";
            case 1:
                return " thousand";
            case 0:
                return "";
        }
    }

    public static function convertThreeDigit($digit1, $digit2, $digit3)
    {
        $buffer = "";

        if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
        {
            return "";
        }

        if ($digit1 != "0")
        {
            $buffer .= Generic::convertDigit($digit1) . " hundred";
            if ($digit2 != "0" || $digit3 != "0")
            {
                $buffer .= " and ";
            }
        }

        if ($digit2 != "0")
        {
            $buffer .= Generic::convertTwoDigit($digit2, $digit3);
        }
        else if ($digit3 != "0")
        {
            $buffer .= Generic::convertDigit($digit3);
        }

        return $buffer;
    }

    public static function convertTwoDigit($digit1, $digit2)
    {
        if ($digit2 == "0")
        {
            switch ($digit1)
            {
                case "1":
                    return "ten";
                case "2":
                    return "twenty";
                case "3":
                    return "thirty";
                case "4":
                    return "forty";
                case "5":
                    return "fifty";
                case "6":
                    return "sixty";
                case "7":
                    return "seventy";
                case "8":
                    return "eighty";
                case "9":
                    return "ninety";
            }
        } else if ($digit1 == "1")
        {
            switch ($digit2)
            {
                case "1":
                    return "eleven";
                case "2":
                    return "twelve";
                case "3":
                    return "thirteen";
                case "4":
                    return "fourteen";
                case "5":
                    return "fifteen";
                case "6":
                    return "sixteen";
                case "7":
                    return "seventeen";
                case "8":
                    return "eighteen";
                case "9":
                    return "nineteen";
            }
        } else
        {
            $temp = Generic::convertDigit($digit2);
            switch ($digit1)
            {
                case "2":
                    return "twenty-$temp";
                case "3":
                    return "thirty-$temp";
                case "4":
                    return "forty-$temp";
                case "5":
                    return "fifty-$temp";
                case "6":
                    return "sixty-$temp";
                case "7":
                    return "seventy-$temp";
                case "8":
                    return "eighty-$temp";
                case "9":
                    return "ninety-$temp";
            }
        }
    }

    public static function convertDigit($digit)
    {
        switch ($digit)
        {
            case "0":
                return "zero";
            case "1":
                return "one";
            case "2":
                return "two";
            case "3":
                return "three";
            case "4":
                return "four";
            case "5":
                return "five";
            case "6":
                return "six";
            case "7":
                return "seven";
            case "8":
                return "eight";
            case "9":
                return "nine";
        }
    }

    /*
     * Delete details e-store information from e-store_id
     * @param int $store_id
     */
    public static function deleteEstoreDetails($store_id){
        // Delete all Subscription plan
        $criteria = new CDbCriteria();
        $criteria->condition = 'estore_id = :estore_id';
        $criteria->params = array(':estore_id' => $store_id);
        $subscription_plan = Subscription_plan::model()->find($criteria);
        Subscription_plan::model()->deleteAll($criteria);

        // Delete subscription details
        $criteria = new CDbCriteria();
        $criteria->condition = 'plan_id = :plan_id';
        $criteria->params = array(':plan_id' => $subscription_plan->id);
        Subscription_details::model()->deleteAll($criteria);

        // Delete payment history
//        $criteria = new CDbCriteria();
//        $criteria->condition = 'subscription_id = :plan_id';
//        $criteria->params = array(':plan_id' => $subscription_plan->id);
//        PaymentHistory::model()->deleteAll($criteria);
    }

    /*
     * set session variables for transaction
     */
    public static function saveOrderInfoToSession($success_indicator,$order_id){
        Yii::app()->session['successIndicator'] = $success_indicator;
        Yii::app()->session['orderID'] = $order_id;
    }


    /*
     * Currency converter for different country
     * @param int $Amount
     * @param currency $from, $to (Ex: BDT , USD)
     * @return converted amount (Ex: 100)
     */
    public static function currency_convert($amount, $from, $to){
        if(!strcmp($from,$to)){
            return $amount;
        }
        else{
            $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
            $data = file_get_contents($url);
            preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
            $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
            return round($converted, 6);
        }
    }

    /*
     * Get Float number from a string
     * @param string $str
     */

    public static function Getfloat($str) {
        if(strstr($str, ",")) {
            $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
            $str = str_replace(",", ".", $str); // replace ',' with '.'
        }

        if(preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
            return floatval($match[0]);
        } else {
            return floatval($str); // take some last chances with floatval
        }
    }

    /*
     * Check portal login
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public static function checkPortalLogin($email,$password){
        $criteria = new CDbCriteria();
        $criteria->condition = 'email = :email and password = :password';
        $criteria->params = array(':email'=> $email, ':password' => md5($password));
        $portal_user = Portal_settings::model()->find($criteria);
        if($portal_user){
            return $portal_user->id;
        }
        return false;
    }

    /*
     * return array of referral from object list
     * @param object object_list
     * @param object object_list
     * @return mixed referral_ids
     */
    public static function returnReferralIdFromObject($admins,$guests){
        $referral_ids = array();

        if($admins) {
            $referral_ids = self::returnReferralIdFromUserList($admins);
        }

        if($guests){
            $referral_ids_temp = self::returnReferralIdFromUserList($guests);
            $referral_ids = array_merge($referral_ids,$referral_ids_temp);
        }

        return $referral_ids;
    }

    /*
     * get portal admins for super admin
     * @param object super_admin_id
     * @return mixed admin list
     */
    public static function getPortalAdmins($group_id,$super_admin){
        $admins = array();
        $admins = Portal_settings::model()->findAllByAttributes(array('group_id' => $group_id,'created_by' => $super_admin->id));
        return $admins;
    }

    /*
     * get portal guests for admin
     * @param integer $group_id
     * @param object $portal_user
     * @return mixed guest list
     */
    public static function getPortalGuests($group_id,$portal_user){
        $guests = array();
        $guests = Portal_settings::model()->findAllByAttributes(array('group_id' => $group_id, 'created_by' => $portal_user->id));
        $admins = self::getPortalAdmins(2,$portal_user);
        //Generic::_setTrace($admins);
        if($admins){
            foreach($admins as $admin) {
                $guest_of_admin = Portal_settings::model()->findAllByAttributes(array('group_id' => $group_id, 'created_by' => $admin->id));
                $guests = array_merge($guests,$guest_of_admin);
            }
        }
        return $guests;
    }

    /*
     * return array of referral from user list
     * @param mixed user_list
     * @return mixed referral_ids
     */
    public static function returnReferralIdFromUserList($user_list){
        $referral_ids = array();
        foreach($user_list as $user){
            $referrals = Portal_referral::model()->findAllByAttributes(array('portal_user_id' => $user->id));

            foreach ($referrals as $referral) {
                array_push($referral_ids,$referral->referral_id);
            }
        }

        return $referral_ids;
    }

    /*
     * return array of referral from user list
     * @param mixed user_ids
     * @return mixed referral_ids
     */
    public static function returnReferralIdFromUserIds($user_ids){
        $user_list = array();
        foreach($user_ids as $user){
            array_push($user_list,Portal_settings::model()->findByPk($user));
        }
        return self::returnReferralIdFromUserList($user_list);
    }

    /*
     * @param mixed user_ids
     * @return flag=0 for guest/guest+admin and flag=1 for admin
     */
    public static function AdminOrGuest($user_ids){
        //Generic::_setTrace($user_ids);
        $results = array();
        $connection = Yii::app()->db;;
        foreach($user_ids as $user) {
            $command = $connection->createCommand()
                ->select("group_id")
                ->from('tbl_portal_settings')
                ->where('id =:users', array(':users' => $user));
            array_push($results,$command->queryAll());
        }
        //Generic::_setTrace($results);
        $flag=1;
        foreach($results as $key=>$value){
            foreach($value as $ke=>$va) {
                foreach ($va as $k => $v) {
                    if($v==3){$flag = 0;}
                }
            }
        }
        return $flag;
    }
    /*
     * return array of referral from user list
     * @param mixed user_ids
     * @return mixed referral_ids
    */
    public static function returnReferralIdForAdmin($user_ids){
        $connection = Yii::app()->db;;
        /*Gather ids of guests created by the admin*/
        $results = array();
        foreach($user_ids as $user){
            $command = $connection->createCommand()
                ->select("id")
                ->from('tbl_portal_settings')
                ->where('created_by =:users', array(':users' => $user));

            array_push($results,$command->queryAll());
        }

        /*Gather referral_ids of those guests*/
        $user_list = array();
        foreach($results as $key=>$value){
            foreach($value as $ke=>$va){
                foreach($va as $k=>$v){
                    $command = $connection->createCommand()
                        ->select("referral_id")
                        ->from('tbl_portal_referral')
                        ->where('portal_user_id =:user_id', array(':user_id' => $v));

                    array_push($user_list,$command->queryAll());
                }
            }
        }

        /*Format the referral ids*/
        $referral_ids = array();
        foreach($user_list as $key=>$value) {
            foreach ($value as $ke => $va) {
                foreach ($va as $k => $v) {
                    array_push($referral_ids,$v);
                }
            }
        }
        return $referral_ids;
    }

    /*
     * get service configuration
     * @return mixed service_config
     */
    public static function getServiceConfiguration(){
        $service_config = array();
        $banner_config = Service_config::model()->findAllByAttributes(array('request_type' => 1,'status' => 1));
        $service_config['banner_config'] = $banner_config;
        $website_config = Service_config::model()->findAllByAttributes(array('request_type' => 2, 'status' => 1));
        $service_config['website_config'] = $website_config;
        $landing_page_config = Service_config::model()->findAllByAttributes(array('request_type' => 3, 'status' => 1));
        $service_config['landing_page_config'] = $landing_page_config;
        return $service_config;
    }

    /**
     * saving meta data for Ad
     */
    public static function saveMetaData($category_id,$ad_id,$custom_fields)
    {
        foreach ($custom_fields as $field) {
            $meta_data = new Ad_meta();
            $meta_data->category_id = $category_id;
            $meta_data->ad_id = $ad_id;
            $meta_data->field_name = $field['field_name'];
            $meta_data->field_value = $field['field_value'];
            $meta_data->save();
        }
        return true;
    }

    public static function getSpecialOfferAds(){

        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("*")
            ->from('tbl_ads')
            ->where('special_offer =:special_offer', array(':special_offer' => 1))
            ->andwhere('active = :active', array(':active' => 1));
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getExpireSoonAds(){

        $connection = Yii::app()->db;
        $current_date = new \DateTime('7 day');
        $command = $connection->createCommand()
            ->select("*,tas.id as ads_id")
            ->from('tbl_ads tas')
            ->join('tbl_register tr', 'tr.id=tas.user_id')
            ->where('expire_date <= :expire_date',array(':expire_date' => $current_date->format('Y-m-d')))
            ->order('expire_date ASC');
        $command ->queryAll();
        $data_result = $command->queryAll();
        return $data_result;

    }

    public static function getCountryFromCountryId($country_id){

        $connection = Yii::app()->db;
        $command = $connection->createCommand()
            ->select("*")
            ->from('countries')
            ->where('id =:country', array(':country' => $country_id));
        $command ->queryRow();
        $data_result = $command->queryRow();
        return $data_result;

    }

    /*
     * get formatted time from specific date time
     */
    public static function getFormattedTime($date){
        $date_time_object = new \DateTime($date);
        $date_time_object->setTimezone(new DateTimeZone(' ASIA/DHAKA'));
        return $date_time_object->format('d M Y H:i:s e');
    }
    
    /**
     * get division from district id
     * @param type $district_id
     * @return string
     */
    public static function getDivisionFromDistrict($district_id){
        $division_list = [];
        $district_details = District::model()->findAllByAttributes(array('district_id' => $district_id));
        foreach ($district_details as $district) {
            $division_list[] = $district->division_id;
        }
        if(!empty($division_list)) {
            return implode(',', $division_list);
        }
        return '';
    }

    public static function getActiveStatus($status){
        if($status){
            return "Active";
        } else {
            return "Deactive";
        }
    }

    /**
    * get all favorite counts for ad id
    */
    public static function getTotalFavoriteCount($ad_id){
        $favorite_criteria = new CDbCriteria();
        $favorite_criteria->condition = 'ad_id = :ad_id';
        $favorite_criteria->params = array(':ad_id' => $ad_id);
        $favorites = Favorites::model()->findAll($favorite_criteria);
        return count($favorites);
    } 

    /**
    * get isp category name from category id
    */
    public static function getISPCategoryName($category_id){
        $category_name = '';
        switch ($category_id) {
            case 1:
                $category_name = 'NationWide';
                break;
            case 2:
                $category_name = 'Central Zone';
                break;
            case 3:
                $category_name = 'South-East Zone';
                break;
            case 4:
                $category_name = 'North-East Zone';
                break;
            case 5:
                $category_name = 'South-West Zone';
                break;
            case 6:
                $category_name = 'North-West Zone';
                break;
            case 7:
                $category_name = 'Category-A';
                break;
            case 8:
                $category_name = 'Category-B';
                break;
            case 9:
                $category_name = 'Category-C';
                break;
            default:
                break;
        }
        return $category_name;
    }

    public static function getStatus($status){
        return $status == 1 ? 'Blacklisted' : 'Non-blacklisted';
    }

    public static function getISPCompanyName($reported_id){
        if(empty($reported_id)){
            return false;
        }
        $isp_details = Estore::model()->findByPk($reported_id);
        $user_details = Register::model()->findByPk($isp_details->user_id);
        return $user_details->enterprise_name;
    }

    public static function getURLwithScheme($url){
        $url_scheme = parse_url($url,PHP_URL_SCHEME);
        if(empty($url_scheme)){
            $url = 'https://'.$url;
        }
        return $url;
    }

    public static function renderServiceCharge($service_charge){
        $service_charge_text = "";
        if(empty($service_charge)){
            $service_charge_text = "Free";
        } else if(is_numeric($service_charge)){
            $service_charge_text = "&#2547; ".$service_charge;
        } else{
            $service_charge_text = $service_charge;
        }
        return $service_charge_text;
    }

    public static function getSurveyLinks(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'status = :status';
        $criteria->params = array(':status'=> 1);
        $criteria->order = 'id desc';
        $survey_links = SurveyList::model()->find($criteria);
        return $survey_links;
    }

}

