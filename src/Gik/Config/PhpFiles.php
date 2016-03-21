<?php
/**
 * @copyright Constantin Galbenu <xprt64@gmail.com>
 * @link        https://github.com/xprt64/php-css
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Gik\Config;

use Gik\Config;

class PhpFiles  extends Config
{
	protected $files = [];

	public function __construct(array $files = [])
	{
		if(is_array($files) && !empty($files))
		{
			foreach($files as $file)
				$this->appendFromFile($file);
		}
	}

	public function loadFromFile($filePath)
	{
		$dataInFile =   require $filePath;

		if(is_array($dataInFile))
		{
			$this->data =   $dataInFile;
			$this->files    =   [$filePath];
		}
		else
			throw new \Exception("No config found in file '$filePath'");
	}

	public function appendFromFile($filePath)
	{
		$dataInFile =   require $filePath;

		if(is_array($dataInFile))
		{
			$this->data =   array_merge($this->data, $dataInFile);
			$this->files[]    =   $filePath;
		}
		else
			throw new \Exception("No config found in file '$filePath'");
	}

	/**
	 * @return array
	 */
	public function getFiles()
	{
		return $this->files;
	}

}