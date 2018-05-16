<?php

/***********************************************************
Typekit Settings
***********************************************************/

$priority = 0;

Kirki::add_field( 'paragon_customize', array(
	'type' => 'switch',
	'settings' => 'enable_typekit',
	'label' => esc_html__('Enable Typekit', 'paragon'),
	'section' => 'section_typekit',
	'default' => '1',
	'priority' => $priority++,
    'choices' => array(
        'on'  => esc_html__( 'Enable', 'paragon' ),
        'off' => esc_html__( 'Disable', 'paragon' )
    )
) );

Kirki::add_field( 'paragon_customize', array(
	'type' => 'text',
	'settings' => 'typekit_id',
	'label' => esc_html__('Typekit ID', 'paragon'),
	'section' => 'section_typekit',
	'default' => 'dhl1xhg',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'enable_typekit',
			'operator' => '==',
			'value' => '1',
		)
	),
) );

Kirki::add_field( 'paragon_customize', array(
    'type' => 'repeater',
    'label' => esc_html__( 'Typekit Fonts', 'paragon' ) ,
    'description' => esc_html__( 'Here you can add typekit fonts', 'paragon' ) ,
    'settings' => 'typekit_fonts',
    'priority' => $priority++,
    'transport' => 'auto',
    'section' => 'section_typekit',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__( 'Typekit Font', 'paragon' ) ,
    ),
    'default' => array(
        array(
            'font_name' => 'Pragmatica',
            'font_css_name' => 'pragmatica',
            'font_variants' => array( 'regular', 'italic', '700', '700italic' ),
            'font_fallback' => 'sans-serif',
            'font_subsets' => 'latin'
        )
    ),
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'Name', 'paragon' ) ,
        ) ,
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'CSS Name', 'paragon' ) ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__( 'Variants', 'paragon' ) ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__( '100', 'paragon' ) ,
                '100italic' => esc_html__( '100italic', 'paragon' ) ,
                '200' => esc_html__( '200', 'paragon' ) ,
                '200italic' => esc_html__( '200italic', 'paragon' ) ,
                '300' => esc_html__( '300', 'paragon' ) ,
                '300italic' => esc_html__( '300italic', 'paragon' ) ,
                'regular' => esc_html__( 'regular', 'paragon' ) ,
                'italic' => esc_html__( 'italic', 'paragon' ) ,
                '500' => esc_html__( '500', 'paragon' ) ,
                '500italic' => esc_html__( '500italic', 'paragon' ) ,
                '600' => esc_html__( '600', 'paragon' ) ,
                '600italic' => esc_html__( '600italic', 'paragon' ) ,
                '700' => esc_html__( '700', 'paragon' ) ,
                '700italic' => esc_html__( '700italic', 'paragon' ) ,
                '800' => esc_html__( '800', 'paragon' ) ,
                '800italic' => esc_html__( '800italic', 'paragon' ) ,
                '900' => esc_html__( '900', 'paragon' ) ,
                '900italic' => esc_html__( '900italic', 'paragon' ) ,
            )
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__( 'Fallback', 'paragon' ) ,
            'choices' => array(
                'sans-serif' => esc_html__( 'Helvetica, Arial, sans-serif', 'paragon' ) ,
                'serif' => esc_html__( 'Georgia, serif', 'paragon' ) ,
                'display' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'paragon' ) ,
                'handwriting' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'paragon' ) ,
                'monospace' => esc_html__( '"Lucida Console", Monaco, monospace', 'paragon' ) ,
            )
        ) ,
        'font_subsets' => array(
            'type' => 'select',
            'label' => esc_html__( 'Subsets', 'paragon' ) ,
            'multiple' => 7,
            'choices' => array(
                'cyrillic' => esc_html__( 'Cyrillic', 'paragon' ) ,
                'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'paragon' ) ,
                'devanagari' => esc_html__( 'Devanagari', 'paragon' ) ,
                'greek' => esc_html__( 'Greek', 'paragon' ) ,
                'greek-ext' => esc_html__( 'Greek Extended', 'paragon' ) ,
                'khmer' => esc_html__( 'Khmer', 'paragon' ) ,
                'latin' => esc_html__( 'Latin', 'paragon' ) ,
            )
        ) ,
    ) ,
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
) );