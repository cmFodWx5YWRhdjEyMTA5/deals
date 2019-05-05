<?php

class m161204_053301_tbl_notification_message extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_notification_message', array(
			'id' => 'pk',
			'sender_id' => 'integer NULL',
			'receiver_id' => 'integer NOT NULL',
			'seen' => 'integer NOT NULL DEFAULT 0',
			'create_date' => 'datetime NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_notification_message');
	}
}