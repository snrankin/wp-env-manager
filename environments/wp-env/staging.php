<?php

/** ============================================================================
 * Staging enviornment constants
 * ========================================================================== */


/* Plugins to disable */
define('ENV_DISABLED_PLUGINS', serialize([
	'autoptimize/autoptimize.php',
	'wp-simple-firewall/icwp-wpsf.php',
	'wp-super-cache/wp-cache.php'
]));

/* Plugins to enable */
define('ENV_ENABLED_PLUGINS', serialize([
	'non-network' => array(
		'debug-bar/debug-bar.php',
		'developer/developer.php',
		'query-monitor/query-monitor.php',
	)
]));

/* GTM ID */
if (!defined('GTM_ID')) {
	define('GTM_ID', false);
}
/* Custom GTM Environment */
if (!defined('GTM_ENV')) {
	define('GTM_ENV', false);
}

/* Wordpress Memory Increase */
if (!defined('WP_MEMORY_LIMIT')) {
	define('WP_MEMORY_LIMIT', '256M');
}

if (!defined('WP_MAX_MEMORY_LIMIT')) {
	define('WP_MAX_MEMORY_LIMIT', '512M');
}

/* Disable Post Revisions. */
if (!defined('WP_POST_REVISIONS')) {
	define('WP_POST_REVISIONS', false);
}

/* Trash Days. */
if (!defined('EMPTY_TRASH_DAYS')) {
	define('EMPTY_TRASH_DAYS', '1');
}

/* WordPress Environment */
if (!defined('WP_ENVIRONMENT_TYPE')) {
	define('WP_ENVIRONMENT_TYPE', 'staging');
}

/* Php debug mode. */
ini_set('error_reporting', E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* WordPress debug mode. */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', true);
}
if (!defined('WP_DEBUG_DISPLAY')) {
	define('WP_DEBUG_DISPLAY', false);
}
if (!defined('WP_DEBUG_LOG')) {
	define('WP_DEBUG_LOG', WP_DEBUG);
}
if (!defined('SCRIPT_DEBUG')) {
	define('SCRIPT_DEBUG', false);
}
if (!defined('SAVEQUERIES')) {
	define('SAVEQUERIES', false);
}

/* Compression */
if (!defined('COMPRESS_CSS')) {
	define('COMPRESS_CSS', true);
}
if (!defined('COMPRESS_SCRIPTS')) {
	define('COMPRESS_SCRIPTS', true);
}
if (!defined('CONCATENATE_SCRIPTS')) {
	define('CONCATENATE_SCRIPTS', true);
}
if (!defined('ENFORCE_GZIP')) {
	define('ENFORCE_GZIP', false);
}
// if (!defined('WP_DISABLE_FATAL_ERROR_HANDLER')) {
// 	define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
// }
if (!defined('DISALLOW_INDEXING')) {
	define('DISALLOW_INDEXING', true);
}
if (!defined('WP_CACHE')) {
	define('WP_CACHE', false);
}

/* Enable dev for Advanced Custom Fields Extended */
if (!defined('ACFE_DEV')) {
	define('ACFE_DEV', true);
}
