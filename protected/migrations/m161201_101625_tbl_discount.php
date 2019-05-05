<?php
/**
 * Created by PhpStorm.
 * User: Moshfaqur
 * Date: 12/1/2016
 * Time: 10:16 AM
 */

class m161201_101625_tbl_discount extends CDbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('tbl_discount', array(
            'id' => 'pk',
            'images' => 'text NOT NULL',
            'secondary_images' => 'text NULL',
            'description' => 'text NULL',
            'create_date' => 'datetime NULL',
            'expire_date' => 'datetime NULL',
            'estore_link' => 'string NULL',
            'external_link' => 'string NULL',
            'discount' => 'string NOT NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_discount');
    }
}