<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Filter_WP_Api
 * @subpackage Filter_WP_Api/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Filter_WP_Api
 * @subpackage Filter_WP_Api/admin
 * @author     Ogulcan Orhan <ogulcanorhan@gmail.com>
 */
class Filter_WP_Api_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Filter_WP_Api    The ID of this plugin.
	 */
	private $Filter_WP_Api;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	* The tabs of settings page
	* @since 1.0.0
	* @access public
	* @var array 	$plugin_settings_tabs	The tabs of this plugin.
	*/
	public $plugin_settings_tabs = array();

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Filter_WP_Api       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Filter_WP_Api, $version ) {

		$this->Filter_WP_Api = $Filter_WP_Api;
		$this->version = $version;

		$this->plugin_settings_tabs['general'] = 'General';
		$this->plugin_settings_tabs['faq'] = 'FAQs';
	}

	/**
	 * Register the Settings page.
	 *
	 * @since    1.0.0
	 */
	public function filter_wp_api_admin_menu() {
		 add_options_page( __('Filter Rest API', $this->Filter_WP_Api), __('Filter Rest API', $this->Filter_WP_Api), 'manage_options', $this->Filter_WP_Api, array($this, 'display_plugin_admin_page'));
	}

	/**
	 * Settings - Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function settings_sanitize( $input ) {

		// Initialize the new array that will hold the sanitize values
		$new_input = array();

		if(isset($input)) {
			// Loop through the input and sanitize each of the values
			foreach ( $input as $key => $val ) {
				$new_input[ $key ] = sanitize_text_field( $val );
			}
		}

		return $new_input;

	} // sanitize()

	/**
	 * Renders Settings Tabs
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	function filter_wp_api_render_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->Filter_WP_Api . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';	
		}
		echo '</h2>';
	}

	/**
	 * Plugin Settings Link on plugin page
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	function add_settings_link( $links ) {
		$mylinks = array(
			'<a href="' . admin_url( 'options-general.php?page=filter-wp-api' ) . '">Settings</a>',
		);
		return array_merge( $links, $mylinks );
	}

	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page(){	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/filter-wp-api-admin-display.php';
	}

	/**
	 * Returns plugin for settings page
	 *
	 * @since    	1.0.0
	 * @return 		string    $Filter_WP_Api       The name of this plugin
	 */
	public function get_plugin() {
		return $this->Filter_WP_Api;
	}
}