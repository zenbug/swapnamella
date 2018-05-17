<?php

add_shortcode('vc_image_slider', 'vc_image_slider_function');

function vc_image_slider_function($atts, $content = null)
{
	extract(shortcode_atts(array(
		'images' => '',
		'dots' => 'true',
		'arrows' => 'true',
		'dots_position' => 'left',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	$output = '';

	
	$vc_class = 'vl-owl-slider-wrap owl-slider-shortcode owl-carousel';

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}

	$vc_class .= ' vl-dots-' . $dots_position;
	

	$images_done = explode(',', $images);
	


	$output .= '<div class="'.$vc_class.'" style="margin: '.$m.';" data-dots="'.$dots.'" data-arrows="'.$arrows.'">';

	foreach ($images_done as $image) {
		$url = wp_get_attachment_image_src($image, 'full');
		$output .= '<div class="owl-item"><img src="' . $url[0] . '" alt=""></div>';
	}
	
	$output .= '</div>';


	return $output;
}





add_action('vc_before_init', 'vc_image_slider_shortcode');

function vc_image_slider_shortcode()
{
	vc_map(array(
		'name' => esc_html__('Image Slider', 'vlthemes'),
		'base' => 'vc_image_slider',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_images',
				'heading' => esc_html__('Images', 'vlthemes'),
				'param_name' => 'images',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Arrows', 'vlthemes'),
				'param_name' => 'arrows',
				'value' => array(
					esc_attr__('Enable', 'vlthemes') => 'true',
					esc_attr__('Disable', 'vlthemes') => 'false',
				),
				'admin_label' => true,
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Dots', 'vlthemes'),
				'param_name' => 'dots',
				'value' => array(
					esc_attr__('Enable', 'vlthemes') => 'true',
					esc_attr__('Disable', 'vlthemes') => 'false',
				),
				'admin_label' => true,
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Dots Position', 'vlthemes'),
				'param_name' => 'dots_position',
				'value' => array(
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Center', 'vlthemes') => 'center',
					esc_attr__('Align Right', 'vlthemes') => 'right'
				),
				'group' => 'General',
				'dependency' => array(
					'element' => 'dots',
					'value' => 'true'
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
				'param_name' => 'm',
				'value' => '0',
				'group' => 'Margin'
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
