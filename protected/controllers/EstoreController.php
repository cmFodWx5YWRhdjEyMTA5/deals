<?php

require_once dirname(__FILE__) . "/../components/WriteHTML.php";

class EstoreController extends Controller
{

	public $layout='estore';
	public $title='';
	public function actionIndex($country_code = '',$company_name)
	{
		$requested_country = Generic::checkValidCountryRequest($country_code);

		if($country_code && !$requested_country){
			return ;
		}

		$locale = '';
		if($country_code){
			$locale = '/'.$country_code;
		}
		//$shop_id = Yii::app()->request->getParam('company_name','');
		$store_details = Estore::model()->findByAttributes(array('url_alias'=>$company_name));
		if(!$store_details->active){
			throw new CHttpException(404, "Invalid Request!");
		}
		$user_details = Register::model()->findByPk($store_details->user_id);
		$category_details = Category::model()->findByPk($user_details->business_category_id);
		$featured_products = Generic::getFeaturedProductsForEstore($store_details->user_id);
		$premium_products = Generic::getPremiumProductsForEstore($store_details->user_id);
		$top_products = Generic::getTopProductsForEstore($store_details->user_id);


		$opt = array(
			'h' =>'65',
			'g'=>'center',
			'r' => '0'
		);

		$this->title = 'Home | '.$user_details->enterprise_name;
		$this->render('index',array(
			'store_details'=>$store_details,
			'category_details'=>$category_details,
			'opt'=>$opt,
			'featured_products'=>$featured_products,
			'premium_products'=>$premium_products,
			'top_products'=>$top_products,
			'user_id'=>$store_details->user_id,
			'user_details'=>$user_details,
			'locale' => $locale
		));
	}
	public function actionShowEstore()
	{

		$this->render('index');
	}
	public function actionContact($country_code = '',$company_name)
	{
		$requested_country = Generic::checkValidCountryRequest($country_code);

		if($country_code && !$requested_country){
			return ;
		}

		$locale = '';
		if($country_code){
			$locale = '/'.$country_code;
		}
		$store_details = Estore::model()->findByAttributes(array('url_alias'=>$company_name));
		$user_details = Register::model()->findByPk($store_details->user_id);
		$category_details = Category::model()->findByPk($user_details->business_category_id);
		$featured_products = Generic::getFeaturedProductsForEstore($store_details->user_id);
		$premium_products = Generic::getPremiumProductsForEstore($store_details->user_id);
		$top_products = Generic::getTopProductsForEstore($store_details->user_id);

		if($user_details->address) {
			$user_location = $user_details->address;
		} else {
			$user_location = $user_details->district;
		}

		$lat_lon = Generic::getLatitudeLongitude($user_location);

		if($lat_lon) {
			if($lat_lon->status != "OK"){
				$user_location = $user_details->district;
				$lat_lon = Generic::getLatitudeLongitude($user_location);
				$latitude = $lat_lon->results[0]->geometry->location->lat;
				$longitude = $lat_lon->results[0]->geometry->location->lng;
			} else {
				$latitude = $lat_lon->results[0]->geometry->location->lat;
				$longitude = $lat_lon->results[0]->geometry->location->lng;
			}
		} else {
			$latitude = '22.872074';
			$longitude = '89.520455';
		}

		$opt = array(

			'h' =>'65',
			'g'=>'center',
			'r' => '0'
		);

		$thanks_message = '';
		if(isset($_POST['submit'])){
			$to = $user_details->email;
			$from = $_POST['email'];
			$name = $_POST['name'];
			$phone_number = $_POST['phone_number'];
			$message = $_POST['message'];
			$subject = "You have received a message from e-store in bdbroadbanddeals";
			$message_content = "<p>Mr/Mrs $name is in contact with you through your e-store in bdbroadbanddeals.com. User information including his/her message is given below.
			</p><br><p>Name : $name</p><p>Email : $from</p><p>Phone Number :$phone_number</p><p>Message : $message</p><br><p>Kind regards</p>";
			
			Generic::sendMail($message_content,$subject,$to);
			$current_date = new \DateTime();
			$message_details = 'My estimated offer price is BDT ' . $offered_price;
                $message = new Message();
                $message->sender_name = $name;
                $message->sender_email = $from;
                $message->sender_phone = $phone_number;
                $message->receiver = $store_details->user_id;
                $message->details = $message_content;
                $message->create_date = $current_date->format('Y-m-d H:i:s');
                $message->is_starred = 0;
                $message->read_status = 0;
                $message->reply_of = NULL;
                $message->save();

                /* ------------------- Add a notification --------------------- */
                $message_notification = new Notification_message();
                $message_notification->receiver_id = $store_details->user_id;
                $message_notification->create_date = $current_date->format('Y-m-d H:i:s');
                $message_notification->save();

			//mail($to,$subject,$message,$headers);
			$thanks_message = "Mail Sent successfully. Thank you " . $name . ", we will contact you shortly.";
		}
		$this->title = 'Contact Us | '.$user_details->enterprise_name;
		$this->render('contact-us',array(
			'store_details'=>$store_details,
			'category_details'=>$category_details,
			'opt'=>$opt,
			'featured_products'=>$featured_products,
			'premium_products'=>$premium_products,
			'top_products'=>$top_products,
			'user_id'=>$store_details->user_id,
			'user_details'=>$user_details,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'thanks_message' => $thanks_message,
			'locale' => $locale
		));
	}
	public function actionAbout($country_code = '',$company_name)
	{
		$requested_country = Generic::checkValidCountryRequest($country_code);

		if($country_code && !$requested_country){
			return ;
		}

		$locale = '';
		if($country_code){
			$locale = '/'.$country_code;
		}
		$store_details = Estore::model()->findByAttributes(array('url_alias'=>$company_name));
		$user_details = Register::model()->findByPk($store_details->user_id);
		$category_details = Category::model()->findByPk($user_details->business_category_id);
		$featured_products = Generic::getFeaturedProductsForEstore($store_details->user_id);
		$premium_products = Generic::getPremiumProductsForEstore($store_details->user_id);
		$top_products = Generic::getTopProductsForEstore($store_details->user_id);

		$opt = array(

			'h' =>'65',
			'g'=>'center',
			'r' => '0'
		);
		$this->title = 'About Us | '.$user_details->enterprise_name;
		$this->render('about-us',array(
			'store_details'=>$store_details,
			'category_details'=>$category_details,
			'opt'=>$opt,
			'featured_products'=>$featured_products,
			'premium_products'=>$premium_products,
			'top_products'=>$top_products,
			'user_id'=>$store_details->user_id,
			'user_details'=>$user_details,
			'locale' => $locale
		));
	}

	public function actionCreateEstore()
	{   $response = array();
		$user_id = Yii::app()->request->getParam('user_id','');
		$company_name = Yii::app()->request->getParam('company_name','');
		$url_alias = Yii::app()->request->getParam('company_url_alias','');
		$company_slogan = Yii::app()->request->getParam('slogan','');
		$company_logo = Yii::app()->request->getParam('logo_image','');

		$image_urls = Yii::app()->request->getParam('banner_image');
		$image_urls_array = explode(',',substr($image_urls, 1));
		$image_url = json_encode($image_urls_array);

		$sub_banner = Yii::app()->request->getParam('sub_banner');
		$sub_banner_image_urls_array = explode(',',substr($sub_banner, 1));
		$sub_banner_image_url = json_encode($sub_banner_image_urls_array);

		#ME
		$product_detail = Yii::app()->request->getParam('product_details');
		$product_detail_array = explode(',',substr($product_detail, 1));
		$product_details = json_encode($product_detail_array);

		$product_image = Yii::app()->request->getParam('product_images');
		$product_image_array = explode(',',substr($product_image, 1));
		$product_images = json_encode($product_image_array);

		$comments = Yii::app()->request->getParam('comment');

		$category = Yii::app()->request->getParam('category');
		$about_us = Yii::app()->request->getParam('about_us');
		$contact_us = Yii::app()->request->getParam('contact_us');
		$plan_id = Yii::app()->request->getParam('service_plan');
		$additional_service = Yii::app()->request->getParam('additional_service');
		$creation_date = new \DateTime();
		$country_details = Generic::checkForStoredCountry();
		$store = new Estore();
		$store->user_id = $user_id;
		$store->slogan = $company_slogan;
		$store->logo = $company_logo;
		$store->banner = $image_url;
		$store->sub_banner = $sub_banner_image_url;
		$store->categories = $category;
		$store->about_us = $about_us;
		$store->contact_us = $contact_us;

		#ME
		$store->comment = $comments;
		$store->product_details = $product_details;
		$store->product_images = $product_images;

		$store->url_alias = $url_alias;
		$store->create_date = $creation_date->format('Y-m-d');
		if($country_details){
			$store->country_code = $country_details->sortname;
		}
		if($store->save()) {
			$response['status'] = 'success';
			$response['company_name'] = urlencode($company_name);
			$response['url_alias'] = $url_alias;
			$response['store_id'] = base64_encode($store->id);
			$service_plan = new Subscription_plan();
			$service_plan->user_id = $user_id;
			$service_plan->estore_id = $store->id;
			$service_plan->plan_type = $plan_id;
			$service_plan->additional_service = $additional_service;
			$service_plan->create_date = $creation_date->format('Y-m-d H:i:s');
			$service_plan->save();

			$this->sendEstoreRequestToSupport($store,$service_plan);
		}
		else{
			$response['status'] = 'false';
			$response['message'] = 'Unable To Store Data.Please Try again Later';
		}
		echo json_encode($response);
	}

	public function actionUpdateEStore(){
		$response = array();
		$user_id = Yii::app()->request->getParam('user_id','');
		$user_details = Register::model()->findByPk($user_id);
		$company_name = Yii::app()->request->getParam('company_name','');
		$url_alias = Yii::app()->request->getParam('company_url_alias','');
		$company_slogan = Yii::app()->request->getParam('slogan','');
		$company_logo = Yii::app()->request->getParam('logo_image');
		if(empty($company_logo)){
		    $company_logo = $user_details->image;
        }
		if(!strpos($company_logo, 'uploads') !== false){
                $company_logo = Yii::app()->getBaseUrl(true).'/uploads/'.$company_logo;
        }
		
		$image_urls = Yii::app()->request->getParam('banner_image');
		$image_urls_array = explode(',',trim(str_replace(',,', ',', $image_urls),","));
		if(count($image_urls_array) > 3){
			unset($image_urls_array[3]);
		}
		$image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $image_urls_array);
		$image_url = json_encode($image_urls_array);

		$sub_banner = Yii::app()->request->getParam('sub_banner');
		$sub_banner = trim($sub_banner,',');
		$sub_banner_image_urls_array = explode(',',$sub_banner);
		if(count($sub_banner_image_urls_array) > 2){
			unset($sub_banner_image_urls_array[2]);
		}
		$sub_banner_image_urls_array = array_map(function($item){
            if(!strpos($item, 'uploads') !== false){
                $item = Yii::app()->getBaseUrl(true).'/uploads/'.$item;
            }
            return $item;
        }, $sub_banner_image_urls_array);
		$sub_banner_image_url = json_encode($sub_banner_image_urls_array);

		//$category = Yii::app()->request->getParam('category');
		$about_us = Yii::app()->request->getParam('about_us');
		$contact_us = Yii::app()->request->getParam('contact_us');

		#ME
		$product_detail = Yii::app()->request->getParam('product_details');
		$product_detail_array = explode(',',substr($product_detail, 1));
		$product_details = json_encode($product_detail_array);

		$product_image = Yii::app()->request->getParam('product_images');
		$product_image_array = explode(',',substr($product_image, 1));
		$product_images = json_encode($product_image_array);

		$comments = Yii::app()->request->getParam('comment');

		$facebook_link = Yii::app()->request->getParam('facebook_link','#');
		$twitter_link = Yii::app()->request->getParam('twitter_link','#');
		$linkedin_link = Yii::app()->request->getParam('linkedin_link','#');
		$google_plus_link = Yii::app()->request->getParam('google_plus_link','#');
        $web_address = Yii::app()->request->getParam('web_address','');
        $company_email = Yii::app()->request->getParam('company_email','');
        $sales_email = Yii::app()->request->getParam('sales_email','');
        $sales_phone_number = Yii::app()->request->getParam('sales_phone_number','');
        $company_hotline_number = Yii::app()->request->getParam('company_hotline_number','');
		$creation_date = new \DateTime();

		$store = Estore::model()->findByAttributes(array('user_id'=>$user_id));
		$store->slogan = $company_slogan;
		//$store->categories = $category;
		$store->logo = $company_logo;
		$store->banner = $image_url;
		$store->sub_banner = $sub_banner_image_url;
		$store->about_us = $about_us;
		$store->facebook_link = $facebook_link;
		$store->twitter_link = $twitter_link;
		$store->linkedin_link = $linkedin_link;
		$store->google_plus_link = $google_plus_link;
		$store->contact_us = $contact_us;

        $store->web_address = $web_address;
        $store->company_email = $company_email;
        $store->sales_email = $sales_email;
        $store->sales_phone_number = $sales_phone_number;
        $store->company_hotline_number = $company_hotline_number;

		#ME
		$store->comment = $comments;
		$store->product_details = $product_details;
		$store->product_images = $product_images;

		$store->update_date = $creation_date->format('Y-m-d');
		if($store->update()){
            $user_details_info = Register::model()->findByPk($user_id);
            $user_details_info->image = $company_logo;
            $user_details_info->save();

			$response['status'] = 'success';
			$response['company_name'] = urlencode($company_name);
			$response['url_alias'] = $url_alias;
			$response['store_id'] = base64_encode($store->id);
		} else{
			$response['status'] = 'false';
			$response['message'] = 'Unable To Store Data.Please Try again Later';
		}
		echo json_encode($response);
	}

	public function actionCreateEStoreFromSupport()
	{
		$user_id = Yii::app()->request->getParam('user_id','');
		$company_name = Yii::app()->request->getParam('company_name','');
		$url_alias = Yii::app()->request->getParam('company_url_alias','');
		$company_slogan = Yii::app()->request->getParam('slogan','');
		$company_logo = Yii::app()->request->getParam('logo_image','');
		$image_urls = Yii::app()->request->getParam('banner_image');
		$image_urls_array = explode(',',substr($image_urls, 1));
		$image_url = json_encode($image_urls_array);
		$sub_banner = Yii::app()->request->getParam('sub_banner');
		$sub_banner_image_urls_array = explode(',',substr($sub_banner, 1));
		$sub_banner_image_url = json_encode($sub_banner_image_urls_array);
		$category = Yii::app()->request->getParam('category');
		$about_us = Yii::app()->request->getParam('about_us');
		$contact_us = Yii::app()->request->getParam('contact_us');
		$plan_id = Yii::app()->request->getParam('service_plan');
		$store_id = Yii::app()->request->getParam('store_id');
		$additional_service = Yii::app()->request->getParam('additional_service');

		$creation_date = new \DateTime();
		$country_details = Generic::checkForStoredCountry();
		$store = Estore::model()->findByPk($store_id);
		$store->user_id = $user_id;
		$store->slogan = $company_slogan;
		$store->logo = $company_logo;
		$store->banner = $image_url;
		$store->sub_banner = $sub_banner_image_url;
		$store->categories = $category;
		$store->about_us = $about_us;
		$store->contact_us = $contact_us;
		$store->url_alias = $url_alias;
		$store->update();

		$store_link = Yii::app()->getBaseUrl(true).'/e-store/'.$url_alias;

		$this->render('estore-activation-success',array(
			'store_link' => $store_link
		));
	}

	public function actionCheckCompanyName(){
        $response = array();
		$url_alias = Yii::app()->request->getParam('url_alias');
		$user_id = Yii::app()->request->getParam('user_id');
        $user_details = Register::model()->findByPk($user_id);
		$user_district = $user_details->district;
		$user_district = strtolower($user_district);
		$sql="select url_alias from tbl_estore where url_alias='$url_alias'";
		$result=Yii::app()->db->createCommand($sql)->queryRow();
		$suggestion_string = $url_alias.'_'.$user_district;
		$suggestion_string_val = $url_alias.'_'.$user_district;
		$suggestion_string = "'$suggestion_string'";
		$suggestion_html = '<div id="suggestion">
                             <span>Here are Some Suggestion</span>
                             <a href="javascript:void(0);"  onclick="placeValue('.$suggestion_string.')">'.$suggestion_string_val.'</a>
                             </div>';



        if($result){
			$response['status'] = 'success';
			$response['message'] = 'A e-Store is Already Registered with This Name';
			$response['suggestion'] = $suggestion_html ;
		}
       else{
		   $response['status'] = 'false';
		   $response['message'] = 'Store URL Alias Is Available For Use.';
	   }
       echo json_encode($response);
	}

	private function sendEstoreRequestToSupport($store,$service_plan){
		$user_details = Register::model()->findByPk($store->user_id);
		$plan_name = '';
		switch($service_plan->plan_type){
			case 1:
				$plan_name = 'Standard';
				break;
			case 2:
				$plan_name = 'Silver';
				break;
			case 3:
				$plan_name = 'Platinum';
				break;
		}
		$activation_link = Yii::app()->getBaseUrl(true).'/estore-activation?token='.md5($store->url_alias);
		$message_line_spacing_single = '<br>';
		$message_line_spacing_double = '<br><br>';
		$to_email = Yii::app()->params['adminEmail'];
		$subject = 'Request for opening an estore';
		$message = '<h3>Following registered business requested for an estore with following details:</h3>';
		$message .= $message_line_spacing_double.'<p><strong>Business Name</strong>: '.$user_details->enterprise_name.'</p>';
		$message .= $message_line_spacing_double.'<p><strong>Contact Person Name</strong>: '.$user_details->user_name.'</p>';
		$message .= $message_line_spacing_single.'<p><strong>Business Url</strong>: '.$store->url_alias.'</p>';
		$message .= $message_line_spacing_single.'<p><strong>Contact Person Email</strong>: '.$user_details->email.'</p>';
		$message .= $message_line_spacing_single.'<p><strong>Contact Person Phone</strong>: '.$user_details->phone_number.'</p>';
		$message .= $message_line_spacing_single.'<p><strong>Service Plan</strong>: '.$plan_name.'</p>';
		$message .= $message_line_spacing_double.'<p>You can activate the Estore from the link below:</p>';
		$message .= $message_line_spacing_single.'<a href="'.$activation_link.'" target="_blank">'.$activation_link.'</a>';

		Generic::sendMail($message,$subject,$to_email);
	}
	public function actionAllProducts($country_code = '',$company_name){

		$requested_country = Generic::checkValidCountryRequest($country_code);

		if($country_code && !$requested_country){
			return ;
		}

		$locale = '';
		if($country_code){
			$locale = '/'.$country_code;
		}
		$store_details = Estore::model()->findByAttributes(array('url_alias'=>$company_name));
		$user_details = Register::model()->findByPk($store_details->user_id);
		$category_details = Category::model()->findByPk($user_details->business_category_id);
		$featured_products = Generic::getFeaturedProductsForEstore($store_details->user_id);
		$premium_products = Generic::getPremiumProductsForEstore($store_details->user_id);
		$top_products = Generic::getTopProductsForEstore($store_details->user_id);
		$user_id = $store_details->user_id;
		$all_products = Generic::getAllProductsOfStore($user_id,false,false);
		$opt = array(

			'h' =>'65',
			'g'=>'center',
			'r' => '0'
		);

		$setLimit = 3;
		if(isset($_GET["page"])){
			$page = (int)$_GET["page"];
		}else{
			$page = 1;
		}

		$pageLimit = ($page * $setLimit) - $setLimit;
		$total= count($all_products);
		$uri = Yii::app()->request->requestUri;
		$base_url = Yii::app()->request->getBaseUrl(true);
		$current_url = $base_url.$uri;
		/* ===================== Pagination Code Starts ================== */
		$adjacents = 7;
		$total_pages = count($all_products);
		//$targetpage = $current_url;
		$remove_Page = true;
		$targetpage="?";
		if($remove_Page){
			$targetpage = Yii::app()->request->requestUri;
			if(isset($_GET['page'])){
				$targetpage = str_replace('?page='.$_GET["page"] , '', $targetpage);
			}
			$targetpage="$targetpage";
		}

		$limit = 8;                                 //how many items to show per page
		$page = @$_GET['page'];
		if($page)
			$start = ($page - 1) * $limit;          //first item to display on this page
		else
			$start = 0;

		$all_products = Generic::getAllProductsOfStore($user_id,$start,$limit);


		if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
		$prev = $page - 1;                          //previous page is page - 1
		$next = $page + 1;                          //next page is page + 1
		$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;
		$pagination = "";
		if($lastpage > 1)
		{
			$pagination .= "<div class=\"pagination\">";
			if ($page > 1)
				$pagination.= "<a href=\"$targetpage?page=$prev\">&#171; Previous</a>";
			else
				$pagination.= "<span class=\"disabled\">&#171; Previous</span>";
			if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
			{
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
			{
				if($page < 1 + ($adjacents * 2))
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
				}
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
				}
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
					}
				}
			}
			if ($page < $counter - 1)
				$pagination.= "<a href=\"$targetpage?page=$next\">Next &#187;</a>";
			else
				$pagination.= "<span class=\"disabled\">Next &#187;</span>";
			$pagination.= "</div>\n";
		}
		/* ===================== Pagination Code Ends ================== */

		$this->title = 'Product Gallery | '.$user_details->enterprise_name;
		$this->render('all-products',array(
			'all_products'=> $all_products,
			'store_details'=>$store_details,
			'category_details'=>$category_details,
			'opt'=>$opt,
			'featured_products'=>$featured_products,
			'premium_products'=>$premium_products,
			'top_products'=>$top_products,
			'user_id'=>$store_details->user_id,
			'user_details'=>$user_details,
			'limit'=>$setLimit,
			'pageLimit'=>$pageLimit,
			'page'=>$page,
			'total'=>$total,
			'pagination'=>$pagination,
			'locale' => $locale
		));



	}

	public function actionproductDetails($country_code = '',$company_name,$product_id){
		$requested_country = Generic::checkValidCountryRequest($country_code);

		if($country_code && !$requested_country){
			return ;
		}

		$locale = '';
		if($country_code){
			$locale = '/'.$country_code;
		}
		$store_details = Estore::model()->findByAttributes(array('url_alias'=>$company_name));
		$user_details = Register::model()->findByPk($store_details->user_id);
		$category_details = Category::model()->findByPk($user_details->business_category_id);
		$featured_products = Generic::getFeaturedProductsForEstore($store_details->user_id);
		$premium_products = Generic::getPremiumProductsForEstore($store_details->user_id);
		$top_products = Generic::getTopProductsForEstore($store_details->user_id);
		$ad_details = Generic::getAddDetailsFromAddTable($product_id);
		$user_id = $store_details->user_id;
		$opt = array(

			'h' =>'65',
			'g'=>'center',
			'r' => '0'
		);
		$ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
		$category_id = Generic::getCategoryIdFromProductId($product_id);
		$related_products = Generic::getRelatedProductsForEstore($category_id,$user_id,$product_id,$country_code);
		$upsell_products = Generic::getUpSellProductsForEstore($category_id,$product_id,$country_code);

		$discount = round($ad_details['discount']);
		$total_price = $ad_details['price'];
		$discounted_total = $total_price - ($total_price * ($discount/100));

		$Criteria = new CDbCriteria();
		$Criteria->condition = "user_token = :user_token";
		$Criteria->params = array(':user_token'=>Yii::app()->session['user_token']);
		$loggedin_user = Register::model()->find($Criteria);

		$user_ip = SiteConfig::GetUserIP();

		$ad_owner_details = Register::model()->findByPk($store_details->user_id);

		$this->title = $ad_details['title'].' | '.$user_details->enterprise_name;

		$current_time = date('Y-m-d H:i:s');
		$ad_view = Generic::getAllFromAdView($product_id, $user_ip);
		$check_ip = isset($ad_view[0]['ip_address']) ? $ad_view[0]['ip_address'] : '';

		$last_viewed = isset($ad_view[0]['last_viewed']) ? $ad_view[0]['last_viewed']: '';
		$new_time = date("Y-m-d H:i:s", strtotime('+2 minutes',strtotime($last_viewed)));

		$connection=Yii::app()->db;

		if ($current_time > $new_time) {
			if ($check_ip >= 1) {
				$sql = "UPDATE tbl_ad_view SET last_viewed='$current_time',view_count=view_count+1 WHERE ad_id='$product_id' AND ip_address='$check_ip'";
			} else {
				$sql = "insert into tbl_ad_view SET ad_id='$product_id',ip_address='$user_ip',last_viewed='$current_time',view_count= 1";
			}
			$command = $connection->createCommand($sql);
			$result = $command->execute();
		}

		$ad_views = Generic::getTotalAdView($product_id);
		$view_count = array_sum(array_column($ad_views, 'view_count'));

		$favorite_counter = 0;
		$favorites = Favorites::model()->findAll();
		foreach ($favorites as $favorite) {
			$ad_array = explode(',',$favorite->ad_id);
			if(in_array($product_id,$ad_array)) {
				$favorite_counter++;
			}
		}

		$this->render('details',array(

			'store_details'=>$store_details,
			'category_details'=>$category_details,
			'featured_products'=>$featured_products,
			'premium_products'=>$premium_products,
			'top_products'=>$top_products,
			'user_id'=>$store_details->user_id,
			'user_details'=>$user_details,
			'opt'=>$opt,
			'ad_details'=>$ad_details,
			'ad_details_all'=>$ad_details_all,
			'related_products'=>$related_products,
			'upsell_products'=>$upsell_products,
			'loggedin_user'=>$loggedin_user,
			'ip_address' => $user_ip,
			'ad_owner_details' => $ad_owner_details,
			'view_count' => $view_count,
			'favorite_counter' => $favorite_counter,
			'locale' => $locale,
			'discounted_total' => $discounted_total,
			'return_url' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"

		));


	}

	public function actionSendOrderInvoice(){
		$response = array();
		$name = Yii::app()->request->getParam('name','');
		$email= Yii::app()->request->getParam('email_to','');
		$phone_number= Yii::app()->request->getParam('phone_number','');
		$item_name= Yii::app()->request->getParam('item_name','');
		$item_code= Yii::app()->request->getParam('item_code','');
		$price= Yii::app()->request->getParam('price','');
		$logo= Yii::app()->request->getParam('logo','#');
		$enterprise_name= Yii::app()->request->getParam('enterprise_name','');
		$address= Yii::app()->request->getParam('address','');
		$owner_number= Yii::app()->request->getParam('owner_number','');
		$loggedin_user_id= Yii::app()->request->getParam('loggedin_user_id','');
		$estore_id= Yii::app()->request->getParam('estore_id','');
		$owner_email= Yii::app()->request->getParam('owner_email','');



		$current_date = new \DateTime();
		$date = $current_date->format('d-m-Y');
		$create_date = $current_date->format('Y-m-d H:i:s');
		$otp_time = $current_date->format('Y-m-d H:i:s');
		$otp_code = mt_rand(100000, 999999);

		$estore_order = new EstoreOrder();
		$estore_order->registered_user_id = $loggedin_user_id;
		$estore_order->estore_id = $estore_id;
		$estore_order->product_name = $item_name;
		$estore_order->item_code = $item_code;
		$estore_order->product_price = $price;
		$estore_order->estore_name = $enterprise_name;
		$estore_order->buyer_name = $name;
		$estore_order->buyer_email = $email;
		$estore_order->buyer_phone = $phone_number;
		$estore_order->create_date = $create_date;
		$estore_order->otp = $otp_code;
		$estore_order->otp_time = $otp_time;
		$estore_order->order_source = "estore";
		if($estore_order->save()){
			$invoice_id = $estore_order->id;
			$estore_order->invoice_id = $invoice_id;
			$estore_order->update();

		};

		$style = '<style>

		*{
			border: 0;
			box-sizing: content-box;
			color: inherit;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			line-height: inherit;
			list-style: none;
			margin: 0;
			padding: 0;
			text-decoration: none;
			vertical-align: top;
		}


		*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

		*[contenteditable] { cursor: pointer; }

		*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

		span[contenteditable] { display: inline-block; }



		h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }



		table { font-size: 75%; table-layout: fixed; width: 100%; }
		table { border-collapse: separate; border-spacing: 2px; }
		th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
		th, td { border-radius: 0.25em; border-style: solid; }
		th { background: #EEE; border-color: #BBB; }
		td { border-color: #DDD; }




		html { background: #999; cursor: default; }

		body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
		body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

		/* header */

		header { margin: 0 0 3em; }
		header:after { clear: both; content: ""; display: table; }

		header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
		header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
		header address p { margin: 0 0 0.25em; }
		header span, header img { display: block; float: right; }
		header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
		header img { max-height: 100%; max-width: 100%; }
		header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

		/* article */

		article, article address, table.meta, table.inventory { margin: 0 0 3em; }
		article:after {   }
		article h1 { clip: rect(0 0 0 0); position: absolute; }

		article address { float: left; font-size: 125%; font-weight: bold; }

		/* table meta & balance */

		table.meta, table.balance { float: right; width: 36%; }
		table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

		/* table meta */

		table.meta th { width: 40%; }
		table.meta td { width: 60%; }

		/* table items */

		table.inventory { clear: both; width: 100%; }
		table.inventory th { font-weight: bold; text-align: center; }

		table.inventory td:nth-child(1) { width: 26%; }
		table.inventory td:nth-child(2) { width: 38%; }
		table.inventory td:nth-child(3) { text-align: right; width: 12%; }
		table.inventory td:nth-child(4) { text-align: right; width: 12%; }
		table.inventory td:nth-child(5) { text-align: right; width: 12%; }

		/* table balance */

		table.balance th, table.balance td { width: 50%; }
		table.balance td { text-align: right; }

		/* aside */

		aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
		aside h1 { border-color: #999; border-bottom-style: solid; }

		/* javascript */

		.add, .cut
		{
			border-width: 1px;
			display: block;
			font-size: .8rem;
			padding: 0.25em 0.5em;
			float: left;
			text-align: center;
			width: 0.6em;
		}

		.add, .cut
		{
			background: #9AF;
			box-shadow: 0 1px 2px rgba(0,0,0,0.2);
			background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
			background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
			border-radius: 0.5em;
			border-color: #0076A3;
			color: #FFF;
			cursor: pointer;
			font-weight: bold;
			text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
		}

		.add { margin: -2.5em 0 0; }

		.add:hover { background: #00ADEE; }

		.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
		.cut { -webkit-transition: opacity 100ms ease-in; }

		tr:hover .cut { opacity: 1; }

		@media print {
			* { -webkit-print-color-adjust: exact; }
			html { background: none; padding: 0; }
			body { box-shadow: none; margin: 0; }
			span:empty { display: none; }
			.add, .cut { display: none; }
		}

		@page { margin: 0; }

		</style>';
		$mail_content ='
     	<header>
			<h1>Request Connectivity</h1>
			<address>
				<p>'.$enterprise_name.'</p>
				<p>'.$address.'</p>
				<p>'.$owner_number.'</p>
			</address>
			<span><img alt="" height="55" width="225"  src="'.$logo.'"></span>
		</header>
		<article style="clear: both; display: block;">

			<address>
				<p>'.$name.'<br>'.$phone_number.'</p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>'.$invoice_id.'</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>'.$date.'</span></td>
				</tr>

			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Item</span></th>
						<th><span>Item Code</span></th>
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span>'.$item_name.'</span></td>
						<td><span>'.$item_code.'</span></td>
						<td><span data-prefix>BDT </span><span>'.$price.'</span></td>
						<td><span>1</span></td>
						<td><span data-prefix>BDT </span><span>'.$price.'</span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>BDT </span><span>'.$price.'</span></td>
				</tr>
				<tr>
					<th><span>Amount Paid</span></th>
					<td><span data-prefix>BDT </span><span>0.00</span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>BDT </span><span>'.$price.'</span></td>
				</tr>
			</table>
			<div style="clear:both;"></div>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
		 ';
		
		$email_to_visitor = Generic::sendMail($mail_content,"Request Connectivity From bdbroadbanddeals.com",$email,"bdbroadbanddeals.com <support@bdbroadbanddeals.com>",false,false,false,$style);
		$email_to_shop_owner = Generic::sendMail($mail_content,"Request Connectivity From bdbroadbanddeals.com",$owner_email,$email,false,false,"support@bdbroadbanddeals.com",$style);
		//$email_to_support = Generic::sendMail($mail_content,"Invoice From bdbroadbanddeals.com","business@bdbroadbanddeals.com",$email,false,false,"support@bdbroadbanddeals.com",$style);
		if($email_to_visitor && $email_to_shop_owner){

			$response['status'] = "success";

		}

		else{

			$response['status'] = "false";
		}

		echo json_encode($response);

	}

	public function actionOrderConfirmation(){
		
		$name = Yii::app()->request->getParam('sender_name','');
		$email= Yii::app()->request->getParam('sender_email','');
		$phone_number= Yii::app()->request->getParam('sender_phone','');
		$item_name= Yii::app()->request->getParam('product_name','');
		$item_code= Yii::app()->request->getParam('item_code','');
		$price= Yii::app()->request->getParam('product_price','');
		$logo= Yii::app()->request->getParam('logo','#');
		$enterprise_name= Yii::app()->request->getParam('enterprise_name','');
		$address= Yii::app()->request->getParam('address','');
		$owner_number= Yii::app()->request->getParam('owner_number','');
		$loggedin_user_id= Yii::app()->request->getParam('loggedin_user_id','');
		$estore_id= Yii::app()->request->getParam('estore_id','');
		$owner_email= Yii::app()->request->getParam('owner_email','');
		$return_url = Yii::app()->request->getParam('return_url','');

		$current_date = new \DateTime();
		$date = $current_date->format('d-m-Y');
		$create_date = $current_date->format('Y-m-d H:i:s');
		$otp_time = $current_date->format('Y-m-d H:i:s');
		$otp_code = mt_rand(100000, 999999);

		$estore_order = new EstoreOrder();
		$estore_order->registered_user_id = $loggedin_user_id;
		$estore_order->estore_id = $estore_id;
		$estore_order->product_name = $item_name;
		$estore_order->item_code = $item_code;
		$estore_order->product_price = $price;
		$estore_order->estore_name = $enterprise_name;
		$estore_order->buyer_name = $name;
		$estore_order->buyer_email = $email;
		$estore_order->buyer_phone = $phone_number;
		$estore_order->create_date = $create_date;
		$estore_order->otp = $otp_code;
		$estore_order->otp_time = $otp_time;
		$estore_order->order_source = "estore";
		if($estore_order->save()){
			$invoice_id = $estore_order->id;
			$estore_order->invoice_id = $invoice_id;
			$estore_order->update();
		};

		//Generic::sendOTPtoMail($otp_code,"One-time verification code from bdbroadbanddeals",$email);
		Generic::sendOTPMessage($otp_code,$phone_number);

		$this->render('otp_confirmation',array(
			'order_id' => $invoice_id,
			'phone_number' => $phone_number,
			'return_url' => $return_url
		));
	}

	public function actionResendOtp(){
		$response = array();
		$order_id = Yii::app()->request->getParam('order_id','');
		$criteria = new CDbCriteria();
        $criteria->condition = 'md5(id) = :order_id';
        $criteria->params = array(':order_id' => $order_id);
        $order_details = EstoreOrder::model()->find($criteria);

		$current_date = new \DateTime();
		$date = $current_date->format('d-m-Y');
		$create_date = $current_date->format('Y-m-d H:i:s');
		$otp_time = $current_date->format('Y-m-d H:i:s');
		$otp_code = mt_rand(100000, 999999);
		$phone_number = $order_details->buyer_phone;
		$email = $order_details->buyer_email;
		Generic::sendOTPtoMail($otp_code,"One-time verification code from bdbroadbanddeals",$email);
		Generic::sendOTPMessage($otp_code,$phone_number);
		$order_details->otp = $otp_code;
		$order_details->otp_time = $otp_time;
		$order_details->no_of_try = null;
		$order_details->update();
		echo json_encode($response);
	}


	/*
     * Check OTP which i submit on the register-confirmation page with my received mobile number OTP.
     * @return status success
     */

    public function actionCheckOtp() {
        $base_url = Yii::app()->request->getBaseUrl(true);
        $otp = Yii::app()->request->getParam('otp');
        $order_id = Yii::app()->request->getParam('order_id', '');
        $criteria = new CDbCriteria();
        $criteria->condition = 'md5(id) = :order_id';
        $criteria->params = array(':order_id' => $order_id);
        $order_details = EstoreOrder::model()->find($criteria);
        
        $response = array();
        if (!$order_details) {
            
        } else {
        	 if ($order_details->otp == $otp) {
	            $response['status'] = "Confirm Successfully";
	            $order_details->otp_time = null;
	            $order_details->otp = null;
	            $order_details->status = 1;
	            $order_details->update();
	            $estore_details = Estore::model()->findByPk($order_details->estore_id);
	            $user_details = Register::model()->findByPk($estore_details->user_id);
	            $style = '<style>

		*{
			border: 0;
			box-sizing: content-box;
			color: inherit;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			line-height: inherit;
			list-style: none;
			margin: 0;
			padding: 0;
			text-decoration: none;
			vertical-align: top;
		}


		*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

		*[contenteditable] { cursor: pointer; }

		*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

		span[contenteditable] { display: inline-block; }



		h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }



		table { font-size: 75%; table-layout: fixed; width: 100%; }
		table { border-collapse: separate; border-spacing: 2px; }
		th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
		th, td { border-radius: 0.25em; border-style: solid; }
		th { background: #EEE; border-color: #BBB; }
		td { border-color: #DDD; }




		html { background: #999; cursor: default; }

		body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
		body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

		/* header */

		header { margin: 0 0 3em; }
		header:after { clear: both; content: ""; display: table; }

		header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
		header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
		header address p { margin: 0 0 0.25em; }
		header span, header img { display: block; float: right; }
		header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
		header img { max-height: 100%; max-width: 100%; }
		header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

		/* article */

		article, article address, table.meta, table.inventory { margin: 0 0 3em; }
		article:after {   }
		article h1 { clip: rect(0 0 0 0); position: absolute; }

		article address { float: left; font-size: 125%; font-weight: bold; }

		/* table meta & balance */

		table.meta, table.balance { float: right; width: 36%; }
		table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

		/* table meta */

		table.meta th { width: 40%; }
		table.meta td { width: 60%; }

		/* table items */

		table.inventory { clear: both; width: 100%; }
		table.inventory th { font-weight: bold; text-align: center; }

		table.inventory td:nth-child(1) { width: 26%; }
		table.inventory td:nth-child(2) { width: 38%; }
		table.inventory td:nth-child(3) { text-align: right; width: 12%; }
		table.inventory td:nth-child(4) { text-align: right; width: 12%; }
		table.inventory td:nth-child(5) { text-align: right; width: 12%; }

		/* table balance */

		table.balance th, table.balance td { width: 50%; }
		table.balance td { text-align: right; }

		/* aside */

		aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
		aside h1 { border-color: #999; border-bottom-style: solid; }

		/* javascript */

		.add, .cut
		{
			border-width: 1px;
			display: block;
			font-size: .8rem;
			padding: 0.25em 0.5em;
			float: left;
			text-align: center;
			width: 0.6em;
		}

		.add, .cut
		{
			background: #9AF;
			box-shadow: 0 1px 2px rgba(0,0,0,0.2);
			background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
			background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
			border-radius: 0.5em;
			border-color: #0076A3;
			color: #FFF;
			cursor: pointer;
			font-weight: bold;
			text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
		}

		.add { margin: -2.5em 0 0; }

		.add:hover { background: #00ADEE; }

		.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
		.cut { -webkit-transition: opacity 100ms ease-in; }

		tr:hover .cut { opacity: 1; }

		@media print {
			* { -webkit-print-color-adjust: exact; }
			html { background: none; padding: 0; }
			body { box-shadow: none; margin: 0; }
			span:empty { display: none; }
			.add, .cut { display: none; }
		}

		@page { margin: 0; }

		</style>';
		$mail_content ='
     	<header>
			<h1>Request Connectivity</h1>
			<address>
				<p>'.$order_details->estore_name.'</p>
				<p>'.$user_details->phone_number.'</p>
			</address>
			<span><img alt="" height="55" width="225"  src="'.$estore_details->logo.'"></span>
		</header>
		<article style="clear: both; display: block;">

			<address>
				<p>'.$order_details->buyer_name.'<br>'.$order_details->buyer_phone.'</p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>'.$order_details->invoice_id.'</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>'.$order_details->create_date.'</span></td>
				</tr>

			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Item</span></th>
						<th><span>Item Code</span></th>
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span>'.$order_details->product_name.'</span></td>
						<td><span>'.$order_details->item_code.'</span></td>
						<td><span data-prefix>BDT </span><span>'.$order_details->product_price.'</span></td>
						<td><span>1</span></td>
						
					</tr>
				</tbody>
			</table>
			<div style="clear:both;"></div>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
		 ';
		
		$email_to_visitor = Generic::sendMail($mail_content,"Order Request From bdbroadbanddeals.com",$email,"bdbroadbanddeals.com <sales@bdbroadbanddeals.com>",false,false,false,$style);
		$email_to_shop_owner = Generic::sendMail($mail_content,"Order Request From bdbroadbanddeals.com",$order_details->buyer_email,$user_details->email,false,false,"sales@bdbroadbanddeals.com",$style);
			$response['business_url'] = 'e-store/'.$estore_details->url_alias.'/';
	            
        	} else {
        		$no_of_try = $order_details->no_of_try;
        		$no_of_try++;
        		$order_details->no_of_try = $no_of_try;
        		$order_details->update();
        	}
        }
       

        echo json_encode($response);
    }

	public function actionChangeOrderStatus(){

		$response = array();
		$status = Yii::app()->request->getParam('status');
		$id = Yii::app()->request->getParam('id');
		$data = EstoreOrder::model()->findByPk($id);
		$buyer_name = $data['buyer_name'];
		$invoice_number = $data['invoice_id'];
		$product_name = $data['product_name'];


		$data->status = $status;
		if($data->update()){

			if($data->status == 3){
				$response['status'] = "approved";
				$mail_content = "Dear $buyer_name <br>,";
				$mail_content .= "Your Order ID $invoice_number for this Product, Product Name: $product_name Has been Approved Successfully.<br>";
				$mail_content .= "Thanks";
				$subject = "Order Approval";
				$from = Yii::app()->params['businessEmail'];
				$admin_mail =  Yii::app()->params['adminEmail'];
				$to = $data['buyer_email'];
				Generic::sendMail($mail_content,$subject,$to,$from);
				Generic::sendMail($mail_content,$subject,$admin_mail,$from);
			}
			elseif($data->status == 2){
				$response['status'] = "cancelled";
				$mail_content = "Dear $buyer_name <br>,";
				$mail_content .= "Your Order ID $invoice_number for this Product, Product Name: $product_name Has been Cancelled.<br>";
				$mail_content .= "Thanks";
				$subject = "Order Cancellation";
				$from = Yii::app()->params['businessEmail'];
				$admin_mail =  Yii::app()->params['adminEmail'];
				$to = $data['buyer_email'];
				Generic::sendMail($mail_content,$subject,$to,$from);
				Generic::sendMail($mail_content,$subject,$admin_mail,$from);
			} elseif($data->status == 4){
				$response['status'] = "completed";
				$mail_content = "Dear $buyer_name <br>,";
				$mail_content .= "Your Order ID $invoice_number for this Product, Product Name: $product_name Has been Completed.<br>";
				$mail_content .= "Thanks";
				$subject = "Order Complete";
				$from = Yii::app()->params['businessEmail'];
				$admin_mail =  Yii::app()->params['adminEmail'];
				$to = $data['buyer_email'];
				Generic::sendMail($mail_content,$subject,$to,$from);
				Generic::sendMail($mail_content,$subject,$admin_mail,$from);
			}

		}
		else{
			$response['status'] = "false";
		}
		echo json_encode($response);
	}

	public function actionchangestatus(){
		$base_url = Yii::app()->request->getBaseUrl(true);
		$status = Yii::app()->request->getParam('active');
		$company_id = Yii::app()->request->getParam('id');
		$business_type= 'estore';
		$business_url = '/estore/';
		if($company_id) {
			$company = Estore::model()->findByPk($company_id);
			$user_details = Register::model()->findByPk($company->user_id);
			if($user_details->register_type == 'business'){
				$business_type = 'isp';
				$business_url = '/isp/';
			}
			$business_url .= $company->url_alias;
			if($company){

				$company->active = $status;
				if($company->save()){
					if($status) {
						$message = 'Your bdbroadbanddeals.com admin panel has been approved. You can see it from the link below: <br><br><a href="'.$base_url.'/my-profile/dashboard" target="_blank">'.$base_url.'/my-profile/dashboard'.'</a>';

						$message_for_business = 'An '.$business_type.' has been approved. You can see it  from the link below: <br><br><a href="'.$base_url.$business_url.'" target="_blank">'.$base_url.$business_url.'</a>';

						Generic::sendMailApprovalToAdmin($company,$message_for_business);
						Generic::sendMailApprovalToBusiness($company,$message);
						//Generic::sendMailApprovalToAdmin($company,$message_for_business);
					}
					if($business_type == 'isp'){
                        $this->redirect($base_url . '/admin/business_estore/admin/store/0');
                    } else {
                        $this->redirect($base_url . '/admin/business_estore/admin/store/1');
                    }

				}
			}
		}
	}


}