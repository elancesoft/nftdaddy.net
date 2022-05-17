<?php

global $dev_content_w;
if (!isset($content_width) && !empty($dev_content_w)) {
  $content_width = $dev_content_w;
}


if (!function_exists('dev_theme_setup')) :
  function dev_theme_setup()
  {

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    global $dev_nav_menus;
    if (!empty($dev_nav_menus)) {
      register_nav_menus($dev_nav_menus);
    }

    add_theme_support('html5', array(
      'search-form',
      'gallery',
      'caption',
    ));

    global $dev_post_formats;
    if (!empty($dev_post_formats)) {
      add_theme_support('post-formats', $dev_post_formats);
    }

    global $dev_post_thumbnail_size;
    if (!empty($dev_post_thumbnail_size)) {
      set_post_thumbnail_size($dev_post_thumbnail_size['width'], $dev_post_thumbnail_size['height'],
      $dev_post_thumbnail_size['crop']);
    }

    global $dev_add_sizes;
    if (!empty($dev_add_sizes)) {
      foreach ($dev_add_sizes as $key => $row) {
        add_image_size($key, $row['width'], $row['height'], $row['crop']);
      }
    }
        
    if (!current_user_can('administrator') && !is_admin()) {
     // show_admin_bar(false);
    }


  }
endif; // dev_theme_setup
add_action('after_setup_theme', 'dev_theme_setup');

/**
*  Create hook to save_post for check slug of post or page for sure it will never same slug.
*/
// add_action( 'save_post', 'dev_check_slug_post_before_create', 10, 1 );
function dev_check_slug_post_before_create($post_id)
{
  if (!wp_is_post_revision($post_id)) {
    // unhook this function to prevent infinite looping
    remove_action('save_post', 'dev_check_slug_post_before_create');

    global $post;
    if (isset($_POST) && !empty($_POST) && (!empty($post) && in_array($post->post_type, array('post', 'page')))) {
      $post_new = get_post($post_id);
      global $wpdb;
      $slug = $post_new->post_name;
      $post_name_check = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_name = '$slug' AND post_type in ('page','post')");
      if ($post_name_check > 1) {
        $alt_post_name = $slug;
        $suffix_exsist = substr($slug, -1);
        if (is_numeric($suffix_exsist)) {
          $suffix = $suffix_exsist;
          $slug = substr($slug, 0, -2);
        } else {
          $suffix = 2;
        }
        while ($post_name_check > 1) {
          $alt_post_name = $slug . "-$suffix";
          $post_name_check = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_name = '$alt_post_name' AND post_type in ('page','post')");
          $suffix++;
        }
        // update the post slug
        wp_update_post(array(
          'ID' => $post_id,
          'post_name' => $alt_post_name
        ));
      }
    }
    // re-hook this function
    add_action('save_post', 'dev_check_slug_post_before_create');
  }
}


function stop_loading_wp_embed()
{
  if (!is_admin()) {
    wp_deregister_script('wp-embed');
  }
}

add_action('init', 'stop_loading_wp_embed');

/* add support svg file on WP */
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';

  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/* disable scroll on gravityform a*/
add_filter('gform_confirmation_anchor', '__return_false');


function dev_disable_author_page()
{
  global $wp_query;

  if (is_author()) {
    $wp_query->set_404();
    status_header(404);
  }
}

add_action('template_redirect', 'dev_disable_author_page');

/**
* Clean up head.+
* ----------------------------------------------------------------------------
*/


/**
* Clean up WordPress defaults
*
*/

if (!function_exists('dev_start_cleanup')) :
  function dev_start_cleanup()
  {

    // Launching operation cleanup.
    add_action('init', 'dev_cleanup_head');

    // Remove WP version from RSS.
    add_filter('the_generator', 'dev_remove_rss_version');

    // Remove pesky injected css for recent comments widget.
    add_filter('wp_head', 'dev_remove_wp_widget_recent_comments_style', 1);

    // Clean up comment styles in the head.
    add_action('wp_head', 'dev_remove_recent_comments_style', 1);

    // Remove API
    //add_filter('rest_authentication_errors', 'dev_disable_rest_endpoints');

  }

  add_action('after_setup_theme', 'dev_start_cleanup');
endif;

if (!function_exists('dev_cleanup_head')) :
  function dev_cleanup_head()
  {

    // EditURI link.
    remove_action('wp_head', 'rsd_link');

    // Category feed links.
    remove_action('wp_head', 'feed_links_extra', 3);

    // Post and comment feed links.
    remove_action('wp_head', 'feed_links', 2);

    // Windows Live Writer.
    remove_action('wp_head', 'wlwmanifest_link');

    // Index link.
    remove_action('wp_head', 'index_rel_link');

    // Previous link.
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);

    // Start link.
    remove_action('wp_head', 'start_post_rel_link', 10, 0);

    // Canonical.
    remove_action('wp_head', 'rel_canonical', 10, 0);

    // Shortlink.
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    // Links for adjacent posts.
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    // WP version.
    remove_action('wp_head', 'wp_generator');

    // Emoji detection script.
    remove_action('wp_head', 'print_emoji_detection_script', 7);

    //remove oembed sripts
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    // Emoji styles.
    remove_action('wp_print_styles', 'print_emoji_styles');
  }
endif;

// Remove WP version from RSS.
if (!function_exists('dev_remove_rss_version')) :
  function dev_remove_rss_version()
  {
    return '';
  }
endif;


// Remove injected CSS for recent comments widget.
if (!function_exists('dev_remove_wp_widget_recent_comments_style')) :
  function dev_remove_wp_widget_recent_comments_style()
  {
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
  }
endif;

// Remove injected CSS from recent comments widget.
if (!function_exists('dev_remove_recent_comments_style')) :
  function dev_remove_recent_comments_style()
  {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
  }
endif;

// disable REST API

function dev_disable_rest_endpoints($access)
{
  if (!is_user_logged_in()) {
    $err_code = rest_authorization_required_code();
    return new WP_Error('rest_cannot_access', __('Only authenticated users can access the REST API.', 'disable-json-api'), array('status' => $err_code));
  }
  return $access;
}

// Remove default auto crop image
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
  unset($sizes['medium']); // 300px
  unset($sizes['large']); // 1024px
  unset($sizes['medium_large']); // 768px
  unset($sizes['post-thumbnail']); // 400x300
  return $sizes;
}

// hide admin bar on mobile
if (wp_is_mobile()) {
  show_admin_bar(false);
}

// remove type=....
add_filter('style_loader_tag', 'dev_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'dev_remove_type_attr', 10, 2);
function dev_remove_type_attr($tag, $handle)
{
  return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}



add_action('admin_head', function () {
  echo '<style>
.edit-post-layout .editor-styles-wrapper .wp-block{max-width: 95%;}
</style>';
});
