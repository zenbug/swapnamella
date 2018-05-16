<?php


/***********************************************************
Portfolio Settings
***********************************************************/


$priority = 0;


Kirki::add_field('paragon_customize', array(
	'type' => 'color',
	'settings' => 'portfolio_color',
	'label' => esc_html__('Portfolio Color', 'paragon'),
	'section' => 'section_portfolio_settings',
	'default' => 'rgba(0, 235, 192, 0.9)',
	'priority' => $priority++,
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => '
				.vl-portfolio-post--default .vl-portfolio-post--link
			',
			'property' => 'background-color' 
		),
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'repeater',
	'label' => esc_html__('Button Words', 'paragon'),
	'section' => 'section_portfolio_settings',
	'priority' => $priority++,
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__('Word', 'paragon'),
	),
	'settings' => 'ptf_load_more_words',
	'default' => array(
		array(
			'word' => esc_html__('Stop', 'paragon'),
		),
		array(
			'word' => esc_html__('Do not Click', 'paragon'),
		),
		array(
			'word' => esc_html__('Nothing Here', 'paragon'),
		),
		array(
			'word' => esc_html__('Hey?', 'paragon'),
		),
		array(
			'word' => esc_html__('What?', 'paragon'),
		),
		array(
			'word' => esc_html__('Are you Crazy?', 'paragon'),
		),
		array(
			'word' => esc_html__('OMG', 'paragon'),
		),
		array(
			'word' => esc_html__('Unbelievable', 'paragon'),
		),
		array(
			'word' => esc_html__('Get Lost!', 'paragon'),
		),
	),
	'fields' => array(
		'word' => array(
			'type' => 'text',
			'label' => esc_html__('Word', 'paragon'),
		),
	)
));

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'ptf_item_title_typography',
	'label' => esc_html__('Item Title Typography', 'paragon'),
	'section' => 'section_portfolio_settings',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => '700',
		'font-size' => '18px',
		'line-height' => '1.4rem',
		'letter-spacing' => '0',
		'color' => '#ffffff',
		'text-transform' => 'none',
	),
	'output' => array(
		array(
			'element' => '.vl-portfolio-post--info .vl-portfolio-post--title'
		)
	)
));

Kirki::add_field('paragon_customize', array(
	'type' => 'typography',
	'settings' => 'ptf_item_cat_typography',
	'label' => esc_html__('Item Category Typography', 'paragon'),
	'section' => 'section_portfolio_settings',
	'priority' => $priority++,
	'default' => array(
		'font-family' => 'pragmatica',
		'variant' => 'italic',
		'font-size' => '15px',
		'line-height' => '1.5rem',
		'letter-spacing' => '0',
		'color' => '#f9f9f9',
		'text-transform' => 'none',
	),
	'output' => array(
		array(
			'element' => '.vl-portfolio-post--info .vl-portfolio-post--cat'
		)
	)
));