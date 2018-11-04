<?php

class m161123_040822_tbl_ad_special extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_ad_special',array(
			'id' => 'pk',
			'user_id' => 'int(11) NOT NULL',
			'title' => 'string NULL',
			'description' => 'text  NULL',
			'banner_image' => 'string  NULL',
			'banner_position' => 'string  NULL',
			'banner_url' => 'string  NULL',
			'create_date' => 'datetime NOT NULL',
			'update_date' => 'datetime NULL',

		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_ad_special');
	}
}