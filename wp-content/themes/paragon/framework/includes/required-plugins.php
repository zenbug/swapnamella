<?php

/***********************************************************
Required Plugins
***********************************************************/

remove_action('vc_activation_hook', 'vc_page_welcome_set_redirect');
remove_action('admin_init', 'vc_page_welcome_redirect');

function paragon_include_required_plugins() {

	$plugins = array(
		array(
			'name' => esc_html__( 'Kirki', 'paragon' ),
			'slug' => 'kirki',
			'required' => true,
		),	
		array(
			'name' => esc_html__('Paragon Helper Plugin', 'paragon'),
			'slug' => 'paragon_helper_plugin',
			'source' => esc_url('http://vlthemes.com/plugins/paragon_helper_plugin.zip'),
			// 'source' => PARAGON_THEME_DIRECTORY . 'framework/includes/plugins/paragon_helper_plugin.zip',
			'required' => true,
		),
		array(
			'name' => esc_html__('Advanced Custom Fields PRO', 'paragon'),
			'slug' => 'acf_pro',
			'source' => esc_url('http://vlthemes.com/plugins/advanced-custom-fields-pro.zip'),
			// 'source' => PARAGON_THEME_DIRECTORY . 'framework/includes/plugins/advanced-custom-fields-pro.zip',
			'required' => true,
		),
		array(
			'name' => esc_html__('WPBakery Visual Composer', 'paragon'),
			'slug' => 'js_composer',
			'source' => esc_url('http://vlthemes.com/plugins/js_composer.zip'),
			// 'source' => PARAGON_THEME_DIRECTORY . 'framework/includes/plugins/js_composer.zip',
			'required' => false,
		),
		array(
			'name' => esc_html__('Envato Market', 'paragon'),
			'slug' => 'envato_market',
			'source' => esc_url('http://vlthemes.com/plugins/envato-market.zip'),
			// 'source' => PARAGON_THEME_DIRECTORY . 'framework/includes/plugins/envato-market.zip',
			'required' => false,
		),
		array(
			'name' => esc_html__('One Click Demo Import', 'paragon'),
			'slug' => 'one-click-demo-import',
			'required' => true,
		),
		array(
			'name' => esc_html__('Contact Form 7', 'paragon'),
			'slug' => 'contact-form-7',
			'required' => false,
		),	
		array(
			'name' => esc_html__('WP Instagram Widget', 'paragon'),
			'slug' => 'wp-instagram-widget',
			'required' => false,
		),
		array(
			'name' => esc_html__('Rotating Tweets', 'paragon'),
			'slug' => 'rotatingtweets',
			'required' => false,
		),
	);

	tgmpa( $plugins );

}

add_action('tgmpa_register', 'paragon_include_required_plugins');