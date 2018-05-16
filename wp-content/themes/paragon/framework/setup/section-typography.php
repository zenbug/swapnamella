<?php

/***********************************************************
Body Typography
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'typography_body',
	'label' => esc_html__('Body Typography', 'paragon'),
	'section' => 'section_typography_general',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => 'regular',
		'font-size' => '16px',
		'line-height' => '1.6rem',
		'letter-spacing' => '0',
		'color' => '#728080',
		'text-transform' => 'none',
	),
	'output' => array(
		array(
			'element' => 'body'
		)
	)
));


/***********************************************************
Heading Typography
***********************************************************/


$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h1_typography',
	'label' => esc_html__('H1 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '30px',
		'line-height' => '3rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		)
	)
));

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h2_typography',
	'label' => esc_html__('H2 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '26px',
		'line-height' => '2.6rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		)
	)
));

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h3_typography',
	'label' => esc_html__('H3 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '22px',
		'line-height' => '2.2rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		)
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h4_typography',
	'label' => esc_html__('H4 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '18px',
		'line-height' => '1.8rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		)
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h5_typography',
	'label' => esc_html__('H5 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '16px',
		'line-height' => '1.6rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		)
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'h6_typography',
	'label' => esc_html__('H6 Typography', 'paragon'),
	'section' => 'section_typography_heading',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '14px',
		'line-height' => '1.4rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		)
	)
));


/***********************************************************
Blockquote Typography
***********************************************************/


$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'blockquote_typography',
	'label' => esc_html__('Blockquote Typography', 'paragon'),
	'section' => 'section_typography_blockquote',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'Lora',
		'variant' => 'italic',
		'font-size' => '20px',
		'line-height' => '2rem',
		'letter-spacing' => '0',
		'color' => '#3e3e3e',
		'text-transform' => 'none',
	),
	'output' => array(
		array(
			'element' => 'blockquote'
		)
	)
));


/***********************************************************
Button Typography
***********************************************************/

$priority = 0;


Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'label' => esc_html__('Button Typography', 'paragon'),
	'section' => 'section_typography_button',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	),
	'output' => array(
		array(
			'element' => '.vl-btn, .woocommerce a.button'
		)
	)
));



/***********************************************************
Widget Title Typography
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'typography_widget_title',
	'label' => esc_html__('Widget Title Typography', 'paragon'),
	'section' => 'section_typography_widget',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1.4rem',
		'letter-spacing' => '1px',
		'color' => '#bdbdbd',
		'text-transform' => 'uppercase'
	),
	'output' => array(
		array(
			'element' => '.vl-widget--title'
		)
	)
));


/***********************************************************
Input Typography
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'label' => esc_html__('Input Typography', 'paragon'),
	'section' => 'section_typography_input',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => 'regular',
		'font-size' => '16px',
		'line-height' => '1.6rem',
		'letter-spacing' => '',
		'color' => '#3e3e3e',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'input:not([type="submit"]), textarea, select'
		)
	)
));

