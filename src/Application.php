<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class Application
{
	/**
	 * @var Config
	 */
	protected static $config;

	public static function setConfig(Config $config)
	{
		static::$config = $config;
	}

	public static function getConfig()
	{
		return static::$config;
	}

	public static function getConfigFiles()
	{
		return static::$config->getParsedFiles();
	}

	public static function get(...$optionPathComponents)
	{
		return static::$config->get(...$optionPathComponents);
	}
}