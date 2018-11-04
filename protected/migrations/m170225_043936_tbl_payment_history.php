<?php

class m170225_043936_tbl_payment_history extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_payment_history', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'store_id' => 'integer NOT NULL',
			'plan_id' => 'integer NOT NULL',
			'subscription_id' => 'integer NOT NULL',
			'invoice_id' => 'string NOT NULL',
			'transaction_id' => 'string NOT NULL',
			'payment_amount' => 'decimal NOT NULL',
			'comment' => 'string NULL',
			'payment_status' => 'integer NOT NULL default 0',
			'transaction_date' => 'date NULL',
			'create_date' => 'date NOT NULL',
			'update_date' => 'date NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_payment_history');
	}
}