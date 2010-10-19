<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

namespace Liteframe;

class Controller 
{
	protected static $vars = array();
	protected static $current_class = '';

	public $layout = 'default';

	public function init()
	{
		
	}

	/**
	 * Set a variable for the view
	 *
	 * @param string $key Variable key
	 * @param string $value Variable value
	 * @return none 
	 *
	 */
	protected function set($key, $value)
	{
		self::$vars[$key] = $value;
	}


	/**
	 * Render a view. Pass the name of the template, it looks in
	 * /app/views/CONTROLLER_NAME/name.tpl
	 * 
	 * @param string $file The filename, without the extension
	 * @return none
	 */
	protected function render($file)
	{
		# Supplied absolute path to file
		if($file[0] === '/')
		{
			$file = $file.'.tpl';
		}
		else
		{
			if(self::$current_class == '')
			{
				self::$current_class = str_ireplace('controller', '', strtolower(get_called_class()));
			}

			$file = self::$current_class.DS.$file.'.tpl';
		}

		extract(self::$vars, EXTR_OVERWRITE);
		include APP_PATH.DS.'views'.DS.$file;
	}



	/**
	 * Do a nice var_dump with <pre> tags, pass any number of
	 * variables to it
	 * 
	 * @todo Log to a file or something based on passed options
	 *
	 * @return none
	 *
	 */
	protected function var_dump()
	{
		echo '<pre>';
		$args = func_get_args();
		foreach ($args as $index => $arg)
		{
			echo "Argument {$index}: ";
			var_dump($arg);
		}

		echo '</pre>';
	}
	


	/**
	 * Do a nice print_r with <pre> tags, pass any number of
	 * variables to it
	 * 
	 * @todo Log to a file or something based on passed options
	 *
	 * @return none
	 *
	 */
	protected function print_r()
	{
		echo '<pre>';
		$args = func_get_args();
		foreach ($args as $index => $arg)
		{
			echo "Argument {$index}: ";
			print_r($arg);
		}

		echo '</pre>';
	}



	/**
	 * Return a properly formatted URL
	 * 
	 * @todo Make this more versatile
	 *
	 * @param mixed $path This is a description
	 * @return mixed This is the return value description
	 *
	 */
	protected function url($path)
	{
		if(is_array($path)) {
			// @TODO: Process array params
		}
		else {
			if($path[0] !== '/') {
				$path = '/'.$path;
			}
		}

		$path = trim($path);

		if(Config::get('USE_REWRITE') === false) {
			$path = '?q='.$path;
		}

		return 'http://'.Config::get('BASE_URL')."{$path}";
	}

	/**
	 * Redirect the user to a certain path from root
	 */
	protected function redirect($path)
	{
		header('Location: '.$path);
	}
}