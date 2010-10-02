<?php
/**
 * Liteframe PHP Framework
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

class DefaultController extends \Liteframe\Controller
{

	public function index()
	{
		$this->render('index');
	}	

}