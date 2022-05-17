<?php
$dev_content_w = 900;

/** Script version - Modify it if you got cached css & js */
$dev_script_version = '1.0';

/** JS scripts - Notice: Do not add jquery.js, WP automatically handle it before these files  */
$dev_js_scripts = array(
    array(
        'name' => 'be-js-main',
        'src' => '/assets/js/jquery.min.js'
    ),
    array(
        'name' => 'be-js-easing',
        'src' => '/assets/js/jquery.easing.min.js'
    ),
    array(
        'name' => 'be-js-slick',
        'src' => '/assets/js/slick.min.js'
    ),
    array(
        'name' => 'be-js-magnific',
        'src' => '/assets/js/jquery.magnific-popup.min.js'
    ),
    array(
        'name' => 'be-js-aos',
        'src' => '/assets/js/aos.js'
    ),
    array(
        'name' => 'be-js-clipboard',
        'src' => '/assets/js/clipboard.min.js'
    ),
    array(
        'name' => 'be-js-countdown',
        'src' => 'assets/js/jquery.countdown.min.js'
    ),
    array(
        'name' => 'be-js-waypoints',
        'src' => 'assets/js/jquery.waypoints.min.js'
    ),
    array(
        'name' => 'be-js-scroll',
        'src' => 'assets/js/infinite-scroll.pkgd.js'
    ),
    array(
        'name' => 'be-js-counterup',
        'src' => 'assets/js/jquery.counterup.min.js'
    ),
    array(
        'name' => 'be-js-dataTables',
        'src' => 'assets/js/jquery.dataTables.min.js'
    ),
    array(
        'name' => 'be-js-app',
        'src' => 'assets/js/app.js'
    ),
    array(
        'name' => 'project-js-app',
        'src' => 'project/customizer.js'
    ),
);

/** include styles */
$dev_styles = array(
    array(
        'name' => 'magnific',
        'src' => 'assets/css/magnific-popup.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'slick',
        'src' => 'assets/css/slick.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'font-aos',
        'src' => 'assets/css/aos.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'dev-dataTables',
        'src' => 'assets/css/jquery.dataTables.min.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'dev-tailwind',
        'src' => 'assets/css/tailwind.min.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'dev-custom',
        'src' => 'assets/css/custom.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'dev-responsive',
        'src' => 'assets/css/responsive.css',
        'screen' => 'all'
    ),
    array(
        'name' => 'project-dev-custom',
        'src' => 'project/dev_custom.css',
        'screen' => 'all'
    ),
);
/* BACK-END START EDITING HERE */

/** post thumbnail sizes (px) - this is the thumbnail image of blog posts */
$dev_post_thumbnail_size = array(
    'width' => 400,
    'height' => 300,
    'crop' => true
);

/** Additional image sizes (px) */
$dev_add_sizes = array(
    // 'home_block_items' => array('width' => 600, 'height' => 600, 'crop' => true),
    'customer_care' => array('width' => 300, 'height' => 300, 'crop' => true),
    'banner_page' => array('width' => 1170, 'height' => 500, 'crop' => true),
    'image_overview' => array('width' => 273, 'height' => 273, 'crop' => true),

);

/** Copyright name & url */
$dev_copyright_name = 'NFTDADDY';
$dev_copyright_url = 'https://nftdaddy.net';

/** Theme support */

$dev_post_formats = array(
    'aside',
);
global $dev_textdomain;
$dev_textdomain = 'nftdaddy';

/** Navigation menu */
$dev_nav_menus = array(
    'main' => __('Main Menu', $dev_textdomain),
    'footer' => __('Footer Menu', $dev_textdomain)
);


/* OK, that's enough, Stop editing */
