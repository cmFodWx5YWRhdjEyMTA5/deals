<?php

class m161123_033123_tbl_hot_ads extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('tbl_hot_ads', array(
            'id' => 'pk',
            'ad_id' => 'int NOT NULL',
            'start_date' => 'datetime NULL',
            'end_date' => 'datetime NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_hot_ads');
    }
}