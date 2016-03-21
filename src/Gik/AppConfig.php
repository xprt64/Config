<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Gik;

class AppConfig
{
	/**
	 * @var Config
	 */
	protected static $config;

	public static function setConfig(Config $config)
	{
		static::$config =   $config;
	}

	public static function getConfig()
	{
		return static::$config;
	}

	public static function getConfigFiles()
	{
		if(is_callable([static::$config, 'getFiles']))
			return static::$config->getFiles();
		
		return [];
	}

	public static function get($optionName, $subOptionName = null)
	{
		return static::$config->get($optionName, $subOptionName);
	}
}