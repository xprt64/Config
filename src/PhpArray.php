<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class PhpArray extends Base
{
	public function __construct(array $data = [])
	{
		$this->data = $data;
	}

}