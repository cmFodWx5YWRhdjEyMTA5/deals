<?php

class m180513_100741_tbl_division extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_division', array(
			'id' => 'pk',
			'division_id' => 'integer NOT NULL',
			'division' => 'string NOT NULL',
			'status' => 'integer NOT NULL DEFAULT 1',
			'create_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_division');
	}
}