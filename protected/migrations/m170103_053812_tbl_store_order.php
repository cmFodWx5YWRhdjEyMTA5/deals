<?php

class m170103_053812_tbl_store_order extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_estore_order', array(
			'id' => 'pk',
			'registered_user_id' => 'integer NULL',
			'invoice_id' => 'integer NULL',
			'estore_id' => 'integer  NULL',
			'product_name' => 'string  NULL',
			'item_code'   => 'integer  NULL',
			'product_price' => 'decimal  NULL',
			'estore_name' => 'string NULL',
			'buyer_name' => 'string NULL ',
			'buyer_email' => 'string NULL',
			'buyer_phone' => 'string NULL',
			'status' => 'integer NOT NULL Default 0',
			'create_date' => 'datetime NOT NULL'
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_estore_order');
	}
}