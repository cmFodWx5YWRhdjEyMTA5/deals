<?php

class m170406_110828_tbl_service_details extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_details', array(
			'id' => 'pk',
			'service_id' => 'integer NOT NULL',
			'logo' => 'text NULL',
			'show_about_us' => 'tinyint NOT NULL default 1',
			'show_latest_news' => 'tinyint NOT NULL default 1',
			'latest_news_description' => 'string NULL',
			'show_program_list' => 'tinyint NOT NULL default 1',
			'program_list_description' => 'string NULL',
			'show_our_story' => 'tinyint NOT NULL default 1',
			'show_team_section' => 'tinyint NOT NULL default 1',
			'team_section_description' => 'string NULL',
			'show_photo_gallery' => 'tinyint NOT NULL default 1',
			'contact_number' => 'string NULL ',
			'secondary_contact_number' => 'string NULL ',
			'contact_email' => 'string NULL ',
			'active' => 'tinyint NOT NULL default 0',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_details');
	}
}