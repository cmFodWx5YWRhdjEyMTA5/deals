<?php

class m161112_104121_tbl_ad_view extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('tbl_ad_view', array(
            'id' => 'pk',
            'ad_id' => 'integer NOT NULL',
            'ip_address' => 'string NOT NULL',
            'last_viewed' => 'datetime NOT NULL',
            'view_count' => 'integer NOT NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_ad_view');
    }
}