<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
	protected static $siteConfig;

	public static function setUpBeforeClass()
	{
		self::$siteConfig = Application::getConfig();
	}

	public static function tearDownAfterClass()
	{
		if (self::$siteConfig)
			Application::setConfig(self::$siteConfig);
	}

	public function test_PhpArray()
	{
		$config = new PhpArray([
			'a' => 'bb',
		]);

		Application::setConfig($config);

		$this->assertEquals('bb', Application::get('a'));
	}

	public function test_PhpArrayNonExistentOption()
	{
		$config = new PhpArray([
			'a' => 'bb',
		]);

		Application::setConfig($config);

		$this->assertNull(Application::get('c'));
	}

	public function test_PhpArrayThirdLevelNull()
	{
		$config = new PhpArray([
			'a' => [
				'bcde' => 99,
			],
		]);

		Application::setConfig($config);

		$this->assertNull(Application::get('a', 'b', 'c', 'd', 'e'));
	}

	public function test_PhpArrayThirdLevel()
	{
		$config = new PhpArray([
			'a' => [
				'b' => [
					'c' => [
						'd' => [
							'e' => 99,
						],
					],
				],
			],
		]);

		Application::setConfig($config);

		$this->assertEquals(99, Application::get('a', 'b', 'c', 'd', 'e'));
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

		$config = new PhpFile($tmpConfigFile);

		unlink($tmpConfigFile);

		Application::setConfig($config);

		$this->assertEquals('aaa', Application::get('opt'));
	}

	public function test_MergedConfigs()
	{
		$tmpConfigFile = tempnam(sys_get_temp_dir(), 'config1-test.php');

		file_put_contents($tmpConfigFile, <<<EOT
<?php
return [
	'opt' => 'aaa',
	'opt2' => 'aaa2',
];
EOT
		);

		$config1 = new PhpFile($tmpConfigFile);
		$config2 = new PhpArray([
			'opt2' => 'bbb2',
		]);

		unlink($tmpConfigFile);

		Application::setConfig(new MergedConfigs($config1, $config2));

		$this->assertEquals('aaa', Application::get('opt'));
		$this->assertEquals('bbb2', Application::get('opt2'), 'opt2 is overwritten');
	}

	public function test_simpleSet()
	{
		Application::setConfig(new PhpArray([
			'a' => 'bb',
		]));

		Application::getConfig()->set('cc', 'a');
		$this->assertEquals('cc', Application::get('a'));
	}


	public function test_multiLevelSet()
	{
		Application::setConfig(new PhpArray([
			'a' => 'bb',
		]));

		Application::getConfig()->set('111', 'x', 'y', 'z');
		$this->assertEquals('111', Application::get('x', 'y', 'z'));
	}
}