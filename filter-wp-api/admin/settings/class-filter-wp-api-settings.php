<?php

/**
 * Controls settings of plugin
 *
 * @package    Filter_WP_Api
 * @subpackage Filter_WP_Api/admin/settings
 */
class Filter_WP_Api_Settings extends Filter_WP_Api_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Filter_WP_Api    The ID of this plugin.
	 */
	private $Filter_WP_Api;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $Filter_WP_Api       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $Filter_WP_Api ) {
		$this->id    = 'general';
		$this->label = __( 'General', 'woocommerce' );
		$this->Filter_WP_Api = $Filter_WP_Api;
	}

	/**
	 * Creates our settings sections with fields etc. 
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function settings_api_init() {
		$this->settings_post_api_init();
		$this->settings_user_api_init();
	}

	/**
	 * Creates post settings sections with fields etc. 
	 *
	 * @since    1.1.0
	 * @access   public
	 */
	public function settings_post_api_init() {

		// Example usage: 
		// register_setting( $option_group, $option_name, $settings_sanitize_callback );
		register_setting(
			$this->Filter_WP_Api . '_options',
			$this->Filter_WP_Api . '_options',
			array( $this, 'settings_sanitize' )
		);

		// Example usage: 
		// add_settings_section( $id, $title, $callback, $menu_slug );
		add_settings_section(
			$this->Filter_WP_Api . '-display-options', // section
			apply_filters( $this->Filter_WP_Api . '-display-section-title', __( '', $this->Filter_WP_Api ) ),
			array( $this, 'display_options_section' ),
			$this->Filter_WP_Api
		);

		// Example usage: 
		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );
		add_settings_field(
			'disable-filter',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-label', __( 'Disable Filter', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-display-options' // section to add to
		);
		
		add_settings_field(
			'disable-filter-compact',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-compact-label', __( 'Disable Compact', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_compact_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-display-options' // section to add to
		);

		add_settings_field(
			'disable-filter-detailed',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-detailed-label', __( 'Disable Detailed', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_detailed_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-display-options' // section to add to
		);
	}

	/**
	 * Creates user settings sections with fields etc. 
	 *
	 *
	 * @since    1.1.0
	 * @access   public
	 */
	public function settings_user_api_init() {
		// Example usage: 
		// register_setting( $option_group, $option_name, $settings_sanitize_callback );
		register_setting(
			$this->Filter_WP_Api . 'user_options',
			$this->Filter_WP_Api . 'user_options',
			array( $this, 'settings_sanitize' )
		);

		// Example usage: 
		// add_settings_section( $id, $title, $callback, $menu_slug );
		add_settings_section(
			$this->Filter_WP_Api . '-user-display-options', // section
			apply_filters( $this->Filter_WP_Api . '-user-display-section-title', __( '', $this->Filter_WP_Api ) ),
			array( $this, 'display_options_section' ),
			$this->Filter_WP_Api
		);

		// Example usage: 
		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );
		add_settings_field(
			'disable-filter',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-user-label', __( 'Disable User Filter', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_user_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-user-display-options' // section to add to
		);
		
		add_settings_field(
			'disable-filter-compact',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-user-compact-label', __( 'Disable User Compact', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_user_compact_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-user-display-options' // section to add to
		);

		add_settings_field(
			'disable-filter-detailed',
			apply_filters( $this->Filter_WP_Api . '-disable-filter-user-detailed-label', __( 'Disable User Detailed', $this->Filter_WP_Api ) ),
			array( $this, 'disable_filter_user_detailed_options_field' ),
			$this->Filter_WP_Api,
			$this->Filter_WP_Api . '-user-display-options' // section to add to
		);		
	}

	/**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function display_options_section( $params ) {

		echo '<p>' . $params['title'] . '</p>';

	} // display_options_section()

	/**
	 * Enable Filter Field
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-filter'] ) ) {
			$option = $options['disable-filter'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Plugin will no longer filter REST API.</p> <?php
	} // disable_filter_options_field()

	/**
	 * Enable Compact Field
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_compact_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-filter-compact'] ) ) {
			$option = $options['disable-filter-compact'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter-compact]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter-compact]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Disables "_compact" endpoint for post requests. (id, title, link and featured_image will be available)</p> <?php
	} // disable_filter_compact_options_field()

	/**
	 * Enable Detailed Field
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_detailed_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-filter-detailed'] ) ) {
			$option = $options['disable-filter-detailed'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter-detailed]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-filter-detailed]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Disables "_detailed" endpoint for post requests. (id, title, link, date, content, category and featured_image will be available)</p> <?php
	} // disable_filter_detailed_options_field()

	/**
	 * Enable User Filter Field
	 *
	 * @since 		1.1.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_user_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-user-filter'] ) ) {
			$option = $options['disable-user-filter'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-user-filter]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-user-filter]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Plugin will no longer filter users on REST API.</p> <?php
	} // disable_filter_user_options_field()

	/**
	 * Enable Compact Field For User
	 *
	 * @since 		1.1.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_user_compact_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-user-filter-compact'] ) ) {
			$option = $options['disable-user-filter-compact'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-user-filter-compact]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-user-filter-compact]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Disables "_compact" endpoint for user requests.</p> <?php
	} // disable_filter_user_compact_options_field()

		/**
	 * Enable Detailed Field For User
	 *
	 * @since 		1.1.0
	 * @return 		mixed 			The settings field
	 */
	public function disable_filter_user_detailed_options_field() {

		$options 	= get_option( $this->Filter_WP_Api . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-user-filter-detailed'] ) ) {
			$option = $options['disable-user-filter-detailed'];
		}

		?><input type="checkbox" id="<?php echo $this->Filter_WP_Api; ?>_options[disable-*user-filter-detailed]" name="<?php echo $this->Filter_WP_Api; ?>_options[disable-user-filter-detailed]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Disables "_detailed" endpoint for user requests.</p> <?php
	} // disable_filter_detailed_options_field()
}