<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

namespace Liteframe;

session_start();

if(!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if(!defined('LITEFRAME_PATH')) { define('LITEFRAME_PATH', dirname(__FILE__)); }

# So APC opcode caches each include file
include LITEFRAME_PATH.DS.'core'.DS.'LF_BaseController.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_Cache.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_Config.class.php';
include LITEFRAME_PATH.DS.'core'.DS.'LF_URLParser.class.php';

# Include the proper app_controller
if(file_exists(APP_PATH.DS.'app_controller.php')) {
	include APP_PATH.DS.'app_controller.php';
}
else {
	include LITEFRAME_PATH.DS.'controllers'.DS.'app_controller.php';
}

# Include the default config
include LITEFRAME_PATH.DS.'config'.DS.'config.php';

# Include the app config
include APP_PATH.DS.'config'.DS.'config.php';


/* Main class! */
class Engine {
	
	public static function runApp()
	{
		$run_info = URLParser\URLParser::getPeices();

		# Include it and call it, really basic
		include APP_PATH.DS.'controllers'.DS.$run_info['controller'].'_controller.php';

		$controller_name = ucwords($run_info['controller']).'Controller';
		$controller = new $controller_name();
		$controller->init();

		ob_start();
		call_user_func_array(array($controller, $run_info['function']), $run_info['args']);

		$content_for_layout = ob_get_clean();
		ob_end_clean();

		# Finally output with a global layout
		include APP_PATH.DS.'layouts'.DS.$controller->layout.'.tpl';
	}
}