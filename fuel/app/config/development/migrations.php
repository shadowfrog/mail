<?php
return array(
	'version' => 
	array(
		'app' => 
		array(
			'default' => 0,
		),
		'module' => 
		array(
			'mail' => 
			array(
				0 => '001_create_mailboxes',
			),
		),
		'package' => 
		array(
			'sentry' => 
			array(
				0 => '001_install_sentry_auth',
				1 => '002_add_group_parent_column',
			),
		),
	),
	'folder' => 'migrations/',
	'table' => 'migration',
);
