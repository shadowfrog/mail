<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
		'type'           => 'mysqli',
    	'connection'     => array(
	        'hostname'       => 'localhost',
	        'port'           => '3306',
	        'database'       => 'mailer',
	        'username'       => 'root',
	        'password'       => '',
	        'persistent'     => false,
	    ),
	),
);
