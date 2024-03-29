<?php

class m161201_083044_tbl_message_sent extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_message_sent', array(
			'id' => 'pk',
			'registered_sender' => 'integer NULL',
			'receiver' => 'integer NOT NULL',
			'sender_name' => 'string NULL',
			'sender_email' => 'string NULL',
			'sender_phone' => 'string NULL',
			'ad_id' => 'integer NULL',
			'details' => 'text NULL',
			'read_status' => 'tinyint NOT NULL COMMENT "1=read,0=unread"',
			'is_starred' => 'tinyint NOT NULL COMMENT "1=starred,0=unstarred"',
			'create_date' => 'datetime NOT NULL',
			'reply_of' => 'integer NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_message_sent');
	}
}