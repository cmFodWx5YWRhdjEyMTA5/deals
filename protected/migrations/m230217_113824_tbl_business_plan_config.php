<?php


class m230217_113824_tbl_business_plan_config extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('tbl_business_plan_config', array(
            'id' => 'pk',
            'name' => 'string NULL',
            'status' => 'integer NULL',
            'price' => 'decimal NULL',
            'duration' => 'string NULL',
            'details' => 'text NULL',
            'create_date' => 'date NULL',
            'expire_date' => 'date NULL'
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_service_config');
    }
}