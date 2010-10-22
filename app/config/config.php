<?php
/**
 * Liteframe PHP Framework
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2009 - 2010, Nabeel Shahzad
 * @link http://github.com/nshahzad/liteframe
 *
 */

namespace Liteframe;

# The default routing
Config::write('DEFAULT_CONTROLLER', 'default');

# Your default site title
Config::write('SITE_TITLE', 'liteframe');

# This is the default, used with the $this->url() function
Config::write('BASE_URL', $_SERVER['SERVER_NAME']);

# Use a mod-rewrite rule, or default will be ?q=
# Used with the $this->url() function to generate URLs
Config::write('USE_REWRITE', true);


Config::write('DATABASE_CONNECTIONS', array(
		'example' => 'mysql://username:password@localhost/database_name',
	)
);

# If this is not blank, then a DB connection will be made
# Should be one of the indexes from above
Config::write('DATABASE_CONNECTOR', '');