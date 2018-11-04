<?php

class m161030_051403_category_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_category', array(
			'category_id' => 'pk',
			'category_name' => 'string NOT NULL',
			'category_slug' => 'string NULL',
			'sub_category_slug' => 'string NULL',
			'parent_id' => 'string NOT NULL',
			'category_icon' => 'string NOT NULL',
			'category_banner_image' => 'string NOT NULL',

		));
	}
	public function safeDown()
	{
		$this->dropTable('tbl_category');
	}
}