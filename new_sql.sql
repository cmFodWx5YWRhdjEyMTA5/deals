CREATE TRIGGER `add_ad_id` BEFORE INSERT ON `tbl_ads`
 FOR EACH ROW SET new.ad_id = uuid_short()

ALTER TABLE `tbl_favorites` ADD `user_id` INT(11) NULL AFTER `users_last_visit`;

ALTER TABLE `tbl_ads` ADD `discount` FLOAT(15,2) NULL AFTER `hot_ads_end_date`;

ALTER TABLE `tbl_ads` ADD `location` VARCHAR(255) NULL AFTER `discount`;

ALTER TABLE `tbl_ads` ADD `latitude` VARCHAR(255) NULL AFTER `location`;

ALTER TABLE `tbl_ads` ADD `longitude` VARCHAR(255) NULL AFTER `latitude`;

ALTER TABLE `tbl_discount` ADD `page_alias` VARCHAR(255) NULL DEFAULT NULL AFTER `discount`;

ALTER TABLE `tbl_discount` ADD `page_content` TEXT NULL DEFAULT NULL AFTER `page_alias`;

ALTER TABLE `tbl_ad_special` ADD `page_content` TEXT NULL DEFAULT NULL AFTER `page_alias_ad_special`;

ALTER TABLE `tbl_ad_special` ADD `page_alias_ad_special` VARCHAR(255) NULL DEFAULT NULL AFTER `banner_url`;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-car' WHERE `tbl_category`.`category_id` = 1;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-laptop' WHERE `tbl_category`.`category_id` = 2;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-tv' WHERE `tbl_category`.`category_id` = 3;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-lock' WHERE `tbl_category`.`category_id` = 4;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-shopping-bag' WHERE `tbl_category`.`category_id` = 5;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-bed' WHERE `tbl_category`.`category_id` = 6;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-female' WHERE `tbl_category`.`category_id` = 7;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-cutlery' WHERE `tbl_category`.`category_id` = 8;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-mobile-phone' WHERE `tbl_category`.`category_id` = 9;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-building-o' WHERE `tbl_category`.`category_id` = 10;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-bus' WHERE `tbl_category`.`category_id` = 11;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-briefcase' WHERE `tbl_category`.`category_id` = 12;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-coffee' WHERE `tbl_category`.`category_id` = 13;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-handshake-o' WHERE `tbl_category`.`category_id` = 14;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-child' WHERE `tbl_category`.`category_id` = 15;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-pagelines' WHERE `tbl_category`.`category_id` = 16;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-linux' WHERE `tbl_category`.`category_id` = 17;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-book' WHERE `tbl_category`.`category_id` = 18;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-camera-retro' WHERE `tbl_category`.`category_id` = 19;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-gamepad' WHERE `tbl_category`.`category_id` = 20;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-tripadvisor' WHERE `tbl_category`.`category_id` = 21;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-music' WHERE `tbl_category`.`category_id` = 22;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-bank' WHERE `tbl_category`.`category_id` = 23;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-balance-scale' WHERE `tbl_category`.`category_id` = 24;

UPDATE `tbl_category` SET `category_icon` = 'fa fa-graduation-cap' WHERE `tbl_category`.`category_id` = 25;


ALTER TABLE `tbl_discount` ADD `title` VARCHAR(255) NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `tbl_discount` ADD `optional_images` VARCHAR(255) NULL DEFAULT NULL AFTER `secondary_images`;

ALTER TABLE `tbl_notification_alert` ADD `short_desc` VARCHAR(255) NULL AFTER `details`;

ALTER TABLE `tbl_subscription_plan` ADD `additional_service` INT(11) NOT NULL COMMENT '1= service taken,0=service not taken' AFTER `plan_type`;




ALTER TABLE `tbl_estore` ADD `sub_banner` VARCHAR(255) NULL DEFAULT NULL AFTER `banner`;

ALTER TABLE `tbl_estore_order` CHANGE `item_code` `item_code` BIGINT NULL DEFAULT NULL;




ALTER TABLE `tbl_estore` ADD `facebook_link` VARCHAR(255) NULL DEFAULT NULL AFTER `url_alias`;
ALTER TABLE `tbl_estore` ADD `twitter_link` VARCHAR(255) NULL DEFAULT NULL AFTER `facebook_link`;
ALTER TABLE `tbl_estore` ADD `linkedin_link` VARCHAR(255) NULL DEFAULT NULL AFTER `twitter_link`;
ALTER TABLE `tbl_estore` ADD `google_plus_link` VARCHAR(255)NULL DEFAULT NULL AFTER `linkedin_link`;


ALTER TABLE `tbl_ads` ADD `price_end` DECIMAL (30,0)NULL DEFAULT NULL;

ALTER TABLE `tbl_ad_special` ADD `latitude` VARCHAR(255) NULL AFTER `update_date`;

ALTER TABLE `tbl_ad_special` ADD `longitude` VARCHAR(255) NULL AFTER `latitude`;

ALTER TABLE `tbl_register` ADD `oauth_token` TEXT NULL DEFAULT NULL;

ALTER TABLE `tbl_category` ADD `category_type` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1=Estore,2=Service' AFTER `category_banner_image`;

ALTER TABLE `tbl_service_request` CHANGE `request_type` `request_type` INT(11) NOT NULL COMMENT '1=banner, 2=website, 3=promotion';

ALTER TABLE `tbl_category` ADD `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `category_type`;

ALTER TABLE `tbl_category` ADD `meta_description` VARCHAR(255) NULL DEFAULT NULL AFTER `meta_title`;

ALTER TABLE `tbl_register` ADD `country` VARCHAR(255) NULL DEFAULT NULL AFTER `business_category_id`;

ALTER TABLE `tbl_jobs` ADD `educational_req` TEXT NULL DEFAULT NULL AFTER `description`;

ALTER TABLE `tbl_jobs` ADD `experiment_req` TEXT NULL DEFAULT NULL AFTER `educational_req` ;

ALTER TABLE `tbl_jobs` ADD `job_req` TEXT NULL DEFAULT NULL AFTER `additional`;

ALTER TABLE `tbl_jobs` ADD `vacancy` INT(11) NULL DEFAULT NULL AFTER `title`;

ALTER TABLE `tbl_job_application` ADD `address` TEXT NULL DEFAULT NULL AFTER `phone`;

ALTER TABLE `tbl_ads` ADD `show_price` TINYINT(1) NOT NULL DEFAULT '1';

ALTER TABLE `tbl_ads` ADD `is_paid` TINYINT(1) NULL DEFAULT NULL AFTER `is_top`;

ALTER TABLE `countries` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1=active,0=inactive' AFTER `phonecode`;

UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 38;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 230;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 231;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 211;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 212;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 75;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 205;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 82;
UPDATE `countries` SET `status` = '1' WHERE `countries`.`id` = 21;

ALTER TABLE `tbl_register` ADD `designation` VARCHAR(255) NULL DEFAULT NULL AFTER `password`;

ALTER TABLE `tbl_ad_special` ADD `country_code` VARCHAR(15) NULL AFTER `longitude`;
ALTER TABLE `tbl_ad_special` ADD `city` VARCHAR(25) NULL AFTER `country_code`;

ALTER TABLE `tbl_ads` ADD `country_code` VARCHAR(15) NULL AFTER `show_price`;
ALTER TABLE `tbl_ads` ADD `city` VARCHAR(25) NULL AFTER `country_code`;

ALTER TABLE `tbl_estore` ADD `country_code` VARCHAR(15) NULL AFTER `update_date`;
ALTER TABLE `tbl_estore` ADD `city` VARCHAR(25) NULL AFTER `country_code`;

UPDATE tbl_ads set country_code = 'BD' where country_code is null
UPDATE tbl_estore set country_code = 'BD' where country_code is null
UPDATE tbl_ad_special set country_code = 'BD' where country_code is null

ALTER TABLE `tbl_estore` ADD `comment` TEXT NULL DEFAULT NULL AFTER `contact_us`;

ALTER TABLE `tbl_estore` ADD `product_details` VARCHAR(255) NULL DEFAULT NULL AFTER `comment`;

ALTER TABLE `tbl_estore` ADD `product_images` VARCHAR(255) NULL DEFAULT NULL AFTER `product_details`;

ALTER TABLE `tbl_business_plan_config` ADD `ad_count` INT(11) NOT NULL AFTER `expire_date`;
ALTER TABLE `tbl_business_plan_config` ADD `featured_ad` INT(11) NOT NULL AFTER `ad_count`;
ALTER TABLE `tbl_business_plan_config` ADD `premium_ad` INT(11) NOT NULL AFTER `featured_ad`;
ALTER TABLE `tbl_business_plan_config` ADD `top_ad` INT(11) NOT NULL AFTER `premium_ad`;

ALTER TABLE `tbl_payment_history` ADD `payment_method` TINYINT(1) NOT NULL AFTER `transaction_id`;
ALTER TABLE `tbl_payment_history` CHANGE `payment_status` `payment_status` INT(11) NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2=cancelled,3=partial';
ALTER TABLE `tbl_payment_history` ADD `due_amount` DECIMAL(30,0) NULL AFTER `payment_amount`;
ALTER TABLE `tbl_payment_history` ADD `saler_id` VARCHAR(50) NULL AFTER `transaction_id`;
ALTER TABLE `tbl_payment_history` ADD `bank_receipt` VARCHAR(255) NULL AFTER `saler_id`;
ALTER TABLE `tbl_payment_history` CHANGE `transaction_id` `transaction_id` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `tbl_register` ADD `otp` INT(11) NULL DEFAULT NULL AFTER `oauth_token`;

ALTER TABLE `tbl_register` ADD `otp_time` DATETIME NULL DEFAULT NULL AFTER `otp`;

ALTER TABLE `tbl_register` ADD `active` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1=active,0=inactive' AFTER `otp_time`;

ALTER TABLE `tbl_estore` CHANGE `slogan` `slogan` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `tbl_estore` CHANGE `logo` `logo` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `tbl_estore` CHANGE `banner` `banner` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `tbl_estore` CHANGE `categories` `categories` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `tbl_register` ADD `referral_id` VARCHAR(255) NULL DEFAULT NULL AFTER `user_status`;
ALTER TABLE `tbl_payment_history` ADD `referral_id` VARCHAR(255) NULL DEFAULT NULL AFTER `update_date`;

ALTER TABLE `tbl_payment_history` CHANGE `subscription_id` `subscription_id` INT(11) NULL;
ALTER TABLE `tbl_payment_history` CHANGE `plan_id` `plan_id` INT(11) NULL;
ALTER TABLE `tbl_payment_history` CHANGE `store_id` `store_id` INT(11) NULL;
ALTER TABLE `tbl_payment_history` ADD `ad_id` INT(11) NULL AFTER `subscription_id`;

ALTER TABLE `tbl_ads` ADD `special_offer` TINYINT(1) NULL DEFAULT NULL AFTER `discount`;

ALTER TABLE `tbl_service` ADD `plan_id` INT(11) NULL AFTER `user_id`;
ALTER TABLE `tbl_service` ADD `country_code` VARCHAR(15) NULL;
ALTER TABLE `tbl_service` ADD `city` VARCHAR(25) NULL AFTER `country_code`;

ALTER TABLE `tbl_payment_history` ADD `service_promotion_id` INT(11) NULL AFTER `ad_id`;
ALTER TABLE `tbl_service` ADD `expire_date` DATE NULL AFTER `update_date`;

ALTER TABLE `tbl_portal_settings` ADD `group_id` INT(11) NOT NULL AFTER `update_date`;
ALTER TABLE `tbl_payment_history` ADD `decline_reason` VARCHAR(255) NULL AFTER `referral_id`;

ALTER TABLE `tbl_portal_settings` ADD `created_by` INT(11) NOT NULL AFTER `group_id`;

ALTER TABLE `tbl_payment_history` ADD `card_info` VARCHAR(120) NULL AFTER `decline_reason`;