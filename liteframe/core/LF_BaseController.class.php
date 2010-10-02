<?php
/**
 * Liteframe PHP Framework
 * Copyright (c) 2010 Nabeel Shahzad <http://github.com/nshahzad>
 * 
 * License: MIT
 */

namespace Liteframe;

class Controller 
{
	protected static $vars = array();
	protected static $current_class = '';

	public function init()
	{
		
	}

	protected function set($key, $value)
	{
		self::$vars[$key] = $value;
	}

	protected function render($file)
	{
		if(self::$current_class == '')
		{
			self::$current_class = str_replace('controller', '', strtolower(get_called_class()));
		}

		extract(self::$vars, EXTR_OVERWRITE);
		include APP_PATH.DS.'views'.DS.self::$current_class.DS.$file.'.tpl';
	}
}