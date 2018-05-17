<?php



add_shortcode('vc_circle_progress_bar', 'vc_circle_progress_bar_function');

function vc_circle_progress_bar_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => 'Progress Title',
		'title_color' => '#3E3E3E',
		'percentage_value' => '95',
		'track_color' => '#f4f4f4',
		'track_thickness' => '4',
		'bar_color' => '#00EBC0',
		'size' => '150',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	
	$output = '';
	

	$vc_class = 'vl-circle-progress-bar';
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	



	$output .= '<div class="'.$vc_class.'" style="margin:'.$m.';">';
	$output .= '<div data-vcthickness="'.$track_thickness.'" data-vctrackcolor="'.$track_color.'" data-vcbarcolor="'.$bar_color.'" data-vcvalue="'.$percentage_value.'" data-vcsize="'.$size.'" class="vl-circle-progress-bar--circle" style="height:'.$size.'px;">
	<span style="background-color:'.$bar_color.';">'.$percentage_value.'</span></div>';
    $output .= '<h5 class="vl-circle-progress-bar--title" style="color:'.$title_color.';">'.$title.'</h5>';
	$output .= '</div>';
	
	return $output;
}


add_action('vc_before_init', 'vc_circle_progress_bar_shortcode');

function vc_circle_progress_bar_shortcode() {

	vc_map(array(
		'name' => esc_html__('Circle Progress Bar', 'vlthemes'),
		'base' => 'vc_circle_progress_bar',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Title', 'vlthemes'),
				'param_name' => 'title',
				'value' => 'Progress Title',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Percent', 'vlthemes'),
				'param_name' => 'percentage_value',
				'value' => '95',
				'group' => 'General'
			),     
			array(
				'type' => 'colorpicker',
				'param_name' => 'title_color',
				'heading' => esc_html__('Title Color', 'vlthemes'),
				'value' => '#3E3E3E',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'bar_color',
				'heading' => esc_html__('Bar Color', 'vlthemes'),
				'value' => '#00EBC0',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'track_thickness',
				'heading' => esc_html__('Track Thickness', 'vlthemes'),
				'value' => '4',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'track_color',
				'heading' => esc_html__('Track Color', 'vlthemes'),
				'value' => '#f4f4f4',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Circle Size', 'vlthemes'),
				'param_name' => 'size',
				'value' => '150',
				'group' => 'Style'
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title Margin Top (px)', 'vlthemes'),
				'param_name' => 'title_mt',
				'value' => '20px',
				'group' => 'Margin'
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























