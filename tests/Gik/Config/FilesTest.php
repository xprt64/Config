<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Gik;

class FilesTest extends \PHPUnit_Framework_TestCase
{
	public function test_loadConfigFromPhpFile()
	{
		$tmpConfigFile    =   tempnam(sys_get_temp_dir(), 'config-test.php');

		file_put_contents($tmpConfigFile, <<<EOT
<?php
return [
	'opt' => 'aaa',
];
EOT
		);
		$config    =    new Config\PhpFiles([$tmpConfigFile]);

		$this->assertEquals( 'aaa', $config->get('opt'));
	}

	/**
	 * @depends test_loadConfigFromPhpFile
	 * @throws \Exception
	 */
	public function test_appendConfigFromPhpFile()
	{
		$tmpConfigFile1    =   tempnam(sys_get_temp_dir(), 'config-test.php');

		file_put_contents($tmpConfigFile1, <<<EOT
<?php
return [
	'opt' => 'aaa',
	'opt2' => 'aaa2',
];
EOT
		);

		$tmpConfigFile2    =   tempnam(sys_get_temp_dir(), 'config-test.php');

		file_put_contents($tmpConfigFile2, <<<EOT
<?php
return [
	'opt' => 'bbb',
	'db' => [
		'name'  => 'ccc'
	],
];
EOT
		);

		$config    =    new Config\PhpFiles([$tmpConfigFile1, $tmpConfigFile2]);

		$this->assertEquals( 'bbb', $config->get('opt'));
		$this->assertEquals( 'aaa2', $config->get('opt2'));
		$this->assertEquals( 'ccc',	$config->get('db', 'name'));
	}
}