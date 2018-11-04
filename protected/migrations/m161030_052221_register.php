<?php

class m161030_052221_register extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_register', array(
			'id' => 'pk',
			'register_type' => 'string NOT NULL',
			'user_name' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'phone_number' => 'string NOT NULL',
			'user_token' => 'string NOT NULL',
			'image' => 'string  NULL',
			'enterprise_name' => 'string NULL',
			'business_category_id' => 'string NULL',
			'division' => 'string NULL',
			'district' => 'string NULL',
			'address' => 'string NULL',
			'create_date' => 'string NULL',
			'update_date' => 'string NULL',
		));
	}
	public function safeDown()
	{
		$this->dropTable('tbl_register');
	}
}