<?php
/**
 * Plugin Name: WP Shortcodes
 * Plugin URI: https://www.wpwebelite.com/
 * Description: How to work with wordpress shortcodes and shortcodes attributes.
 * Version: 1.0.0
 * Author: WPWeb
 * Author URI: https://www.wpwebelite.com/
 * Text Domain: wwwpsc
 * Domain Path: languages
 * 
 * @package WP Shortcodes
 * @category Core
 * @author WPWeb
 */
/**
 * Basic plugin definitions 
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $wpdb;

/**
 * Basic Plugin Definitions 
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */
if( !defined( 'WW_WPSC_VERSION' ) ) {
	define( 'WW_WPSC_VERSION', '1.0.0' ); //version of plugin
}
if( !defined( 'WW_WPSC_DIR' ) ) {
	define( 'WW_WPSC_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WW_WPSC_ADMIN' ) ) {
	define( 'WW_WPSC_ADMIN', WW_WPSC_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'WW_WPSC_URL' ) ) {
	define( 'WW_WPSC_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WW_WPSC_IMG_URL' ) ) {
	define( 'WW_WPSC_IMG_URL', WW_WPSC_URL . 'includes/images' ); // plugin images url
}
if( !defined( 'WW_WPSC_TEXT_DOMAIN' ) ) {
	define( 'WW_WPSC_TEXT_DOMAIN', 'wwwpsc' ); // text domain for doing language translation
}
if( !defined( 'WW_WPSC_PLUGIN_BASENAME' ) ) {
	define( 'WW_WPSC_PLUGIN_BASENAME', basename( WW_WPSC_DIR ) ); //Plugin base name
}
/**
 * Load Text Domain
 * 
 * This gets the plugin ready for translation.
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */
function ww_wpsc_load_textdomain() {
	
 // Set filter for plugin's languages directory
	$ww_wpsc_lang_dir	= dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$ww_wpsc_lang_dir	= apply_filters( 'ww_wpsc_languages_directory', $ww_wpsc_lang_dir );
	
	// Traditional WordPress plugin locale filter
	$locale	= apply_filters( 'plugin_locale',  get_locale(), 'wwwpsc' );
	$mofile	= sprintf( '%1$s-%2$s.mo', 'wwwpsc', $locale );
	
	// Setup paths to current locale file
	$mofile_local	= $ww_wpsc_lang_dir . $mofile;
	$mofile_global	= WP_LANG_DIR . '/' . WW_WPSC_PLUGIN_BASENAME . '/' . $mofile;
	
	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/wp-shortcodes folder
		load_textdomain( 'wwwpsc', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) { // Look in local /wp-content/plugins/wp-shortcodes/languages/ folder
		load_textdomain( 'wwwpsc', $mofile_local );
	} else { // Load the default language files
		load_plugin_textdomain( 'wwwpsc', false, $ww_wpsc_lang_dir );
	}
  
}
/**
 * Activation hook
 * 
 * Register plugin activation hook.
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */

register_activation_hook( __FILE__, 'ww_wpsc_install' );

/**
 * Deactivation hook
 *
 * Register plugin deactivation hook.
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */

register_deactivation_hook( __FILE__, 'ww_wpsc_uninstall' );

/**
 * Plugin Setup Activation hook call back 
 *
 * Initial setup of the plugin setting default options 
 * and database tables creations.
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */
function ww_wpsc_install() {
	
	global $wpdb;
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */
function ww_wpsc_uninstall() {
	
	global $wpdb;
}
/**
 * Load Plugin
 * 
 * Handles to load plugin after
 * dependent plugin is loaded
 * successfully
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */
function ww_wpsc_plugin_loaded() {
 
	// load first plugin text domain
	ww_wpsc_load_textdomain();
}

//add action to load plugin
add_action( 'plugins_loaded', 'ww_wpsc_plugin_loaded' );

/**
 * Initialize all global variables
 * 
 * @package WP Shortcodes
 * @since 1.0.0
 */

global $ww_wpsc_scripts,$ww_wpsc_admin,$ww_wpsc_shortcodes;

/**
 * Includes
 *
 * Includes all the needed files for plugin
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */
 
require_once( WW_WPSC_DIR . '/includes/class-ww-wpsc-scripts.php');
$ww_wpsc_scripts = new Ww_Wpsc_Scripts();
$ww_wpsc_scripts->add_hooks();

//includes admin class file
require_once ( WW_WPSC_ADMIN . '/class-ww-wpsc-admin.php');
$ww_wpsc_admin = new Ww_Wpsc_Admin();
$ww_wpsc_admin->add_hooks();

//includes shortcode class file
require_once ( WW_WPSC_DIR . '/includes/class-ww-wpsc-shortcodes.php');
$ww_wpsc_shortcodes = new Ww_Wpsc_Shortcodes();
$ww_wpsc_shortcodes->add_hooks();
