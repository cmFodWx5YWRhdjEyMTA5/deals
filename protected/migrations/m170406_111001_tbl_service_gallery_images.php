<?php

class m170406_111001_tbl_service_gallery_images extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_gallery_images', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'category_id' => 'integer NOT NULL',
			'name' => 'string NULL',
			'image_url' => 'string NULL',
			'image_link' => 'text NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_gallery_images');
	}
}