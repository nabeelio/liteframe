<?php
/**
 * Liteframe PHP Framework
 * Copyright (c) 2010 Nabeel Shahzad <http://github.com/nshahzad>
 * 
 * License: MIT
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


		return false;
	}

	public static function write($key, $value, $duration = 'default')
	{
		if(empty(self::$init))
		{
			self::$init = \Liteframe\Config::get('CACHE_CONFIG');
		}



	}

}