<?php

class m180513_100806_tbl_thana extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_thana', array(
			'id' => 'pk',
			'thana_id' => 'integer NOT NULL',
			'district_id' => 'integer NOT NULL',
			'thana' => 'string NOT NULL',
			'status' => 'integer NOT NULL DEFAULT 1',
			'create_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_thana');
	}
}