<?php

add_filter('gform_save_field_value', 'dev_save_field_value', 10, 4);
/*
* Input $value, $lead, $field, $form
* Return $value
* */
function dev_save_field_value($value)
{
	return base64_encode($value);
}

add_filter('gform_get_input_value', 'dev_decode_field', 10, 4);
function dev_decode_field($value)
{
	return base64_decode($value);
}

/*
* Register Api
*/

if (!function_exists('dev_register_rest_route')) {
	function dev_register_rest_route()
	{
		global $rest_routes;
		if ($rest_routes) {
			foreach ($rest_routes as $key => $route) {
				register_rest_route('dev-rest', '/' . $route['route'], array(
					'methods' => $route['methods'] ?: 'GET',
					'callback' => $route['callback'],
				));
			}
		}
	}
}


add_action('rest_api_init', 'dev_register_rest_route');



add_action('do_meta_boxes', 'dev_remove_thumbnail_box');
function dev_remove_thumbnail_box()
{
	//remove_meta_box( 'postimagediv','page','side' );
	remove_meta_box('commentstatusdiv', 'page', 'normal');
	remove_meta_box('commentsdiv', 'page', 'normal');
	remove_meta_box('commentstatusdiv', 'post', 'normal');
	remove_meta_box('commentsdiv', 'post', 'normal');
}

add_filter('tr_theme_options_page', function () {
	return PROJECT_URL . '/admin_option/theme_options.php';
});

add_filter('tr_theme_options_name', function () {

	global $sitepress;
	if (!isset($sitepress)) {
		$lang = 'en';
	} else {
		$lang = $sitepress->get_current_language();
	}
	return 'dev_options_' . $lang;
});

// add_filter('manage_posts_columns', 'add_img_column');
// add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

// function add_img_column($columns) {
// 	$columns = array_slice($columns, 0, 1, true) + array("img" => "Image") + array_slice($columns, 1, count($columns) - 1, true);
// 	return $columns;
// }

// function manage_img_column($column_name, $post_id) {
// 	if( $column_name == 'img' ) {
// 		echo get_the_post_thumbnail($post_id, 'feature_small');
// 	}
// 	return $column_name;
// }

/**
 * Hook where to replace repeater in ACF field
 */
add_filter('posts_where', function ($where, $query) {
	$where = str_replace("meta_key = 'project_users_$", "meta_key LIKE 'project_users_%", $where);
	return $where;
}, 10, 2);

function dev_browser_body_class($classes)
{
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if ($is_lynx) $classes[] = 'lynx';
	elseif ($is_gecko) $classes[] = 'gecko';
	elseif ($is_opera) $classes[] = 'opera';
	elseif ($is_NS4) $classes[] = 'ns4';
	elseif ($is_safari) $classes[] = 'safari';
	elseif ($is_chrome) $classes[] = 'chrome';
	elseif ($is_IE) {
		$classes[] = 'ie';
		if (preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
			$classes[] = 'ie' . $browser_version[1];
	} else $classes[] = 'unknown';
	if ($is_iphone) $classes[] = 'iphone';
	if (stristr($_SERVER['HTTP_USER_AGENT'], "mac")) {
		$classes[] = 'osx';
	} elseif (stristr($_SERVER['HTTP_USER_AGENT'], "linux")) {
		$classes[] = 'linux';
	} elseif (stristr($_SERVER['HTTP_USER_AGENT'], "windows")) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class', 'dev_browser_body_class');


// Woocommerce

// /* Create Buy Now Button dynamically after Add To Cart button */
// function add_content_after_addtocart() {

// 	// get the current post/product ID
// 	$current_product_id = get_the_ID();

// 	// get the product based on the ID
// 	$product = wc_get_product( $current_product_id );

// 	// get the "Checkout Page" URL
// 	$checkout_url = WC()->cart->get_checkout_url();

// 	// run only on simple products

// 		echo '<a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="buy-now button">Buy Now</a>';
// 		//echo '<a href="'.$checkout_url.'" class="buy-now button">Buy Now</a>';

// }
// add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );

// function add_class_on_li($classes, $item, $args) {
//     if(isset($args->custom_class)) {
//         $classes[] = $args->custom_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_class_on_li', 1, 3);



// add minus and plus in quantity button
add_action('woocommerce_before_quantity_input_field', 'add_minus_quantity');
function add_minus_quantity()
{
	echo '<input type="button" class="btn-minus" value="-">';
}

add_action('woocommerce_after_quantity_input_field', 'add_plus_quantity');
function add_plus_quantity()
{
	echo '<input type="button" class="btn-plus" value="+">';
}

add_action('woocommerce_before_add_to_cart_form', 'custom_before_cart');
function custom_before_cart()
{
	echo '</div><div class="single_block-2">';
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);


add_action('wp_enqueue_scripts', 'agentwp_dequeue_stylesandscripts', 100);
function agentwp_dequeue_stylesandscripts()
{
	if (class_exists('woocommerce')) {
		wp_dequeue_style('select2');
		wp_deregister_style('select2');
		wp_dequeue_script('select2');
		wp_deregister_script('select2');
	}
}
?>