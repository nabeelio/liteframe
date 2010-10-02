<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# These paths must be set!
define('ROOT_PATH', dirname(dirname(dirname(__FILE__))));
define('LITEFRAME_PATH', ROOT_PATH.DIRECTORY_SEPARATOR.'liteframe');
define('APP_PATH', ROOT_PATH.DIRECTORY_SEPARATOR.'app');

include LITEFRAME_PATH.DIRECTORY_SEPARATOR.'/liteframe.php';
\Liteframe\Engine::runApp();