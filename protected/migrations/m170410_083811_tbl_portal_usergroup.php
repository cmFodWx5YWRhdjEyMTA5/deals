<?php

class m170410_083811_tbl_portal_usergroup extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_portal_usergroup', array(
			'id' => 'pk',
			'groupname' => 'string NOT NULL',
			'active' => 'tinyint NOT NULL default 1',
			'permission' => 'string NULL',
			'create_date' => 'date NOT NULL',
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_portal_usergroup');
	}
}