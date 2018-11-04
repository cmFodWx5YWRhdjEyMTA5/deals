<?php

class m170406_110915_tbl_service_program_list extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_program_list', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'title' => 'string NULL',
			'image_url' => 'string NULL',
			'image_link' => 'string NULL',
			'description' => 'text NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_program_list');
	}
}