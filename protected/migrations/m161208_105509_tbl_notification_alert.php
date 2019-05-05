<?php

class m161208_105509_tbl_notification_alert extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_notification_alert', array(
			'id' => 'pk',
			'sender_id' => 'integer NULL',
			'receiver_id' => 'integer NOT NULL',
			'details' => 'text NULL',
			'ad_id' => 'integer NULL',
			'seen' => 'integer NOT NULL DEFAULT 0',
			'create_date' => 'datetime NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_notification_alert');
	}
}