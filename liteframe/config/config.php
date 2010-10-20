<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

namespace Liteframe;

# Default config options
Config::write('DEFAULT_CONTROLLER', 'default');


Config::write('BASE_URL', $_SERVER['SERVER_NAME']);


Config::write('USE_REWRITE', true);

# If this is not blank, then a DB connection will be made
Config::write('DATABASE_DSN', '');