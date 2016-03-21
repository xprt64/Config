<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Gik;

abstract class Config
{
	protected   $data   =   [];

	public function get($optionName, $subOptionName = null)
	{
		$ret    =   null;
		if(isset($this->data[$optionName]))
		{
			if(is_string($subOptionName) && $subOptionName && is_array($this->data[$optionName]))
				$ret    =   $this->data[$optionName][$subOptionName];
			else
				$ret    =   $this->data[$optionName];
		}
		else
			$ret    =   null;

		return  $ret;
	}
	public function set($value, $optionName, $subOptionName = null)
	{
		if($subOptionName)
			$this->data[$optionName][$subOptionName]    =   $value;
		else
			$this->data[$optionName]    =   $value;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}
}