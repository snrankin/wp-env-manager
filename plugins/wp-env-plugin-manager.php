<?php

/**
 * Environment Plugin Manager
 *
 * @package       WPENV
 * @author        Sam Rankin
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Environment Plugin Manager
 * Plugin URI:    https://mydomain.com
 * Description:   A plugin to manage which plugins are activated/deactivated based on the current WordPress environment (WP_ENVIRONMENT)
 * Version:       1.0.0
 * Author:        Sam Rankin
 * Author URI:    https://www.riester.com
 * Text Domain:   wp-env-plugin-manager
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Environment Plugin Manager. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

// Include your custom code here.

// Make sure we don't expose any info if called directly.
if (!function_exists('add_action')) {
	_e("Hi there! I'm just a plugin, not much I can do when called directly.", 'wp-env-plugin-manager');
	exit;
}

if (!defined('ENV_DISABLED_PLUGINS')) {
	define('ENV_DISABLED_PLUGINS', false);
}

if (false !== ENV_DISABLED_PLUGINS) {
	$plugins_to_disable = unserialize(ENV_DISABLED_PLUGINS);

	if (!empty($plugins_to_disable) && is_array($plugins_to_disable)) {

		include_once dirname(__FILE__) . '/wp-env-plugin-manager/wp-plugin-disabler.php';
		$utility = new DisableEnvPlugins($plugins_to_disable);
	}
}

if (!defined('ENV_ENABLED_PLUGINS')) {
	define('ENV_ENABLED_PLUGINS', false);
}

if (false !== ENV_ENABLED_PLUGINS) {
	$plugins_to_enable = unserialize(ENV_ENABLED_PLUGINS);

	if (!empty($plugins_to_enable) && is_array($plugins_to_enable)) {

		include_once dirname(__FILE__) . '/wp-env-plugin-manager/wp-plugin-enabler.php';
		$utility = new EnableEnvPlugins($plugins_to_enable);
	}
}
