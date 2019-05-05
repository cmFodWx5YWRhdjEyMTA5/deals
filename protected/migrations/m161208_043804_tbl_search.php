<?php

class m161208_043804_tbl_search extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_search', array(
			'id' => 'pk',
			'search_keyword' => 'string NULL',
			'search_time' => 'datetime  NULL',
			'search_result' => 'tinyint  NULL',
			'user_ip' => 'string NULL',

		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_search');
	}
}