<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class MergedConfigs extends Base
{
	protected $configs = [];

	public function __construct(Config ...$configs)
	{
		$this->configs = $configs;

		foreach ($configs as $config)
			$this->appendConfig($config);
	}

	protected function appendConfig(Config $config)
	{
		$data = $config->getData();

		if (is_array($data))
			$this->data = array_merge($this->data, $data);
	}

	/**
	 * @return array
	 */
	public function getParsedFiles()
	{
		$files = [];

		foreach ($this->configs as $config) {
			$files = array_merge($files, $config->getParsedFiles());
		}

		return $files;
	}

}