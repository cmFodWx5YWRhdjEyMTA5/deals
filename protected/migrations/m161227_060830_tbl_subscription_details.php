<?php

class m161227_060830_tbl_subscription_details extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_subscription_details', array(
			'id' => 'pk',
			'plan_id' => 'integer NOT NULL',
			'ad_count' => 'integer NOT NULL',
			'featured_ad_count' => 'integer NOT NULL',
			'premium_ad_count' => 'integer NOT NULL',
			'top_ad_count'   => 'integer NOT NULL',
			'hot_ad_count' => 'integer NOT NULL',
			'live_chat_support' => 'integer NOT NULL Default 0',
			'smm_support' => 'integer NOT NULL Default 0',
			'email_marketing_support' => 'integer NOT NULL Default 0',
			'recommend_ad_support' => 'integer NOT NULL Default 0',
			'promotional_banner_service' => 'integer NOT NULL Default 0'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_subscription_details');
	}
}