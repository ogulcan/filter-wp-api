<?php

/**
 * Filter Wordpress API
 *
 * @since             1.1.0
 * @package           Filter_WP_Api
 *
 * @wordpress-plugin
 * Plugin Name:       Filter Wordpress API
 * Plugin URI:        https://github.com/ogulcan/filter-wp-api
 * Description:       A wordpress plugin that clears huge fields of WP Rest API.
 * Version:           1.1.0
 * Author:            Ogulcan Orhan
 * Author URI:        https://github.com/ogulcan
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_VERSION', '1.1.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-filter-wp-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Filter_WP_Api() {

	$plugin = new Filter_WP_Api();
	$plugin->run();

}

run_Filter_WP_Api();