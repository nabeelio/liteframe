<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

namespace Liteframe;

class Cache 
{
	public static $init = array();

	public static function read($key)
	{
		if(empty(self::$init))
		{
			self::$init = \Liteframe\Config::get('CACHE_CONFIG');
		}

		// @TODO: Read from cache

		return false;
	}

	public static function write($key, $value, $duration = 'default')
	{
		if(empty(self::$init))
		{
			self::$init = \Liteframe\Config::get('CACHE_CONFIG');
		}

		// @TODO: Write to cache

	}

}