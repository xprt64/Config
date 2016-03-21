<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

return [
	'db'   => [
		'username' => 'root',
		'password' => '1234',
		'server'   => '127.0.0.1',
		'dbname'   => 'dbAbc',
		'dsn'      => 'mysql:host=127.0.0.1',
		'quoteChar' => '`',
		'init'     => [
			"SET lc_time_names = 'ro_RO'",
			"SET sql_mode = 'TRADITIONAL'",
		],
	],
	'apacheUser' => 'www-data'

];