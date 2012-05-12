<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
		/*'connection'  => array(
			'dsn'        => 'mysql:host=localhost:3306;dbname=mailer',
			'username'   => 'root',
			'password'   => '7v48dz',
		),*/
		'type'           => 'mysqli',
    	'connection'     => array(
	        'hostname'       => 'localhost',
	        'port'           => '3306',
	        'database'       => 'mailer',
	        'username'       => 'root',
	        'password'       => '7v48dz',
	        'persistent'     => false,
	    ),
	),
);
