<?php

class m161219_062350_tbl_subscription_plan extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_subscription_plan', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'estore_id' => 'integer NULL',
			'plan_type' => 'integer NOT NULL COMMENT "1=standard,2=silver,3=platinum"',
			'additional_service' => 'integer NOT NULL COMMENT "1=service taken,0=service not taken"',
			'status'   => 'integer NOT NULL DEFAULT 0 COMMENT "1=active,0=inactive"',
			'activation_date' => 'datetime NULL',
			'expiration_date' => 'datetime NULL',
			'create_date' => 'datetime NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_subscription_plan');
	}
}