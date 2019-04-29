<?php

class m170406_110952_tbl_service_gallery_category extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_gallery_category', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'category_name' => 'string NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_gallery_category');
	}
}