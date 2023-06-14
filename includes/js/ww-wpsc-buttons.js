"use strict";

// JavaScript Document
jQuery(document).ready(function($) {

// Start Single Shortcode Start
(function() {
    tinymce.create('tinymce.plugins.wwwpscsingleshortcode', {
        init : function(ed, url) {
        	
            ed.addButton('wwwpscsingleshortcode', {
                title : 'World Web Single Shortcode',  
                image : url+'/images/ww-wpsc-single.png',
                onclick : function() {

                  	ed.insertContent('[ww_wpsc_button][/ww_wpsc_button]');
			        
 				}
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
 
    tinymce.PluginManager.add('wwwpscsingleshortcode', tinymce.plugins.wwwpscsingleshortcode);
})();
// Start Single Shortcode End

// Start Shortcodes Click
(function() {
    tinymce.create('tinymce.plugins.wwwpscshortcodes', {
        init : function(ed, url) {
        	
            ed.addButton('wwwpscshortcodes', {
                title : 'World Web Shortcodes List',
                image : url+'/images/ww-wpsc.png',
                onclick : function() {
                    
					jQuery('.ww-wpsc-popup-overlay').fadeIn();
                    jQuery('.ww-wpsc-popup-content').fadeIn();
                    
                    jQuery('#ww_wpsc_shortcode').val('');
                    jQuery('#ww_wpsc_box_type_select').val('');
                    jQuery('#ww_wpsc_box_content').val('');
                    jQuery('.ww-wpsc-shortcodes-options').hide();
                    jQuery('.ww_wpsc_box_content').val('');
                    
 				}
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
 
    tinymce.PluginManager.add('wwwpscshortcodes', tinymce.plugins.wwwpscshortcodes);
})();
	
	jQuery( document ).on('click', '.ww-wpsc-popup-close-button, .ww-wpsc-popup-overlay', function () {
		jQuery('.ww-wpsc-popup-overlay').fadeOut();
		jQuery('.ww-wpsc-popup-content').fadeOut();
		
	});
	jQuery( document ).on('click', '#ww_wpsc_insert_shortcode', function () {
		
		var shortcode = jQuery('#ww_wpsc_shortcode').val();
		var shortcodestr = '';
		if(shortcode == '') {
			jQuery('.ww-wpsc-popup-error').fadeIn();
			return false;
		} else {
			jQuery('.ww-wpsc-popup-error').hide();
				
				switch(shortcode) {
					case 'button' 	:
										shortcodestr += '[ww_wpsc_button][/ww_wpsc_button]';
										break;
					case 'box' 		:
										
										var content = jQuery('#ww_wpsc_box_content').val();
										var boxtype = jQuery('#ww_wpsc_box_type_select').val();
										shortcodestr += '[ww_wpsc_boxes boxtype="'+boxtype+'"]'+content+'[/ww_wpsc_boxes]';			
										break;
								
					default:break;
				}

		        window.send_to_editor( shortcodestr );
		  		jQuery('.ww-wpsc-popup-overlay').fadeOut();
				jQuery('.ww-wpsc-popup-content').fadeOut();

		}
	});

	jQuery( document ).on('change', '#ww_wpsc_shortcode', function () {
		
		var shortcode = jQuery(this).val();
		jQuery('.ww-wpsc-shortcodes-options').hide();
		switch(shortcode) {
			case 'box' 	:
								jQuery('#ww_wpsc_box_type').show();
								break;
								
			default:break;
		}
	});
	
});