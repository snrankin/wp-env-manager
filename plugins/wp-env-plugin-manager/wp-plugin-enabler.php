<?php

/**
 * Inspired by https://gist.github.com/Rarst/4402927, which was inspired
 * by https://gist.github.com/markjaquith/1044546.
 *
 * The main difference between this plugin and those is how you call the
 * constructor and the enable() method.
 *
 * For the constructor, the array you pass should be an assoc array, with
 * keys 'network' and/or 'non-network', whose values are arrays of plugins
 * to enable.
 *
 * For the enable() method, there is an 2nd parameter, specifying whether you
 * want to enable the plugins network-wide or not (default 'non-network').
 *
 * In both cases, if installed in a non-multisite setup, any plugins specified
 * to be 'network' enabled will be 'non-network' enabled, so that if you use
 * a given network plugin on both multisite and non-multisite setups you can
 * use the same version of this mu-plugin across them all.
 */

class EnableEnvPlugins {
	static $instance;
	private $enabled = array('non-network' => array(), 'network' => array());
	/**
	 * Sets up the options filter, and optionally handles an array of plugins to enable
	 * @param array $enables Optional array of plugin filenames to enable
	 */
	public function __construct(array $enables = NULL) {
		// Handle what was passed in
		if (is_array($enables)) {
			foreach ($enables as $which => $_enables) {
				if (is_array($_enables)) {
					foreach ($_enables as $enable) {
						$this->enable($enable, $which);
					}
				}
			}
		}
		// Add the filters
		add_filter('option_active_plugins', array($this, 'do_enabling'));
		add_filter('site_option_active_sitewide_plugins', array($this, 'do_network_enabling'));

		// Allow other plugins to access this instance
		self::$instance = $this;
	}
	/**
	 * Adds a filename to the list of plugins to enable
	 */
	public function enable($file, $which = 'non-network') {
		$plugin_path = wp_normalize_path(WP_PLUGIN_DIR . "/$file");

		if (file_exists($plugin_path)) {
			if (!is_multisite() || !in_array($which, array('non-network', 'network'))) {
				$which = 'non-network';
			}
			$this->enabled[$which][] = $file;
		}
	}
	/**
	 * Hooks in to the option_active_plugins filter and does the enabling
	 * @param array $plugins WP-provided list of plugin filenames
	 * @return array The filtered array of plugin filenames
	 */
	public function do_enabling($plugins) {
		return array_merge($plugins, $this->enabled['non-network']);
	}

	/**
	 * Hooks in to the site_option_active_sitewide_plugins filter and does the enabling
	 *
	 * @param array $plugins
	 *
	 * @return array
	 */
	public function do_network_enabling($plugins) {
		foreach ($this->enabled['network'] as $file) {
			$plugins[$file] = time();
		}
		return $plugins;
	}
}
