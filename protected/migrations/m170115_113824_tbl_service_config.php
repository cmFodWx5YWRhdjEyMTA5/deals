<?php

class m170115_113824_tbl_service_config extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_service_config', array(
			'id' => 'pk',
			'business_category_id' => 'integer NOT NULL',
			'name' => 'string NOT NULL',
			'status' => 'integer NOT NULL',
			'price' => 'decimal NULL',
			'duration' => 'string NULL',
			'others' => 'string NULL',
			'create_date' => 'date NOT NULL',
			'expire_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_service_config');
	}
}