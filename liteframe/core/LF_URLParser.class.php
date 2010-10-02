<?php
/**
 * Liteframe PHP Framework
 * Copyright (c) 2010 Nabeel Shahzad <http://github.com/nshahzad>
 * 
 * License: MIT
 */

namespace Liteframe\URLParser;

class URLParser {
	
	public static function getPeices()
	{
		$return = array(
			'controller' => \Liteframe\Config::get('DEFAULT_CONTROLLER'),
			'function' => 'index',
			'args' => array(),
		);

		if(!isset($_REQUEST['q']) || empty($_REQUEST['q']))
		{
			return $return;
		}

		$parts = explode('/', $_REQUEST['q']);
		$return['controller'] = $parts[1];

		if(isset($parts[2]) === true)
		{
			$return['function'] = $parts[2];
		}		

		unset ($parts[0]);
		unset ($parts[1]);
		unset ($parts[2]);
		
		$return['args'] = $parts;
		
		return $return;
	}
}