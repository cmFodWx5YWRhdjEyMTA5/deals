<?php

/**
 * Created by PhpStorm.
 * User: KHASHRUL
 * Date: 11/21/2016
 * Time: 12:22 PM
 */
class PriceSettings
{
    public static $price_config = array(

        'featured' => array(
            'amount' => 300,

        ),
        'premium' => array(
            'amount' => 180,
        ),
        'top' => array(
            'amount' => 170,
        ),

    );

    public static $const_currency = array(
        'from_currency' => 'BDT'
    );

    public static $plan_config = array(
        'standard' => array(
            'ad_count' => 10,
            'featured_ad_count' => 1,
            'premium_ad_count' => 1,
            'top_ad_count' => 1,
            'hot_ad_count' => 0,
            'live_chat_support' => 0,
            'smm_support' => 0,
            'email_marketing_support' => 0,
            'recommend_ad_support' => 0,
            'promotional_banner_service' => 0,
            'price' => 500
        ),
        'standard_plus_service' => array(
            'ad_count' => 10,
            'featured_ad_count' => 2,
            'premium_ad_count' => 2,
            'top_ad_count' => 2,
            'hot_ad_count' => 0,
            'live_chat_support' => 0,
            'smm_support' => 0,
            'email_marketing_support' => 0,
            'recommend_ad_support' => 0,
            'promotional_banner_service' => 0,
            'price' => 1000
        ),
        'silver' => array(
            'ad_count' => 20,
            'featured_ad_count' => 2,
            'premium_ad_count' => 2,
            'top_ad_count' => 2,
            'hot_ad_count' => 0,
            'live_chat_support' => 1,
            'smm_support' => 1,
            'email_marketing_support' => 0,
            'recommend_ad_support' => 0,
            'promotional_banner_service' => 0,
            'price' => 900
        ),
        'silver_plus_service' => array(
            'ad_count' => 20,
            'featured_ad_count' => 4,
            'premium_ad_count' => 4,
            'top_ad_count' => 4,
            'hot_ad_count' => 0,
            'live_chat_support' => 1,
            'smm_support' => 1,
            'email_marketing_support' => 0,
            'recommend_ad_support' => 0,
            'promotional_banner_service' => 0,
            'price' => 1500
        ),
        'platinum' => array(
            'ad_count' => 30,
            'featured_ad_count' => 2,
            'premium_ad_count' => 2,
            'top_ad_count' => 2,
            'hot_ad_count' => 1,
            'live_chat_support' => 1,
            'smm_support' => 1,
            'email_marketing_support' => 1,
            'recommend_ad_support' => 1,
            'promotional_banner_service' => 0,
            'price' => 1350
        ),
        'platinum_plus_service' => array(
            'ad_count' => 30,
            'featured_ad_count' => 4,
            'premium_ad_count' => 4,
            'top_ad_count' => 4,
            'hot_ad_count' => 1,
            'live_chat_support' => 1,
            'smm_support' => 1,
            'email_marketing_support' => 1,
            'recommend_ad_support' => 1,
            'promotional_banner_service' => 1,
            'price' => 2000
        )
    );
}