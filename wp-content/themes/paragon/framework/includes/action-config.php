<?php






/***********************************************************
Enqueue Scripts
***********************************************************/

add_action('wp_enqueue_scripts', 'paragon_enqueue_scripts');

if (!function_exists('paragon_enqueue_scripts')) {

	function paragon_enqueue_scripts() {

		$theme_info = wp_get_theme();

		if(is_singular() && comments_open()) {
			wp_enqueue_script('comment-reply');
		}

		$map_api_key = get_theme_mod('map_api_key');

		wp_enqueue_script('paragon_plugins', PARAGON_THEME_DIRECTORY . 'assets/scripts/plugins.min.js', array('jquery'), $theme_info->get('Version'), true);

		wp_enqueue_script('paragon_custom_script', PARAGON_THEME_DIRECTORY . 'assets/scripts/script.js', array('jquery'), $theme_info->get('Version'), true);

		if(!empty($map_api_key)){
			wp_enqueue_script('gmap', 'https://maps.google.com/maps/api/js?key='.esc_attr($map_api_key).'', false, null, false);
		}
		
	}
}

/***********************************************************
Enqueue Style
***********************************************************/


add_action('wp_enqueue_scripts', 'paragon_enqueue_styles');

if (!function_exists('paragon_enqueue_styles')) {

	function paragon_enqueue_styles() {

		$theme_info = wp_get_theme();

		wp_enqueue_style('paragon_plugins', PARAGON_THEME_DIRECTORY . 'assets/css/plugins.min.css', array(), $theme_info->get('Version'));

		wp_enqueue_style('paragon_custom_css', PARAGON_THEME_DIRECTORY . 'assets/css/style.css', array(), $theme_info->get('Version'));

		if ( !class_exists( 'Kirki' ) ) {
			wp_enqueue_style( 'paragon_typekit_fonts', 'https://use.typekit.net/dhl1xhg.css', false, $theme_info->get('Version'));
			wp_enqueue_style( 'paragon_customizer', PARAGON_THEME_DIRECTORY .'framework/customizer.css', array(), $theme_info->get('Version'));
		}

	}
}


/***********************************************************
Admin Scripts
***********************************************************/

add_action('admin_enqueue_scripts', 'paragon_load_custom_wp_admin_style');

if (!function_exists('paragon_load_custom_wp_admin_style')) {

	function paragon_load_custom_wp_admin_style() {

		$theme_info = wp_get_theme();

		wp_enqueue_style('paragon_custom_admin_style', PARAGON_THEME_DIRECTORY . 'assets/css/wp-admin.css', array(), $theme_info->get('Version'));

	}

}
