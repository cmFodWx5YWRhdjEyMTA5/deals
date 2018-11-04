<?php

class m180930_132226_tbl_registered_estore extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_registered_estore', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'category_id' => 'integer NOT NULL',
			'create_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_registered_estore');
	}
}