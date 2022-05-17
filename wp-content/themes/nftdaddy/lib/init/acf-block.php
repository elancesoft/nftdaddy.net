<?php

function create_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'nftdaddy',
                'title' => __( 'NFTDADDY', 'nftdaddy' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'create_block_category', 10, 2);

add_action('acf/init', 'my_acf_init_blocks');
function my_acf_init_blocks() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register a testimonial block.
        
        acf_register_block_type(array(
            'name'              => 'home-explore',
            'title'             => __('Home Explore'),
            'description'       => __('Home Explore'),
            'render_template'   => 'acf_blocks/home-explore.php',
            'category'          => 'nftdaddy',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'explore'),
        ));


    }
}

?>