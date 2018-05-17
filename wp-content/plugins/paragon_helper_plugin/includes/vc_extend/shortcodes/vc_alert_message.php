<?php

add_shortcode('vc_message', 'vc_message_function');

function vc_message_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'type' => 'vl-alert-classic',
		'close' => 'hide',
		'title' => 'Message Title!',
		'text' => 'I am message box. Click edit button to change this text.',
		'extra_class' => ''
	), $atts));

	
	$output = '';
	

	
	$vc_class = 'vl-alert alert';
	
	$vc_class .= ' ' . $type;

	if ( $close == 'show' ) {
		$vc_class .= ' vl-alert-dismissible';
	}


	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$output .= '<div class="' . $vc_class . '">';
	
	
	if ( $close == 'show' ) {
		$output .= '<a class="vl-alert-close" href="#"><i class="ion ion-close"></i></a>';
	}
	
	if( !empty($title) ){

		$output .= '<strong>'.$title.'</strong> ';

	}

	$output .= $text;
	
	$output .= '</div>';
	

	return $output;
	
}



add_action('vc_before_init', 'vc_message_shortcode');

function vc_message_shortcode() {
	vc_map(array(
		'name' => esc_html__('Alert Message', 'vlthemes'),
		'base' => 'vc_message',
		'icon' => plugins_url('vc_shortcode.png', __FILE__), 
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Message Title', 'vlthemes'),
				'param_name' => 'title',
				'admin_label' => true,
				'value' => 'Message Title!',
				'group' => 'General'
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Message Text', 'vlthemes'),
				'param_name' => 'text',
				'admin_label' => true,
				'value' => 'I am message box. Click edit button to change this text.',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type Message', 'vlthemes'),
				'param_name' => 'type',
				'value' => array(
					esc_attr__('Classic', 'vlthemes') => 'vl-alert-classic',
					esc_attr__('Informational', 'vlthemes') => 'vl-alert-info',
					esc_attr__('Warning', 'vlthemes') => 'vl-alert-warning',
					esc_attr__('Success', 'vlthemes') => 'vl-alert-success',
					esc_attr__('Error', 'vlthemes') => 'vl-alert-danger',
				),
				'admin_label' => true,
				'group' => 'Style'
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'close',
				'heading' => esc_html__('Close Button', 'vlthemes'),
				'std' => '',
				'value' => array(
					esc_attr__( 'Show', 'vlthemes' ) => 'show',
					esc_attr__( 'Hide', 'vlthemes' ) => 'hide',
				),
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