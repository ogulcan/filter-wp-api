<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Filter_WP_Api
 * @subpackage Filter_WP_Api/admin/partials
 */
?>

<?php
	//flush rewrite rules when we load this page!
	flush_rewrite_rules();
?>

<div class="wrap">
	<?php
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
		$this->filter_wp_api_render_tabs(); 
	?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="postbox-container-2" class="postbox-container">
				<?php 
				switch ($tab) {
					case 'faq': ?>
						<h3>Q: How to use compact and detailed endpoints?</h3>
						<span>A: Just add "?_compact" or "?_detailed" to end of api url. Example is <a href="<?php site_url(); ?>../wp-json/wp/v2/posts?_detailed" target="_blank"><strong>here</strong></a>.</span>
						<h3>Q: To disable plugin also disables rest api?</h3>
						<span>A: Nope. Just filtering fields will be disabled. Even you call endpoints, default data will be available. </span>
						<h3>Q: Compact and detailed are not working for pages/category/author/media</h3>
						<span>A: Correct. This is a plugin that only filters for posts. Please stay tuned for more features.</span>
						<h3>Q: Have some issues about plugin?</h3>
						<span>A: Please use GitHub for <a href="http://github.com/ogulcan/filter-wp-api" target="_blank"><strong>issues, feature requests and more</strong></a>.</span>
					<?php
						break;
					// If no tab or general						
					default: ?>
						<div id="normal-sortables" class="meta-box-sortables ui-sortable">
							<div id="itsec_sss" class="postbox ">
								<h3 class="hndle"><span>Welcome!</span></h3>
								<div class="inside">
									<p>This plugin sweeps lots of WP REST API fields.</p>
									<p>Just add "?_compact" or "?_detailed" to end of api url.</p>
									<p>Compact post example is <a href="<?php site_url(); ?>../wp-json/wp/v2/posts?_compact" target="_blank"><strong>here</strong></a>.</p>
									<p>Detailed post example is <a href="<?php site_url(); ?>../wp-json/wp/v2/posts?_detailed" target="_blank"><strong>here</strong></a>.</p>
									<p>Compact user example is <a href="<?php site_url(); ?>../wp-json/wp/v2/users?_compact" target="_blank"><strong>here</strong></a>.</p>
									<p>Detailed user example is <a href="<?php site_url(); ?>../wp-json/wp/v2/users?_detailed" target="_blank"><strong>here</strong></a>.</p>
								</div>
							</div>
						</div>
						<form method="post" action="options.php">		
							<div id="normal-sortables" class="meta-box-sortables ui-sortable">
								<div id="itsec_get_started" class="postbox ">
									<h3 class="hndle"><span>Settings</span></h3>
									<div class="inside">
										<?php 
											settings_fields( $this->get_plugin() . '_options' );

											do_settings_sections( $this->get_plugin() );

											submit_button( 'Save Settings' );
										?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</form>
					<?php	
						break; 
				} ?>
			</div>
		</div>
	</div>
</div>