/*
 File name:          Custom Admin JS
*/
(function ($) {
  'use strict';

	jQuery( document ).ready(function() {

 		var selected =  jQuery("#enefti_custom_header_options_status").val();
    if (selected == 'yes') {
    	jQuery('.cmb_id_enefti_header_custom_variant').show();
    	jQuery('.cmb_id_enefti_metabox_header_logo').show();
      jQuery('.cmb_id_enefti_metabox_header_transparent').show();
    }else{
    	jQuery('.cmb_id_enefti_header_custom_variant').hide();
    	jQuery('.cmb_id_enefti_metabox_header_logo').hide();
      jQuery('.cmb_id_enefti_metabox_header_transparent').hide();
    }

    jQuery( "#enefti_custom_header_options_status" ).change(function () {
	 		var selected =  jQuery(this).val();
      if (selected == 'yes') {
      	jQuery('.cmb_id_enefti_header_custom_variant').show();
      	jQuery('.cmb_id_enefti_metabox_header_logo').show();
        jQuery('.cmb_id_enefti_metabox_header_transparent').show();
      }else{
      	jQuery('.cmb_id_enefti_header_custom_variant').hide();
      	jQuery('.cmb_id_enefti_metabox_header_logo').hide();
        jQuery('.cmb_id_enefti_metabox_header_transparent').hide();
      }
    });
	});
} (jQuery) )