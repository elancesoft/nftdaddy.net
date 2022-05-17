<?php
function dev_create_custom_post_type() {
	//add_post_type('project', 'Products', $publicly_queryable = true, $setting = array());
	add_post_type('customer-care', 'Customer Care', $publicly_queryable = true, $setting = array());

}

add_action( 'init', 'dev_create_custom_post_type' );


function dev_create_custom_taxonomies() {
	// add_tax($singular = 'category', $plural = 'Category', $post_apply = array('customer_review', 'post', 'kien-thuc-nha-khoa', 'cau-hoi-thuong-gap'));
	// add_tax($singular = 'type', $plural = 'Type', $post_apply = array('partner', 'post'));
	
}

add_action( 'init', 'dev_create_custom_taxonomies', 0 );

function add_post_type($singular, $plural = false, $publicly_queryable = true, $setting= array()){
	global $dev_textdomain;
	if ( !$plural ) $plural = $singular;
	$singular      = strtolower( $singular );
	$plural        = strtolower( $plural );
	$upperSingular = ucwords( $singular );
	$upperPlural   = ucwords( $plural );

	$labels = [
		'all_items'          => __( 'All '. $plural, $dev_textdomain ),
		'update_item'        => __( 'Update '. $singular, $dev_textdomain ),
		'add_new'            => __('Add new ' . $singular, $dev_textdomain),
		'add_new_item'       => __('Add new ' . $upperSingular, $dev_textdomain),
		'edit_item'          => __('Edit ' . $upperSingular, $dev_textdomain),
		'menu_name'          => __($upperPlural, $dev_textdomain),
		'name'               => __($upperPlural, $dev_textdomain),
		'new_item'           => __('New ' . $upperSingular, $dev_textdomain),
		'not_found'          => __('No ' . $plural . ' found', $dev_textdomain),
		'not_found_in_trash' => __('No ' . $plural . ' found in Trash', $dev_textdomain),
		'parent_item_colon'  => '',
		'search_items'       => __('Search ' . $upperPlural, $dev_textdomain),
		'singular_name'      => __($upperSingular, $dev_textdomain),
		'view_item'          => __('View ' . $upperSingular, $dev_textdomain),
	];
	$defaults = [
		'labels'      => $labels,
		'description' => $plural,
		'rewrite'     => array( 'slug' => $singular ),
		'public'      => true,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
		),

		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-post',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => $publicly_queryable,
		'capability_type'     => 'post',
	];

	$args = wp_parse_args( $setting, $defaults);
	register_post_type ( $singular, $args );
}
function add_tax ($singular, $plural = false, $post_apply = '') {
	global $dev_textdomain;
	$singular = strtolower($singular);
	if ( !$plural ) $plural = $singular;
	$upperPlural   = ucwords( $plural );
	$upperSingular = ucwords( $singular );
	$lowerPlural   = strtolower( $plural );
	register_taxonomy( $singular, $post_apply, array(
		'hierarchical' => true,
		'labels'       => array(
			'add_new_item'               => __( 'Add New ' . $upperSingular, $dev_textdomain ),
			'add_or_remove_items'        => __( 'Add or remove ' . $lowerPlural, $dev_textdomain ),
			'all_items'                  => __( 'All ' . $upperPlural, $dev_textdomain ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . $lowerPlural, $dev_textdomain ),
			'edit_item'                  => __( 'Edit ' . $upperSingular, $dev_textdomain ),
			'name'                       => __( $upperPlural, $dev_textdomain ),
			'menu_name'                  => __( $upperPlural, $dev_textdomain ),
			'new_item_name'              => __( 'New ' . $upperSingular . ' Name', $dev_textdomain ),
			'not_found'                  => __( 'No ' . $lowerPlural . ' found.', $dev_textdomain ),
			'parent_item'                => __( 'Parent ' . $upperSingular, $dev_textdomain ),
			'parent_item_colon'          => __( 'Parent ' . $upperSingular . ':', $dev_textdomain ),
			'popular_items'              => __( 'Popular ' . $upperPlural, $dev_textdomain ),
			'search_items'               => __( 'Search ' . $upperPlural, $dev_textdomain ),
			'separate_items_with_commas' => __( 'Separate ' . $lowerPlural . ' with commas', $dev_textdomain ),
			'singular_name'              => __( $upperSingular, $dev_textdomain ),
			'update_item'                => __( 'Update ' . $upperSingular, $dev_textdomain ),
			'view_item'                  => __( 'View ' . $upperSingular, $dev_textdomain )
		),
		// Control the slugs used for this taxonomy
		'rewrite'      => array(
			'slug'         => $singular, // This controls the base slug that will display before each term
			'with_front'   => false, // Don't display the category base before "/locations/"
		),
		'public'                    => true,
		'show_ui'                   => true,
		'show_admin_column'         => true,
		'show_in_nav_menus'         => true,
		'publicly_queryable'        => true,
	) );
}
