<?php

class m170406_110935_tbl_service_team extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_team', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'name' => 'string NULL',
			'image_url' => 'string NULL',
			'designation' => 'string NULL',
			'qualification' => 'string NULL',
			'special_links' => 'text NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_team');
	}
}