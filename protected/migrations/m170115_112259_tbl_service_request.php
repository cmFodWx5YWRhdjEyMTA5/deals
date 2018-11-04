<?php

class m170115_112259_tbl_service_request extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_request', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'service_id' => 'integer NOT NULL',
			'request_type' => 'integer NOT NULL',
			'plan_type' => 'integer NOT NULL',
			'status' => 'integer NOT NULL',
			'expire_date' => 'date NULL',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_request');
	}
}