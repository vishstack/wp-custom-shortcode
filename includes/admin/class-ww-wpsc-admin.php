<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Handles generic Admin functionality and AJAX requests.
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */
class Ww_Wpsc_Admin {
	
	public $scripts;
	
	public function __construct() {		
	
		global $ww_wpsc_scripts;
		$this->scripts = $ww_wpsc_scripts;
	}
	
	/**
	 * Register Buttons
	 *
	 * Register the different content locker buttons for the editor
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function ww_wpsc_shortcode_editor_register_button( $buttons ) {	
	
	 	array_push( $buttons, "|", "wwwpscshortcodes" );
	 	array_push( $buttons, "|", "wwwpscsingleshortcode" );
	 	return $buttons;	 	
	}
	
		
	/**
	 * Editor Pop Up Script
	 *
	 * Adding the needed script for the pop up on the editor
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function ww_wpsc_shortcode_editor_button_script( $plugin_array ) {
	
		wp_enqueue_script( 'tinymce' );
		
	   $plugin_array['wwwpscshortcodes'] = WW_WPSC_URL . 'includes/js/ww-wpsc-buttons.js?ver='.WW_WPSC_VERSION;
	   $plugin_array['wwwpscsingleshortcode'] = WW_WPSC_URL . 'includes/js/ww-wpsc-buttons.js?ver='.WW_WPSC_VERSION;
	   return $plugin_array;
	   
	   
	}
	
	/**
	 * Shortcode Button
	 *
	 * Adds the shortcode button above the WordPress editor.
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	
	public function ww_wpsc_shortcode_button() {
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
			return;
		}
	 
		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'ww_wpsc_shortcode_editor_button_script' ) );
			add_filter( 'mce_buttons', array( $this, 'ww_wpsc_shortcode_editor_register_button' ) );	     
		}
	}
	
	/**
	 * Pop Up On Editor
	 *
	 * Includes the pop up on the WordPress editor
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function ww_wpsc_shortcode_popup_markup() {
		
		include_once( WW_WPSC_ADMIN . '/forms/ww-wpsc-popup.php' );
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		// shortcode button
		add_action( 'init', array( $this, 'ww_wpsc_shortcode_button' ) );
		
		// mark up for popup
		add_action( 'admin_footer-post.php', array( $this,'ww_wpsc_shortcode_popup_markup' ) );
		add_action( 'admin_footer-post-new.php', array( $this,'ww_wpsc_shortcode_popup_markup' ) );
		
	}
}