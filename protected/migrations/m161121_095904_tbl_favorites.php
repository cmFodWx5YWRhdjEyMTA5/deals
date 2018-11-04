<?php

class m161121_095904_tbl_favorites extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_favorites',array(
			'id' => 'pk',
			'user_token' => 'string NOT NULL',
            'recently_view_ad_ids' => 'text NULL',
			'ad_id' => 'text NULL',
			'users_last_visit' => 'datetime NOT NULL',
			'user_id' => 'integer NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_favorites');
	}
}