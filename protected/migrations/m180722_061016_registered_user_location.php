<?php

class m180722_061016_registered_user_location extends CDbMigration
{
	
	public function safeUp()
	{
		$this->createTable('tbl_registered_user_location', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'division_id' => 'integer NOT NULL',
			'district_id' => 'integer NOT NULL',
			'thana_id' => 'string NOT NULL',
			'create_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_registered_user_location');
	}
}