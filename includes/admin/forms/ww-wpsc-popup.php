<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Shortocde UI
 *
 * This is the code for the pop up editor, which shows up when an user clicks
 * on the fb review engine icon within the WordPress editor.
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */

?><div class="ww-wpsc-popup-content">

	<div class="ww-wpsc-header-popup">
		<div class="ww-wpsc-popup-header-title"><?php esc_html_e( 'Add a Shortcodes', 'wwwpsc' );?></div>
		<div class="ww-wpsc-popup-close"><a href="javascript:void(0);" class="ww-wpsc-popup-close-button"><img src="<?php echo esc_url(WW_WPSC_IMG_URL."/tb-close.png");?>"></a></div>
	</div>
	<div class="ww-wpsc-popup-error"><?php esc_html_e( 'Select a Shortcode', 'wwwpsc' );?></div>
	<div class="ww-wpsc-popup-container">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label><?php esc_html_e( 'Select a Shortcode', 'wwwpsc' );?></label>		
					</th>
					<td>
						<select id="ww_wpsc_shortcode">				
							<option value=""><?php esc_html_e( '--Select Shortcode--', 'wwwpsc' );?></option>
							<option value="button"><?php esc_html_e( 'Button', 'wwwpsc' );?></option>
							<option value="box"><?php esc_html_e( 'Box', 'wwwpsc' );?></option>
						</select>		
					</td>
				</tr>
			</tbody>
		</table>
	
		<div id="ww_wpsc_box_type" class="ww-wpsc-shortcodes-options">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="ww_wpsc_box_type_select"><?php esc_html_e( 'Select a Box Type :', 'wwwpsc' );?></label>		
						</th>
						<td>
							<select id="ww_wpsc_box_type_select">				
								<option value=""><?php esc_html_e( '--Select Box Type--', 'wwwpsc' );?></option>
								<option value="boxstandard"><?php esc_html_e( 'Standard', 'wwwpsc' );?></option>
								<option value="boxinfo"><?php esc_html_e( 'Info', 'wwwpsc' );?></option>
								<option value="boxwarning"><?php esc_html_e( 'Warning', 'wwwpsc' );?></option>
								<option value="boxdownload"><?php esc_html_e( 'Download', 'wwwpsc' );?></option>
								<option value="boxerror"><?php esc_html_e( 'Error', 'wwwpsc' );?></option>
							</select>		
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="ww_wpsc_box_content"><?php esc_html_e( 'Enter Content :', 'wwwpsc' );?></label>
						</th>
						<td>
							<textarea id="ww_wpsc_box_content" rows="7" cols="40"></textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!--.ww-wpsc-popup-box-type-->
		<div id="ww_wpsc_insert_container" >
			<input type="button" class="button-secondary" id="ww_wpsc_insert_shortcode" value="<?php esc_html_e( 'Insert Shortcode', 'wwwpsc' ); ?>">
		</div>
		 
	</div>	
	
</div><!--.ww-wpsc-popup-content-->
<div class="ww-wpsc-popup-overlay" ></div><!--.ww-wpsc-popup-overlay-->