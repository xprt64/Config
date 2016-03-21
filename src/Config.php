<?php
/**
 * Created by PhpStorm.
 * User: gica
 * Date: 21.03.2016
 * Time: 16:17
 */

namespace xprt64\Config;

interface Config
{
	public function get(...$optionPathComponents);
	public function set($value, ...$optionPathComponents);
	public function getParsedFiles();
	public function getData();
}