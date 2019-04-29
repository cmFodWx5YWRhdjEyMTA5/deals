<?php

class ExpireAdCommand extends CConsoleCommand {
    public function run($args) {
        $todays_date = new \DateTime('tomorrow');
        $ad_criteria = new CDbCriteria();
        $ad_criteria->condition = 'active=:active and expire_date is not :expire_date';
        $ad_criteria->params = array(':active' => 1,':expire_date' => null);
        $ads = Ads::model()->findAll($ad_criteria);
        $expired_ad_list = [];
        //Generic::_setTrace($ads);
        foreach ($ads as $ad) {
        	$ad_expiration_date = new \DateTime($ad->expire_date);
        	if($todays_date > $ad_expiration_date){
        		$user_details = Register::model()->findByPK($ad->user_id);
        		$ad->active = 0;
        		$ad->expire_date = null;
        		if($ad->update()){
        			$expired_ad_list[] = $ad->id;
        		}
        		$this->sendMailToAdOWner($user_details);
        	}
        }
        file_put_contents(__DIR__.'/../runtime/expired_list_'.date('m-d-Y').'.json', json_encode($expired_ad_list));
        echo 'All expired Ad have been processed';
    }

    public function sendMailToAdOWner($user_details){
    	$to_email = $user_details->email;
    	if($user_details->register_type == 'personal'){
            $subject = 'Your Ad has been expired';
        } else if($user_details->register_type == 'business'){
            $subject = 'Your ISP Package has been expired';
        } else if($user_details->register_type == 'store'){
             $subject = 'Your Product Ad has been expired';
        }
        $message = "Your Ad has been expired. Please contact with site admin";
        Generic::sendMail($message,$subject,$to_email);
    }
}