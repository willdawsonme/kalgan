<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(

		'mysql_applications' => array(
			'driver'    => 'mysql',
			'host'      => $_ENV['DB_HOST'],
			'database'  => $_ENV['DB_NAME1'],
			'username'  => $_ENV['DB_USER'],
			'password'  => $_ENV['DB_PASS'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
        

		'mysql_users' => array(
			'driver'    => 'mysql',
			'host'      => $_ENV['DB_HOST'],
			'database'  => $_ENV['DB_NAME2'],
			'username'  => $_ENV['DB_USER'],
			'password'  => $_ENV['DB_PASS'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'mysql_staff' => array(
			'driver'    => 'mysql',
			'host'      => $_ENV['DB_HOST'],
			'database'  => $_ENV['DB_NAME3'],
			'username'  => $_ENV['DB_USER'],
			'password'  => $_ENV['DB_PASS'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'mysql_students' => array(
			'driver'    => 'mysql',
			'host'      => $_ENV['DB_HOST'],
			'database'  => $_ENV['DB_NAME4'],
			'username'  => $_ENV['DB_USER'],
			'password'  => $_ENV['DB_PASS'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'homestead',
			'username' => 'homestead',
			'password' => 'secret',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),

	),

);
