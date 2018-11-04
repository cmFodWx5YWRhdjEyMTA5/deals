<?php

class m161102_123519_tbl_ads extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('tbl_ads', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'title' => 'text NOT NULL',
            'image_url' => 'text NOT NULL',
            'description' => 'text NOT NULL',
            'ad_condition' => 'tinyint NOT NULL COMMENT "1=new,0=used"',
            'price' => 'decimal NOT NULL',
            'price_type' => 'tinyint NOT NULL COMMENT "1=fixed,0=negotiable"',
            'category_id' => 'integer NOT NULL',
            'create_date' => 'datetime NOT NULL',
            'update_date' => 'datetime NULL',
            'expire_date' => 'date NULL',
            'active' => 'tinyint NOT NULL default 0',
            'show_in_store' => 'tinyint  NULL default 0 COMMENT "1=enable,0=disable"',
            'ad_id' => 'string NULL',
            'is_featured' => 'tinyint default 0',
            'is_premium' => 'tinyint default 0',
            'is_top' => 'tinyint default 0',
            'hot_ads' => 'tinyint default 0',
            'hot_ads_start_date' => 'datetime NULL',
            'hot_ads_end_date' => 'datetime NULL',
            'discount' => 'float NULL',
            'location' => 'string NULL',
        ));
	}

	public function safeDown()
	{
        $this->dropTable('tbl_ads');
	}
}