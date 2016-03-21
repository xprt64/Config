<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class MergedConfigsTest extends \PHPUnit_Framework_TestCase
{
	public function test_merged()
	{
		$config1 = new PhpArray(['opt1' => 'val1.1', 'opt2' => 'val1.2']);
		$config2 = new PhpArray(['opt2' => 'val2.2', 'opt3' => 'val2.3']);

		$mergedConfig = new MergedConfigs($config1, $config2);

		$this->assertEquals('val1.1', $mergedConfig->get('opt1'));
		$this->assertEquals('val2.2', $mergedConfig->get('opt2'), 'overwrite option in first config');
		$this->assertEquals('val2.3', $mergedConfig->get('opt3'), 'added new option in second config');
	}

	public function test_mergedUnpack()
	{
		$configs = [];

		$configs[] = new PhpArray(['opt1' => 'val1.1', 'opt2' => 'val1.2']);
		$configs[] = new PhpArray(['opt2' => 'val2.2', 'opt3' => 'val2.3']);

		$mergedConfig = new MergedConfigs(...$configs);

		$this->assertEquals('val1.1', $mergedConfig->get('opt1'));
		$this->assertEquals('val2.2', $mergedConfig->get('opt2'), 'overwrite option in first config');
	}

}