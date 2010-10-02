<?php
/**
 * Liteframe PHP Framework
 * Copyright (c) 2010 Nabeel Shahzad <http://github.com/nshahzad>
 * 
 * License: MIT
 */

namespace Liteframe;

if(!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if(!defined('LITEFRAME_PATH')) { define('LITEFRAME_PATH', dirname(__FILE__)); }

# So APC opcode caches each include file
include LITEFRAME_PATH.DS.'core'.DS.'LF_BaseController.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_Cache.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_Config.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_URLParser.class.php';

\Liteframe\Config::set('DEFAULT_CONTROLLER', 'default');

# Include the app config
include APP_PATH.DS.'config'.DS.'config.php';

class Engine {
	
	public static function runApp()
	{
		$runner = \Liteframe\URLParser\URLParser::getPeices();

		# Include it and call it, really basic
		include APP_PATH.DS.'controllers'.DS.$runner['controller'].'_controller.php';

		$controller_name = ucwords($runner['controller']).'Controller';
		$controller = new $controller_name();
		$controller->init();

		call_user_func_array(array($controller, $runner['function']), $runner['args']);
	}
}