<?php

$theme_path_images = PARAGON_THEME_DIRECTORY . 'assets/img/';

/***********************************************************
Kirki config
***********************************************************/

Kirki::add_config('paragon_customize', array(
	'option_type' => 'theme_mod',
	'capability' => 'edit_theme_options'
));


/***********************************************************
General
***********************************************************/

Kirki::add_section('section_general_settings', array(
	'title' => esc_html__('General Settings', 'paragon'),
	'priority' => 0,
));

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-general.php';


/***********************************************************
Sidebar Settings
***********************************************************/


Kirki::add_panel('panel_sidebar', array(
	'priority' => 1,
	'title' => esc_html__('Sidebar Settings', 'paragon')
));


Kirki::add_section('section_sidebar_logo', array(
	'title' => esc_html__('Sidebar Logo', 'paragon'),
	'panel' => 'panel_sidebar',
	'priority' => 0,
));

Kirki::add_section('section_sidebar_socials', array(
	'title' => esc_html__('Sidebar Socials', 'paragon'),
	'panel' => 'panel_sidebar',
	'priority' => 1,
));

Kirki::add_section('section_sidebar_footer', array(
	'title' => esc_html__('Sidebar Footer', 'paragon'),
	'panel' => 'panel_sidebar',
	'priority' => 2,
));
require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-sidebar.php';





/***********************************************************
Typography Settings
***********************************************************/


Kirki::add_panel('panel_typography', array(
	'priority' => 2,
	'title' => esc_html__('Typography', 'paragon')
));

Kirki::add_section('section_typography_general', array(
	'title' => esc_html__('General', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 0,
));

Kirki::add_section('section_typography_heading', array(
	'title' => esc_html__('Heading', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 1,
));

Kirki::add_section('section_typography_widget', array(
	'title' => esc_html__('Widget Title', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 2,
));

Kirki::add_section('section_typography_blockquote', array(
	'title' => esc_html__('Blockquote', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 3,
));

Kirki::add_section('section_typography_button', array(
	'title' => esc_html__('Button', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 4,
));

Kirki::add_section('section_typography_widget', array(
	'title' => esc_html__('Widget', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 5,
));


Kirki::add_section('section_typography_input', array(
	'title' => esc_html__('Input', 'paragon'),
	'panel' => 'panel_typography',
	'priority' => 6,
));

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-typography.php';


/***********************************************************
Blog
***********************************************************/

Kirki::add_section('section_blog_settings', array(
	'title' => esc_html__('Blog Settings', 'paragon'),
	'priority' => 3,
));

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-blog.php';


/***********************************************************
Portfolio Settings
***********************************************************/

Kirki::add_section('section_portfolio_settings', array(
	'title' => esc_html__('Portfolio Settings', 'paragon'),
	'priority' => 4,
));

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-portfolio.php';



/***********************************************************
Additional Settings
***********************************************************/


Kirki::add_panel('panel_additional', array(
	'priority' => 6,
	'title' => esc_html__('Additional Settings', 'paragon')
));

Kirki::add_section('section_additional_adminlogo', array(
	'title' => esc_html__('Authorization Logo', 'paragon'),
	'panel' => 'panel_additional',
	'priority' => 0,
));

Kirki::add_section('section_additional_mobilebar', array(
	'title' => esc_html__('Mobile Bar', 'paragon'),
	'panel' => 'panel_additional',
	'priority' => 1,
));

Kirki::add_section('section_additional_selection', array(
	'title' => esc_html__('Selection Color', 'paragon'),
	'panel' => 'panel_additional',
	'priority' => 2,
));

Kirki::add_section('section_additional_preloader', array(
	'title' => esc_html__('Preloader Image', 'paragon'),
	'panel' => 'panel_additional',
	'priority' => 3,
));

Kirki::add_section('section_additional_gmap', array(
	'title' => esc_html__('Google Map Key', 'paragon'),
	'panel' => 'panel_additional',
	'priority' => 4,
));


require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-additional.php';


/***********************************************************
Typekit Settings
***********************************************************/


Kirki::add_section('section_typekit', array(
	'title' => esc_html__('Typekit Settings', 'paragon'),
	'priority' => 7,
));

require_once PARAGON_REQUIRE_DIRECTORY . 'framework/setup/section-typekit.php';


