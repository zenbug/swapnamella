<?php



add_shortcode('vc_progress_bar', 'vc_progress_bar_function');

function vc_progress_bar_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => 'Progress Title',
		'percentage_value' => '95',
		'title_color' => '#3E3E3E',
		'title_background' => '#ffffff',
		'track_color' => '#f4f4f4',
		'track_height' => '4px',
		'bar_color' => '#00EBC0',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	
	$output = '';
	

	$vc_class = 'vl-progress-bar';
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$output .= '<div class="' . $vc_class . '" style="margin: '.$m.';">';
	$output .= '<h5 class="vl-progress-bar--title" style="color:'.$title_color.';"><span class="vl-progress-bar--text" style="background-color: '.$title_background.';">' . $title . '</span><span class="vl-progress-bar--percent">' . $percentage_value . '</span></h5>';
	$output .= '<div class="vl-progress-bar--outer" style="background-color: ' . $track_color . '; height: ' . $track_height . ';">';
	$output .= '<div class="vl-progress-bar--inner" style="background-color: ' . $bar_color . ';">';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}


add_action('vc_before_init', 'vc_progress_bar_shortcode');

function vc_progress_bar_shortcode() {

	vc_map(array(
		'name' => esc_html__('Progress Bar', 'vlthemes'),
		'base' => 'vc_progress_bar',
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
				'param_name' => 'title_background',
				'heading' => esc_html__('Text Background', 'vlthemes'),
				'value' => '#ffffff',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'title_color',
				'heading' => esc_html__('Text Color', 'vlthemes'),
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
				'param_name' => 'track_height',
				'heading' => esc_html__('Track Height (px)', 'vlthemes'),
				'value' => '4px',
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