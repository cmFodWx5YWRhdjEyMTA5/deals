<?php

class m161121_083929_tbl_ad_offer extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('tbl_ad_offer', array(
            'id' => 'pk',
            'ad_id' => 'integer NOT NULL',
            'offered_price' => 'string NOT NULL',
            'offered_by' => 'integer NULL',
            'ip_address' => 'string NULL',
            'create_date' => 'datetime NOT NULL',
            'update_date' => 'datetime NULL'
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_ad_offer');
    }

}