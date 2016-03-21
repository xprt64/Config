<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class IniFileTest extends \PHPUnit_Framework_TestCase
{
	public function test_loadConfigFromIniFile()
	{
		$tmpConfigFile    =   tempnam(sys_get_temp_dir(), 'config-test.ini');

		file_put_contents($tmpConfigFile, <<<EOT
<?php
opt1 = aaa
opt2 = bbb
];
EOT
		);
		$config    =    new IniFile($tmpConfigFile);

		unlink($tmpConfigFile);

		$this->assertEquals( 'aaa', $config->get('opt1'));
	}

}