<?php


/***********************************************************
Logo
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'image',
	'settings' => 'sidebar_logo_image',
	'label' => esc_html__('Image Logo', 'paragon'),
	'section' => 'section_sidebar_logo',
	'default' => $theme_path_images . 'logo.png',
	'priority' => $priority++,
));

Kirki::add_field('paragon_customize', array(
	'type' => 'dimension',
	'settings' => 'sidebar_logo_image_height',
	'label' => esc_html__('Image Logo Height', 'paragon'),
	'section' => 'section_sidebar_logo',
	'default' => '70px',
	'priority' => $priority++,
));

Kirki::add_field('paragon_customize', array(
	'type' => 'switch',
	'settings' => 'sidebar_show_subtitle',
	'label' => esc_html__('Show Subtitle', 'paragon'),
	'section' => 'section_sidebar_logo',
	'default' => '0',
	'priority' => $priority++,
	'choices' => array(
	    'on'  => esc_html__( 'Enable', 'paragon' ),
	    'off' => esc_html__( 'Disable', 'paragon' )
	)
));

/***********************************************************
Social Links
***********************************************************/

$priority = 0;


Kirki::add_field('paragon_customize', array(
	'type' => 'switch',
	'settings' => 'sidebar_social',
	'label' => esc_html__('Show Social', 'paragon'),
	'section' => 'section_sidebar_socials',
	'default' => '1',
	'priority' => $priority++,
	'choices' => array(
	    'on'  => esc_html__( 'Enable', 'paragon' ),
	    'off' => esc_html__( 'Disable', 'paragon' )
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'repeater',
	'label' => esc_html__('Social List (Icon)', 'paragon'),
	'section' => 'section_sidebar_socials',
	'priority' => $priority++,
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__('Social Link', 'paragon'),
	),
	'settings' => 'sidebar_social_icons',
	'default' => '',
	'fields' => array(
		'sidebar_social_icons_icon' => array(
			'type' => 'text',
			'label' => esc_html__('Social Icon Class', 'paragon'),
	   ),
		'sidebar_social_icons_link' => array(
			'type' => 'text',
			'label' => esc_html__('Social URL', 'paragon'),
	   )
	),
	'active_callback' => array(
		array(
			'setting' => 'sidebar_social',
			'operator' => '==',
			'value' => '1'
		)
	)
));


/***********************************************************
Footer
***********************************************************/

$priority = 0;


Kirki::add_field('paragon_customize', array(
	'type' => 'textarea',
	'settings' => 'sidebar_footer_copyright',
	'label' => esc_html__('Footer Copyright', 'paragon'),
	'section' => 'section_sidebar_footer',
	'default' => '',
	'priority' => $priority++,
));




