<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

use xprt64\Config\PhpFile;
use xprt64\Config\Application;

require_once 'vendor/autoload.php';

/**
 * bootstrap your application
 */
$configDirectory = __DIR__ . '/config';

Application::setConfig(new PhpFile($configDirectory . '/global.php'));

/**
 * .....
 * later in your scripts
 * ....
 */

echo Application::get('pg_asterisk', 'username'); // echoes 'pguser'


/**
 * .....
 * later in your tests, overwrite default application config
 * ....
 */

//setUp:
self::$savedAppConfig   =   Application::getConfig();//backup application config
Application::setConfig(new PhpArray([
	'pg_asterisk'   =>  [
		'username'  =>  'test_username'
	],
]));


//testMethod
echo Application::get('pg_asterisk', 'username'); // echoes 'test_username'

//tearDown
Application::setConfig(self::$savedAppConfig);//restore application config

