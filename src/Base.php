<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

abstract class Base implements Config
{
	protected $data = [];

	protected $files = [];

	public function get(...$optionPathComponents)
	{
		$ret = $this->data;

		foreach ($optionPathComponents as $key) {
			if (!isset($ret[$key]))
				return null;

			$ret = $ret[$key];
		}

		return $ret;
	}

	public function set($value, ...$optionPathComponents)
	{
		$currentOption =   &$this->data;

		foreach ($optionPathComponents as $key) {
			if (!is_array($currentOption))
				$currentOption[$key] = [];

			$currentOption =   &$currentOption[$key];
		}

		$currentOption = $value;

		return $this;
	}

	public function getParsedFiles()
	{
		return $this->files;
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}
}