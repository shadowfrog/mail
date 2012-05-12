<?php

namespace Mail;

class Model_Mailbox extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'title',
		'inbox',
		'outbox',
		'box_account',
		'box_password',
		'active',
		'created_at',
		'updated_at'
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
