<?php

define('PARAGON_THEME_DIRECTORY', esc_url(trailingslashit(get_template_directory_uri())));
define('PARAGON_REQUIRE_DIRECTORY', trailingslashit(get_template_directory()));
define('PARAGON_DEVELOPMENT', false);

/***********************************************************
After sutup hook
***********************************************************/

add_action('after_setup_theme', 'paragon_theme_setup');

function paragon_theme_setup(){

	load_theme_textdomain('paragon', PARAGON_THEME_DIRECTORY . 'languages');

	register_nav_menus	(array(
		'primary-menu' => esc_html__('Main Navigation', 'paragon'),
	));

	add_image_size('paragon_large_rect_horizontal', 1170, 658, true);
	add_image_size('paragon_small_thumb', 100,  100, true);
	add_image_size('paragon_small_square', 560, 560, true);
	add_image_size('paragon_small_rect_horizontal', 560, 420, true);
	add_image_size('paragon_small_rect_vertical', 560, 747, true);
	add_image_size('paragon_medium_square', 900, 900, true);
	add_image_size('paragon_medium_rect_horizontal', 900, 675, true);
	add_image_size('paragon_medium_rect_vertical', 840, 1120, true);
	add_image_size('paragon_fullscreen', 1920, 1920, true);
	add_image_size('paragon_fullsize', 1920, '', false);
	
	add_theme_support('menus');
	add_theme_support('title-tag');
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	
	add_theme_support('post-formats', array('gallery', 'video', 'audio'));

}


/***********************************************************
Content Width
***********************************************************/

add_action('after_setup_theme', 'paragon_content_width');

function paragon_content_width() {
	$GLOBALS['content_width'] = apply_filters('paragon_content_width', 1170);
}


/***********************************************************
ACF DEVMODE
***********************************************************/

if(!PARAGON_DEVELOPMENT) {
    add_filter('acf/settings/show_admin', '__return_false');
    require_once(PARAGON_REQUIRE_DIRECTORY . 'framework/includes/custom-fields/custom-fields.php');
}



/***********************************************************
ACF save JSON
***********************************************************/

add_filter('acf/settings/save_json', 'paragon_acf_save_json');

function paragon_acf_save_json($path) {
    $path = PARAGON_REQUIRE_DIRECTORY . 'framework/includes/custom-fields';
    return $path;
}

/***********************************************************
ACF load JSON
***********************************************************/

add_filter('acf/settings/load_json', 'paragon_acf_load_json');

function paragon_acf_load_json($paths) {
    unset($paths[0]);
    $paths[] = PARAGON_REQUIRE_DIRECTORY . 'framework/includes/custom-fields';
    return $paths;
}


/***********************************************************
Require Files
***********************************************************/

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/dashboard/dashboard.php';
require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/required-plugins.php';
require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/include-config.php';
require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/action-config.php';
require_once PARAGON_REQUIRE_DIRECTORY . 'framework/includes/helper-function.php';



