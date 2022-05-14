<?php
/*------------------------------------------------------------------
[enefti - SHORTCODES]
Project:    enefti – Multi-Purpose WordPress Template
Author:     ModelTheme
-------------------------------------------------------------------*/
global $enefti_redux;

function enefti_clients_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'=>'',
            'number'=>''
        ), $params ) );
    $myContent = '';
    $myContent .= '<div class="clients-container animateIn owl-carousel owl-theme ">';
    $args_clients = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'client',
            'post_status'      => 'publish' 
            ); 
    $clients = get_posts($args_clients);
        foreach ($clients as $client) {
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $client->ID ),'full' );
            
            $myContent .= '<div class="item">';
                if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $client->post_title .'" />';
                }else{ $myContent .= '<img src="http://placehold.it/110x110" alt="'. $client->post_title .'" />'; }
            $myContent .= '</div>';
        }
    $myContent .= '</div>';
    return $myContent;
}
add_shortcode('mt_clients_slider', 'enefti_clients_shortcode');

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once('vc-shortcodes.inc.php');
} 