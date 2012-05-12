<?php

namespace Fuel\Migrations;

class Create_mailboxes
{
	public function up()
	{
		\DBUtil::create_table('mailboxes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 50, 'type' => 'varchar'),
			'inbox' => array('constraint' => 255, 'type' => 'varchar'),
			'outbox' => array('constraint' => 255, 'type' => 'varchar'),
			'box_account' => array('constraint' => 255, 'type' => 'varchar'),
			'box_password' => array('constraint' => 255, 'type' => 'varchar'),
			'active' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('mailboxes');
	}
}