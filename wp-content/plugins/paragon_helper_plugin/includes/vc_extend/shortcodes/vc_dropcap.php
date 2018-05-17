<?php


add_shortcode('vc_dropcap', 'vc_dropcap_function');

function vc_dropcap_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'letter' => 'A',
		'letter_color' => '#00EBC0',
		'letter_size' => '50px',
		'line_height' => '48px',
		'letter_padding' => '2px 10px 0 0',
		'letter_border_radius' => '0px',
		'letter_background' => 'transparent',
		'extra_class' => ''
	), $atts));
	

	$output = '';
	
	
	$vc_class = 'vl-dropcap';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}



	$output .= '<span class="'.$vc_class.'" style="font-size:' . $letter_size . '; line-height:' . $line_height . '; color:' . $letter_color . '; padding:' . $letter_padding . '; border-radius:' . $letter_border_radius . '; background-color:' . $letter_background . ';">' . $letter . '</span>';
	

	return $output;
}


add_action('vc_before_init', 'vc_dropcap_shortcode');

function vc_dropcap_shortcode() {
	vc_map(array(
		'name' => esc_html__('Dropcap', 'vlthemes'),
		'base' => 'vc_dropcap',
		 'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'param_name' => 'letter',
				'admin_label' => true,
				'heading' => esc_html__('Letter', 'vlthemes'),
				'value' => 'A',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'letter_size',
				'heading' => esc_html__('Letter Font Size (px)', 'vlthemes'),
				'value' => '50px',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'line_height',
				'heading' => esc_html__('Letter Line Height (px)', 'vlthemes'),
				'value' => '48px',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'letter_padding',
				'heading' => esc_html__('Letter Padding (px)', 'vlthemes'),
				'value' => '2px 10px 0 0',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'letter_border_radius',
				'heading' => esc_html__('Letter Border Radius (px)', 'vlthemes'),
				'value' => '0px',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'letter_color',
				'heading' => esc_html__('Letter Color', 'vlthemes'),
				'value' => '#00EBC0',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'letter_background',
				'heading' => esc_html__('Letter Background', 'vlthemes'),
				'value' => 'transparent',
				'group' => 'Style'
			),
			array(
				'save_always' => true,
				'type' => 'textfield',
				'holder' => false,
				'heading' => esc_html__('Extra class', 'vlthemes'),
				'param_name' => 'extra_class',
				'value' => '',
				'admin_label' => true,
				'group' => 'Extras'
			)
		)
	));
	
}