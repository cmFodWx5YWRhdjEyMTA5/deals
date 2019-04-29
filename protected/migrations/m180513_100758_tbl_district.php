<?php

class m180513_100758_tbl_district extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_district', array(
			'id' => 'pk',
			'district_id' => 'integer NOT NULL',
			'divison_id' => 'integer NOT NULL',
			'district' => 'string NOT NULL',
			'status' => 'integer NOT NULL DEFAULT 1',
			'create_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_district');
	}
}