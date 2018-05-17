<?php

add_shortcode('vc_contact_form', 'vc_contact_form_function');

function vc_contact_form_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'form_id' => '',
		'form_title' => '',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	

	$output = '';

	$vc_class = 'vl-contact-form';
	
	
	if ( !empty( $extra_class ) ) {
		$vc_class .= ' ' . $extra_class;
	}

	global $post;
	

	$output .= '<div class="' . $vc_class . '" style="margin-bottom:'.$m.';">';
	
	$output .= do_shortcode('[contact-form-7 id="'.$form_id.'" title="'.$form_title.'"]');

	$output .= '</div>';
	
	return $output;
	
}

add_action('vc_before_init', 'vc_contact_form_shortcode');

function vc_contact_form_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Contact Form', 'vlthemes'),
		'base' => 'vc_contact_form',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Contact Form ID', 'vlthemes'),
				'param_name' => 'form_id',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Contact Form Title', 'vlthemes'),
				'param_name' => 'form_title',
				'value' => '',
				'group' => 'General'
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