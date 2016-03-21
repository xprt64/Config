<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Gik\Config;

use Gik\Config;

class PhpArray  extends Config
{
	public function __construct(array $data = [])
	{
		$this->data =   $data;
	}

}