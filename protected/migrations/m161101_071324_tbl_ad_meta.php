<?php

class m161101_071324_tbl_ad_meta extends CDbMigration
{


	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('tbl_ad_meta',array(
            'id' => 'pk',
            'category_id' => 'int NOT NULL',
            'ad_id' => 'int NOT NULL',
            'field_name' => 'string NOT NULL',
            'field_value' => 'string NULL'
        ));
	}

	public function safeDown()
	{
        $this->dropTable('tbl_ad_meta');
	}

}