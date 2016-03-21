<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */


namespace Gik;


use Gik\Config\PhpArray;

class AppConfigTest extends \PHPUnit_Framework_TestCase
{
	protected static $siteConfig;

	public static function setUpBeforeClass()
	{
		self::$siteConfig = \Gik\AppConfig::getConfig();
	}

	public static function tearDownAfterClass()
	{
		if (self::$siteConfig)
			\Gik\AppConfig::setConfig(self::$siteConfig);
	}


	public function test_PhpArray()
	{
		$config = new PhpArray([
			'a' => 'bb',
		]);

		AppConfig::setConfig($config);

		$this->assertEquals('bb', AppConfig::get('a'));
	}

	public function test_PhpFiles()
	{
		$tmpConfigFile = tempnam(sys_get_temp_dir(), 'config-test.php');

		file_put_contents($tmpConfigFile, <<<EOT
<?php
return [
	'opt' => 'aaa',
];
EOT
		);

		$config = new Config\PhpFiles([$tmpConfigFile]);

		AppConfig::setConfig($config);

		$this->assertEquals('aaa', AppConfig::get('opt'));
	}

	public function test_set()
	{
		$config = new PhpArray([
			'a' => 'bb',
		]);

		AppConfig::setConfig($config);

		AppConfig::getConfig()->set('cc', 'a');

		$this->assertEquals('cc', AppConfig::get('a'));
	}


}