<?php

class m170206_045743_tbl_page extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_page', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'alias' => 'string NULL',
			'content' => 'text NULL',
			'create_date' => 'date NOT NULL',
			'expire_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_page');
	}
}