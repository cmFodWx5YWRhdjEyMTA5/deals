<?php

class m170406_110852_tbl_service_latest_news extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_latest_news', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'title' => 'string NULL',
			'image_url' => 'string NULL',
			'image_link' => 'string NULL',
			'short_description' => 'text NULL',
			'long_description' => 'text NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_latest_news');
	}
}