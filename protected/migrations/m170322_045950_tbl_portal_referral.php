<?php

class m170322_045950_tbl_portal_referral extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_portal_referral', array(
			'id' => 'pk',
			'portal_user_id' => 'integer NOT NULL',
			'referral_id' => 'string NOT NULL',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_portal_referral');
	}
}