<?php

class m161109_044841_tbl_estore extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_estore', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'slogan' => 'string NOT NULL',
			'logo' => 'string NOT NULL',
			'banner' => 'string NOT NULL',
			'categories' => 'string NOT NULL',
			'about_us' => 'text  NULL',
			'contact_us' => 'text  NULL ',
			'keyword' => 'text  NULL ',
			'meta_description' => 'text  NULL ',
			'url_alias' => 'string NOT NULL ',
			'active' => 'tinyint NOT NULL default 0',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'


		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_estore');
	}
}