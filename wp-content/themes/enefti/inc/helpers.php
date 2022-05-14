<?php 
defined( 'ABSPATH' ) || exit;

/*
 * Return fallback plugin version by slug
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function enefti_fallback_plugin_version($plugin_slug = ''){
	$plugins = array(
	    "modeltheme-framework-enefti" => "1.3.1",
	    "modeltheme-addons-for-wpbakery" => "1.0.1",
	    "js_composer" => "6.9.0",
	    "revslider" => "6.5.21"
	);

	return $plugins[$plugin_slug];
}


/*
 * Return plugin version by slug from remote json
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function enefti_plugin_version($plugin_slug = ''){

    $request = wp_remote_get('https://modeltheme.com/json/plugin_versions.json');
    $plugin_versions = json_decode(wp_remote_retrieve_body($request), true);

	if( is_wp_error( $request ) ) {
		return enefti_fallback_plugin_version($plugin_slug);
	}else{
    	return $plugin_versions[0][$plugin_slug];
	}

}