<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/Config
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace xprt64\Config;

class IniFile extends Base
{
	public function __construct($file)
	{
		$this->loadFromFile($file);
	}

	protected function loadFromFile($filePath)
	{
		$dataInFile = parse_ini_file($filePath);

		if (is_array($dataInFile)) {
			$this->data = $dataInFile;
			$this->files[] = $filePath;
		} else
			throw new \Exception("No config found in file '$filePath'");
	}

}