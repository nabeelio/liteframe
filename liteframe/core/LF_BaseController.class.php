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
				self::$current_class = str_replace('controller', '', strtolower(get_called_class()));
			}

			$file = self::$current_class.DS.$file.'.tpl';
		}

		extract(self::$vars, EXTR_OVERWRITE);
		include APP_PATH.DS.'views'.DS.$file;
	}

	/**
	 * Redirect the user to a certain path from root
	 */
	protected function redirect($path)
	{
		
		header('Location: '.$path);
	}
}