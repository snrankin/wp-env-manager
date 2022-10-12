<?php



// --------------- Constants that span across all environments -------------- //

/* Query Monitor Constants */
define('QM_DARK_MODE', true);
define('QM_EDITOR_COOKIE', 'vscode');

/* Allow image overwrites */
if (!defined('IMAGE_EDIT_OVERWRITE')) {
	define('IMAGE_EDIT_OVERWRITE', true);
}

/* Allow WordPress to automatically repair your database. */
if (!defined('WP_ALLOW_REPAIR')) {
	define('WP_ALLOW_REPAIR', true);
}
/* Whether to allow media items to use the trash functionality. */
if (!defined('MEDIA_TRASH')) {
	define('MEDIA_TRASH', true);
}

$hostname = '';

if (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])) {
	$hostname = $_SERVER['HTTP_HOST'];
}

if (!empty($hostname)) {
	switch ($hostname) {
		case '[PROD]': // Production site
			require_once dirname(__FILE__)  . '/env/production.php';
			break;
		case '[STAGE]': // Staging site
			require_once dirname(__FILE__) . '/env/staging.php';
			break;

		case '[DEV]': // Development site
			require_once dirname(__FILE__) . '/env/development.php';
			break;

		default: // Test or local site
			require_once dirname(__FILE__) . '/env/local.php';
			break;
	}
}
