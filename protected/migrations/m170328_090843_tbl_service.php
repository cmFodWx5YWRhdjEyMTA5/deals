<?php

class m170328_090843_tbl_service extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'about_us' => 'text NOT NULL',
			'contact_us' => 'text NOT NULL ',
			'documents' => 'text NOT NULL',
			'additional_comments' => 'text NOT NULL',
			'facebook_link' => 'string NULL',
			'twitter_link' => 'string NULL',
			'linkedin_link' => 'string NULL',
			'google_plus_link' => 'string NULL',
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
		$this->dropTable('tbl_service');
	}
}