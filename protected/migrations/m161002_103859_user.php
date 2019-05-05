<?php

class m161002_103859_user extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	$this->createTable('user', array(
			'id' => 'pk',
			'username' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'role' => 'string NOT NULL',
		));
	}

	public function safeDown()
	{
		$this->dropTable('user');
	}

}