<?php

class m170406_110842_tbl_service_images extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_images', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'page_position' => 'string NULL',
			'image_url' => 'string NULL',
			'image_link' => 'string NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_images');
	}
}