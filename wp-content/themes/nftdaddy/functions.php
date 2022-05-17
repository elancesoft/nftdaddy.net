<?php

/**
 * Define variable
 */
if (!defined('THEME_URL')) {
    define('THEME_URL', get_template_directory_uri());
}
if (!defined('CHILD_THEME_URL')) {
    define('CHILD_THEME_URL', get_stylesheet_directory_uri());
}
if (!defined('PROJECT_URL')) {
    define('PROJECT_URL', get_template_directory() . '/project');
}

/**
 * Include functions
 */
require_once TEMPLATEPATH . '/lib/init/devFunction.php';
require_once TEMPLATEPATH . '/project/project.php';
require_once TEMPLATEPATH . '/lib/init/acf-block.php';

global $devFunction, $devUser;

/**
 * Include config
 */
require_once TEMPLATEPATH . '/config.php';

/**
 * Include theme-init
 */
require_once TEMPLATEPATH . '/lib/init/theme-init.php';

// For enable menu walker.
 require_once TEMPLATEPATH . '/project/walker/menu-walker.php';

/**
 * Include required
 */
foreach (glob(TEMPLATEPATH . '/project/inc/*.php') as $file_path) {
    $devFunction->get_require('/project/inc/' . basename($file_path));
}

// For enable menu walker. testcxcasd
