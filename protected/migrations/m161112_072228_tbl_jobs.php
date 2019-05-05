<?php

class m161112_072228_tbl_jobs extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('tbl_jobs', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'category_id' => 'integer NOT NULL',
            'title' => 'text NOT NULL',
            'job_category' => 'text NOT NULL',
            'image_url' => 'text NOT NULL',
            'description' => 'text NOT NULL',
            'salary' => 'string NOT NULL',
            'salary_type' => 'tinyint NOT NULL COMMENT "1=fixed,2=range,3=negotiable"',
            'deadline' => 'datetime NOT NULL',
            'job_type' => 'string NOT NULL',
            'additional' => 'text NULL',
            'job_location' => 'string NOT NULL',
            'create_date' => 'date NOT NULL',
            'update_date' => 'date NULL',
            'active' => 'tinyint NOT NULL default 0'
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_jobs');
    }
}