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

	/**
	 * Set a global configuration value
	 *
	 * @param string $key Key of value
	 * @param string $value Value of setting
	 * @return none 
	 *
	 */
	public static function set($key, $value = '')
	{
		self::$keys[$key] = $value;
	}

	/**
	 * Retrieve the value of a global setting
	 * 
	 * @param string $key Key of value to retrieve
	 * @param string $index If the value is an array/object, return this index
	 * @return mixed
	 */
	public static function get($key, $index = null)
	{
		if(isset(self::$keys[$key])) {
			
			$val = self::$keys[$key];
			
			if($index === null) {
				return $val;
			}

			if(is_array($val)) {
				return $val[$index];
			}

			if(is_object($val)) {
				return $val->{$index};
			}
	
			return $val;
		}

		return false;
	}
}