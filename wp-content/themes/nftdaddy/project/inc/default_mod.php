<?php

/**
 * Add slug to body class for style
 *
 * @param $classes
 *
 * @return array
 */
add_filter( 'body_class', 'dev_add_slug_to_body_class' );
function dev_add_slug_to_body_class( $classes ) {
	global $post, $blog_id;
	if(empty($classes)) {
		$classes = array();
	}
	if ( is_home() ) {
		$key = array_search( 'blog', $classes );
		if ( $key > - 1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}

	// check main site and sub site_url
	$classes[] = 'scroll-animation';

	return $classes;
}

/*
 * Add Editor style & fonts to backend editor
 */
add_action( 'init', 'dev_theme_add_editor_styles' );
function dev_theme_add_editor_styles() {
	global $dev_editor_style_src, $devFunction;
	if ( ! empty( $dev_editor_style_src ) ) {
		add_editor_style( $devFunction->abs_js_link( $dev_editor_style_src ) );
	}

	global $dev_font_styles;
	if ( ! empty( $dev_font_styles ) ) {
		foreach ( $dev_font_styles as $script ) {
			add_editor_style( $devFunction->abs_js_link( $script['src'] ) );
		}
	}
}

/*
 *  Change login logo & url in WP Admin
 */
add_action( 'login_head', 'dev_custom_login_logo' );
function dev_custom_login_logo() {
    global $devFunction;
	echo "<style type='text/css'>
                .login h1 a {
                    background-image: url('" . $devFunction->abs_js_link( 'assets/images/login-logo.png' ) . "');
                    background-size: 171px 171px;
                    width: 171px;
                    height: 171px;
                }
    </style>";
}

add_filter( 'login_headerurl', 'dev_custom_login_logo_url' );
function dev_custom_login_logo_url( $url ) {
	global $dev_copyright_url;

	return ! empty( $dev_copyright_url ) ? $dev_copyright_url : '';
}

add_filter( 'login_headertitle', 'dev_custom_login_logo_title' );
function dev_custom_login_logo_title() {
	return get_bloginfo( 'name' );
}


/*
 *  Remove wp-logo on admin bar
 */
add_action( 'wp_before_admin_bar_render', 'dev_wp_admin_bar_remove', 0 );
function dev_wp_admin_bar_remove() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}

/*
 * Add excerpt for page
 */
add_action( 'init', 'dev_add_excerpts_to_pages' );
function dev_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}

/*
 * Set Editor Visual Default
 */
//add_filter( 'wp_default_editor', create_function( '', 'return "tinymce";' ) );

/*
 *  Remove generator
 */
remove_action( 'wp_head', 'wp_generator' );

/*
 * Change Footer Text in Admin
 */
add_filter( 'admin_footer_text', 'change_footer_text' );
function change_footer_text() {
	global $dev_copyright_name, $dev_copyright_url;
	if ( ! empty( $dev_copyright_name ) && ! empty( $dev_copyright_url ) ) {
		echo "Powered by <a href='" . $dev_copyright_url . "' target='_blank'>" . $dev_copyright_name . "</a>";
	}
}

/*
 * Remove help bar
 */
add_filter( 'contextual_help', 'wp_remove_help', 999, 3 );
function wp_remove_help( $old_help, $screen_id, $screen ) {
	$screen->remove_help_tabs();

	return $old_help;
}

/**
 * Remove verion from scripts & styles
 */
// add_filter( 'style_loader_src', 'dev_remove_wp_ver_css_js', 9999 );
// add_filter( 'script_loader_src', 'dev_remove_wp_ver_css_js', 9999 );
// function dev_remove_wp_ver_css_js( $src ) {
// 	if ( strpos( $src, 'ver=' ) ) {
// 		$src = remove_query_arg( 'ver', $src );
// 	}

// 	return $src;
// }

/**
 * Remove version from rss feed
 */
add_filter( 'the_generator', 'dev_rss_version' );
function dev_rss_version() {
	return '';
}

/**
 * Fix Gravity Form Tabindex Conflicts
 */
add_filter( 'gform_tabindex', 'dev_gform_tabindexer', 10, 2 );
function dev_gform_tabindexer( $tab_index, $form = false ) {
	$starting_index = 1000; // if you need a higher tabindex, update this number
	if ( $form ) {
		add_filter( 'gform_tabindex_' . $form['id'], 'dev_gform_tabindexer', 10, 2 );
	}

	return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

/*
 * Fix WP-Lockdown
 */
add_filter( 'LD_404', 'dev_redirect_404' );
function dev_redirect_404() {
	wp_redirect( home_url() );
	exit;
}


/*
 * Remove default widget
 */
add_action( 'widgets_init', 'dev_unregister_default_widgets', 11 );
function dev_unregister_default_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	//unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	//unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
}

/*
 * Modify menu for editor
 */
add_action( 'admin_menu', 'dev_modify_menus' );
function dev_modify_menus() {
	if ( is_admin() && ! current_user_can( 'manage_options' ) ) {
		//remove_menu_page( 'edit-comments.php' );          //Comments
		//remove_menu_page( 'themes.php' );                 //Appearance
		remove_submenu_page( 'themes.php', 'themes.php' );  // submenu Theme
		remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2F' );  // submenu Theme
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
	}
}

/**
 * Fix structure of breadcrumn to support Google
 *
 * @param $output
 * @param $crumb
 *
 * @return string
 */
if ( ! function_exists( 'link_to_last_crumb' ) ):
    function link_to_last_crumb( $output, $crumb ) {
        if ( strpos( $output, 'breadcrumb_last' ) !== false ) {
            $output = '<span>';
            $output .= $crumb['text'];
            $output .= '</span>';
        }

        return $output;
    }
endif;

//add_filter( 'wpseo_breadcrumb_single_link', 'link_to_last_crumb', 10, 2 );

/**
 * Add ACF options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
    global $dev_textdomain;
    $parent = acf_add_options_page( __( 'Options', $dev_textdomain ) );

    // add sub page
    
    acf_add_options_sub_page(array(
        'page_title'    => __( 'General', $dev_textdomain ),
        'menu_title'    => __( 'General', $dev_textdomain ),
        'parent_slug'   => $parent['menu_slug'],
    ));
		
    acf_add_options_sub_page(array(
        'page_title'    => __( 'Product', $dev_textdomain ),
        'menu_title'    => __( 'Product', $dev_textdomain ),
        'parent_slug'   => $parent['menu_slug'],
    ));

}


add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
	global $dev_textdomain;
    load_theme_textdomain( $dev_textdomain, TEMPLATEPATH . '/languages' );
}
