<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class PhpFileTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @throws \Exception
	 */
	public function test_loadConfigFromPhpFile()
	{
		$tmpConfigFile = tempnam(sys_get_temp_dir(), 'config-test.php');

		file_put_contents($tmpConfigFile, <<<EOT
<?php
return [
	'opt' => 'aaa',
	'opt2' => 'aaa2',
	'arr1' => [
		'sub1.1'  =>  'val1',
		'sub1.2'  =>  'val2',
		'sub1.3'  =>  [
			'sub1.3.1'  =>  88
		],
	],
];
EOT
		);

		$config = new PhpFile($tmpConfigFile);

		unlink($tmpConfigFile);

		$this->assertEquals('aaa', $config->get('opt'));
		$this->assertEquals('aaa2', $config->get('opt2'));
		$this->assertEquals(88, $config->get('arr1', 'sub1.3', 'sub1.3.1'));
	}
}