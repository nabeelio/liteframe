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
	
	protected $controller = null;
	
	protected function set($key, $value)
	{
		Template::set($key, $value);
	}

	/**
	 * Render a template from the elements folder
	 */
	protected function element($file, $vars)
	{
		$this->controller->element($file, $vars);
	}

	public function runApp()
	{
		$run_info = URLParser\URLParser::getPeices();

		# Include it and call it, really basic
		include APP_PATH.DS.'controllers'.DS.$run_info['controller'].'_controller.php';

		$controller_name = ucwords($run_info['controller']).'Controller';
		$this->controller = new $controller_name();

		# Load up the database includes if there is one specified
		if(Config::read('DATABASE_CONNECTOR') !== '') 
		{
			include LITEFRAME_PATH.DS.'lib'.DS.'php-activerecord'.DS.'ActiveRecord.php';
		
			$connections = Config::read('DATABASE_CONNECTIONS');
			$default_connection = Config::read('DATABASE_CONNECTOR');
			$model_path = APP_PATH.DS.'models';

			# must issue a "use" statement in your closure if passing variables
			\ActiveRecord\Config::initialize(function($cfg) use ($connections, $default_connection, $model_path)
			{
				$cfg->set_model_directory($model_path);
				$cfg->set_connections($connections);
			
				# default connection is now production
				$cfg->set_default_connection($default_connection);
			});
		}

		
		call_user_func_array(array($this->controller, 'init'), array());
		
		ob_start();

		call_user_func_array(array($this->controller, $run_info['function']), $run_info['args']);
		$content_for_layout = ob_get_clean();

		ob_end_clean();

		$title_for_layout = $this->controller->title;
		
		# Finally output with a global layout
		if($this->controller->layout !== '')
			include APP_PATH.DS.'layouts'.DS.$this->controller->layout.'.tpl';
		else
			include LITEFRAME_PATH.DS.'layouts'.DS.'default.tpl';
	}
}