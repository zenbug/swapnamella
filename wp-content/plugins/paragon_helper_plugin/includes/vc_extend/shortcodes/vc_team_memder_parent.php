<?php


add_shortcode('vc_team_member_parent', 'vc_team_member_parent_function');


function vc_team_member_parent_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'member_image' => '',
		'member_name' => 'Member Name',
		'member_function' => 'Member Function',
		'member_name_color' => '#3E3E3E',
		'member_function_color' => '#bdbdbd',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	$output = '';

	$vc_class = 'vl-team-member';
	
	
	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$image_done = wp_get_attachment_image_src($member_image, 'full');
	
	

	$output .= '<div class="' . $vc_class . '" style="margin: '.$m.';">';

	$output .= '<img src="'.$image_done[0].'" alt="">';
		
	$output .= '<div class="vl-team-member--description">';
	

	$output .= '<div class="vl-team-member--content">';
   	
	$output .= '<h5 class="vl-team-member--name" style="color:'.$member_name_color.';">'.$member_name.'</h5>';

	$output .= '<p class="vl-team-member--function" style="color:'.$member_function_color.';">'.$member_function.'</p>';
	$output .= '</div>';
	
	$output .= '<div class="vl-team-member--social">';
	$output .= do_shortcode($content);
	$output .= '</div>';


	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
	
	
}

add_action('vc_before_init', 'vc_team_member_parent_shortcode');

function vc_team_member_parent_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Team Member', 'vlthemes'),
		'base' => 'vc_team_member_parent',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'as_parent' => array(
			'only' => 'vc_single_icon'
		),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'heading' => esc_html__('Member Image', 'vlthemes'),
				'param_name' => 'member_image',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Name', 'vlthemes'),
				'param_name' => 'member_name',
				'value' => 'Member Name',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Function', 'vlthemes'),
				'param_name' => 'member_function',
				'value' => 'Member Function',
				'group' => 'General'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'member_name_color',
				'heading' => esc_html__('Name Color', 'vlthemes'),
				'value' => '#3E3E3E',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'member_function_color',
				'heading' => esc_html__('Function Color', 'vlthemes'),
				'value' => '#bdbdbd',
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
		),
		'js_view' => 'VcColumnView'
		
	));
}