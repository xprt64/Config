<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class PhpFile extends Base
{
	public function __construct($file)
	{
		$this->loadFromFile($file);
	}

	protected function loadFromFile($filePath)
	{
		$dataInFile = include $filePath;

		if (is_array($dataInFile)) {
			$this->data = $dataInFile;
			$this->files[] = $filePath;
		} else
			throw new \Exception("No config found in file '$filePath'");
	}

}