<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'on');

# These paths must be set!
define('ROOT_PATH', dirname(dirname(dirname(__FILE__))));
define('LITEFRAME_PATH', ROOT_PATH.DIRECTORY_SEPARATOR.'liteframe');
define('APP_PATH', ROOT_PATH.DIRECTORY_SEPARATOR.'app');

include LITEFRAME_PATH.DIRECTORY_SEPARATOR.'/liteframe.php';
$app = new \Liteframe\Engine();
$app->runApp();