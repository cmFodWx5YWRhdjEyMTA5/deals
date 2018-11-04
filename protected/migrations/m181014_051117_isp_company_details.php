<?php

class m181014_051117_isp_company_details extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('isp_company_details', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'no_of_thana' => 'integer NOT NULL',
			'amount' => 'string NOT NULL',
			'status' => 'integer NOT NULL DEFAULT 1',
			'create_date' => 'date NOT NULL',
			'expire_date' => 'date NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('isp_company_details');
	}
}