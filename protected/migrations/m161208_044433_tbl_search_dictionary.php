<?php

class m161208_044433_tbl_search_dictionary extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_search_dictionary',array(
			'id' => 'pk',
			'keyword_name' => 'string UNIQUE NULL',
			'keyword_value' => 'text NULL',
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_search_dictionary');
	}
}