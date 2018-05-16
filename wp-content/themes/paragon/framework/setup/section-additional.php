<?php

/***********************************************************
Admin Logo
***********************************************************/



$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'label' => esc_html__('Authorization Logo', 'paragon'),
	'section' => 'section_additional_adminlogo',
	'default' => $theme_path_images . 'vlthemes.png',
	'transport' => 'postMessage',
	'priority' => $priority++
));

Kirki::add_field('paragon_customize', array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'label' => esc_html__('Logo Height', 'paragon'),
	'section' => 'section_additional_adminlogo',
	'default' => '112px',
	'transport' => 'postMessage',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
	   )
   )
));

Kirki::add_field('paragon_customize', array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'label' => esc_html__('Logo Width', 'paragon'),
	'section' => 'section_additional_adminlogo',
	'default' => '100px',
	'transport' => 'postMessage',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
	   )
   )
));

/***********************************************************
Mobile Bar
***********************************************************/


$priority = 0;


Kirki::add_field('paragon_customize', array(
	'type' => 'color',
	'settings' => 'mobile_statusbar_color',
	'label' => esc_html__('Mobile Statusbar Color', 'paragon'),
	'section' => 'section_additional_mobilebar',
	'default' => '#21dca4', //#02b875
	'transport' => 'postMessage',
	'priority' => $priority++,
));


/***********************************************************
Preloader Image
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'image',
	'settings' => 'preloader_image',
	'label' => esc_html__('Preloader Image', 'paragon'),
	'section' => 'section_additional_preloader',
	'default' => $theme_path_images . 'site-preloader.gif',
	'transport' => 'postMessage',
	'priority' => $priority++,
	'output' => array(
		array(
			'element' => '.vl-preloader-outer .vl-preloader-inner',
			'property' => 'background-image',
		),
	)
));


/***********************************************************
Selection
***********************************************************/


$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'color',
	'settings' => 'general_selection_color',
	'label' => esc_html__('Selection Color', 'paragon'),
	'section' => 'section_additional_selection',
	'default' => '#ffffff',
	'priority' => $priority++,
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
		)
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'color',
	'settings' => 'general_selection_background_color',
	'label' => esc_html__('Selection Background', 'paragon'),
	'section' => 'section_additional_selection',
	'default' => '#21dca4',
	'priority' => $priority++,
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important' 
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important' 
		) 
	) 
));


Kirki::add_field('paragon_customize', array(
	'type' => 'text',
	'settings' => 'map_api_key',
	'label' => esc_html__('GMap Key', 'paragon'),
	'section' => 'section_additional_gmap',
	'default' => 'AIzaSyAbnN3Pxr0lwW4EobFDDwN3J4wukx1SBPI',
	'priority' => $priority++,
));

