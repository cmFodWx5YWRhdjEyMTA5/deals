<?php

class m161204_053321_tbl_notification_favorite extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_notification_favorite', array(
			'id' => 'pk',
			'sender_id' => 'integer NULL',
			'receiver_id' => 'integer NOT NULL',
			'ad_id' => 'integer NOT NULL',
			'seen' => 'integer NOT NULL DEFAULT 0',
			'create_date' => 'datetime NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_notification_favorite');
	}
}