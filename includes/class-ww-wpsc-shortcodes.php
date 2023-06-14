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
class Ww_Wpsc_Shortcodes {
	
	public function __construct(){
		
	}
	
	/**
	 * Replace Shortcode with Custom Content
	 *
	 * @param $atts this will handles to various attributes which are passed in shortcodes
	 * @param $content this will return the your replaced content
	 * 
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	
	public function ww_wpsc_boxes( $atts, $content ) {
	
		//content to replace with your content and with attributes
		extract( shortcode_atts( array(	
				'boxtype'		=>	'boxinfo',
		), $atts ) );
		
		$content .= '<div class="ww-wpsc-button-container"><a href="#" class="ww-wpsc-button orange large"><span>'.esc_html__('Bon','wwwpsc').'</span></a></div>';	
		
		//default value for boxtype when nothing seleted
		if(empty($boxtype)) { $boxtype = 'boxinfo'; }
		
		
		$content_test = '<div class="ww-wpsc-'.$boxtype.'">'.do_shortcode($content).'</div>';
		
		return $content_test;
	}
	/**
	 * Replace Shortcode with Custom Content
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	
	public function ww_wpsc_button($atts,$content) {
		
		//content to replace with your content
		$content .= '<div class="ww-wpsc-button-container"><a href="#" class="ww-wpsc-button orange large"><span>'.esc_html__('Bon','wwwpsc').'</span></a></div>';	
		
		return $content;
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package WP Shortcodes
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		//replace shortcodes with custom content or HTML
		add_shortcode('ww_wpsc_boxes',array($this, 'ww_wpsc_boxes'));
		add_shortcode('ww_wpsc_button',array($this, 'ww_wpsc_button'));
		
	}
}