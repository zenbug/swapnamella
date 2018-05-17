<?php


add_shortcode('vc_custom_title', 'vc_custom_title_function');


function vc_custom_title_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => 'Example',
		'heading' => 'h2',
		'align' => 'left',
		'size' => 'medium',
		'line_color' => '#00EBC0',
		'color' => '#3E3E3E',
		'm' => '0 0 30px',
		'p' => '0 0 5px',
		'extra_class' => ''
	), $atts));



	$output = '';




	$vc_class = 'vl-custom-title';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}

	$vc_class .= ' vl-text-' . $align;




	$output .= '<'.$heading.' class="' . $vc_class . '" style="margin:' . $m . '; padding:'.$p.'; color:'.$color.';">';



	$output .= $title;



	if($size != 'none'){
		$output .= '<span class="vl-custom-title--line vl-custom-title--line-'.$size.'" style="background-color:'.$line_color.';"></span>';
	}


	$output .= '</'.$heading.'>';


	return $output;
}


add_action('vc_before_init', 'vc_custom_title_shortcode');

function vc_custom_title_shortcode() {
	vc_map(array(
		'name' => esc_html__('Custom Title', 'vlthemes'),
		'base' => 'vc_custom_title',
		 'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__('Title', 'vlthemes'),
				'admin_label' => true,
				'value' => 'Example',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Heading', 'vlthemes'),
				'param_name' => 'heading',
				'value' => array(
					esc_html__('H2 - Default', 'vlthemes') => 'h2',
					esc_html__('H1', 'vlthemes') => 'h1',
					esc_html__('H3', 'vlthemes') => 'h3',
					esc_html__('H4', 'vlthemes') => 'h4',
					esc_html__('H5', 'vlthemes') => 'h5',
					esc_html__('H6', 'vlthemes') => 'h6',
				),
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title Position', 'vlthemes'),
				'param_name' => 'align',
				'value' => array(
					esc_attr__('Left', 'vlthemes') => 'left',
					esc_attr__('Center', 'vlthemes') => 'center',
					esc_attr__('Right', 'vlthemes') => 'right',
				),
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Line Size', 'vlthemes'),
				'param_name' => 'size',
				'value' => array(
					esc_attr__('Medium', 'vlthemes') => 'medium',
					esc_attr__('Large', 'vlthemes') => 'large',
					esc_attr__('Small', 'vlthemes') => 'small',
					esc_attr__('None', 'vlthemes') => 'none',
				),
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'line_color',
				'heading' => esc_html__('Line Color', 'vlthemes'),
				'value' => '#00EBC0',
				'dependency' => array( 
					'element' => 'size', 
					'value' => array('large','medium', 'small') 
				),
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'color',
				'heading' => esc_html__('Text Color', 'vlthemes'),
				'value' => '#3E3E3E',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
				'param_name' => 'm',
				'value' => '0 0 30px',
				'group' => 'Margin'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding (px)', 'vlthemes'),
				'param_name' => 'p',
				'value' => '0 0 5px',
				'group' => 'Padding'
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
