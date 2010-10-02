<?php
/**
 * Liteframe PHP Framework
 * Copyright (c) 2010 Nabeel Shahzad <http://github.com/nshahzad>
 * 
 * License: MIT
 */

namespace Liteframe;

class Config {
	
	public static $keys = array();


	public static function set($key, $value = '')
	{
		self::$keys[$key] = $value;
	}

	public static function get($key)
	{
		if(isset(self::$keys[$key]))
			return self::$keys[$key];

		return false;
	}
}