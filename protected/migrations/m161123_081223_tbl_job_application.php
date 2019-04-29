<?php

class m161123_081223_tbl_job_application extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('tbl_job_application', array(
            'id' => 'pk',
            'job_id' => 'integer NOT NULL',
            'user_id' => 'integer NULL',
            'name' => 'string NOT NULL',
            'email' => 'text NOT NULL',
            'phone' => 'text NOT NULL',
            'resume_details' => 'text NOT NULL',
            'create_date' => 'datetime NOT NULL',
            'update_date' => 'datetime NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_job_application');
    }
}