<?php

class m170301_093407_tbl_saler_info extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_saler_info', array(
			'id' => 'pk',
			'name' => 'varchar(255) NOT NULL',
			'saler_id' => 'varchar(255) NOT NULL',
			'details' => 'string NULL',
			'status' => 'integer NOT NULL default 1',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_saler_info');
	}
}