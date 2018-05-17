<?php



add_shortcode('vc_testimonials_parent', 'vc_testimonials_parent_function');


function vc_testimonials_parent_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'margin' => '30',
		'items' => '1',
		'autoheight' => 'false',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	
	$output = '';
	

	$vc_class = 'vl-owl-slider-wrap owl-carousel owl-testimonial-shortcode';
	
	
	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
 	

	
	$output .= '<div class="' . $vc_class . '" data-margin="'.$margin.'" data-items="'.$items.'" data-autoheight="'.$autoheight.'">';
   

	$output .= do_shortcode($content);
	
	$output .= '</div>';
	
	return $output;
	
}


add_action('vc_before_init', 'vc_testimonials_parent_shortcode');

function vc_testimonials_parent_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Testimonials Parent', 'vlthemes'),
		'base' => 'vc_testimonials_parent',
		'as_parent' => array(
			'only' => 'vc_testimonial'
		),
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'margin',
				'heading' => esc_html__('Gutter (px)', 'vlthemes'),
				'value' => '30',
				'group' => 'General'
			),

			array(
				'type' => 'dropdown',
				'admin_label' => true,
				'heading' => esc_html__('Items', 'vlthemes'),
				'param_name' => 'items',
				'value' => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
				),
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Autoheight', 'vlthemes'),
				'param_name' => 'autoheight',
				'value' => array(
					esc_attr__('Disable', 'vlthemes') => 'false',
					esc_attr__('Enable', 'vlthemes') => 'true',
				),
				'group' => 'General'
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
		),
		'js_view' => 'VcColumnView'
	));
	
	
}