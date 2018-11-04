<?php

class m170321_054117_tbl_portal_settings extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_portal_settings', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_portal_settings');
	}
}