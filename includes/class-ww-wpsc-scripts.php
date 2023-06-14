<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */
class Ww_Wpsc_Scripts {
	
	public function __construct() {
		
	}
	
	/**
	 * Enqueue Styles 
	 *
	 * Enqueue Style Sheet for public
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	
	public function ww_wpsc_public_styles() {
		
		// Register & Enqueue public style
		wp_register_style( 'ww-wpsc-public-style', WW_WPSC_URL . 'includes/css/ww-wpsc-public.css', array(), WW_WPSC_VERSION );
		wp_enqueue_style( 'ww-wpsc-public-style' );
	}
	
	/**
	 * Enqueuing Styles
	 *
	 * Loads the required stylesheets for displaying the theme settings page in the WordPress admin section.
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function ww_wpsc_admin_styles( $hook_suffix ) {

		$pages_hook_suffix = array( 'post.php', 'post-new.php' );
		
		//Check pages when you needed
		if( in_array( $hook_suffix, $pages_hook_suffix ) ) {
		
			// loads the required styles for the plugin settings page
			wp_register_style( 'ww-wpsc-admin', WW_WPSC_URL . 'includes/css/ww-wpsc-admin.css', array(), WW_WPSC_VERSION );
			wp_enqueue_style( 'ww-wpsc-admin' );
			
		}
	}
	
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function add_hooks() {

		//add style for front side
		add_action( 'wp_enqueue_scripts', array( $this, 'ww_wpsc_public_styles' ) );
		
		// for shortcode popup			
		add_action( 'admin_enqueue_scripts', array( $this,'ww_wpsc_admin_styles' ) );
		
	}
}