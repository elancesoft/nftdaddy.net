<?php

/**
 * Enqueue scripts
 */
function dev_scripts()
{
    global $devFunction;
    // font script
    if ($GLOBALS['pagenow'] != 'wp-login.php') {
        global $sb_font_styles;

        if (!empty($sb_font_styles)) {
            foreach ($sb_font_styles as $script) {

                $src = $devFunction->abs_js_link($script['src']);
                wp_enqueue_style($script['name'], $src, array());
            }
        }
    }

    // frontend script
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        global $dev_js_scripts, $dev_script_version;

        if (!empty($dev_js_scripts)) {
            foreach ($dev_js_scripts as $script) {
                $src = $devFunction->abs_js_link($script['src']);
                wp_enqueue_script($script['name'], $src, array('jquery'), $dev_script_version, true);
            }
        }

    }

    // comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // ajax
    wp_localize_script('jquery', 'dev_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('init', 'dev_scripts');


/**
 * Enqueue styles
 */
function dev_styles()
{

    global $dev_styles, $dev_editor_style_src, $dev_script_version, $devFunction;

    if (!empty($dev_styles)) {
        foreach ($dev_styles as $style) {
            $src = $devFunction->abs_js_link($style['src']);
            wp_enqueue_style($style['name'], $src, array(), $dev_script_version, ($style['screen']) ? $style['screen'] : 'all');
        }
    }

    if (!empty($dev_editor_style_src) && is_admin()) {
        wp_enqueue_style('editor-style', $devFunction->abs_js_link($dev_editor_style_src));
    }

    // Enqueue style.css of theme
    // wp_enqueue_style( 'theme-default-style', get_stylesheet_uri() );
    // if (!empty($dev_editor_style_src) && is_admin()) {
    //     wp_enqueue_style('editor-style', sb_abs_js_link($dev_editor_style_src));
    // }

    // condition scripts & style
    /*if(is_home()){

    }*/

}
add_action('wp_enqueue_scripts', 'dev_styles');
