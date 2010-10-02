<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
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